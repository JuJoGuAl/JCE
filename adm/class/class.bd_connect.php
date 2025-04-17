<?php
// Separo la conexion de la BD de la CLASSE general, para poder cambiar los parametros sin mucho esfuerzo
function connect() {
	$url = "/".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	preg_match('/(representacionesjce)/mi', $url, $coin, PREG_OFFSET_CAPTURE);
	if(!empty($coin)){
		$bd_host	=	"localhost";
		$bd_user	=	"propie33_user";
		$bd_pass	=	"S2k(268UnleW.U";
		$bd_dtb		=	"propie33_web";
		$bd_pro		=	true;
	}else{
		$bd_host	=	"localhost";
		$bd_user	=	"root";
		$bd_pass	=	"";
		$bd_dtb		=	"jce";
		$bd_pro		=	false;
	}
	$result=array();
	try {
		//Intento una conección,con los parametros
		$conn = new PDO ("mysql:host=$bd_host;dbname=$bd_dtb;charset=utf8", $bd_user, $bd_pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$result["title"]="SUCCESS";
		$result["content"]=$conn;
		$result["pro"]=$bd_pro;
	} catch (PDOException $e) {
		$result["title"]="ERROR";
		$result["content"]=mb_strtoupper(utf8_encode($e->getMessage()), 'UTF-8');
		$result["pro"]=$bd_pro;
	}
	return $result;
}
?>