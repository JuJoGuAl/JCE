<?php
namespace App\Config;

use PDO;
use PDOException;

class Conection {
    private PDO $connection;
    
    public function __construct() {
        $bd_host = "localhost";
        $bd_user = "root";
        $bd_pass = "";
        $bd_dtb  = "jce";
        $bd_pro  = false;

        try {
            $this->connection = new PDO(
                "mysql:host=$bd_host;dbname=$bd_dtb;charset=utf8",
                $bd_user,
                $bd_pass,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            throw new PDOException("Error de conexión: " . $e->getMessage());
        }
    }

    /**
     * Método para obtener la conexión PDO.
     * @return PDO
     */
    public function getConnection(): PDO {
        return $this->connection;
    }
}
