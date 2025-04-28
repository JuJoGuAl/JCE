<?php
namespace App\Config;

// Definir la ruta raíz del proyecto
define('PROJECT_ROOT', dirname(dirname(__DIR__)));

class Settings {
    private static ?Settings $instance = null;
    private array $config = [];

    private function __construct() {
        $this->loadConfig();
    }

    public static function getInstance(): Settings {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function loadConfig(): void {
        // Configuración base
        $this->config = [
            // Rutas del sistema administrativo
            'paths' => [
                'adm_views' => PROJECT_ROOT . '/adm/views/',   // Ruta a las vistas del admin
                'mod_views' => PROJECT_ROOT . '/adm/modules/views/', // Ruta a las vistas de módulos del admin
                'mod_controllers' => PROJECT_ROOT . '/adm/modules/controllers/', // Ruta a los controladores
                'cache' => PROJECT_ROOT . '/cache',           // Ruta al caché del sistema
            ],

            // Configuración general
            'app' => [
                'name' => 'Panel Administrativo',
                'debug' => true, // Cambiar a false en producción
            ],

            'messageTypes' => [
                'success' => 'success',
                'error' => 'danger',
                'info' => 'info',
                'warning' => 'warning',
            ],

            // Configuración de subida de archivos
            'uploads' => [
                'allowed_types' => [
                    'document' => [
                        'application/pdf',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                    ],
                    'image' => [
                        'image/jpeg',
                        'image/jpg',
                        'image/png',
                        'image/gif'
                    ]
                ],
                'max_size' => [
                    'document' => 5 * 1024 * 1024, // 5MB
                    'image' => 5 * 1024 * 1024    // 2MB
                ]
            ]
        ];
    }

    public function get(string $key): mixed {
        $keys = explode('.', $key);
        $value = $this->config;
        
        foreach ($keys as $k) {
            if (!isset($value[$k])) {
                return null;
            }
            $value = $value[$k];
        }
        
        return $value;
    }

    public function set(string $key, mixed $value): void {
        $keys = explode('.', $key);
        $config = &$this->config;
        
        foreach ($keys as $k) {
            if (!isset($config[$k])) {
                $config[$k] = [];
            }
            $config = &$config[$k];
        }
        
        $config = $value;
    }
}
