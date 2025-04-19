<?php
return [
    // Rutas del sistema administrativo
    'paths' => [
        'adm_views' => __DIR__ . '/../../adm/views/',   // Ruta a las vistas del admin
        'mod_views' => __DIR__ . '/../../adm/modules/views/', // Ruta a las vistas de módulos del admin
        'cache' => __DIR__ . '/../../cache',           // Ruta al caché del sistema
    ],

    // Configuración general
    'app' => [
        'name' => 'Panel Administrativo JCE',
        'debug' => true, // Cambiar a false en producción
    ],
];
