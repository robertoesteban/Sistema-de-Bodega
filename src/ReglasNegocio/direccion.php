<?php
include("../AccesoDatos/Controller.php");
class direccion {
	private $_id_direccion;
	private $_nombre_direccion;
	private $_tabla = "DIRECCIONES";
	private $_registro="ID_DIRECCION";

	function __construct(){}


	function Getid_direccion()	{return $this->_id_direccion;}
	function Getnombre_direccion()	{return $this->_nombre_direccion;}
	
	function Setid_direccion($id_direccion) {$this->_id_direccion= $id_direccion;}
	function Setnombre_direccion($nombre_direccion) {$this->_nombre_direccion= $nombre_direccion;}
	
		
	public function Select($id_direccion)
	{
		$Controller=new Controller();
		if(isset($id_direccion) && $id_direccion != "")
		{
			$Controller= new Controller();
			$sql="$id_direccion";
			$arr=$Controller->Select($this->_tabla,$this->_registro, $sql);
			return $arr; 
		}
	}
	
	public function GetAll()
	{
		$Controller= new Controller();
		return $Controller->GetAll($this->_tabla);
		
	}	
	
	public function Add($nombre_direccion)
	{
		if(isset($nombre_direccion) && $nombre_direccion != "")
		{
			$Controller= new Controller();
			$sql=" '$nombre_direccion' ";
			$Controller->Add($this->_tabla, $sql);	
		}
	}
	public function Del($id_direccion)
	{
		if(isset($id_direccion) && $id_direccion != "")
		{
			$Controller= new Controller();
			$sql=" $id_direccion ";
			$Controller->Del($this->_tabla,$this->_registro, $sql);
			
		}
		
	}
	
	public function Update($id_direccion,$nombre_direccion){
		$Controller = new Controller();
		$sql=array("ID_DIRECCION"=>"$id_direccion","NOMBRE_DIRECCION"=>"'$nombre_direccion'");
		$Controller->Update($this->_tabla,$this->registro,$sql);
		
	}

	
}
?>