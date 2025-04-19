<?php
namespace App\Core;

use App\Core\Database;
use App\Responses\ResponseObject;

class EntidadBase {
    private Database $db;
    protected string $table;
    protected string $primaryKey;
    protected array $fields;

    /**
     * Constructor de la entidad base.
     * @param string $table Nombre de la tabla asociada.
     * @param string $primaryKey Nombre del campo clave primaria.
     * @param array $fields Configuración de los campos.
     */
    public function __construct(string $table, string $primaryKey, array $fields) {
        $this->table = $table;
        $this->primaryKey = $primaryKey;
        $this->fields = $fields;

        // Inicializar la instancia de la base de datos
        $this->db = new Database($this->table, $this->primaryKey);
        $this->db->fields = $this->fields; // Configurar los campos en la base de datos
    }

    /**
     * Obtener todos los registros de la tabla con filtros opcionales.
     * @param array $filters Opciones de filtrado (row, operator, value).
     * @return ResponseObject
     */
    public function findAll(array $filters = []): ResponseObject {
        $data = [];
        foreach ($filters as $filter) {
            $data[] = [
                "row" => $filter["row"],
                "operator" => $filter["operator"],
                "value" => $filter["value"],
            ];
        }
        return $this->db->getRecords(false, $data);
    }

    /**
     * Buscar un registro por su clave primaria.
     * @param mixed $id Valor de la clave primaria.
     * @return ResponseObject
     */
    public function findById($id): ResponseObject {
        return $this->db->getRecord($id);
    }

    /**
     * Crear un nuevo registro en la tabla.
     * @param array $data Datos en formato clave => valor.
     * @return ResponseObject
     */
    public function create(array $data): ResponseObject {
        return $this->db->insertRecord($data);
    }

    /**
     * Actualizar un registro existente.
     * @param mixed $id Valor de la clave primaria del registro a actualizar.
     * @param array $data Datos a actualizar en formato clave => valor.
     * @return ResponseObject
     */
    public function update($id, array $data): ResponseObject {
        return $this->db->updateRecord($data, null, $id);
    }

    /**
     * Eliminar un registro de la tabla.
     * @param mixed $id Valor de la clave primaria del registro a eliminar.
     * @return ResponseObject
     */
    public function remove($id): ResponseObject {
        return $this->db->deleteRecord(null, $id);
    }
}
