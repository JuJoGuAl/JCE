<?php
namespace Adm\Modules\Controllers;

use App\Entities\Marcas;
use App\Responses\ResponseObject;

class MarcasController
{
    private $marcas;
    private $response;

    public function __construct()
    {
        $this->marcas = new Marcas();
        $this->module_titulo = 'Marcas';
        $this->module_subtitulo = 'Listado de Marcas del sistema';
        $this->ruta_fotos = 'images/marcas/';
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
            $this->response->ruta_logo = $this->ruta_fotos .'logos/';
            $this->response->ruta_fotos = $this->ruta_fotos .'fotos/';
            if ($id === null) {
                // Listar
                $this->response->module = 'list';
                $data = $this->marcas->findAll();
                if (count($data['result']) > 0){
                    $this->response->Content = $data['result'];
                    $this->response->Rows = count($data['result']);
                } else {
                    $this->response->setWarning('No se encontraron marcas en la base de datos.');	
                }
            } elseif ($id === 0) {
                // Crear
                $this->response->module = 'form';
                $this->module_subtitulo = 'Complete el formulario para crear una nueva marca';
            } else {
                // Editar
                $this->response->module = 'form';
                $this->module_subtitulo = 'Modifique los datos de la marca seleccionada';
                $data = $this->marcas->findById($id);
                if (!$data){
                    throw new \Exception("La marca con ID {$id} no existe.");
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