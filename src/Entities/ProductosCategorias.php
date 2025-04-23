<?php
namespace App\Entities;

use App\Core\EntidadBase;

class ProductosCategorias extends EntidadBase {
    public function __construct() {
        parent::__construct('productos_categorias', 'producto_id', [
            ['name' => 'producto_id', 'type' => 'public', 'insert' => true, 'update' => false],
            ['name' => 'categoria_id', 'type' => 'public', 'insert' => true, 'update' => false],
            ['name' => 'producto_id', 'type' => 'system', 'definition' => "LPAD(producto_id, '6','0') AS codigo_producto", 'insert' => false, 'update' => false],
            ['name' => 'categoria_id', 'type' => 'system', 'definition' => "LPAD(categoria_id, '6','0') AS codigo_categoria", 'insert' => false, 'update' => false],
        ]);
    }
}