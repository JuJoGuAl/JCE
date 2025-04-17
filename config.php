<?php
session_start();
$rutas = $_SERVER['DOCUMENT_ROOT'];
if (substr($rutas, -1) != '/') {
	$rutas = $rutas.'/';
}
$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";

define("BASE_URL", $protocolo . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . "/");
define('ROOT_PATH', $rutas);
define('SISTEM', 'Representaciones JCE');
define('IMAGENES', $rutas.'images/');
define('ASSETS_JS', $rutas.'js/');
define('ASSETS_CSS', $rutas.'css/');
define('ADM', $rutas.'adm/');
define('ADM_VIST', $rutas.'adm/views/');
define('MOD_VIST', $rutas.'adm/modules/views/');
define('MOD_CONT', $rutas.'adm/modules/controllers/');
define('CLASES', $rutas.'adm/class/');
define('RESULTS_PAGE_DEFAULT', 10);

?>