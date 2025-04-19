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
}
