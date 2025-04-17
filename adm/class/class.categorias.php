<?php
class categorias{
	private $db;
	public $table;
	public $id;
		
	public function __construct(){
		include_once('class.bd_transsac.php');
		$this->table = "categorias";
		$this->id = "id";
		$this->db = new database($this->table, $this->id);
		$this->db->fields = array (
			array ('system',	"LPAD(".$this->id."*1,"._PAD_CEROS_.",'0') AS codigo"),
			array ('public',	'nombre_es'),
			array ('public',	'nombre_en'),
			array ('system',	'DATE_FORMAT(creacion_fecha, "%d/%m/%Y %T") AS creacion_fecha'),
			array ('system',	'creacion_usuario'),
			array ('system',	'creacion_IP'),
			array ('system',	'DATE_FORMAT(actualizacion_fecha, "%d/%m/%Y %T") AS actualizacion_fecha'),
			array ('system',	'actualizacion_usuario'),
			array ('system',	'actualizacion_IP'),
		);
	}
	//LISTAR
	public function list_(array $opciones= []){
		$data = array (); $count=count($opciones);
		if ($count > 0) {
			for ($i=0; $i<$count; $i++) {
				$data[$i]["row"]=$opciones[$i]["row"];
				$data[$i]["operator"]=$opciones[$i]["operator"];
				$data[$i]["value"]=$opciones[$i]["value"];
			}
		}
		return $this->db->getRecords(false,$data);
	}
	//OBTENER
	public function get_($id){
		return $this->db->getRecord($id);
	}
	//CREAR
	public function new_($data){
		return $this->db->insertRecord($data);
	}
	//ACTUALIZAR
	public function edit_($id,$data){
		return $this->db->updateRecord($id,$data);
	}
}
?>
