<?php
namespace App\Config;

function connect() {
    $url = "/" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    preg_match('/(representacionesjce)/mi', $url, $coin, PREG_OFFSET_CAPTURE);
    
    if (!empty($coin)) {
        $bd_host = "localhost";
        $bd_user = "propie33_user";
        $bd_pass = "S2k(268UnleW.U";
        $bd_dtb  = "propie33_web";
        $bd_pro  = true;
    } else {
        $bd_host = "localhost";
        $bd_user = "root";
        $bd_pass = "";
        $bd_dtb  = "jce";
        $bd_pro  = false;
    }

    $result = [
        "title" => "SUCCESS",
        "content" => "",
        "pro" => $bd_pro
    ];

    try {
        $conn = new PDO(
            "mysql:host=$bd_host;dbname=$bd_dtb;charset=utf8",
            $bd_user,
            $bd_pass,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        $result["content"] = $conn;
    } catch (PDOException $e) {
        error_log("Error de conexión: " . $e->getMessage());
        $result["title"] = "ERROR";
        $result["content"] = mb_strtoupper(utf8_encode($e->getMessage()), 'UTF-8');
    }
    return $result;
}
?>
