<?php
namespace App\Entities;

use App\Core\EntidadBase;

class Home extends EntidadBase {
    public function __construct() {
        parent::__construct('marcas', 'id',[
            ['name' => 'id', 'type' => 'system', 'insert' => false, 'update' => false],
        ]);
    }

    
    public function getDashboardStats(): array {
        $result = $this->getDatabase()->executeProcedure('sp_GetDashboardStats');

        return $result;
    }

    public function getDashboardLog(): array {
        $result = $this->getDatabase()->executeProcedure('sp_GetDashboardLog');

        return $result;
    }
}
