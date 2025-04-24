<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Config\Settings;
use App\Helpers\GeneralFunctions;
use App\Helpers\DocumentHandler;
use App\Helpers\ImagenHandler;
use App\Responses\ResponseObject;

header('Content-Type: application/json');
$response = new ResponseObject();
$GeneralFunctions = new GeneralFunctions();
$settings = Settings::getInstance();

/**
 * Procesa y devuelve los datos de la solicitud según el método HTTP.
 *
 * @param string $method El método HTTP utilizado en la solicitud.
 * @return array Los datos procesados de la solicitud.
 */
function getRequestData(string $method): array
{
    if ($method === 'GET') {
        return $_GET;
    }

    if ($method === 'POST') {
        return $_POST;
    }

    // Manejo de métodos PUT, PATCH, DELETE con FormData
    $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
    if (strpos($contentType, 'multipart/form-data') !== false) {
        $boundary = substr($contentType, strpos($contentType, "boundary=") + 9);
        $rawData = file_get_contents('php://input');
        $parts = explode("--" . $boundary, $rawData);

        $data = [];
        foreach ($parts as $part) {
            if (empty($part) || $part === "--\r\n") {
                continue;
            }

            // Separar encabezado y contenido
            list($headers, $body) = explode("\r\n\r\n", $part, 2);
            $headers = explode("\r\n", $headers);

            // Extraer el nombre del campo
            $name = null;
            foreach ($headers as $header) {
                if (strpos($header, 'Content-Disposition:') !== false) {
                    preg_match('/name="([^"]+)"/', $header, $matches);
                    if (!empty($matches[1])) {
                        $name = $matches[1];
                    }
                }
            }

            // Ignorar partes sin nombre
            if ($name === null) {
                continue;
            }

            // Limpiar contenido
            $body = rtrim($body, "\r\n");

            // Agregar al array de datos
            $data[$name] = $body;
        }

        return $data;
    }

    // Manejo de JSON como alternativa
    $input = file_get_contents('php://input');
    if (!empty($input)) {
        $decoded = json_decode($input, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return $decoded;
        }
    }

    return [];
}

/**
 * Maneja los archivos subidos, si existen.
 */
function handleUploadedFiles(): array
{
    $uploadedFiles = [];

    if (!empty($_FILES)) {
        foreach ($_FILES as $key => $file) {
            if ($file['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../../../uploads/';
                $filePath = $uploadDir . basename($file['name']);
                move_uploaded_file($file['tmp_name'], $filePath);
                $uploadedFiles[$key] = $filePath; // Guardar la ruta en el array.
            }
        }
    }

    return $uploadedFiles;
}

/**
 * Enviar respuesta JSON y salir.
 */
function sendResponse(ResponseObject $response): void
{
    echo json_encode($response);
    exit();
}

/**
 * Procesa un archivo de imagen individual
 * @param array $file Archivo a procesar
 * @param string $relativePath Ruta base donde se guardará el archivo
 * @param string $hashString String único para generar el nombre del archivo
 * @param ?string $actualFile Archivo actual a reemplazar (opcional)
 * @return string Nombre del archivo procesado
 */
function processImage(array $file, string $relativePath, string $hashString, ?string $actualFile = null): string {
    global $GeneralFunctions;
    
    // Determinar si es para productos
    $isProductImages = strpos($relativePath, 'productos') !== false;
    if ($isProductImages) {
        $relativePath = $relativePath . $hashString . '/';
    }
    
    $uniqueName = $GeneralFunctions->generateUniqueName($hashString);
    
    $handler = new ImagenHandler();
    $handler->file = $file;
    $handler->relativePath = $relativePath;
    $handler->uniqueName = $uniqueName;
    $handler->fileToDelete = $actualFile;
    
    return $handler->upload();
}

/**
 * Procesa archivos de documento (individuales)
 * @param array $file Archivo a procesar
 * @param string $relativePath Ruta base donde se guardará el archivo
 * @param string $hashString String único para generar el nombre del archivo
 * @param ?string $actualFile Archivo actual a reemplazar (opcional)
 * @return string Nombre del archivo procesado
 */
function processDocument(array $file, string $relativePath, string $hashString, ?string $actualFile = null): string {
    global $GeneralFunctions;
    $uniqueName = $GeneralFunctions->generateUniqueName($hashString);
    
    $handler = new DocumentHandler();
    $handler->file = $file;
    $handler->relativePath = $relativePath;
    $handler->uniqueName = $uniqueName;
    $handler->fileToDelete = $actualFile;
    
    return $handler->upload();
}

try {
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $requestData = getRequestData($requestMethod);
    $action = $requestData['action'] ?? null;
    $entityName = $requestData['entity'] ?? null;

    if (!$action) {
        throw new Exception('No se especificó ninguna acción.');
    }

    if (!$entityName) {
        throw new Exception('No se especificó ninguna entidad.');
    }

    $entityClass = "App\\Entities\\" . ucfirst($entityName);
    if (!class_exists($entityClass)) {
        throw new Exception("La entidad '{$entityName}' no existe.");
    }
    $entity = new $entityClass();

    if ($action === 'val_log') {
        if ($requestMethod !== 'POST') {
            throw new Exception('Método no permitido para esta acción.');
        }

        $username = $requestData['username'] ?? null;
        $password = $requestData['password'] ?? null;

        if (!$username || !$password) {
            throw new Exception('Usuario y contraseña son requeridos.');
        }

        $usuarioData = $entity->logUser($username, $password);

        $_SESSION['jce_log'] = $usuarioData['cusuario'];

        $response->setSuccess(
            Message: 'El usuario ha iniciado sesión correctamente.',
            Rows: 1
        );
        sendResponse($response);
    }

    if ($action === 'logout') {
        session_destroy();
        $response->setSuccess(
            Message: 'Sesión cerrada exitosamente.'
        );
        sendResponse($response);
    }

    if (!isset($_SESSION['jce_log'])) {
        throw new Exception('No tienes una sesión activa.');
    }

    if ($action === 'insert' || $action === 'update') {
        if ($requestMethod !== 'POST') {
            throw new Exception('Método no permitido para esta acción.');
        }

        $data = $requestData ?? null;
        
        if (!$data) {
            throw new Exception('Los datos son requeridos para ' . ($action === 'insert' ? 'insertar' : 'actualizar') . '.');
        }

        // Primero intentar la operación en la base de datos
        $result = $action === 'insert' ? $entity->create($data) : $entity->update((int)$data['id'], $data);
    
        // Procesar los archivos
    
        foreach ($_FILES as $key => $file) {
            // Normalizar el array de archivos
            if (!isset($file['tmp_name'][0]) || !is_array($file['tmp_name'])) {
                $file = [
                    'name' => [$file['name']],
                    'type' => [$file['type']],
                    'tmp_name' => [$file['tmp_name']],
                    'error' => [$file['error']],
                    'size' => [$file['size']]
                ];
            }

            // Procesar cada archivo
            foreach ($file['tmp_name'] as $i => $tmpName) {
                if ($file['error'][$i] === UPLOAD_ERR_OK && !empty($tmpName)) {
                    $relativePath = $data[$key . '_path'] ?? null;
                    $actualFile = null;
                    if($action === 'update' && isset($data[$key . '_actual']) && !empty($data[$key . '_actual'])){
                        $actualFile = $relativePath . $data[$key . '_actual'];
                    }

                    $id = $action === 'insert' ? (int)$result['insertedId'] : (int)$data['id'];

                    if (!$relativePath) {
                        continue;
                    }

                    // Determinar el tipo de archivo
                    $allowedTypes = $settings->get('uploads.allowed_types');
                    $isDocument = in_array($file['type'][$i], $allowedTypes['document']);
                    $isImage = in_array($file['type'][$i], $allowedTypes['image']);

                    // Crear array temporal con el archivo actual
                    $currentFile = [
                        'name' => $file['name'][$i],
                        'type' => $file['type'][$i],
                        'tmp_name' => $tmpName,
                        'error' => $file['error'][$i],
                        'size' => $file['size'][$i]
                    ];

                    if ($isDocument) {
                        $uploadedFileName = processDocument($currentFile, $relativePath, (string)$id, $actualFile);
                        $updateData = [
                            'id' => $id,
                            $key => $uploadedFileName
                        ];
                    } elseif ($isImage) {
                        $uploadedFileName = processImage($currentFile, $relativePath, (string)$id, $actualFile);
                        $updateData = [
                            'id' => $id,
                            $key => $uploadedFileName
                        ];
                    } else {
                        throw new Exception("Tipo de archivo no permitido: " . $file['type'][$i]);
                    }

                    if ($entityName === 'Productos') {
                        if (str_contains($relativePath, 'documentos/productos/')) {
                            $entity->updateSimple((int)$result['insertedId'], $updateData);
                        }
                    } else {
                        $entity->update((int)$result['insertedId'], $updateData);
                    }
                }
            }
        }

        $response->setSuccess(
            Message: 'El Registro fue ' . ($action === 'insert' ? 'creado' : 'actualizado') . ' con éxito!',
            Content: ['processed_data' => $data]
        );
        sendResponse($response);
    }

    if ($action === 'delete') {
        if ($requestMethod !== 'POST') {
            throw new Exception('Método no permitido para esta acción.');
        }

        $id = $requestData['id'] ?? null;
        $filesToDelete = $requestData['files'] ?? null;
        $directoryToDelete = $requestData['directory'] ?? null;

        if(!is_array($filesToDelete) && $filesToDelete !== null && !empty($filesToDelete)){
            $filesToDelete = explode(',', $filesToDelete);
        }

        if(!is_array($directoryToDelete) && $directoryToDelete !== null && !empty($directoryToDelete)){
            $directoryToDelete = explode(',', $directoryToDelete);
        }
        
        if (!$id) {
            throw new Exception('El ID es requerido para eliminar.');
        }

        // Primero intentar la eliminación en la base de datos
        $result = $entity->remove((int)$id);

        // Solo si la eliminación en BD fue exitosa, proceder con los archivos
        if (!empty($filesToDelete)) {
            foreach ($filesToDelete as $file) {
                $filePath = $_SERVER['DOCUMENT_ROOT'] . '/' . ltrim($file, '/');
                if (file_exists($filePath)) {
                    if (!unlink($filePath)) {
                        throw new Exception("No se pudo eliminar el archivo: $file");
                    }
                }
            }
        }

        if ($directoryToDelete) {
            $absoluteDirectoryPath = $_SERVER['DOCUMENT_ROOT'] . '/' . ltrim($directoryToDelete, '/');
            if (is_dir($absoluteDirectoryPath)) {
                deleteDirectoryRecursively($absoluteDirectoryPath);
            } else {
                throw new Exception("El directorio no existe: $directoryToDelete");
            }
        }

        $response->setSuccess(
            Message: 'El Registro fue eliminado con éxito!',
            Content: ['processed_data' => $id]
        );
        sendResponse($response);
    }

    if ($action === 'delete_image') {
        if ($requestMethod !== 'POST') {
            throw new Exception('Método no permitido para esta acción.');
        }

        $id = $requestData['id'] ?? null;
        $ruta = $requestData['ruta'] ?? null;

        if (!$id || !$ruta) {
            throw new Exception('El ID y la ruta son requeridos para eliminar la imagen.');
        }

        // Construir la ruta completa del archivo
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/' . ltrim($ruta, '/');

        // Verificar si el archivo existe
        if (!file_exists($filePath)) {
            throw new Exception("La imagen no existe en la ruta especificada.");
        }

        // Intentar eliminar el archivo
        if (!unlink($filePath)) {
            throw new Exception("No se pudo eliminar la imagen.");
        }

        $response->setSuccess(
            Message: 'La imagen fue eliminada con éxito!',
            Content: ['processed_data' => $id]
        );
        sendResponse($response);
    }

    throw new Exception('Acción no válida.');
} catch (Exception $e) {
    $response->setError(
        Message: $e->getMessage(),
        Content: !isset($_SESSION['jce_log']) ? 0 : 1
    );
    sendResponse($response);
}
