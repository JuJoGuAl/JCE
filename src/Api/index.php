<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Responses\ResponseObject;
use App\Entities\Usuarios;

header('Content-Type: application/json');
$response = new ResponseObject();

function sendResponse(ResponseObject $response): void
{
    echo json_encode($response);
    exit();
}

try {
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $requestData = json_decode(file_get_contents('php://input'), true);
    $action = $requestData['action'] ?? null;

    if (!$action) {
        throw new Exception('No se especificó ninguna acción.');
    }

    if ($action === 'val_log') {
        if ($requestMethod !== 'POST') {
            throw new Exception('Método no permitido para esta acción.');
        }

        $username = $requestData['username'] ?? null;
        $password = $requestData['password'] ?? null;

        if (!$username || !$password) {
            throw new Exception('Usuario y contraseña son requeridos.');
        }

        $usuario = new Usuarios();
        $usuarioData = $usuario->logUser($username, $password);

        $response->setSuccess(
            resultTitle: 'Inicio de sesión exitoso',
            resultText: 'El usuario ha iniciado sesión correctamente.',
            resultContent: $usuarioData,
            resultRows: 1
        );
        sendResponse($response);
    }

    if ($action === 'logout') {
        session_destroy();
        $response->setSuccess(
            resultTitle: 'Cierre de sesión',
            resultText: 'Sesión cerrada exitosamente.'
        );
        sendResponse($response);
    }

    if (!isset($_SESSION['jce_log'])) {
        throw new Exception('No tienes una sesión activa.');
    }

    if ($action === 'some_action') {
        if ($requestMethod !== 'POST') {
            throw new Exception('Método no permitido para esta acción.');
        }

        $someData = $requestData['some_data'] ?? null;

        if (!$someData) {
            throw new Exception('El campo "some_data" es requerido.');
        }

        $response->setSuccess(
            resultTitle: 'Acción ejecutada',
            resultText: 'La acción se ejecutó correctamente.',
            resultContent: ['processed_data' => $someData]
        );
        sendResponse($response);
    }

    throw new Exception('Acción no válida.');
} catch (Exception $e) {
    $response->setError(
        resultText: $e->getMessage()
    );
    sendResponse($response);
}
