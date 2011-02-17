<?php

include("Connection.php");

class Controller
{
	private $_Connection;

	function __construct()
	{
		$this->_Connection = new Connection();
	}

	//Insertar en Valores en tabla mencionada
	public function Select($tabla,$registro,$parametro){
		$this->_Connection->Connect();
		$query = "Select * from ".$tabla." where ".$registro."=".$parametro;
		//echo $query;
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
	
	public function Add($tabla , $parametro)
	{
			$this->_Connection->Connect();
			$query = "INSERT INTO ". $tabla . " VALUES (". $parametro.")" ;
			//echo $query;
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
		//echo $query;
		$accion=mysql_query($query);
		$this->_Connection->Disconnect();
		return $accion;
	}	
}
?>