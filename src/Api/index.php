<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Helpers\ImageHandler;
use App\Helpers\GeneralFunctions;
use App\Responses\ResponseObject;

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

$imageHandler = new ImageHandler();

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
        //print_r($data);
        //print_r($_FILES);
        foreach ($_FILES as $key => $file) {
            if ($file['error'] === UPLOAD_ERR_OK) {
                if (!empty($file['tmp_name'])) {
                    $relativePath = $data[$key];
                    $uniqueName = $GeneralFunctions->generateUniqueName($data['nombre']);
                    
                    $imageHandler = new ImageHandler();
                    $imageHandler->file = $file;
                    $imageHandler->relativePath = $relativePath;
                    $imageHandler->uniqueName = $uniqueName;

                    $uploadedFileName = $imageHandler->upload();

                    $data[$key] = $data[$key].$uploadedFileName;
                }
            }
        }

        $result = $entity->create($data);

        $response->setSuccess(
            Message: 'El Registro fue creado con exito!',
            Content: ['processed_data' => $data]
        );
        sendResponse($response);
    }

    if ($action === 'update') {
        if ($requestMethod !== 'PUT') {
            throw new Exception('Método no permitido para esta acción.');
        }

        $data = $requestData ?? null;
        
        if (!$data) {
            throw new Exception('Los datos son requeridos para actualizar.');
        }

        $result = $entity->update($data['id'],$data);

        $response->setSuccess(
            Message: 'El Registro fue actualizado con exito!',
            Content: ['processed_data' => $data]
        );
        sendResponse($response);
    }

    if ($action === 'delete') {
        if ($requestMethod !== 'DELETE') {
            throw new Exception('Método no permitido para esta acción.');
        }

        $id = $requestData['id'] ?? null;
        
        if (!$id) {
            throw new Exception('El ID es requerido para eliminar.');
        }

        $result = $entity->remove($id);

        $response->setSuccess(
            Message: 'El Registro fue elminado con exito!',
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
