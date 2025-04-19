<?php
namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigEnvironment
{
    /**
     * Crea y configura una instancia de Twig.
     * @param string $templatePath La ruta donde se encuentran las plantillas Twig.
     * @param string|null $cachePath La ruta para almacenar el caché de Twig (puede ser null para deshabilitar).
     * @return Environment Una instancia configurada de Twig.
     */
    public static function create(string $templatePath, ?string $cachePath = null): Environment
    {
        // Carga las plantillas desde la ruta especificada
        $loader = new FilesystemLoader($templatePath);

        // Configuración de Twig
        $options = [
            'cache' => $cachePath, // Cambiar a null para deshabilitar el caché en desarrollo
            'debug' => true,      // Habilitar el modo debug (útil en desarrollo)
        ];

        return new Environment($loader, $options);
    }
}
