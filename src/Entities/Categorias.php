<?php
namespace App\Entities;

use App\Core\EntidadBase;

class Categorias extends EntidadBase {
    public function __construct() {
        parent::__construct('categorias', 'id',[
            ['name' => 'id', 'type' => 'system', 'insert' => false, 'update' => false],
            ['name' => 'id', 'type' => 'system', 'definition' => "LPAD(id, '6','0') AS codigo", 'insert' => false, 'update' => false],
            ['name' => 'nombre_es', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'nombre_en', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'creacion_fecha', 'type' => 'system', 'definition' => "DATE_FORMAT(creacion_fecha, '%d/%m/%Y %T') AS creacion_fecha", 'insert' => false, 'update' => false],
            ['name' => 'creacion_usuario', 'type' => 'system', 'insert' => false, 'update' => false],
            ['name' => 'creacion_IP', 'type' => 'system', 'insert' => false, 'update' => false],
            ['name' => 'actualizacion_fecha', 'type' => 'system', 'definition' => "DATE_FORMAT(actualizacion_fecha, '%d/%m/%Y %T') AS actualizacion_fecha", 'insert' => false, 'update' => false],
            ['name' => 'actualizacion_usuario', 'type' => 'system', 'insert' => false, 'update' => false],
            ['name' => 'actualizacion_IP', 'type' => 'system', 'insert' => false, 'update' => false],
        ]);
    }
}
