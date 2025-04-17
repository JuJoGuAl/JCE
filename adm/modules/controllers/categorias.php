<?php
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
if (!is_null($obj)){
	$obj = $obj["data"];
}
$accion = (isset($obj['accion'])?strtolower($obj['accion']):'');
include_once($_SERVER["DOCUMENT_ROOT"]."/config.php");

include_once (ROOT_PATH."functions.php");
include_once(CLASES."class.categorias.php");
$data_class = new categorias;
if ($accion=="save_new" || $accion=="save_edit") {
	session_start();
	$response=array();
	if(isset($_SESSION["jce_log"])){
		$ins=$perm_val["content"][0]["ins"];
			$upt=$perm_val["content"][0]["upt"];
			$datos=array();
			$detalles=$det_det=$det_val=array();
			$status_ = ($accion=="save_edit") ? $obj["estatus"] : 1;
			array_push($datos, $obj["dato"]);
			array_push($datos, $obj["tipo"]);
			array_push($datos, $obj["comunidad"]);
			array_push($datos, $status_);

			for ($i=1; $i<50; $i++){
				if(isset($obj['cvalor['.$i.']'])){
					array_push($det_det, $obj['cvalor['.$i.']']);
					array_push($det_val, $obj['text['.$i.']']);
				}else{
					break;
				}
			}

			array_push($detalles, $det_det);
			array_push($detalles, $det_val);

			if($accion=="save_edit"){
				if($upt!=1){
					$resultado['title']="ERROR";
					$resultado["content"]="ACCESO DENEGADO: <strong>NO POSEE PERMISO PARA LA ACCION</strong>";
				}else{
					$resultado=$data_class->edit_($obj["id"],$datos,$detalles);
				}
			}else{
				if($ins!=1){
					$resultado['title']="ERROR";
					$resultado["content"]="ACCESO DENEGADO: <strong>NO POSEE PERMISO PARA LA ACCION</strong>";
				}else{
					$resultado=$data_class->new_($datos,$detalles);
				}
			}
			$mensaje="SIN MENSAJE";
			switch ($accion) {
				case "save_new":
					$mensaje="CARACTERISTICA CREADA CON EXITO!";
				break;
				case "save_edit":
					$mensaje="CARACTERISTICA ACTUALIZADA!";
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
	$perm_val = $perm->val_mod($_SESSION['jce_log'],$_GET['mod']);
	if($perm_val["title"]<>"SUCCESS"){
		header('Location: ./?response=96a3be3cf272e017046d1b2674a52bd3');
	}else{
		$script = "";
		$codigo = -1;
		$codigo = (isset($_GET['id'])) ? $_GET['id'] : $codigo;
		$ins=$perm_val["content"][0]["ins"];
		$upt=$perm_val["content"][0]["upt"];
		//determino el titulo del Modulo en funcion al codigo usado
		$titulo_mod = ($codigo >= 0) ? ($codigo == 0) ? "CREE UNA CARACTERISTICA PARA LAS PROPIEDADES" : "EDITE UNA CARACTERISTICA" : "CARACTERISTICAS PARA LOS INMUEBLES" ;
		$var_array_nav=array();
		$var_array_nav["mod"]=$_GET['mod'];
		$tpl->newBlock("module");
		foreach ($var_array_nav as $key_ => $value_) {
			$tpl->assign($key_,$value_);
		}
		$tpl->assign("mod_name",$titulo_mod);
		if ($codigo == "-1") {
			$tpl->newBlock("list_module");
			$data=$data_class->list_();
			$modulo = Evaluate_Mod($data);
			if($modulo["title"]==="SUCCESS"){
				foreach ($data["content"] as $llave => $datos) {
					$tpl->newBlock("data");
					$id=$datos['codigo'];
					//$btn_lista = $datos['tipo'] == 2 ? '<a class="btn btn-outline-primary btn-circle mr-1 btn-sm" data-toggle="tooltip" data-placement="top" title="VALORES / LISTA"><i class="fas fa-list"></i></a>' : '';
					$cadena_acciones='
					<div class="btn-group" role="group">
					<a class="btn btn-outline-primary btn-circle mr-1 btn-sm" href="?mod='.$var_array_nav["mod"].'&id='.$id.'" data-toggle="tooltip" data-placement="top" title="VER"><i class="fas fa-search"></i></a>
					</div>';
					
					if(!empty($array_estatus)){
						foreach ($array_estatus as $key => $value){
							if($key==$datos['status']){
								$sts=$value;
							}
						}
						$tpl->assign("ESTATUS",$sts);
					}
					foreach ($data["content"][$llave] as $key => $value){
						$value = ($key=="code") ? formatRut($value) : $value ;
						$tpl->assign($key,$value);
					}
					$tpl->assign("actions",$cadena_acciones);
				}			
			}else{
				$script .= 'dialog(`'.$modulo['content'].'`,`'.$modulo['title'].'`);';
			}
			if($ins==1){
				$tpl->newBlock("data_new");
				foreach ($var_array_nav as $key_ => $value_) {
					$tpl->assign($key_,$value_);
				}
			}
		}else if ($codigo >= 0) {
			$tpl->newBlock("form_module");
			$accion = ($codigo==0) ? "save_new" : "save_edit";
			$tpl->assign("accion", $accion);
			$tpl->assign("codigo", 0);
			$data=$data_class->get_($_GET['id']);
			foreach ($var_array_nav as $key_ => $value_) {
				$tpl->assign($key_,$value_);
			}
			$modulo = Evaluate_Mod($data);
			if ($codigo == 0) {
				if(!empty($array_bool)){
					foreach ($array_bool as $llave => $datos){
						$tpl->newBlock("com_det");
						$tpl->assign("code",$llave);
						$tpl->assign("valor",$datos);
					}
				}
				if(!empty($array_tipo)){
					foreach ($array_tipo as $llave => $datos){
						$tpl->newBlock("tipo_det");
						$tpl->assign("code",$llave);
						$tpl->assign("valor",$datos);
					}
				}
			}
			if($modulo["title"]==="SUCCESS"){
				$cab=$data["content"];
				$det=$data["det"];
				foreach ($cab as $llave => $datos) {
					$tpl->assign($llave,$datos);
				}
				if(!empty($array_tipo)){
					foreach ($array_tipo as $llave => $datos){
						$tpl->newBlock("tipo_det");
						if($llave==$cab['tipo']){
							$tpl->assign("selected",$selected);
						}
						$tpl->assign("code",$llave);
						$tpl->assign("valor",$datos);
					}
				}
				if(!empty($array_bool)){
					foreach ($array_bool as $llave => $datos){
						$tpl->newBlock("com_det");
						if($llave==$cab['comunidad']){
							$tpl->assign("selected",$selected);
						}
						$tpl->assign("code",$llave);
						$tpl->assign("valor",$datos);
					}
				}
				if(!empty($det)){
					foreach ($det as $key => $value) {
						$tpl->newBlock("lista_det");
						$tpl->assign("count",($key+1));
						foreach ($value as $key1 => $value1) {
							$tpl->assign($key1,$value1);
						}
					}
				}
				$tpl->newBlock("aud_data");
				$tpl->assign("crea_user",$cab['crea_user']);
				$tpl->assign("mod_user",$cab['mod_user']);
				$tpl->assign("crea_date",$cab['crea_date']);
				$tpl->assign("mod_date",$cab['mod_date']);
			}else{
				$script .= 'dialog(`'.$modulo['content'].'`,`'.$modulo['title'].'`);';
			}
			if($codigo>0) {
				$tpl->newBlock("st_block");
				if(!empty($array_estatus)){
					foreach ($array_estatus as $llave => $datos){
						$tpl->newBlock("st_det");
						if($llave==$cab['status']){
							$tpl->assign("selected",$selected);
						}
						$tpl->assign("code",$llave);
						$tpl->assign("valor",$datos);
					}
				}
			}
			if (($codigo==0 && $ins==1) || ($codigo>0 && $upt==1)) {
				$tpl->newBlock("btn_save");
				foreach ($var_array_nav as $key_ => $value_) {
					$tpl->assign($key_,$value_);
				}
			}
		}
		$tpl->assign("script",$script);
	}
}

?>