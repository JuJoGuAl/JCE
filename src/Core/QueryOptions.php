<?php
namespace App\Core;

class QueryOptions {
    public array $fields = []; // Campos a seleccionar
    public array $joins = []; // Join tables
    public array $filters = []; // Filtros WHERE
    public string $groupBy = ''; // GROUP BY
    public string $orderBy = ''; // ORDER BY
    public string $having = ''; // HAVING
    public string $limit = ''; // LIMIT

    public function __construct(
        array $fields = [],
        array $joins = [],
        array $filters = [],
        string $groupBy = '',
        string $orderBy = '',
        string $having = '',
        string $limit = ''
    ) {
        $this->fields = $fields;
        $this->joins = $joins;
        $this->filters = $filters;
        $this->groupBy = $groupBy;
        $this->orderBy = $orderBy;
        $this->having = $having;
        $this->limit = $limit;
    }

    /**
     * Agregar un filtro al array de filtros.
     * @param string $column  Columna sobre la que se aplica el filtro.
     * @param string $operator Operador del filtro (por ejemplo, '=', '<', '>').
     * @param mixed $value Valor del filtro.
     * @return self
     */
    public function addFilter(string $column, string $operator, $value): self {
        $this->filters[] = [
            'column' => $column,
            'operator' => $operator,
            'value' => $value,
        ];
        return $this;
    }
}
