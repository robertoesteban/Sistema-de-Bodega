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
		$accion = mysql_query($query);
		$this->_Connection->DisConnect();
		return $accion;
	}
	
	public function Add($tabla , $parametro)
	{
			$this->_Connection->Connect();
			$query = "INSERT INTO ". $tabla . " VALUES (". $parametro.")" ;
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