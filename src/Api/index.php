<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Helpers\GeneralFunctions;
use App\Responses\ResponseObject;
use App\Config\Settings;
use App\Helpers\DocumentHandler;
use App\Helpers\ImagenHandler;

header('Content-Type: application/json');
$response = new ResponseObject();
$GeneralFunctions = new GeneralFunctions();

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

try {
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $requestData = getRequestData($requestMethod);
    //$uploadedFiles = handleUploadedFiles();
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

    if ($action === 'insert') {
        if ($requestMethod !== 'POST') {
            throw new Exception('Método no permitido para esta acción.');
        }

        $data = $requestData ?? null;
        
        if (!$data) {
            throw new Exception('Los datos son requeridos para insertar.');
        }

        // Primero intentar la inserción en la base de datos
        $result = $entity->create($data);
        
        // Si la inserción fue exitosa, procesar los archivos
        foreach ($_FILES as $key => $file) {
            if ($file['error'] === UPLOAD_ERR_OK) {
                if (!empty($file['tmp_name'])) {
                    $relativePath = $data[$key . '_path'];
                    $actualPicture = $relativePath . $data[$key . '_actual'];
                    
                    // Usar el ID de la inserción para el hash, asegurando que sea string
                    $uniqueName = $GeneralFunctions->generateUniqueName((string)$result['insertedId']);
                    
                    // Obtener la configuración de tipos permitidos
                    $settings = Settings::getInstance();
                    $allowedTypes = $settings->get('uploads.allowed_types');
                    
                    // Determinar si es documento o imagen
                    $isDocument = in_array($file['type'], $allowedTypes['document']);
                    $isImage = in_array($file['type'], $allowedTypes['image']);
                    
                    if ($isDocument) {
                        $handler = new DocumentHandler();
                        $handler->file = $file;
                        $handler->relativePath = $relativePath;
                        $handler->uniqueName = $uniqueName;
                    } elseif ($isImage) {
                        $handler = new ImagenHandler();
                        $handler->file = $file;
                        $handler->relativePath = $relativePath;
                        $handler->uniqueName = $uniqueName;
                    } else {
                        throw new Exception("Tipo de archivo no permitido: " . $file['type']);
                    }

                    $uploadedFileName = $handler->upload();
                    
                    // Actualizar el registro con el nombre del archivo
                    $updateData = [
                        'id' => (int)$result['insertedId'],
                        $key => $uploadedFileName
                    ];
                    if ($entityName === 'Productos') {
                        $entity->updateSimple((int)$result['insertedId'], $updateData);
                    } else {
                        $entity->update((int)$result['insertedId'], $updateData);
                    }
                }
            }
        }

        $response->setSuccess(
            Message: 'El Registro fue creado con exito!',
            Content: ['processed_data' => $data]
        );
        sendResponse($response);
    }

    if ($action === 'update') {
        if ($requestMethod !== 'POST') {
            throw new Exception('Método no permitido para esta acción.');
        }

        $data = $requestData ?? null;
        
        if (!$data) {
            throw new Exception('Los datos son requeridos para actualizar.');
        }

        // Primero intentar la actualización en la base de datos
        $result = $entity->update((int)$data['id'], $data);
        
        // Procesar los archivos
        foreach ($_FILES as $key => $file) {
            if ($file['error'] === UPLOAD_ERR_OK) {
                if (!empty($file['tmp_name'])) {
                    $relativePath = $data[$key . '_path'];
                    $actualPicture = $relativePath . $data[$key . '_actual'];
                    
                    // Usar el ID del registro para el hash
                    $uniqueName = $GeneralFunctions->generateUniqueName((string)$data['id']);
                    
                    // Obtener la configuración de tipos permitidos
                    $settings = Settings::getInstance();
                    $allowedTypes = $settings->get('uploads.allowed_types');
                    
                    // Determinar si es documento o imagen
                    $isDocument = in_array($file['type'], $allowedTypes['document']);
                    $isImage = in_array($file['type'], $allowedTypes['image']);
                    
                    if ($isDocument) {
                        $handler = new DocumentHandler();
                        $handler->file = $file;
                        $handler->relativePath = $relativePath;
                        $handler->uniqueName = $uniqueName;
                        $handler->fileToDelete = $actualPicture;
                    } elseif ($isImage) {
                        $handler = new ImagenHandler();
                        $handler->file = $file;
                        $handler->relativePath = $relativePath;
                        $handler->uniqueName = $uniqueName;
                        $handler->fileToDelete = $actualPicture;
                    } else {
                        throw new Exception("Tipo de archivo no permitido: " . $file['type']);
                    }

                    $uploadedFileName = $handler->upload();
                    
                    // Actualizar el registro con el nombre del archivo
                    $updateData = [
                        'id' => (int)$data['id'],
                        $key => $uploadedFileName
                    ];
                    if ($entityName === 'Productos') {
                        $entity->updateSimple((int)$data['id'], $updateData);
                    } else {
                        $entity->update((int)$data['id'], $updateData);
                    }
                }
            }
        }

        $response->setSuccess(
            Message: 'El Registro fue actualizado con exito!',
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

    throw new Exception('Acción no válida.');
} catch (Exception $e) {
    $response->setError(
        Message: $e->getMessage(),
        Content: !isset($_SESSION['jce_log']) ? 0 : 1
    );
    sendResponse($response);
}
