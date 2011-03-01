<?php

include("Connection.php");

class Controller
{
	private $_Connection;

	function __construct()
	{
		$this->_Connection = new Connection();
	}

	//metodo que ejecuta una consulta sql enviada por parametro
	public function ejecute($sql){
		$this->_Connection->Connect();
		$acction=mysql_query($sql);
		$this->_Connection->DisConnect();
		return $acction;
	}
	
	public function Select($tabla,$registro,$parametro){
		$this->_Connection->Connect();
		$query = "Select * from ".$tabla." where ".$registro."=".$parametro;
		$accion = mysql_query($query);
		$this->_Connection->DisConnect();
		return $accion;
	}
	
public function Select2($tabla,$registro,$parametro){
		$this->_Connection->Connect();
		$query = "SELECT * FROM ".$tabla." WHERE ";
		$size = sizeof($registro);
		for($i=0;$i<$size-1;$i++){
		$query=$query.$registro[$i]."=".$parametro[$i]." AND ";
		}
		$query=$query.$registro[$size-1]."=".$parametro[$size-1];
		$accion = mysql_query($query);
		$this->_Connection->DisConnect();
		return $accion;
	}

public function SelectPersonalizado($tabla,$registro,$parametro){
		$this->_Connection->Connect();
		$query = "Select * from ".$tabla." where ".$registro."=".$parametro;
		$accion = mysql_query($query);
		$this->_Connection->DisConnect();
		return $accion;
	}
	


	public function GetAll($tabla)
	{
		$arreglo;
		$string;		
		$this->_Connection->Connect();
		$query = "SELECT * FROM ". $tabla;
		$result = mysql_query($query);
		$nfilas = mysql_num_rows($result);
		if($nfilas > 0)
		{
			for($i=0;$i<$nfilas;$i++)
			{
				$id= mysql_result($result,$i,0);
				$valor = mysql_result($result,$i,1);
				$arreglo[$id] = array('val1' => $valor );				
			}
		}
		$this->_Connection->DisConnect();
		return $arreglo;
	}
	
	public function GetAllObras()
	{
		$arreglo;
		$string;		
		$this->_Connection->Connect();
		$query = "SELECT OBRAS.ID_OBRA, OBRAS.NOMBRE_OBRA, OBRAS.ENCARGADO_OBRA, OBRAS.FECHA_INICIO_OBRA, DEPARTAMENTOS.NOMBRE_DEPARTAMENTO, TIPOS_OBRAS.CODIGO_TIPO_OBRA, TIPOS_OBRAS.NOMBRE_TIPO_OBRA FROM OBRAS INNER JOIN TIPOS_OBRAS ON OBRAS.ID_TIPO_OBRA = TIPOS_OBRAS.ID_TIPO_OBRA INNER JOIN DEPARTAMENTOS ON DEPARTAMENTOS.ID_DEPARTAMENTO = OBRAS.ID_DEPARTAMENTO WHERE OBRAS.ESTADO_OBRA =0";
		$result = mysql_query($query);
		$nfilas = mysql_num_rows($result);
		if($nfilas > 0)
		{
			for($i=0;$i<$nfilas;$i++)
			{
				$id= mysql_result($result,$i,0);
				$nombre = mysql_result($result,$i,1);
				$encargado = mysql_result($result,$i,2);
				$fecha_inicio = mysql_result($result,$i,3);
				$nombre_departamento = mysql_result($result,$i,4);
				$codigo_tipo_obra = mysql_result($result,$i,5);
				$nombre_tipo_obra = mysql_result($result,$i,6);
				$tipo_obra = "$codigo_tipo_obra ($nombre_tipo_obra)";
				$arreglo[$id] = array('val1' => $nombre, 'val2' => $encargado, 'val3' => $fecha_inicio, 'val4' => $nombre_departamento, 'val5' => $tipo_obra );				
			}
		}
		$this->_Connection->DisConnect();
		return $arreglo;
	}	
	
	
public function GetAllD($tabla)
	{
		$arreglo;
		$string;		
		$this->_Connection->Connect();
		$query = "SELECT * FROM ". $tabla;
		$result = mysql_query($query);
		$nfilas = mysql_num_rows($result);
		$ncolumns = mysql_num_fields($result);
				if($nfilas > 0)
		{
			for($i=0;$i<$nfilas;$i++)
			{
				$id= mysql_result($result,$i,0);
				$valor = mysql_result($result,$i,2);
				$arreglo[$id] = array('val1' => $valor );				
			}
		}
		
		
		$this->_Connection->DisConnect();
		return $arreglo;
	}
	
public function GetAllTO($tabla)
	{
		$arreglo;
		$string;		
		$this->_Connection->Connect();
		$query = "SELECT * FROM ". $tabla;
		$result = mysql_query($query);
		$nfilas = mysql_num_rows($result);
		if($nfilas > 0)
		{
			for($i=0;$i<$nfilas;$i++)
			{
				$id= mysql_result($result,$i,0);
				$valor01 = mysql_result($result,$i,1);
				$valor02 = mysql_result($result,$i,2);
				$arreglo[$id] = array('val1' => $valor01 ,'val2' => $valor02 );				
			}
		}
		$this->_Connection->DisConnect();
		return $arreglo;
	}	
	
	public function Add($tabla , $parametro)
	{
			$this->_Connection->Connect();
			$query = "INSERT INTO ". $tabla . " VALUES (". $parametro.")" ;
			echo $query;
			$accion = mysql_query($query); 
			$this->_Connection->DisConnect();
			return $accion;
	}

	//Eliminar Registro de tabla mencionada
	public function Del($tabla , $registro, $parametro)
	{
			$this->_Connection->Connect();
			$query = "DELETE FROM " . $tabla . " WHERE " . $registro. "=". $parametro;
			$accion = mysql_query($query); 
			$this->_Connection->DisConnect();
			return $accion;
	}
	
	public function Update ($tabla, $registro, $parametro)
	{
		$this->_Connection->Connect();
		$query = "UPDATE " . $tabla . " SET " ;
		$claves = array_keys($parametro);
		$cant = count($parametro);
		for($i=1; $i<$cant ; $i++)
		{
			$query = $query . $claves[$i] ."=". $parametro[$claves[$i]];
			$aux = $i + 1;
			if ($aux != $cant or $aux < $cant)
				$query = $query . ", ";
		}
		$query = $query . " WHERE " . $registro."=". $parametro[$claves[0]];
		$accion=mysql_query($query);
		$this->_Connection->Disconnect();
		return $accion;
	}	
}
?>
