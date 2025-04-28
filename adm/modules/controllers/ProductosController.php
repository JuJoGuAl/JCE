<?php
namespace Adm\Modules\Controllers;

use App\Config\Settings;
use App\Entities\Marcas;
use App\Entities\Categorias;
use App\Entities\Caracteristicas;
use App\Entities\Productos;
use App\Responses\ResponseObject;

class ProductosController
{
    private $entidad;
    private $marcas;
    private $categorias;
    private $caracteristicas;
    private $response;
    private $settings;

    public function __construct()
    {
        $this->settings = Settings::getInstance();
        $this->entidad = new Productos();
        $this->marcas = new Marcas();
        $this->categorias = new Categorias();
        $this->caracteristicas = new Caracteristicas();
        $this->module_titulo = 'Productos';
        $this->module_subtitulo = 'Listado de Productos del sistema';
        $this->ruta_fotos = 'images/productos/';
        $this->ruta_fichas = 'documentos/productos/';
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
            $result_marcas = [];
            $result_categorias = [];
            
            $data_marcas = $this->marcas->findAll();
            if (count($data_marcas['result']) > 0){
                $result_marcas = $data_marcas['result'];
                $this->response->Marcas = $result_marcas;
            } else {
                $this->response->setWarning('No se encontraron marcas disponibles en la base de datos.');	
            }
            
            $data_categorias = $this->categorias->findAll();
            if (count($data_categorias['result']) > 0){
                $result_categorias = $data_categorias['result'];
                $this->response->Categorias = $result_categorias;
            } else {
                $this->response->setWarning('No se encontraron categorias disponibles en la base de datos.');	
            }
            $data_caracteristicas = $this->caracteristicas->findAll();
            if (count($data_caracteristicas['result']) > 0){
                $result_caracteristicas = $data_caracteristicas['result'];
                $this->response->Caracteristicas = $result_caracteristicas;
            } else {
                $this->response->setWarning('No se encontraron caracteristicas disponibles en la base de datos.');	
            }
            $this->response->ruta_fotos = $this->ruta_fotos;
            $this->response->ruta_ficha = $this->ruta_fichas;
            $this->response->max_size_image = $this->settings->get('uploads.max_size.image');
            $this->response->allowed_types_image = $this->settings->get('uploads.allowed_types.image');

            if ($id === null) {
                // Listar
                $this->response->module = 'list';
                $data = $this->entidad->findAllFull();
                if (count($data['result']) > 0){
                    // Buscar primera imagen para cada producto
                    foreach ($data['result'] as &$producto) {
                        $ruta_producto = 'images/productos/' . $producto['id'] . '/';
                        $imagenes = glob(dirname(dirname(dirname(__DIR__))) . '/' . $ruta_producto . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                        
                        if (!empty($imagenes)) {
                            // Tomar la primera imagen encontrada
                            $primera_imagen = basename($imagenes[0]);
                            $producto['imagen'] = $ruta_producto . $primera_imagen;
                        } else {
                            $producto['imagen'] = null;
                        }
                    }
                    
                    $this->response->Content = $data['result'];
                    $this->response->Rows = count($data['result']);
                } else {
                    $this->response->setWarning('No se encontraron productos en la base de datos.');	
                }
            } elseif ($id === 0) {
                // Crear
                $this->response->module = 'form';
                $this->module_subtitulo = 'Complete el formulario para crear una nuevo producto';
            } else {
                // Editar
                $this->response->module = 'form';
                $this->module_subtitulo = 'Modifique los datos del producto seleccionado';
                $data = $this->entidad->findByIdFull($id);
                if (!$data){
                    throw new \Exception("El producto con ID {$id} no existe.");
                }

                // Obtener imágenes del producto
                $rutaProducto = PROJECT_ROOT . '/' . $this->ruta_fotos . $id . '/';
                $imagenes = [];
                
                if (is_dir($rutaProducto)) {
                    $archivos = scandir($rutaProducto);
                    foreach ($archivos as $archivo) {
                        if ($archivo != '.' && $archivo != '..' && is_file($rutaProducto . $archivo)) {
                            $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
                            if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                $imagenes[] = [
                                    'id' => $id,
                                    'ruta' => $this->ruta_fotos . $id . '/' . $archivo
                                ];
                            }
                        }
                    }
                }
                
                $data[0]['imagenes'] = $imagenes;
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