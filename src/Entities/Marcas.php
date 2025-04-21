<?php
namespace App\Entities;

use App\Core\EntidadBase;

class Marcas extends EntidadBase {
    public function __construct() {
        parent::__construct('marcas', 'id',[
            ['name' => 'id', 'type' => 'system', 'insert' => false, 'update' => false],
            ['name' => 'id', 'type' => 'system', 'definition' => "LPAD(id, '6','0') AS codigo", 'insert' => false, 'update' => false],
            ['name' => 'nombre', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'descripcion_es', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'descripcion_en', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'logo', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'foto', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'creacion_fecha', 'type' => 'system', 'definition' => "DATE_FORMAT(creacion_fecha, '%d/%m/%Y %T') AS creacion_fecha", 'insert' => false, 'update' => false],
            ['name' => 'creacion_usuario', 'type' => 'system', 'insert' => false, 'update' => false],
            ['name' => 'creacion_IP', 'type' => 'system', 'insert' => false, 'update' => false],
            ['name' => 'actualizacion_fecha', 'type' => 'system', 'definition' => "DATE_FORMAT(actualizacion_fecha, '%d/%m/%Y %T') AS actualizacion_fecha", 'insert' => false, 'update' => false],
            ['name' => 'actualizacion_usuario', 'type' => 'system', 'insert' => false, 'update' => false],
            ['name' => 'actualizacion_IP', 'type' => 'system', 'insert' => false, 'update' => false],
        ]);
    }

    // Métodos específicos para la entidad Marcas pueden añadirse aquí si son necesarios
}
