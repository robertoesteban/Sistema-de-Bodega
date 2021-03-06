<?php

include("../AccesoDatos/Controller.php");

class articulo {
	private $_id_articulo;
	private $_nombre_articulo;
	private $_estado_articulo;
	private $_unidadmedida_articulo;
	private $_tabla = "MATERIALES";
	private $_registro="ID_MATERIAL";
	private $_registro2="NOMBRE_MATERIAL";
	private $_Controller;

	function __construct()
	{
		$this->_Controller=new Controller();
	}
	
	
	function Getid_articulo()	{return $this->_id_articulo;}
	function Getnombre_articulo()	{return $this->_nombre_articulo;}
	function Getestado_articulo()	{return $this->_estado_articulo;}
	function Getunidadmedida_articulo() {return $this->_unidadmedida_articulo;}
	
	function Setid_articulo($id_articulo) {$this->_id_articulo= $id_articulo;}
	function Setnombre_articulo($nombre_articulo) {$this->_nombre_articulo= $nombre_articulo;}
	function Setestado_articulo($estado_articulo) {$this->_estado_articulo= $estado_articulo;}
	function Setunidadmedida_articulo($unidadmedida_articulo) {$this->_unidadmedida_articulo=$unidadmedida_articulo;}
	
	public function Select($id_articulo)
	{
		
		if(isset($id_articulo) && $id_articulo != "")
		{
			$sql="$id_articulo";
			$arr=$this->_Controller->Select($this->_tabla,$this->_registro, $sql);
			return $arr; 
		}
	}
	
	public function Select2($nombre_articulo)
	{
		if(isset($nombre_articulo) && $nombre_articulo != "")
		{
			$sql="'$nombre_articulo'";
			$arr=$this->_Controller->Select($this->_tabla,$this->_registro2, $sql);
			$resultado = mysql_result($arr, 0);
			return $resultado; 
		}
	}	
	
	
	public function Add($id_articulo,$nombre_articulo,$unidadmedida_articulo)
	{
		$resultado;
		if(isset($nombre_articulo) && $nombre_articulo != "" && isset($id_articulo) && $id_articulo != "")
		{
			$sql="$id_articulo , '$nombre_articulo', 0 , '$unidadmedida_articulo' ";
			$resultado =$this->_Controller->Add($this->_tabla, $sql);
		}
		return $resultado;
	}
	
	
	public function GetAll()
	{
		return $this->_Controller->GetAllTO($this->_tabla);
	}	
	
	
	public function Update($id_articulo,$nombre_articulo,$unidadmedida_articulo)
	{
		$sql=array("ID_MATERIAL"=>"$id_articulo","NOMBRE_MATERIAL" => "'$nombre_articulo'","UNIDADMEDIDA_MATERIAL"=>"'$unidadmedida_articulo'");
		return $this->_Controller->Update($this->_tabla,$this->_registro,$sql);
		//return 0;
	}
	
	
}
	
?>