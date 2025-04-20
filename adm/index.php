<?php
declare(strict_types=1);
session_start();

define('PROJECT_ROOT', dirname(__DIR__));
require_once PROJECT_ROOT . '/vendor/autoload.php';

use App\Core\TwigEnvironment;
use App\Helpers\GeneralFunctions;

try {
    $config = require PROJECT_ROOT . '/src/Config/settings.php';

    $paths = [
        'views' => $config['paths']['adm_views'],
        'modules' => $config['paths']['mod_views'],
    ];

    $cachePath = $config['paths']['cache'];
    $controllerPath = $config['paths']['mod_controllers'];
    $controllerNamespace = 'Adm\\Modules\\Controllers\\';

    $twig = TwigEnvironment::create($paths, $cachePath);

    $functions = GeneralFunctions::addTimestamp('../js/custom/funciones.js');
    $style = GeneralFunctions::addTimestamp('../css/custom/adm.css');
    $init = GeneralFunctions::addTimestamp('../js/custom/init.js');

    $twig->addGlobal('Sistema', $config['app']['name']);
    $twig->addGlobal('functions', $functions);
    $twig->addGlobal('style', $style);
    $twig->addGlobal('init', $init);

    if (!isset($_SESSION['jce_log'])) {
        echo $twig->render('@views/login.twig', [
            'mensaje' => 'Por favor, inicie sesión para continuar',
        ]);
        exit;
    }

    $modNav = isset($_GET['mod']) ? trim(strtolower($_GET['mod'])) : 'home';
    $controllerFile = $controllerPath . ucfirst($modNav) . 'Controller.php';
    $controllerClass = $controllerNamespace . ucfirst($modNav) . 'Controller';
    $viewPath = $modNav === 'home'
        ? $paths['views'] . "home.twig"
        : $paths['modules'] . "{$modNav}.twig";

    if ($modNav === 'home') {
        echo $twig->render('@views/home.twig', [
            'mod_name' => 'Inicio',
            //'mod_descrip' => 'Bienvenido al sistema de gestión',
        ]);
        exit;
    }

    if (file_exists($controllerFile)) {
        require_once $controllerFile;

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();

            $data = $controller->onGet($_GET);

            echo $twig->render("@modules/{$modNav}.twig", $data);
        } else {
            throw new \Exception("El controlador '{$controllerClass}' no existe.");
        }
    } elseif (file_exists($viewPath)) {
        // Si no hay controlador pero la vista general existe, renderiza la vista directamente
        echo $twig->render("@views/{$modNav}.twig", [
            'mod_name' => ucfirst($modNav),
            'mod_descrip' => 'Vista general',
        ]);
    } else {
        // Si no existe ni el controlador ni la vista, muestra error404
        echo $twig->render('@views/error404.twig', [
            'mod_name' => 'Error 404',
            'mod_descrip' => 'La página solicitada no existe',
        ]);
    }
} catch (Exception $e) {
    // Manejo de errores
    echo "Ocurrió un error: " . $e->getMessage();
}
