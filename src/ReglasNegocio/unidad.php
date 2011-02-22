<?php
//include("../AccesoDatos/Controller.php");
include("../AccesoDatos/ControllerDepartamento.php");

class unidad{
	private $_id_unidad;
	private $_nombre_unidad;
	private $_id_departamento;
	private $_tabla = "UNIDADES";
	private $_registro="ID_UNIDAD";
	private $_registro2="NOMBRE_UNIDAD";
	private $_Controller;

	function __construct()
	{ 
		$this->_Controller=new ControllerDepartamento();	
	}


	function Getid_departamento()	{return $this->_id_departamento;}
	function Getid_unidad()	{return $this->_id_unidad;}
	function Getnombre_unidad()	{return $this->_nombre_unidad;}
	
	function Setid_departamento($id_departamento) {$this->_id_departamento= $id_departamento;}
	function Setid_unidad($id_unidad) {$this->_id_unidad= $id_unidad;}
	function Setnombre_unidad($nombre_unidad) {$this->_nombre_unidad= $nombre_unidad;}
	
		
	public function Select($id_unidad)
	{
		
		if(isset($id_unidad) && $id_unidad != "")
		{
			$sql="$id_unidad";
			$arr=$this->_Controller->Select($this->_tabla,$this->_registro, $sql);
			return $arr; 
		}
	}
	
	public function Select2($nombre_unidad)
	{
		if(isset($nombre_unidad) && $nombre_unidad != "")
		{
			$sql="'$nombre_unidad'";
			$arr=$this->_Controller->Select($this->_tabla,$this->_registro2, $sql);
			return $arr; 
		}
	}	
	
	
	public function GetAll()
	{
		return $this->_Controller->GetAll($this->_tabla);
	}	
	
	
	
	public function Add($id_departamento,$nombre_unidad)
	{
		$resultado;
		//echo $id_direccion;		
		if(isset($nombre_unidad) && $nombre_unidad != "")
		{
			$sql="0,". $id_departamento. ", '".$nombre_unidad. "'";
			//echo $sql;
			$resultado =$this->_Controller->Add($this->_tabla, $sql);
		}
		return $resultado;
	}
	
	
	
	
	public function Del($id_unidad)
	{
		if(isset($id_unidad) && $id_unidad != "")
		{
			$sql=" $id_unidad ";
			return $this->_Controller->Del($this->_tabla,$this->_registro, $sql);
			
		}
		
	}
	
	public function Update($id_unidad,$id_departamento,$nombre_unidad)
	{
		
		//echo "id_depto= ". $id_departamento."<br>";
		//echo "id_direccion= ". $id_direccion."<br>";
		//echo "nombre_depto= ". $nombre_departamento."<br>";
		$sql=array("ID_UNIDAD"=>"$id_unidad","ID_DEPARTAMENTO" => "$id_departamento","NOMBRE_UNIDAD"=>"'$nombre_unidad'");
		return $this->_Controller->Update($this->_tabla,$this->_registro,$sql);
		//return 0;
	}

	
}
?>