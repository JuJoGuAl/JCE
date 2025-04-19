<?php
return [
    // Rutas del sistema administrativo
    'paths' => [
        'adm_views' => PROJECT_ROOT . '/adm/views/',   // Ruta a las vistas del admin
        'mod_views' => PROJECT_ROOT . '/adm/modules/views/', // Ruta a las vistas de módulos del admin
        'mod_controllers' => PROJECT_ROOT . '/adm/modules/controllers/', // Ruta a los controladores
        'cache' => PROJECT_ROOT . '/cache',           // Ruta al caché del sistema
    ],

    // Configuración general
    'app' => [
        'name' => 'Panel Administrativo JCE',
        'debug' => true, // Cambiar a false en producción
    ],
];
