<?php
namespace Adm\Modules\Controllers;

use App\Entities\Marcas;

class MarcasController
{
    private $marcas;

    public function __construct()
    {
        $this->marcas = new Marcas(); // Inicializa la entidad Marcas
    }

    /**
     * Maneja solicitudes GET (prepara datos para la vista)
     */
    public function onGet($params): array
    {
        $id = isset($params['id']) ? intval($params['id']) : null;

        if ($id === null) {
            $data = $this->marcas->findAll();
            // Listar todas las marcas
            return [
                'mod_name' => 'Listado de Marcas',
                'mod_descrip' => 'Utilice este módulo para gestionar las marcas que se asignaran a los productos que desee crear',
                'operation' => 'list',
                'marcas' => $data['result'],
            ];
        } elseif ($id === 0) {
            // Crear nueva marca
            return [
                'mod_name' => 'Creación de Marca',
                'mod_descrip' => 'Complete el formulario para crear una nueva marca',
                'operation' => 'create',
                'marca' => [
                    'codigo' => 0,
                    'nombre' => '',
                    'descripcion_es' => '',
                    'descripcion_en' => '',
                ],
            ];
        } else {
            // Editar una marca existente
            $marca = $this->marcas->get_($id);
            if (!$marca) {
                throw new \Exception("La marca con ID {$id} no existe.");
            }

            return [
                'mod_name' => 'Edición de Marca',
                'mod_descrip' => 'Modifique los datos de la marca seleccionada',
                'operation' => 'edit',
                'marca' => $marca,
            ];
        }
    }
}