<?php
include("../AccesoDatos/Controller.php");
//include("../AccesoDatos/ControllerDepartamento.php");

class obra{
	private $_id_obra;
	private $_nombre_obra;
	private $_encargado_obra;
	private $_estado_obra;
	private $_fecha_inicio_obra;
	private $_fecha_termino_obra;
	private $_id_departamento;
	private $_id_tipo_obra;
	private $_tabla = "OBRAS";
	private $_registro="ID_OBRA";
	private $_registro2="NOMBRE_OBRA";
	private $_Controller;

	function __construct()
	{ 
		$this->_Controller=new Controller();	
	}

	function Getid_obra()	{return $this->_id_obra;}
	function Getnombre_obra()	{return $this->_nombre_obra;}
	function Getencargado_obra()	{return $this->_encargado_obra;}
	function Getestado_obra()	{return $this->_estado_obra;}
	function Getfecha_inicio_obra()	{return $this->_fecha_inicio_obra;}
	function Getfecha_termino_obra()	{return $this->_fecha_termino_obra;}
	function Getid_departamento()	{return $this->_id_departamento;}
	function Getid_tipo_obra()	{return $this->_id_tipo_obra;}
	
	function Setid_obra($id_obra) {$this->_id_obra= $id_obra;}
	function Setnombre_obra($nombre_obra) {$this->_nombre_obra= $nombre_obra;}
	function Setencargado_obra($encargado_obra) {$this->_encargado_obra= $encargado_obra;}
	function Setestado_obra($estado_obra) {$this->_estado_obra= $estado_obra;}
	function Setfecha_inicio_obra($fecha_inicio_obra) {$this->_fecha_inicio_obra= $fecha_inicio_obra;}
	function Setfecha_termino_obra($fecha_termino_obra) {$this->_fecha_termino_obra= $fecha_termino_obra;}
	function Setid_departamento($id_departamento) {$this->_id_departamento= $id_departamento;}
	function Setid_tipo_obra($id_tipo_obra) {$this->_id_tipo_obra= $id_tipo_obra;}
	
		
	public function Select($id_obra)
	{
		
		if(isset($id_obra) && $id_obra != "")
		{
			$Controller=new Controller();
			$sql="$id_obra";
			$arr=$Controller->Select($this->_tabla,$this->_registro, $sql);
			return $arr; 
		}
	}
	
	public function Select2($nombre_obra)
	{
		$resultado = 1;;
		if(isset($nombre_obra) && $nombre_obra != "")
		{
			$Controller=new Controller();			
			$sql="'$nombre_obra'";
			$arr=$Controller->Select($this->_tabla,$this->_registro2, $sql);
			$resultado = mysql_result($arr, 0);
			return $resultado; 
		}
	}	
	
	
	public function GetAll()
	{
		$Controller=new Controller();
		return $Controller->GetAll($this->_tabla);
	}	
	
	
	
	public function Add($id_tipo_obra,$id_departamento,$nombre_obra,$encargado_obra,$fecha_inicio_obra)
	{
		$resultado;
		//echo $id_direccion;		
		if(isset($nombre_obra) && $nombre_obra != "")
		{
			$Controller=new Controller();
			$fecha_termino_obra="0000-00-00";
			$sql="0,". $id_tipo_obra .",". $id_departamento. ", '".$nombre_obra. "' , '".$encargado_obra. "' , 0 , '".$fecha_inicio_obra. "' , '".$fecha_termino_obra. "'";
			//echo $sql;
			$resultado =$Controller->Add($this->_tabla, $sql);
		}
		return $resultado;
	}
	
	
	/*
	
	public function Del($id_unidad)
	{
		if(isset($id_unidad) && $id_unidad != "")
		{
			$Controller=new Controller();
			$sql=" $id_unidad ";
			return $Controller->Del($this->_tabla,$this->_registro, $sql);
			
		}
		
	}
	
	public function Update($id_unidad,$id_departamento,$nombre_unidad)
	{
		$Controller=new Controller();
		
		//echo "id_depto= ". $id_departamento."<br>";
		//echo "id_direccion= ". $id_direccion."<br>";
		//echo "nombre_depto= ". $nombre_departamento."<br>";
		$sql=array("ID_UNIDAD"=>"$id_unidad","ID_DEPARTAMENTO" => "$id_departamento","NOMBRE_UNIDAD"=>"'$nombre_unidad'");
		return $Controller->Update($this->_tabla,$this->_registro,$sql);
		//return 0;
	}

	*/
}
?>