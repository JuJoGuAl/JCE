<?php
//require __DIR__ . '/../vendor/autoload.php';
include_once("../config.php");
include_once(CLASES."TemplatePower.php");
include_once("functions.php");
if(!isset($_SESSION['jce_log'])){
	$tpl = new TemplatePower(ADM_VIST."login.tpl");
}else{
	$tpl = new TemplatePower(ADM_VIST."body.tpl");
	$mod_error=ADM_VIST."page_404.tpl";
	if(!isset($_GET['mod'])){
		$mod_nav='home';
	}else{
		$mod_nav=strtolower($_GET['mod']);
	}
	$file_tpl=MOD_VIST.$mod_nav.".tpl";
	$tpl->assignInclude("profile",ADM_VIST."profile.tpl");
	$tpl->assignInclude("nav", ADM_VIST."nav.tpl");
	if (file_exists($file_tpl)){
		$tpl->assignInclude("contenido",$file_tpl);
	}else{
		$tpl->assignInclude("contenido",$mod_error);
	}
}
$tpl->prepare();
$tpl->assign("Sistema", SISTEM);
//Asigno el Timestamp de los archivos que mas se editan
$file="../js/custom/funciones.js";
$filemtime = filemtime($file);
$tpl->assign("functions", $file."?".$filemtime);
$file="../css/custom/adm.css";
$filemtime = filemtime($file);
$tpl->assign("style", $file."?".$filemtime);
$file="../js/custom/init.js";
$filemtime = filemtime($file);
$tpl->assign("init", $file."?".$filemtime);

if(isset($_SESSION['jce_log'])) {
	$data = $perm->get_($_SESSION['jce_log']);
	$perfil = $data['content'][0];
	$tpl->assign("nombre",$perfil["nombre"]);
	$file_php=MOD_CONT.$mod_nav.".php";
	if (file_exists($file_php)){
		include_once($file_php);
	}
}
$tpl->printToScreen();
if(isset($_GET["response"])){
	$mensaje = "";
	$tipo = "";
	switch($_GET["response"]){
		case "96a3be3cf272e017046d1b2674a52bd3"://01
			$mensaje = "ACCESO DENEGADO: <strong>NO POSEE PERMISO PARA EL MODULO</strong>";
			$tipo = "ERROR";
			break;
		case "a2ef406e2c2351e0b9e80029c909242d"://02
			$mensaje = "ERROR AL CARGAR LA INFORMACION DEL MODULO";
			$tipo = "ERROR";
		case "e45ee7ce7e88149af8dd32b27f9512ce"://03
			$mensaje = "LA SESSION HA CADUCADO, VUELVA A INGRESAR";
			$tipo = "INFO";
	}
	alerta($mensaje,$tipo);
}
?>