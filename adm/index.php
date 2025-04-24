<?php
declare(strict_types=1);
session_start();

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Core\TwigEnvironment;
use App\Helpers\GeneralFunctions;
use App\Responses\ResponseObject;
use App\Config\Settings;

try {
    $settings = Settings::getInstance();

    $paths = [
        'views' => $settings->get('paths.adm_views'),
        'modules' => $settings->get('paths.mod_views'),
    ];

    $cachePath = $settings->get('paths.cache');
    $controllerPath = $settings->get('paths.mod_controllers');
    $controllerNamespace = 'Adm\\Modules\\Controllers\\';

    $twig = TwigEnvironment::create($paths, $cachePath);

    $functions = GeneralFunctions::addTimestamp('../js/custom/funciones.js');
    $style = GeneralFunctions::addTimestamp('../css/custom/adm.css');
    $init = GeneralFunctions::addTimestamp('../js/custom/init.js');

    $twig->addGlobal('Sistema', $settings->get('app.name'));
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
    $viewPath = $paths['modules'] . "{$modNav}.twig";


    $data = [
        'mod' => $modNav,
        'module_titulo' => ucfirst($modNav),
        'mod_descrip' => '',
    ];

    try {
        // Si el archivo del controlador existe, delega al controlador
        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();

                // Obtiene los datos necesarios para la vista desde el controlador
                $controllerData = $controller->onGet($_GET);
                
                $data = array_merge($data, get_object_vars($controllerData));
                $data['Type'] = $settings->get('messageTypes')[$controllerData->Type];
            } else {
                throw new \Exception("El controlador '{$controllerClass}' no existe.");
            }
        } elseif (file_exists($viewPath)) {
            // Si no hay controlador pero la vista general existe, renderiza la vista directamente
            echo $twig->render("@views/{$modNav}.twig", $data);
            exit;
        } else {
            // Si no existe ni el controlador ni la vista, muestra error404
            echo $twig->render('@views/error404.twig', [
                'mod_name' => 'Error 404',
                //'mod_descrip' => 'La página solicitada no existe',
            ]);
            exit;
        }
    } catch (Exception $e) {
        // Si ocurre una excepción en el controlador, captura el mensaje de error
        $data['Message'] = $e->getMessage();
        $data['Type'] = 'danger';
    }
    //print_r($data);
    echo $twig->render("@modules/{$modNav}.twig", $data);
} catch (Exception $e) {
    echo "Ocurrió un error grave: " . $e->getMessage();
}
