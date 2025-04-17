<?php
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$action = (isset($obj['accion'])?strtolower($obj['accion']):'');
$mod = strtoupper((isset($obj['mod'])?$obj['mod']:''));
$response = array();

include_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/adm/functions.php");

if ($action=="val_log") {
	try {
		$user = $perm->val_log($obj['username'],$obj['pass']);
		$response['title']="ERROR";
		switch ($user) {
			case 1:
				$response['title']="SUCCESS";
				$response["content"]=1;
			break;
			case 2:
				$response["content"]="USUARIO Ó CLAVE INVALIDA!";
			break;
			case 3:
				$response["content"]="CLAVE INVALIDA!";
			break;
			case 4:
				$response["content"]="USUARIO SIN PRIVILEGIOS";
			break;
			case 5:
				$response["content"]="USUARIO INACTIVO";
			break;
		}
	} catch (PDOException $Exception) {
		$response['title']="ERROR";
		$response["content"]=$Exception->getMessage();
	}
}elseif($action == "logout"){
	ob_start();
	session_destroy();
	$response['title']="SUCCESS";
	$response["content"]=1;
}else{
	if(!isset($_SESSION['jce_log'])){
		$response['title'] = "ERROR";
		$response["content"] = "ACCESO DENEGADO: <strong>SU SESION HA EXPIRADO!</strong>";
	}else{
		$perm_val = $perm->val_mod($_SESSION['jce_log'],$obj['mod']);
		if($perm_val["title"]<>"SUCCESS"){
			$response['title'] = "ERROR";
			$response["content"] = "ACCESO DENEGADO: <strong>NO POSEE PERMISO PARA EL MODULO</strong>";
		}else if($perm_val["content"][0]['ins']===3){
			//Si el usuario esta inactivo no lo dejo pasar
		}else{
			//Acciones con permisos
			if($action=="list_comunas"){
				$code = (isset($obj["padre"])) ? $obj["padre"] : false ;
				$data=$zonas->list_c($code);
				if($data["title"]=="SUCCESS"){
					$response["title"]="SUCCESS";
					$response["content"]=$data["content"];
				}else{
					$response["title"]="ERROR";
					$response["content"]="NO EXISTEN COMUNAS PARA MOSTRAR";
				}
			}else if($action=="list_provincias"){
				$code = (isset($obj["padre"])) ? $obj["padre"] : false ;
				$data=$zonas->list_pr($code);
				if($data["title"]=="SUCCESS"){
					$response["title"]="SUCCESS";
					$response["content"]=$data["content"];
				}else{
					$response["title"]="ERROR";
					$response["content"]="NO EXISTEN PROVINCIAS PARA MOSTRAR";
				}
			}else if($action=="autocomplete"){
				$codes_not = $obj["nodet"];
				array_push($codes_not, 0);//Envio un 0 por si la lista viene vacia
				$opciones = [];
				array_push($opciones, (array)[
						'row' => 'ccaracteristica',
						'operator' => 'NOT IN',
						'value' => $codes_not,
				]);
				array_push($opciones, (array)[
					'row' => 'caracteristica',
					'operator' => 'LIKE',
					'value' => "%".$obj["request"]."%",
				]);
				array_push($opciones, (array)[
					'row' => 'status',
					'operator' => '=',
					'value' => 1,
					]);
				$data=$caracteristicas->list_($opciones);
				if($data["title"]=="SUCCESS"){
					$response["title"]="SUCCESS";
					$response["content"]=$data["content"];
				}else{
					$response["title"]="WARNING";
					$response["content"]="NO HAY DATOS PARA MOSTRAR";
				}
			}
		}
	}
}
echo json_encode($response);
?>