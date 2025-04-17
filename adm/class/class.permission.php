<?php
class permisos{
	//USUARIOS
	private $db_user;
	public $table_user;
	public $id_user;
	
	public function __construct(){
		include_once('class.bd_transsac.php');
		$this->table_user = "adm_usuarios";
		$this->id_user = "cusuario";
		$this->db_user = new database($this->table_user, $this->id_user);
		$this->db_user->fields = array (
			array ('system',	"LPAD(".$this->id_user."*1,"._PAD_CEROS_.",'0') AS codigo"),
			array ("public",	"cusuario"),
			array ("public",	"clave"),
			array ("public",	"nombre"),
			array ("public",	"status"),
			array ('system',	'DATE_FORMAT(creacion_fecha, "%d/%m/%Y %T") AS creacion_fecha'),
			array ('system',	'creacion_usuario'),
			array ('system',	'creacion_IP'),
			array ('system',	'DATE_FORMAT(actualizacion_fecha, "%d/%m/%Y %T") AS actualizacion_fecha'),
			array ('system',	'actualizacion_usuario'),
			array ('system',	'actualizacion_IP'),
		);
	}
	public function val_log($user,$pass){
		$usuario=strtoupper($user);
		$resultado=0;
		$data = array ();
		$data[0]["row"]="cusuario";
		$data[0]["operator"]="=";
		$data[0]["value"]=$usuario;
		$result=$this->db_user->getRecords(false,$data);
		if ($result["title"]==="SUCCESS") {
			if($result["content"][0]["status"]==1 || $result["content"][0]["cusuario"]=="ADMINISTRADOR") {
				if ($result["content"][0]["clave"] === md5($pass)) {
					$_SESSION['jce_log'] = $usuario;
					$resultado=1;
				} else {
					$resultado=2;
				}
				
			}else {
				$resultado=5;
			}
			
		} else {
			$resultado=2;
		}
		return $resultado;
	}
	//LISTAR
	public function list_($status=false){
		$data = array ();
		$cont=0;
		$data[$cont]["row"]="cusuario";
		$data[$cont]["operator"]="<>";
		$data[$cont]["value"]="ADMINISTRADOR";
		if($status){
			$cont++;
			$data[$cont]["row"]="status";
			$data[$cont]["operator"]="=";
			$data[$cont]["value"]=$status;
		}
		return $this->db_user->getRecords(false,$data);
	}
	//OBTENER
	public function get_($id){
		return $this->db_user->getRecord($id);
	}
	//CREAR USUARIO
	public function new_user($data){
		return $this->db_user->insertRecord($data);
	}
	//ACTUALIZAR USUARIO
	public function edit_user($id,$data){
		return $this->db_user->updateRecord($id,$data);
	}
	//ACTUALIZAR STATUS
	public function change_status($user){
		$resultado = false;
		$_status = 0;
		$data[0]["row"]="cusuario";
		$data[0]["operator"]="=";
		$data[0]["value"]=$user;
		$result = $this->db_user->getRecords(false,$data);
		if($result["title"]=="SUCCESS"){
			$status = $result["content"][0]["status"];
			$_status = ($status==1) ? 0 : 1 ;
			$this->db_user->fields=$data=array();
			$this->db_user->fields[0]=array ('public_u',	'status');
			$data[]=$_status;
			$result = $this->db_user->updateRecord($user,$data);
		}
		$resultado=$result;
		return $resultado;
	}
	//CAMBIA CLAVE
	public function change_pass($pass_old,$pass_new){
		$resultado=0;
		$data = array ();
		$data[0]["row"]="cusuario";
		$data[0]["operator"]="=";
		$data[0]["value"]=$_SESSION['metalsigma_log'];
		$result=$this->db_user->getRecords(false,$data);
		if ($result["title"]==="SUCCESS") {
			if ($result["content"][0]["clave"] === md5($pass_old)) {
				$this->db_user->fields=array();
				$this->db_user->fields[0]=array ('public_u',	'clave');
				$this->db_user->fields[1]=array ('public_u',	'mod_user');
				$data=array();
				$data[]=md5($pass_new);
				$data[]=$_SESSION['metalsigma_log'];
				$result = $this->db_user->updateRecord($_SESSION['metalsigma_log'],$data);
			}else{ $resultado = 2; }//CLAVE INVALIDA
		}else{ $resultado = 3; }//USUARIO INVALIDA
		if($resultado!=2){
			$resultado=1;
		}
		return $resultado;
	}
}
?>
