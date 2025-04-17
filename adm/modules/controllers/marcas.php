<?php
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$accion = (isset($obj['accion'])?strtolower($obj['accion']):'');

include_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
include_once (ADM."functions.php");
include_once(CLASES."class.marcas.php");

$data_class = new marcas;

if ($accion=="save_new" || $accion=="save_edit") {
	//session_start();
	$response = array();
	if(isset($_SESSION["jce_log"])){
		$datos = array();
		array_push($datos, $obj["dato"]);
		array_push($datos, $obj["descripcion_es"]);
		array_push($datos, $obj["descripcion_en"]);
		array_push($datos, NULL);
		array_push($datos, NULL);
		
		if($accion=="save_edit"){
			$resultado=$data_class->edit_($obj["id"],$datos,);
		}else{
			$resultado=$data_class->new_($datos);
		}
		$mensaje="SIN MENSAJE";
		switch ($accion) {
			case "save_new":
				$mensaje="MARCA CREADA CON EXITO!";
			break;
			case "save_edit":
				$mensaje="MARCA ACTUALIZADA!";
			break;
		}
		if($resultado["title"]=="SUCCESS"){
			$response['title']=$resultado["title"];
			$response["content"]=$mensaje;
		}else{
			$response['title']=$resultado["title"];
			$response["content"]=$resultado["content"];
		}
	}else{
		session_destroy();
		$response['title']="INFO";
		$response["content"]=-1;
	}
	echo json_encode($response);
}else{
	$script = "";
	$codigo = -1;
	$codigo = (isset($_GET['id'])) ? $_GET['id'] : $codigo;
	//determino el titulo del Modulo en funcion al codigo usado
	$titulo_mod = ($codigo >= 0) ? ($codigo == 0) ? "CREACION DE MARCA" : "EDICION DE MARCA" : "LISTADO DE MARCAS" ;
	$var_array_nav=array();
	$var_array_nav["mod"]= $_GET['mod'];
	$tpl->newBlock("module");
	foreach ($var_array_nav as $key_ => $value_) {
		$tpl->assign($key_,$value_);
	}
	$tpl->assign("mod_name",ucfirst($_GET['mod']));
	$tpl->assign("mod_subname",$titulo_mod);
	$tpl->assign("mod_descrip",'Utilice este módulo para gestionar las marcas que se asignaran a los productos que desee crear');
	if ($codigo == "-1") {
		$tpl->newBlock("list_module");
		foreach ($var_array_nav as $key_ => $value_) {
			$tpl->assign($key_,$value_);
		}
		$data=$data_class->list_();
		$modulo = Evaluate_Mod($data);
		if($modulo["title"]==="SUCCESS"){
			foreach ($data["content"] as $llave => $datos) {
				$tpl->newBlock("data");
				$id=$datos['codigo'];
				$cadena_acciones='
				<div class="btn-group" role="group">
				<a class="btn btn-primary btn-circle btn-sm" href="?mod='.$var_array_nav["mod"].'&id='.$id.'" data-toggle="tooltip" data-placement="top" title="VER"><i class="fas fa-search"></i></a>
				</div>';
				foreach ($data["content"][$llave] as $key => $value){
					$value = ($key=="code") ? formatRut($value) : $value ;
					$tpl->assign($key,$value);
				}
				$tpl->assign("actions",$cadena_acciones);
			}
		}else{
			$script .= 'dialog(`'.$modulo['content'].'`,`'.$modulo['title'].'`);';
		}
	}else if ($codigo >= 0) {
		$tpl->newBlock("form_module");
		$accion = ($codigo==0) ? "save_new" : "save_edit";
		$tpl->assign("accion", $accion);
		$tpl->assign("codigo", 0);
		foreach ($var_array_nav as $key_ => $value_) {
			$tpl->assign($key_,$value_);
		}
		if ($codigo > 0) {
			$data=$data_class->get_($_GET['id']);
			$modulo = Evaluate_Mod($data);
			if($modulo["title"]==="SUCCESS"){
				$cab=$data["content"][0];
				foreach ($cab as $llave => $datos) {
					$tpl->assign($llave,$datos);
				}
				$tpl->newBlock("aud_data");
				$tpl->assign("crea_user",$cab['creacion_usuario']);
				$tpl->assign("mod_user",$cab['actualizacion_usuario']);
				$tpl->assign("crea_date",$cab['creacion_fecha']);
				$tpl->assign("mod_date",$cab['actualizacion_fecha']);
			}else{
				$script .= 'dialog(`'.$modulo['content'].'`,`'.$modulo['title'].'`);';
			}
		}
	}
	$tpl->newBlock("data_js");
	$tpl->assign("script",$script);
}

?>