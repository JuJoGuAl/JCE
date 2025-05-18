<?php
// Configuración de límites
ini_set('max_execution_time', 300); // 5 minutos
ini_set('memory_limit', '1024M');   // 1 GB
set_time_limit(300);                // 5 minutos

// Desactivar el límite de tiempo para operaciones de red
ini_set('default_socket_timeout', 300);

// Configuración para manejar errores de memoria
function handleMemoryError() {
    $error = error_get_last();
    if ($error !== null && $error['type'] === E_ERROR && strpos($error['message'], 'Allowed memory size') !== false) {
        echo json_encode([
            'success' => false,
            'message' => 'Error: Se ha excedido el límite de memoria. Por favor, procese menos productos a la vez.'
        ]);
        exit;
    }
}
register_shutdown_function('handleMemoryError');

function generateUniqueName(string $baseString, int $size = 30): string {
    $timestamp = microtime(true);

    $input = $baseString . $timestamp;
    $hash = hash('sha256', $input);
    
    return substr($hash, 0, $size);
}

function downloadProductImages($productId, $imageUrls) {
    // Definir la ruta base para las imágenes
    $basePath = __DIR__ . '/images/productos/';
    $productPath = $basePath . $productId . '/';

    // Verificar si la carpeta ya existe
    if (file_exists($productPath)) {
        return [
            'success' => true,
            'product_id' => $productId,
            'downloaded_images' => [],
            'errors' => [],
            'path' => $productPath,
            'skipped' => true
        ];
    }

    // Crear el directorio del producto si no existe
    if (!file_exists($productPath)) {
        mkdir($productPath, 0777, true);
    }

    $downloadedImages = [];
    $errors = [];
    $usedNames = []; // Array para rastrear nombres ya utilizados

    foreach ($imageUrls as $index => $url) {
        // Obtener la extensión del archivo
        $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
        if (empty($extension)) {
            $extension = 'jpg'; // Extensión por defecto
        }

        // Generar nombre único usando el ID del producto como base
        $uniqueName = generateUniqueName($productId);
        $filename = $uniqueName . '.' . $extension;
        $filepath = $productPath . $filename;

        // Verificar si el nombre ya existe y generar uno nuevo si es necesario
        $counter = 1;
        while (in_array($filename, $usedNames)) {
            $filename = $uniqueName . '_' . $counter . '.' . $extension;
            $filepath = $productPath . $filename;
            $counter++;
        }
        $usedNames[] = $filename;

        // Descargar la imagen
        $imageContent = @file_get_contents($url);
        if ($imageContent !== false) {
            if (file_put_contents($filepath, $imageContent)) {
                $downloadedImages[] = $filename;
            } else {
                $errors[] = "No se pudo guardar la imagen: " . $url;
            }
        } else {
            $errors[] = "No se pudo descargar la imagen: " . $url;
        }
    }

    return [
        'success' => count($errors) === 0,
        'product_id' => $productId,
        'downloaded_images' => $downloadedImages,
        'errors' => $errors,
        'path' => $productPath,
        'skipped' => false
    ];
}

function processFileLines($lines) {
    $currentProductId = null;
    $productImages = [];
    $results = [];
    $messages = [];

    foreach ($lines as $line) {
        $parts = explode("\t", trim($line));
        if (count($parts) !== 2) continue;

        $url = trim($parts[0]);
        $id = trim($parts[1]);

        if ($id !== '#N/D') {
            // Si tenemos un producto anterior, procesarlo
            if ($currentProductId !== null && !empty($productImages)) {
                $result = downloadProductImages($currentProductId, $productImages);
                $results[] = $result;
                if ($result['skipped']) {
                    $messages[] = [
                        'type' => 'warning',
                        'message' => sprintf(
                            'Producto <strong>%s</strong>: Se omitió el proceso porque la carpeta ya existe. Se recibieron <strong>%d</strong> URLs.',
                            $currentProductId,
                            count($productImages)
                        )
                    ];
                } else {
                    $messages[] = [
                        'type' => $result['success'] ? 'success' : 'error',
                        'message' => sprintf(
                            'Producto <strong>%s</strong>: Se recibieron <strong>%d</strong> URLs y se descargaron <strong>%d</strong> imágenes %s',
                            $currentProductId,
                            count($productImages),
                            count($result['downloaded_images']),
                            $result['success'] ? 'correctamente' : '. Errores: ' . implode(', ', $result['errors'])
                        )
                    ];
                }
            }
            // Iniciar nuevo producto
            $currentProductId = $id;
            $productImages = [$url];
        } else {
            // Agregar URL al producto actual
            if ($currentProductId !== null) {
                $productImages[] = $url;
            }
        }
    }

    // Procesar el último producto
    if ($currentProductId !== null && !empty($productImages)) {
        $result = downloadProductImages($currentProductId, $productImages);
        $results[] = $result;
        if ($result['skipped']) {
            $messages[] = [
                'type' => 'warning',
                'message' => sprintf(
                    'Producto <strong>%s</strong>: Se omitió el proceso porque la carpeta ya existe. Se recibieron <strong>%d</strong> URLs.',
                    $currentProductId,
                    count($productImages)
                )
            ];
        } else {
            $messages[] = [
                'type' => $result['success'] ? 'success' : 'error',
                'message' => sprintf(
                    'Producto <strong>%s</strong>: Se recibieron <strong>%d</strong> URLs y se descargaron <strong>%d</strong> imágenes %s',
                    $currentProductId,
                    count($productImages),
                    count($result['downloaded_images']),
                    $result['success'] ? 'correctamente' : '. Errores: ' . implode(', ', $result['errors'])
                )
            ];
        }
    }

    return $messages;
}

// Inicializar mensajes al inicio
$messages = [];

// Procesar el archivo si se ha subido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    if ($file['error'] === UPLOAD_ERR_OK) {
        $lines = file($file['tmp_name'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $messages = processFileLines($lines);
    } else {
        $messages[] = [
            'type' => 'error',
            'message' => 'Error al subir el archivo'
        ];
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar el formulario normal
    $products = $_POST['products'] ?? [];
    $hasSuccess = false;
    $hasError = false;

    foreach ($products as $index => $product) {
        $productId = trim($product['id'] ?? '');
        $imageUrls = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $product['urls'] ?? ''))));
        $totalUrls = count($imageUrls);

        if (empty($productId)) {
            $messages[] = [
                'type' => 'error',
                'message' => 'Fila ' . ($index + 1) . ': El ID del producto es requerido'
            ];
            $hasError = true;
            continue;
        }

        if (empty($imageUrls)) {
            $messages[] = [
                'type' => 'error',
                'message' => 'Fila ' . ($index + 1) . ': Debe proporcionar al menos una URL de imagen para el producto <strong>' . $productId . '</strong>'
            ];
            $hasError = true;
            continue;
        }

        $result = downloadProductImages($productId, $imageUrls);
        
        if ($result['success']) {
            $messages[] = [
                'type' => 'success',
                'message' => sprintf(
                    'Fila %d: Proceso completado con éxito para el producto <strong>%s</strong>. Se recibieron <strong>%d</strong> URLs y se descargaron <strong>%d</strong> imágenes correctamente.',
                    $index + 1,
                    $productId,
                    $totalUrls,
                    count($result['downloaded_images'])
                )
            ];
            $hasSuccess = true;
        } else {
            $messages[] = [
                'type' => 'error',
                'message' => sprintf(
                    'Fila %d: Proceso para el producto <strong>%s</strong>. Se recibieron <strong>%d</strong> URLs. Errores durante la descarga: %s',
                    $index + 1,
                    $productId,
                    $totalUrls,
                    implode(', ', $result['errors'])
                )
            ];
            $hasError = true;
        }
    }

    if ($hasSuccess && !$hasError) {
        $_POST = [];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descarga Masiva de Imágenes de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        textarea {
            height: 100px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px 0;
        }
        button:hover {
            background-color: #45a049;
        }
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }
        .success {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }
        .error {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }
        .product-row {
            background: #f9f9f9;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .product-row h3 {
            margin-top: 0;
            color: #333;
        }
        .add-row-btn {
            background-color: #2196F3;
        }
        .add-row-btn:hover {
            background-color: #1976D2;
        }
        .remove-row-btn {
            background-color: #f44336;
        }
        .remove-row-btn:hover {
            background-color: #d32f2f;
        }
        .warning {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }
    </style>
</head>
<body>
    <h1>Descarga Masiva de Imágenes de Productos</h1>
    
    <!-- Agregar formulario para subir archivo -->
    <form method="POST" enctype="multipart/form-data" style="margin-bottom: 20px;">
        <div class="form-group">
            <label for="file">Subir archivo de productos:</label>
            <input type="file" id="file" name="file" accept=".txt,.csv" required>
        </div>
        <button type="submit">Procesar Archivo</button>
    </form>

    <hr style="margin: 20px 0;">

    <?php foreach ($messages as $msg): ?>
        <div class="message <?php echo $msg['type']; ?>">
            <?php echo $msg['message']; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" id="massiveForm">
        <div id="productsContainer">
            <?php
            $products = $_POST['products'] ?? [['id' => '', 'urls' => '']];
            foreach ($products as $index => $product):
            ?>
            <div class="product-row">
                <h3>Producto <?php echo $index + 1; ?></h3>
                <div class="form-group">
                    <label for="product_id_<?php echo $index; ?>">ID del Producto:</label>
                    <input type="text" id="product_id_<?php echo $index; ?>" 
                           name="products[<?php echo $index; ?>][id]" required 
                           value="<?php echo htmlspecialchars($product['id']); ?>">
                </div>

                <div class="form-group">
                    <label for="image_urls_<?php echo $index; ?>">URLs de las Imágenes (una por línea):</label>
                    <textarea id="image_urls_<?php echo $index; ?>" 
                              name="products[<?php echo $index; ?>][urls]" 
                              required 
                              placeholder="https://ejemplo.com/imagen1.jpg&#10;https://ejemplo.com/imagen2.jpg&#10;https://ejemplo.com/imagen3.jpg"><?php echo htmlspecialchars($product['urls']); ?></textarea>
                </div>
                <?php if ($index > 0): ?>
                <button type="button" class="remove-row-btn" onclick="removeRow(this)">Eliminar Producto</button>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>

        <button type="button" class="add-row-btn" onclick="addRow()">Agregar Otro Producto</button>
        <button type="submit">Procesar Todos los Productos</button>
    </form>

    <script>
        function addRow() {
            const container = document.getElementById('productsContainer');
            const index = container.children.length;
            const template = `
                <div class="product-row">
                    <h3>Producto ${index + 1}</h3>
                    <div class="form-group">
                        <label for="product_id_${index}">ID del Producto:</label>
                        <input type="text" id="product_id_${index}" 
                               name="products[${index}][id]" required>
                    </div>

                    <div class="form-group">
                        <label for="image_urls_${index}">URLs de las Imágenes (una por línea):</label>
                        <textarea id="image_urls_${index}" 
                                  name="products[${index}][urls]" 
                                  required 
                                  placeholder="https://ejemplo.com/imagen1.jpg&#10;https://ejemplo.com/imagen2.jpg&#10;https://ejemplo.com/imagen3.jpg"></textarea>
                    </div>
                    <button type="button" class="remove-row-btn" onclick="removeRow(this)">Eliminar Producto</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', template);
            
            // Obtener el nuevo input y hacer focus
            const newInput = document.getElementById(`product_id_${index}`);
            newInput.focus();
            
            // Hacer scroll suave hasta el nuevo input
            newInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        function removeRow(button) {
            button.closest('.product-row').remove();
            // Renumerar los productos restantes
            const rows = document.querySelectorAll('.product-row');
            rows.forEach((row, index) => {
                row.querySelector('h3').textContent = `Producto ${index + 1}`;
            });
        }
    </script>
</body>
</html> 