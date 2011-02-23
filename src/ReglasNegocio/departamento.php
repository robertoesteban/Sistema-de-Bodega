<?php
//include("../AccesoDatos/Controller.php");
//include("../AccesoDatos/Controller.php");

class departamento{
	private $_id_departamento;
	private $_nombre_departamento;
	private $_id_direccion;
	private $_tabla = "DEPARTAMENTOS";
	private $_registro="ID_DEPARTAMENTO";
	private $_registro2="NOMBRE_DEPARTAMENTO";
	private $_Controller;

	function __construct()
	{ 
		$this->_Controller=new Controller();	
	}


	function Getid_departamento()	{return $this->_id_departamento;}
	function Getid_direccion()	{return $this->_id_direccion;}
	function Getnombre_departamento()	{return $this->_nombre_departamento;}
	
	function Setid_departamento($id_departamento) {$this->_id_departamento= $id_departamento;}
	function Setid_direccion($id_direccion) {$this->_id_direccion= $id_direccion;}
	function Setnombre_departamento($nombre_departamento) {$this->_nombre_departamento= $nombre_departamento;}
	
		
	public function Select($id_departamento)
	{
		
		if(isset($id_departamento) && $id_departamento != "")
		{
			$sql="$id_departamento";
			$arr=$this->_Controller->Select($this->_tabla,$this->_registro, $sql);
			return $arr; 
		}
	}
	
	public function Select2($nombre_departamento)
	{
		if(isset($nombre_departamento) && $nombre_departamento != "")
		{
			$sql="'$nombre_departamento'";
			$arr=$this->_Controller->Select($this->_tabla,$this->_registro2, $sql);
			$resultado = mysql_result($arr, 0);
			return $resultado; 
		}
	}	
	
	
	public function GetAll()
	{
		return $this->_Controller->GetAllD($this->_tabla);
	}	
	
	
	
	public function Add($id_direccion,$nombre_departamento)
	{
		$resultado;
		//echo $id_direccion;		
		if(isset($nombre_departamento) && $nombre_departamento != "")
		{
			$sql="0,". $id_direccion. ", '".$nombre_departamento. "'";
			//echo $sql;
			$resultado =$this->_Controller->Add($this->_tabla, $sql);
		}
		return $resultado;
	}
	
	
	
	
	public function Del($id_departamento)
	{
		if(isset($id_departamento) && $id_departamento != "")
		{
			$sql=" $id_departamento ";
			return $this->_Controller->Del($this->_tabla,$this->_registro, $sql);
			
		}
		
	}
	
	public function Update($id_departamento,$id_direccion,$nombre_departamento)
	{
		
		//echo "id_depto= ". $id_departamento."<br>";
		//echo "id_direccion= ". $id_direccion."<br>";
		//echo "nombre_depto= ". $nombre_departamento."<br>";
		$sql=array("ID_DEPARTAMENTO"=>"$id_departamento","ID_DIRECCION" => "$id_direccion","NOMBRE_DEPARTAMENTO"=>"'$nombre_departamento'");
		return $this->_Controller->Update($this->_tabla,$this->_registro,$sql);
		//return 0;
	}

	
}
?>