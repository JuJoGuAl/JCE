<?php
namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigEnvironment
{
    /**
     * Crea y configura una instancia de Twig.
     * @param array $paths Un array de rutas donde se encuentran las plantillas Twig.
     *                     Puede incluir namespaces como ['views' => '/path/to/views', 'modules' => '/path/to/modules'].
     * @param string|null $cachePath La ruta para almacenar el caché de Twig (puede ser null para deshabilitar).
     * @return Environment Una instancia configurada de Twig.
     */
    public static function create(array $paths, ?string $cachePath = null): Environment
    {
        // Carga las plantillas desde las rutas especificadas con sus namespaces
        $loader = new FilesystemLoader();

        foreach ($paths as $namespace => $path) {
            if (is_string($namespace)) {
                // Registrar ruta con un namespace (e.g., '@views', '@modules')
                $loader->addPath($path, $namespace);
            } else {
                // Registrar ruta sin namespace (ruta general)
                $loader->addPath($path);
            }
        }

        // Configuración de Twig
        $options = [
            'cache' => $cachePath, // Cambiar a null para deshabilitar el caché en desarrollo
            'debug' => true,      // Habilitar el modo debug (útil en desarrollo)
        ];

        return new Environment($loader, $options);
    }
}