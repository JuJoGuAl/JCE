<?php
namespace Adm\Modules\Controllers;

use App\Entities\Home;
use App\Responses\ResponseObject;

class HomeController
{
    private $entidad;
    private $response;

    public function __construct()
    {
        $this->entidad = new Home();
        $this->module_titulo = 'Inicio';
        $this->module_subtitulo = 'Informacion del Sistema';
        $this->response = new ResponseObject();
    }

    /**
     * Maneja solicitudes GET (prepara datos para la vista)
     */
    public function onGet($params): ResponseObject
    {
        try {
            $data = $this->entidad->getDashboardStats();
            if (count($data['result']) > 0){
                $this->response->Content = $data['result'];
            }
            $data = $this->entidad->getDashboardLog();
            if (count($data['result']) > 0){
                $this->response->Logs = $data['result'];
            }
            $this->response->module_titulo = $this->module_titulo;
            $this->response->module_subtitulo = $this->module_subtitulo;
        } catch (\Exception $e) {
            $this->response->setError($e->getMessage());
        }
        return $this->response;
    }
}