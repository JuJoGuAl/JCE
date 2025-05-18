<?php

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

    // Crear el directorio del producto si no existe
    if (!file_exists($productPath)) {
        mkdir($productPath, 0777, true);
    }

    $downloadedImages = [];
    $errors = [];

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
        'path' => $productPath
    ];
}

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = trim($_POST['product_id'] ?? '');
    $imageUrls = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $_POST['image_urls'] ?? ''))));
    $totalUrls = count($imageUrls);

    if (empty($productId)) {
        $message = 'El ID del producto es requerido';
        $messageType = 'error';
    } elseif (empty($imageUrls)) {
        $message = 'Debe proporcionar al menos una URL de imagen';
        $messageType = 'error';
    } else {
        $result = downloadProductImages($productId, $imageUrls);
        
        if ($result['success']) {
            $message = sprintf(
                'Proceso completado con éxito para el producto <strong>%s</strong>. Se recibieron <strong>%d</strong> URLs y se descargaron <strong>%d</strong> imágenes correctamente.',
                $productId,
                $totalUrls,
                count($result['downloaded_images'])
            );
            $messageType = 'success';
            // Limpiar el formulario en caso de éxito
            $_POST = [];
        } else {
            $message = sprintf(
                'Proceso para el producto <strong>%s</strong>. Se recibieron <strong>%d</strong> URLs. Errores durante la descarga: %s',
                $productId,
                $totalUrls,
                implode(', ', $result['errors'])
            );
            $messageType = 'error';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar Imágenes de Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
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
            height: 150px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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
    </style>
</head>
<body>
    <h1>Descargar Imágenes de Producto</h1>
    
    <?php if ($message): ?>
        <div class="message <?php echo $messageType; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label for="product_id">ID del Producto:</label>
            <input type="text" id="product_id" name="product_id" required 
                   value="<?php echo htmlspecialchars($_POST['product_id'] ?? ''); ?>">
        </div>

        <div class="form-group">
            <label for="image_urls">URLs de las Imágenes (una por línea):</label>
            <textarea id="image_urls" name="image_urls" required placeholder="https://ejemplo.com/imagen1.jpg&#10;https://ejemplo.com/imagen2.jpg&#10;https://ejemplo.com/imagen3.jpg"><?php echo htmlspecialchars($_POST['image_urls'] ?? ''); ?></textarea>
        </div>

        <button type="submit">Descargar Imágenes</button>
    </form>
</body>
</html> 