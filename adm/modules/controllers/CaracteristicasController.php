<?php
namespace Adm\Modules\Controllers;

use App\Entities\Caracteristicas;
use App\Responses\ResponseObject;

class CaracteristicasController
{
    private $entidad;
    private $response;

    public function __construct()
    {
        $this->entidad = new Caracteristicas();
        $this->module_titulo = 'Características';
        $this->module_subtitulo = 'Listado de Características del sistema';
        $this->ruta_fotos = 'images/caracteristicas/';
        $this->response = new ResponseObject();
        $this->response->showAudit = false;
    }

    /**
     * Maneja solicitudes GET (prepara datos para la vista)
     */
    public function onGet($params): ResponseObject
    {
        try {
            $id = isset($params['id']) ? intval($params['id']) : null;
            $this->response->ruta_fotos = $this->ruta_fotos;
            
            if ($id === null) {
                // Listar
                $this->response->module = 'list';
                $data = $this->entidad->findAll();
                if (count($data['result']) > 0){
                    $this->response->Content = $data['result'];
                    $this->response->Rows = count($data['result']);
                } else {
                    $this->response->setWarning('No se encontraron características en la base de datos.');	
                }
            } elseif ($id === 0) {
                // Crear
                $this->response->module = 'form';
                $this->module_subtitulo = 'Complete el formulario para crear una nueva característica';
            } else {
                // Editar
                $this->response->module = 'form';
                $this->module_subtitulo = 'Modifique los datos de la característica seleccionada';
                $data = $this->entidad->findById($id);
                if (!$data){
                    throw new \Exception("La característica con ID {$id} no existe.");
                }
                $this->response->Content = $data;
                $this->response->Rows = 1;
                $this->response->showAudit = true;
            }
            $this->response->module_titulo = $this->module_titulo;
            $this->response->module_subtitulo = $this->module_subtitulo;
        } catch (\Exception $e) {
            $this->response->setError($e->getMessage());
        }
        return $this->response;
    }
} 