<?php
include("../AccesoDatos/Controller.php");
class bodega {
	private $_id_bodega;
	private $_nombre_bodega;
	private $_tabla = "BODEGAS";
	private $_registro="ID_BODEGA";
	private $_registro2="NOMBRE_BODEGA";

	function __construct(){ }


	function Getid_bodega()	{return $this->_id_bodega;}
	function Getnombre_bodega()	{return $this->_nombre_bodega;}
	
	function Setid_bodega($id_bodega) {$this->_id_bodega= $id_bodega;}
	function Setnombre_bodega($nombre_bodega) {$this->_nombre_bodega= $nombre_bodega;}
	
		
	public function Select($id_bodega)
	{
		$Controller=new Controller();
		if(isset($id_bodega) && $id_bodega != "")
		{
			$Controller= new Controller();
			$sql="$id_bodega";
			$arr=$Controller->Select($this->_tabla,$this->_registro, $sql);
			return $arr; 
		}
	}
	
	public function Select2($nombre_bodega)
	{
		$Controller=new Controller();
		if(isset($nombre_bodega) && $nombre_bodega != "")
		{
			$Controller= new Controller();
			$sql="'$nombre_bodega'";
			$arr=$Controller->Select($this->_tabla,$this->_registro2, $sql);
			return $arr; 
		}
	}	
	
	
	public function GetAll()
	{
		$Controller= new Controller();
		return $Controller->GetAll($this->_tabla);
	}	
	
	public function Add($nombre_bodega)
	{
		$resultado;		
		if(isset($nombre_bodega) && $nombre_bodega != "")
		{
			$Controller= new Controller();
			$sql="0, '".$nombre_bodega. "'";
			$resultado =$Controller->Add($this->_tabla, $sql);
		}
		return $resultado;
	}
	
	
	
	
	public function Del($id_bodega)
	{
		if(isset($id_bodega) && $id_bodega != "")
		{
			$Controller= new Controller();
			$sql=" $id_bodega ";
			$Controller->Del($this->_tabla,$this->_registro, $sql);
			
		}
		
	}
	
	public function Update($id_bodega,$nombre_bodega){
		$Controller = new Controller();
		$sql=array("ID_BODEGA"=>"$id_bodega","NOMBRE_BODEGA"=>"'$nombre_bodega'");
		return $Controller->Update($this->_tabla,$this->_registro,$sql);
		
	}

	
}
?>