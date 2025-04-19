<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\TwigEnvironment;
use App\Helpers\GeneralFunctions;

try {
    $config = require __DIR__ . '/../src/Config/settings.php';

    $templatePath = $config['paths']['adm_views'];
    $cachePath = $config['paths']['cache'];
    $twig = TwigEnvironment::create($templatePath, $cachePath);

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
    } else {
        $modError = 'page_404.twig';
        $modNav = isset($_GET['mod']) ? strtolower($_GET['mod']) : 'home';
        $fileView = $config['paths']['mod_views'] . "{$modNav}.twig";
    
        echo $twig->render('body.twig', [
            'profile' => 'profile.twig',
            'nav' => 'nav.twig',
            'contenido' => file_exists($fileView) ? "{$modNav}.twig" : $modError,
        ]);
    }
} catch (Exception $e) {
    // Manejo de errores
    echo "Ocurrió un error: " . $e->getMessage();
}
