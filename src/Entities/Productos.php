<?php
namespace App\Entities;

use App\Core\EntidadBase;
use App\Entities\ProductosCategorias;
use App\Entities\Marcas;
use App\Entities\Categorias;
use App\Entities\ProductosCaracteristicas;
use App\Entities\Caracteristicas;
use App\Core\QueryOptions;

class Productos extends EntidadBase {
    public function __construct() {
        parent::__construct('productos', 'id',[
            ['name' => 'id', 'type' => 'system', 'insert' => false, 'update' => false],
            ['name' => 'id', 'type' => 'system', 'definition' => "LPAD(id, '6','0') AS codigo", 'insert' => false, 'update' => false],
            ['name' => 'sku', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'nombre_es', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'nombre_en', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'descripcion_es', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'descripcion_en', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'marca_id', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'ficha', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'creacion_fecha', 'type' => 'system', 'definition' => "DATE_FORMAT(creacion_fecha, '%d/%m/%Y %T') AS creacion_fecha", 'insert' => false, 'update' => false],
            ['name' => 'creacion_usuario', 'type' => 'system', 'insert' => false, 'update' => false],
            ['name' => 'creacion_IP', 'type' => 'system', 'insert' => false, 'update' => false],
            ['name' => 'actualizacion_fecha', 'type' => 'system', 'definition' => "DATE_FORMAT(actualizacion_fecha, '%d/%m/%Y %T') AS actualizacion_fecha", 'insert' => false, 'update' => false],
            ['name' => 'actualizacion_usuario', 'type' => 'system', 'insert' => false, 'update' => false],
            ['name' => 'actualizacion_IP', 'type' => 'system', 'insert' => false, 'update' => false],
        ]);
    }

    /**
     * Obtiene todos los Productos con sus Marcas, Categorias y Caracteristicas
     * @return array Datos del producto con sus relaciones.
     */
    public function findAllFull(): array {
        $productos = $this->findAll([],'','nombre_es ASC');
        
        if (empty($productos['result'])) {
            return $productos;
        }

        $marcas = new Marcas();
        $productoCategorias = new ProductosCategorias();
        $productoCaracteristicas = new ProductosCaracteristicas();
        $caracteristicas = new Caracteristicas();
        
        foreach ($productos['result'] as &$producto) {
            // Obtener marca
            $marcaId = $producto['marca_id'];
            $marca_temp = $marcas->findById($marcaId);
            if (!empty($marca_temp)) {
                $producto['marca'] = $marca_temp[0];
            }

            // Obtener categorías
            $filters = [
                ['column' => 'producto_id', 'operator' => '=', 'value' => $producto['id']]
            ];
            $categorias = $productoCategorias->findAll($filters);
            $producto['categorias'] = $categorias['result'] ?? [];

            // Obtener características
            $caracteristicasProducto = $productoCaracteristicas->findAll($filters);
            if (!empty($caracteristicasProducto['result'])) {
                foreach ($caracteristicasProducto['result'] as &$caracteristica) {
                    $caracteristicaInfo = $caracteristicas->findById($caracteristica['caracteristica_id']);
                    if (!empty($caracteristicaInfo)) {
                        $caracteristica['nombre_es'] = $caracteristicaInfo[0]['nombre_es'];
                        $caracteristica['nombre_en'] = $caracteristicaInfo[0]['nombre_en'];
                    }
                }
            }
            $producto['caracteristicas'] = $caracteristicasProducto['result'] ?? [];
        }

        return $productos;
    }

    /**
     * Obtiene un producto específico con sus relaciones
     * @param int $id ID del producto
     * @return array Datos del producto con sus relaciones
     */
    public function findByIdFull(int $id): array {
        $producto = $this->findById($id);
        
        if (empty($producto)) {
            return ['result' => []];
        }

        $marcas = new Marcas();
        $productoCategorias = new ProductosCategorias();
        $productoCaracteristicas = new ProductosCaracteristicas();
        $caracteristicas = new Caracteristicas();
        
        // Obtener marca
        $marcaId = $producto[0]['marca_id'];
        $marca_temp = $marcas->findById($marcaId);
        if (!empty($marca_temp)) {
            $producto[0]['marca'] = $marca_temp[0];
        }

        $filters = [
            ['column' => 'producto_id', 'operator' => '=', 'value' => $id]
        ];

        // Obtener categorías
        $categorias = $productoCategorias->findAll($filters);
        $producto[0]['categorias'] = $categorias['result'] ?? [];

        // Obtener características
        $caracteristicasProducto = $productoCaracteristicas->findAll($filters);
        if (!empty($caracteristicasProducto['result'])) {
            foreach ($caracteristicasProducto['result'] as &$caracteristica) {
                $caracteristicaInfo = $caracteristicas->findById($caracteristica['caracteristica_id']);
                if (!empty($caracteristicaInfo)) {
                    $caracteristica['nombre_es'] = $caracteristicaInfo[0]['nombre_es'];
                    $caracteristica['nombre_en'] = $caracteristicaInfo[0]['nombre_en'];
                }
            }
        }
        $producto[0]['caracteristicas'] = $caracteristicasProducto['result'] ?? [];

        return $producto;
    }

    /**
     * Crea un nuevo producto con sus relaciones
     * @param array $data Datos del producto y sus relaciones
     * @return array Resultado de la operación
     */
    public function create(array $data): array {
        // Extraer y remover las relaciones
        $categorias = $data['categorias'] ?? [];
        $caracteristicas = $data['caracteristicas'] ?? [];
        unset($data['categorias'], $data['caracteristicas']);

        // Convertir arrays a JSON para pasarlos al procedimiento
        $categoriasJson = json_encode($categorias);
        $caracteristicasJson = json_encode($caracteristicas);

        // Llamar al procedimiento almacenado
        $result = $this->getDatabase()->executeProcedure('sp_create_producto', [
            'p_sku' => $data['sku'],
            'p_nombre_es' => $data['nombre_es'],
            'p_nombre_en' => $data['nombre_en'],
            'p_descripcion_es' => $data['descripcion_es'],
            'p_descripcion_en' => $data['descripcion_en'],
            'p_marca_id' => $data['marca_id'],
            ///'p_ficha' => $data['ficha'],
            'p_categorias' => $categoriasJson,
            'p_caracteristicas' => $caracteristicasJson
        ]);

        return $result;
    }

    /**
     * Actualiza un producto y sus relaciones
     * @param int $id ID del producto
     * @param array $data Datos del producto y sus relaciones
     * @return array Resultado de la operación
     */
    public function update(int $id, array $data): array {
        // Extraer y remover las relaciones
        $categorias = $data['categorias'] ?? [];
        $caracteristicas = $data['caracteristicas'] ?? [];
        unset($data['categorias'], $data['caracteristicas']);

        // Convertir arrays a JSON para pasarlos al procedimiento
        $categoriasJson = json_encode($categorias);
        $caracteristicasJson = json_encode($caracteristicas);

        // Llamar al procedimiento almacenado
        $result = $this->getDatabase()->executeProcedure('sp_update_producto', [
            'p_id' => $id,
            'p_sku' => $data['sku'],
            'p_nombre_es' => $data['nombre_es'],
            'p_nombre_en' => $data['nombre_en'],
            'p_descripcion_es' => $data['descripcion_es'],
            'p_descripcion_en' => $data['descripcion_en'],
            'p_marca_id' => $data['marca_id'],
            //'p_ficha' => $data['ficha'],
            'p_categorias' => $categoriasJson,
            'p_caracteristicas' => $caracteristicasJson
        ]);

        return $result;
    }

    public function remove(int $id): array {
        // Llamar al procedimiento almacenado
        $result = $this->getDatabase()->executeProcedure('sp_delete_producto', [
            'p_id' => $id,
        ]);

        return $result;
    }

    /**
     * Actualiza un producto de manera simple, sin procesar relaciones.
     * @param int $id ID del producto
     * @param array $data Datos a actualizar
     * @return array Resultado de la operación
     */
    public function updateSimple(int $id, array $data): array {
        return parent::update($id, $data);
    }
}
