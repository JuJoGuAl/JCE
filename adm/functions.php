<?php
$rutas = $_SERVER['DOCUMENT_ROOT'];
if (substr($rutas, -1) != "/") {
	$rutas = $rutas."/";
}

//DEFINO CONSTANTES PARA UITILIZAR EL SISTEMA
define("_PAD_CEROS_", 10);
//HORA PREDETEMINADA PARA PHP
date_default_timezone_set('America/Santiago');

//CLASSE DE PERMISOS (ASI EVITO TENER QUE INVOCARLA EN CADA MODULO)
//require $rutas.'assets/vendor/autoload.php';
include_once ($rutas."adm/class/class.permission.php");
$perm = new permisos;
//use Intervention\Image\ImageManagerStatic as Image;

$selected = 'selected="selected"';
//ESTATUS
$array_estatus=array();
$array_estatus[1]="ACTIVO";
$array_estatus[0]="INACTIVO";
//MESES
$array_mont=array();
$array_mont[1]="ENERO";
$array_mont[2]="FEBRERO";
$array_mont[3]="MARZO";
$array_mont[4]="ABRIL";
$array_mont[5]="MAYO";
$array_mont[6]="JUNIO";
$array_mont[7]="JULIO";
$array_mont[8]="AGOSTO";
$array_mont[9]="SEPTIEMBRE";
$array_mont[10]="OCTUBRE";
$array_mont[11]="NOVIEMBRE";
$array_mont[12]="DICIEMBRE";

/** Envia una Alerta a DIALOG
* @param mensaje: Mensaje a Mostrar
* @param tipo: Tipo de Mensaje
*/
function alerta($mensaje,$tipo){
	if($mensaje){
		$mensaje=strtoupper(addslashes($mensaje));
		echo '<script>dialog(`'.$mensaje.'`,`'.$tipo.'`)</script>';
		exit;
	}
}

/** Evalua si el ARRAY $modulo, trajo data, de ser asi la deja pasar, de lo contrario muestra el mensaje
* @param modulo: Mensaje a Mostrar
*/
function Evaluate_Mod($modulo){
	$tipo=$mensaje="";
	$response = array ();
	if($modulo["title"]==="SUCCESS"){
		$response["title"]="SUCCESS";
		$response["content"] = $modulo["content"];
	}else{
		$response["title"] = $modulo["title"];
		$response["content"]=strtoupper(addslashes($modulo["content"]));
		//echo '<script>dialog(`'.$mensaje.'`,`'.$tipo.'`)</script>';
		//return false;
	}
	return $response;
}

/** Formateo cifras
* @param num: Cifra a Formatear
* @param dec: Numero de Decimales
*/
function numeros($num,$dec=0){
	$num_fix=number_format($num, $dec, ',', '.');
	return $num_fix;
}

/** Obtener URL
* @param s: URL Servidor
* @param use_forwarded_host: Sugerir un Host para redireccionar
*/
function url_origin($s, $use_forwarded_host = false) {
	$ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
	$sp       = strtolower( $s['SERVER_PROTOCOL'] );
	$protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
	$port     = $s['SERVER_PORT'];
	$port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
	$host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
	$host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
	return $protocol . '://' . $host;
}

/** Obtener Full URL
* @param s: URL Servidor
* @param use_forwarded_host: Sugerir un Host para redireccionar
*/
function full_url( $s, $use_forwarded_host = false ) {
	return url_origin( $s, $use_forwarded_host ) . $s['REQUEST_URI'];
}

function uploadImage($input,$carpeta,$array_deletes){
	ini_set('memory_limit', '256M');
	$folder=IMAGENES.$carpeta;
	$ext = "jpg";
	//Si me pasan imagenes a borrar, las borro
	if(sizeof($array_deletes)>0){
		foreach ($array_deletes as $file){
			if(file_exists($folder."/".$file)){
				unlink($folder."/".$file);
			}
		}
	}
	//Si la carpeta no existe la creo
	if (!file_exists($folder)){
		mkdir($folder, 0777);
	}
	echo "algo <br>";
	if (!empty($input['name'][0])){
		echo "mayor a 0";
		print_r($input);
		/*if (file_exists($folder)){
			removeFolder($folder);
		}
		mkdir($folder, 0777);
		for ($i=0; $i < sizeof($input['name']); $i++) {
			$img = Image::make($input['tmp_name'][$i]);
			$img->save($folder.'/'.$input['name'][$i].'.jpg');
		}*/
	}else{
		echo "menor a 0";
	}
}

function removeFolder($folderName) {
	if (is_dir($folderName)){
		$folderHandle = opendir($folderName);
	}
	if (!$folderHandle){
		return false;
	}
	
	while($file = readdir($folderHandle)) {
		if ($file != "." && $file != "..") {
			if (!is_dir($folderName."/".$file)){
				unlink($folderName."/".$file);
			}else{
				removeFolder($folderName.'/'.$file);
			}
		}
	}
	closedir($folderHandle);
	rmdir($folderName);
	return true;

}