<?php
namespace App\Entities;

use App\Core\EntidadBase;
use App\Core\QueryOptions;

class ProductosCaracteristicas extends EntidadBase {
    public function __construct() {
        parent::__construct('productos_caracteristicas', 'producto_id', [
            ['name' => 'producto_id', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'caracteristica_id', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'valor', 'type' => 'public', 'insert' => true, 'update' => true],
        ]);
    }
} 