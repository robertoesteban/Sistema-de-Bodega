<?php
//include("../AccesoDatos/Controller.php");
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
		$resultado = 1;
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
		return $Controller->GetAllObras();
	}	
	
	
	
	public function Add($id_tipo_obra,$id_departamento,$nombre_obra,$encargado_obra,$fecha_inicio_obra,$comentario_obra)
	{
		$resultado;
		if (empty($comentario_obra))
			$comentario_obra="--";
		//echo $id_direccion;		
		if(isset($nombre_obra) && $nombre_obra != "")
		{
			$Controller=new Controller();
			$fecha_termino_obra="0000-00-00";
			$sql="0,". $id_tipo_obra .",". $id_departamento. ", '".$nombre_obra. "' , '".$encargado_obra. "' , 0 , '".$fecha_inicio_obra. "' , '".$fecha_termino_obra. "' , '".$comentario_obra. "'";
			//echo $sql;
			$resultado =$Controller->Add($this->_tabla, $sql);
		}
		return $resultado;
	}
	
	
	public function Close($id_obra,$comentario_obra,$fecha_termino_obra)
	{
		$Controller=new Controller();
		$sql=array("ID_OBRA"=>"$id_obra","ESTADO_OBRA"=>"1", "FECHA_TERMINO_OBRA"=>"'$fecha_termino_obra'", "COMENTARIO_OBRA" => "'$comentario_obra'");
		return $Controller->Update($this->_tabla,$this->_registro,$sql);
		//return 0;
	}
	
	public function TablePersonalizada($sql)
{
	$Controller=new Controller();
	//$sql= "SELECT * FROM USUARIOS";
	$result = $Controller->ejecute($sql);
	$nfilas = mysql_num_rows($result);
	$tabla="";
	if($nfilas > 0)
	{
		
		$tabla = "<table class='filapar' align='center' border=1>"; 
		$tabla = $tabla. "<tr class='titulosTabla'><td>N°</td><td>Nombre</td><td>Departamento</td><td>Fecha de Creacion</td></tr>";
		
		for($i=0;$i<$nfilas;$i++)
		{
			$id_obra= mysql_result($result,$i,0);
			$nombre_obra= mysql_result($result,$i,3);
			$id_departamento = mysql_result($result,$i,2);
			$sql2 = "SELECT NOMBRE_DEPARTAMENTO FROM DEPARTAMENTOS WHERE ID_DEPARTAMENTO = $id_departamento";
			$result2 = $Controller->ejecute($sql2);
			$nfilas2 = mysql_num_rows($result2);
			if ($nfilas2  > 0) 
			{
				$departamento = mysql_result($result2,0,0);
			}
			else 
			{
				$departamento="Administrador";
			}
			$fecha_inicio_obra = mysql_result($result,$i,6);
			$indice = $i+1;
			$tabla = "$tabla <tr>";
			$tabla = "$tabla <td> $indice </td>";
			$tabla = "$tabla <td> $nombre_obra </td>";
			$tabla = "$tabla <td>$departamento</td>";
			$tabla = "$tabla <td>$fecha_inicio_obra</td>";
			//$tabla = "$tabla <td align='center' ><a href='paso.php?c=8&editar=".$id_usuario."'><img border=0 src='imagenes/editar.jpg' width='15' height='15' ></a></td>";
			//$tabla = "$tabla <td align='center' ><a href='javascript: display_alert($id_usuario)' ><img border=0 src='imagenes/delete.jpg' width='15' height='15'></a></td>";
			$tabla = "$tabla </tr>";
		}
		
		$tabla = $tabla . "</table>";
	}
	
	//$tabla = "hola!!! $sql";
	return $tabla;
}

}
?>