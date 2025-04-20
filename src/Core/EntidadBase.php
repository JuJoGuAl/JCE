<?php
namespace App\Core;

use App\Core\Database;
use App\Core\QueryOptions;

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
        $this->setFields($fields);

        // Inicializar la instancia de la base de datos
        $this->db = new Database($this->table, $this->primaryKey);
        $this->db->fields = $this->fields;
    }

    /**
     * Procesa y valida los campos de la entidad.
     * @param array $fields Arreglo de campos con sus configuraciones.
     */
    protected function setFields(array $fields): void {
        foreach ($fields as $field) {
            // Validar que el campo tenga las claves necesarias
            if (!isset($field['name'], $field['type'], $field['insert'], $field['update'])) {
                throw new \InvalidArgumentException('Cada campo debe tener las claves: name, type, insert, update.');
            }
            $this->fields[] = $field;
        }
    }

    /**
     * Obtener todos los registros de la tabla con filtros opcionales.
     * @param array $filters Opciones de filtrado (row, operator, value).
     * @return Array de registros.
     */
    public function findAll(array $filters = [], string $groupBy = '', string $orderBy = '', string $limit = '', string $having = ''): array {
        $options = new QueryOptions();
        // Agregar filtros
        foreach ($filters as $filter) {
            $options->addFilter($filter['column'], $filter['operator'], $filter['value']);
        }

        // Agregar agrupación
        if ($groupBy != '') {
            $options->groupBy = $groupBy;
        }

        // Agregar orden
        if ($orderBy != '') {
            $options->orderBy = $orderBy;
        }
        else{
            $options->orderBy = "$this->primaryKey DESC";
        }

        // Establecer límite y desplazamiento
        if ($having != '') {
            $options->having = $having;
        }
        //$options->addFilter($this->primaryKey, '>', 999);
        return $this->db->getRecords($options);
    }

    /**
     * Buscar un registro por su clave primaria.
     * @param mixed $id Valor de la clave primaria.
     * @return Array de registros.
     */
    public function findById($id): array {
        return $this->db->getRecord($id);
    }

    /**
     * Crear un nuevo registro en la tabla.
     * @param array $data Datos en formato clave => valor.
     * @return Array de registros.
     */
    public function create(array $data): array {
        $filteredData = array_map(
            fn($value) => $value === "" ? null : $value,
            $data
        );
        return $this->db->insertRecord($filteredData);
    }

    /**
     * Actualizar un registro existente.
     * @param mixed $id Valor de la clave primaria del registro a actualizar.
     * @param array $data Datos a actualizar en formato clave => valor.
     * @return Array de registros.
     */
    public function update($id, array $data): array {
        $filteredData = array_map(
            fn($value) => $value === "" ? null : $value,
            $data
        );
        return $this->db->updateRecord($filteredData, null, $id);
    }

    /**
     * Eliminar un registro de la tabla.
     * @param mixed $id Valor de la clave primaria del registro a eliminar.
     * @return Array de registros.
     */
    public function remove($id): array {
        return $this->db->deleteRecord(null, $id);
    }
}
