<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Responses\ResponseObject;
// use App\Entities\Usuarios;
// use App\Entities\Marcas;

header('Content-Type: application/json');
$response = new ResponseObject();

function sendResponse(ResponseObject $response): void
{
    echo json_encode($response);
    exit();
}

try {
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    if ($requestMethod === 'GET' || $requestMethod === 'DELETE') {
        $requestData = $_GET;
    } else {
        $requestData = json_decode(file_get_contents('php://input'), true);
    }
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

        $data = $requestData['data'] ?? null;
        
        if (!$data) {
            throw new Exception('Los datos son requeridos para insertar.');
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

        $data = $requestData['data'] ?? null;
        
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
