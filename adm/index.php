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
    $moduleViewsPath = $config['paths']['mod_views'];
    $twig = TwigEnvironment::create($paths, $cachePath);

    $functions = GeneralFunctions::addTimestamp('../js/custom/funciones.js');
    $style = GeneralFunctions::addTimestamp('../css/custom/adm.css');
    $init = GeneralFunctions::addTimestamp('../js/custom/init.js');

    $twig->addGlobal('Sistema', $config['app']['name']);
    $twig->addGlobal('functions', $functions);
    $twig->addGlobal('style', $style);
    $twig->addGlobal('init', $init);

    if (!isset($_SESSION['jce_log'])) {
        echo $twig->render('login.twig', [
            'mensaje' => 'Por favor, inicie sesión para continuar',
        ]);
        exit;
    }

    $modNav = isset($_GET['mod']) ? strtolower($_GET['mod']) : 'home';
    $controllerFile = $controllerPath . "{$modNav}Controller.php";
    $viewFile = $modNav === 'home'
        ? $templatePath . "{$modNav}.twig"
        : $moduleViewsPath . "{$modNav}.twig";
    
    if (!file_exists($viewFile)) {
        $viewFile = $templatePath . 'error.twig';
    }

    echo $twig->render('body.twig', [
        'contenido' => $viewFile,
    ]);

    if (file_exists($controllerFile)) {
        require_once $controllerFile;

        $controllerClass = ucfirst($modNav) . 'Controller';
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass($twig);
            $controller->index();
        }
    }
} catch (Exception $e) {
    // Manejo de errores
    echo "Ocurrió un error: " . $e->getMessage();
}
