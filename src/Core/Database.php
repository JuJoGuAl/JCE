<?php
namespace App\Core;

use PDO;
use Exception;

use App\Config\Conection;
use App\Core\QueryOptions;

class Database {
    public string $table;
    public string $primaryKey;
    public array $fields;
    
    private PDO $conn;
    private bool $isProduction;
    private string $user;
    private string $ipAddress;
    private array $excludedFields;
    private bool $uppercaseEnabled;

    /**
     * Constructor de la clase Database.
     * @param string $table Nombre de la tabla sobre la que se ejecutarán las operaciones.
     * @param string $primaryKey Nombre de la clave primaria de la tabla.
     * @param bool $uppercaseEnabled Si es TRUE, convierte los valores a mayúsculas excepto los campos excluidos.
     * @throws Exception Si no se puede establecer la conexión con la base de datos.
     */
    public function __construct(string $table, string $primaryKey, bool $uppercaseEnabled = false)
    {
        $this->table = $table;
        $this->primaryKey = $primaryKey;
        $this->uppercaseEnabled = $uppercaseEnabled;

        $this->excludedFields = [
            "clave",
            "logo_path",
            "foto_path",
            "pdf_path",
            "imagen_path"
        ];

        $this->fields = [];

        $connectionInstance = new Conection();
        if (!($connectionInstance->getConnection() instanceof PDO)) {
            throw new Exception("No se pudo establecer una conexión válida con la base de datos.");
        }

        $this->conn = $connectionInstance->getConnection();
        $this->isProduction = false;
        $this->user = $_SESSION['jce_log'] ?? 'Template';
        $this->ipAddress = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    }

    /**
     * Genera una consulta SELECT dinámica basada en el objeto QueryOptions.
     * @param QueryOptions $options Objeto con las configuraciones de la consulta.
     * @return array Resultados de la consulta o error en caso de fallo.
     */
    public function getRecords(QueryOptions $options) {
        $fields = !empty($options->fields) ? implode(', ', $options->fields) : $this->getAllFields();

        $query = "SELECT $fields FROM {$this->table}";

        foreach ($options->joins as $join) {
            $joinTable = $join['table'];
            $joinCondition = $join['on'];
            $alias = isset($join['alias']) && !empty($join['alias']) ? " AS {$join['alias']}" : "";
            $query .= " JOIN $joinTable$alias ON $joinCondition";
        }

        // Construir la cláusula WHERE
        $values = [];
        foreach ($options->filters as $filter) {
            $operator = $filter['operator'] ?? '=';
            if (is_array($filter['value'])) {
                // Manejar IN
                $placeholders = implode(', ', array_fill(0, count($filter['value']), '?'));
                $filterClauses[] = "{$filter['column']} $operator ($placeholders)";
                $values = array_merge($values, $filter['value']);
            } else {
                $filterClauses[] = "{$filter['column']} $operator ?";
                $values[] = $filter['value'];
            }
        }
        if (!empty($filterClauses)) {
            $query .= " WHERE " . implode(' AND ', $filterClauses);
        }

        // Añadir cláusulas opcionales
        if (!empty($options->groupBy)) {
            $query .= " GROUP BY {$options->groupBy}";
        }
        if (!empty($options->having)) {
            $query .= " HAVING {$options->having}";
        }
        if (!empty($options->orderBy)) {
            $query .= " ORDER BY {$options->orderBy}";
        }
        if (!empty($options->limit)) {
            $query .= " LIMIT {$options->limit}";
        }

        return $this->validateOperation($query, $values);
    }

    /**
     * Obtiene un registro único basado en el ID (clave primaria).
     * @param mixed $id El valor de la clave primaria.
     * @return array El registro encontrado o un error si no se encuentra.
     */
    public function getRecord($id) {
        $options = new QueryOptions(
            fields: $this->getAllFields(true),
            filters: [
                [
                    'column' => $this->primaryKey,
                    'operator' => '=',
                    'value' => $id
                ]
            ],
            limit: '1'
        );

        $result = $this->getRecords($options);

        return $result['result'];
    }

    /**
     * Inserta uno o múltiples registros en la tabla asociada a la entidad.
     * @param array $data Arreglo asociativo (para un registro) o arreglo de arreglos (para múltiples registros).
     * @return array Resultado de la operación (éxito o error).
     */
    public function insertRecord(array $data) {
        if (!isset($data[0]) || !is_array($data[0])) {
            $data = [$data];
        }

        $fields = $this->getInsertFields();
        if (empty($fields)) {
            throw new InvalidArgumentException("No se definieron campos insertables para esta entidad.");
        }

        $placeholders = [];
        $values = [];
        foreach ($data as $record) {
            $filteredRecord = array_filter(
                $record,
                fn($key) => in_array($key, $fields, true),
                ARRAY_FILTER_USE_KEY
            );

            foreach ($fields as $field) {
                if (!array_key_exists($field, $filteredRecord)) {
                    throw new \InvalidArgumentException("Falta el campo '{$field}' en uno de los registros.");
                }
            }

            $placeholders[] = '(' . implode(', ', array_fill(0, count($filteredRecord), '?')) . ')';
            $values = array_merge($values, array_values($filteredRecord));
        }

        $fieldsString = implode(', ', $fields);
        $placeholdersString = implode(', ', $placeholders);
        $query = "INSERT INTO {$this->table} ($fieldsString) VALUES $placeholdersString";

        return $this->validateOperation($query, $values);
    }

    /**
     * Actualiza registros en la tabla según una clave primaria o un filtro más complejo.
     * @param array $data Datos a actualizar en formato clave => valor.
     * @param array|null $conditions Condiciones avanzadas opcionales (array con row, operator, value).
     * @param mixed|null $id Clave primaria para actualizaciones simples.
     * @return mixed El resultado de validateOperation.
     */
    public function updateRecord(array $data, ?array $conditions = null, $id = null) {
        if (empty($data)) {
            throw new \InvalidArgumentException("No se proporcionaron campos para actualizar.");
        }

        $campos = $this->getEditFields();

        if (empty($campos)) {
            throw new \InvalidArgumentException("No se definieron campos actualizables para esta entidad.");
        }

        $filteredData = array_filter(
            $data,
            fn($key) => in_array($key, $campos, true),
            ARRAY_FILTER_USE_KEY
        );

        if (empty($filteredData)) {
            throw new \InvalidArgumentException("No se proporcionaron campos válidos para actualizar.");
        }

        $query = "UPDATE {$this->table} SET ";
        $values = [];
        foreach ($campos as $campo) {
            if (!array_key_exists($campo, $filteredData)) {
                throw new \InvalidArgumentException("Falta el campo '{$campo}' en uno de los registros.");
            }
            $query .= "{$campo} = ?, ";
            $values[] = $filteredData[$campo];
        }

        $query = rtrim($query, ', ');

        if ($conditions) {
            $query .= " WHERE 1=1";
            foreach ($conditions as $condition) {
                if (!isset($condition["row"], $condition["operator"], $condition["value"])) {
                    throw new \InvalidArgumentException("Una de las condiciones WHERE no tiene la estructura correcta.");
                }

                if (is_array($condition["value"])) {
                    $placeholders = str_repeat('?,', count($condition["value"]) - 1) . '?';
                    $query .= " AND {$condition["row"]} {$condition["operator"]} ($placeholders)";
                    $values = array_merge($values, $condition["value"]);
                } else {
                    $query .= " AND {$condition["row"]} {$condition["operator"]} ?";
                    $values[] = $condition["value"];
                }
            }
        } elseif ($id !== null) {
            $query .= " WHERE {$this->primaryKey} = ?";
            $values[] = $id;
        } else {
            throw new \InvalidArgumentException("Debe proporcionar un ID o condiciones para el filtro.");
        }

        return $this->validateOperation($query, $values);
    }

    /**
     * Inserta o actualiza un registro en la tabla asociada a la entidad.
     * Si el registro ya existe (según una clave única), se actualiza.
     * @param array $data Datos en formato clave => valor para insertar o actualizar.
     * @return mixed El resultado de validateOperation.
     */
    public function insertOrUpdate(array $data) {
        if (empty($data)) {
            throw new \InvalidArgumentException("No se proporcionaron datos para insertar o actualizar.");
        }

        $insertFields = $this->getInsertFields();
        $updateFields = $this->getEditFields();

        $filteredInsertData = array_filter(
            $data,
            fn($key) => in_array($key, $insertFields, true),
            ARRAY_FILTER_USE_KEY
        );
        $filteredUpdateData = array_filter(
            $data,
            fn($key) => in_array($key, $updateFields, true),
            ARRAY_FILTER_USE_KEY
        );

        if (empty($filteredInsertData)) {
            throw new \InvalidArgumentException("No se proporcionaron campos válidos para insertar.");
        }

        $insertValues = [];
        $placeholders = [];
        foreach ($insertFields as $field) {
            if (!array_key_exists($field, $filteredInsertData)) {
                throw new \InvalidArgumentException("Falta el campo '$field' en los datos proporcionados.");
            }
            $placeholders[] = '?';
            $insertValues[] = $filteredInsertData[$field];
        }

        // Construir la parte de "INSERT"
        $fieldsString = implode(', ', $insertFields);
        $placeholdersString = implode(', ', $placeholders);

        // Construir la parte de "ON DUPLICATE KEY UPDATE"
        $updateClauses = [];
        $updateValues = [];
        foreach ($updateFields as $field) {
            if (!array_key_exists($field, $filteredUpdateData)) {
                throw new \InvalidArgumentException("Falta el campo '$field' en los datos proporcionados.");
            }
            $updateClauses[] = "$field = ?";
            $updateValues[] = $filteredUpdateData[$field];
        }

        if (empty($updateClauses)) {
            throw new \InvalidArgumentException("No se proporcionaron campos válidos para actualizar.");
        }

        $updateString = implode(', ', $updateClauses);

        $query = "INSERT INTO {$this->table} ($fieldsString) VALUES ($placeholdersString) ON DUPLICATE KEY UPDATE $updateString";
        $values = array_merge($insertValues, $updateValues);

        return $this->validateOperation($query, $values);
    }

    /**
     * Elimina registros en la tabla según una clave primaria o un filtro más complejo.
     * @param array|null $conditions Condiciones avanzadas opcionales (array con row, operator, value).
     * @param mixed|null $id Clave primaria para eliminaciones simples.
     * @return mixed El resultado de validateOperation.
     */
    public function deleteRecord(?array $conditions = null, $id = null) {
        $query = "DELETE FROM {$this->table}";
        $values = [];

        if ($conditions) {
            $query .= " WHERE 1=1";
            foreach ($conditions as $condition) {
                if (!isset($condition["row"], $condition["operator"], $condition["value"])) {
                    throw new \InvalidArgumentException("Una de las condiciones WHERE no tiene la estructura correcta.");
                }

                if (is_array($condition["value"])) {
                    $placeholders = str_repeat('?,', count($condition["value"]) - 1) . '?';
                    $query .= " AND {$condition["row"]} {$condition["operator"]} ($placeholders)";
                    $values = array_merge($values, $condition["value"]);
                } else {
                    $query .= " AND {$condition["row"]} {$condition["operator"]} ?";
                    $values[] = $condition["value"];
                }
            }
        } elseif ($id !== null) {
            $query .= " WHERE {$this->primaryKey} = ?";
            $values[] = $id;
        } else {
            throw new \InvalidArgumentException("Debe proporcionar un ID o condiciones para el filtro.");
        }

        return $this->validateOperation($query, $values);
    }

    /**
     * Método de emergencia para ejecutar una consulta SQL arbitraria.
     * @param string $sql La consulta SQL a ejecutar.
     * @param array $params Parámetros opcionales para la consulta preparada.
     * @return mixed El resultado de validateOperation.
     */
    private function executeRawSQL(string $sql, array $params = []) {
        if (empty(trim($sql))) {
            throw new \InvalidArgumentException("La consulta SQL no puede estar vacía.");
        }

        return $this->validateOperation($sql, $params);
    }

    /**
     * Formatea un valor a mayúsculas si corresponde.
     * @param string $key El nombre del campo.
     * @param mixed $value El valor del campo.
     * @return mixed El valor formateado o el valor original si no aplica.
     */
    private function formatValue(string $key, mixed $value): mixed
    {
        return ($this->uppercaseEnabled && !in_array($key, $this->excludedFields, true) && is_string($value))
            ? strtoupper($value)
            : $value;
    }

    /**
     * Obtener los campos de la tabla según el tipo especificado.
     * @param string $type Tipo de campo a obtener ('insert' o 'update').
     * @return array Lista de campos según el tipo especificado.
     */
    private function getFieldsByType(string $type): array {
        if (!in_array($type, ['insert', 'update'])) {
            throw new \InvalidArgumentException("El tipo de campo '{$type}' no es válido.");
        }

        return array_map(
            fn($field) => $field['name'],
            array_filter($this->fields, fn($field) => $field[$type] ?? false)
        );
    }

    /**
     * Obtener los campos que se pueden insertar.
     * @return array Lista de campos insertables.
     */
    private function getInsertFields(): array {
        return $this->getFieldsByType('insert');
    }

    /**
     * Obtener los campos que se pueden actualizar.
     * @return array Lista de campos actualizables.
     */
    private function getEditFields(): array {
        return $this->getFieldsByType('update');
    }

    /**
     * Establece los campos de la tabla.
     * @param bool $asArray Indica si los campos deben devolverse como un arreglo.
     * @return mixed Si $asArray es true, devuelve un array; de lo contrario, devuelve una string.
     */
    public function getAllFields(bool $asArray = false): mixed {
        $fieldNames = array_map(fn($field) => $field['definition'] ?? $field['name'], $this->fields);
        return $asArray ? $fieldNames : implode(', ', $fieldNames);
    }

    /**
     * Ejecuta una consulta SQL preparada y regresa un Array con el resultado.
     * @param string $query La consulta SQL a ejecutar.
     * @param array $values Valores para blindar los parámetros de la consulta.
     * @return array Array de resultados.
     */
    private function validateOperation(string $query, array $values): array {
        try {
            $this->conn->exec('SET @current_user = "' . $this->user . '"');
            $this->conn->exec('SET @current_ip = "' . $this->ipAddress . '"');

            $statement = $this->conn->prepare($query);
            $executionResult = $statement->execute($values);

            $rowsAffected = $statement->rowCount();
            $insertedId = null;
            $result = null;
            $message = null;

            if ($executionResult) {
                if (preg_match('/^SELECT/i', $query)) {
                    // Es una consulta SELECT
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                    if (empty($result)) {
                        $message = 'La consulta SELECT no devolvió resultados.';
                        if (!$this->isProduction) {
                            $message .= " | Query: $query";
                        }
                    }
                } elseif (preg_match('/^INSERT/i', $query)) {
                    // Es una consulta INSERT
                    $insertedId = $this->conn->lastInsertId();
                }
            }

            return [
                'success' => $executionResult,
                'rowsAffected' => $rowsAffected,
                'insertedId' => $insertedId,
                'result' => $result,
                'message' => $message, // Advertencia o mensaje informativo
                'error' => null
            ];
        } catch (PDOException $e) {
            $errorMessage = "Error al ejecutar consulta: " . $e->getMessage();

            if (!$this->isProduction) {
                $errorMessage .= " | Query: $query";
            }
            
            throw new \RuntimeException($errorMessage);
        }

        if (!$this->isProduction) {
            $response->resultDetail = $response->resultDetail ?? null;
            $response->query = $query;
        }
    }
}
