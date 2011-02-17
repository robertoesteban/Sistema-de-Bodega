<?php
include("../AccesoDatos/Controller.php");
class ciudad{
	private $_id_ciudad;
	private $_nombre_ciudad;
	private $_tabla = "CIUDADES";
	private $_registro="ID_CIUDAD";
	private $_registro2="NOMBRE_CIUDAD";

	function __construct(){ }


	function Getid_ciudad()	{return $this->_id_ciudad;}
	function Getnombre_ciudad()	{return $this->_nombre_ciudad;}
	
	function Setid_ciudad($id_ciudad) {$this->_id_ciudad= $id_ciudad;}
	function Setnombre_ciudad($nombre_ciudad) {$this->_nombre_ciudad= $nombre_ciudad;}
	
		
	public function Select($id_ciudad)
	{
		$Controller=new Controller();
		if(isset($id_ciudad) && $id_ciudad != "")
		{
			$Controller= new Controller();
			$sql="$id_ciudad";
			$arr=$Controller->Select($this->_tabla,$this->_registro, $sql);
			return $arr; 
		}
	}
	
	public function Select2($nombre_ciudad)
	{
		$Controller=new Controller();
		if(isset($nombre_ciudad) && $nombre_ciudad != "")
		{
			$Controller= new Controller();
			$sql="'$nombre_ciudad'";
			$arr=$Controller->Select($this->_tabla,$this->_registro2, $sql);
			return $arr; 
		}
	}	
	
	
	public function GetAll()
	{
		$Controller= new Controller();
		return $Controller->GetAll($this->_tabla);
	}	
	
	public function Add($nombre_ciudad)
	{
		$resultado;		
		if(isset($nombre_ciudad) && $nombre_ciudad != "")
		{
			$Controller= new Controller();
			$sql="0, '".$nombre_ciudad. "'";
			$resultado =$Controller->Add($this->_tabla, $sql);
		}
		return $resultado;
	}
	
	
	
	
	public function Del($id_ciudad)
	{
		if(isset($id_ciudad) && $id_ciudad != "")
		{
			$Controller= new Controller();
			$sql=" $id_ciudad ";
			$Controller->Del($this->_tabla,$this->_registro, $sql);
			
		}
		
	}
	
	public function Update($id_ciudad,$nombre_ciudad){
		$Controller = new Controller();
		$sql=array("ID_CIUDAD"=>"$id_ciudad","NOMBRE_CIUDAD"=>"'$nombre_ciudad'");
		return $Controller->Update($this->_tabla,$this->_registro,$sql);
		
	}

	
}
?>