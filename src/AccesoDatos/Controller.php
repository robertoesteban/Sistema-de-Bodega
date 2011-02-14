<?php

include("../AccesoDatos/Connection.php");

class Controller
{
	private $_Connection= new Connection();

	function __construct()
	{
		
	}

	//Insertar en Valores en tabla mencionada
	public function Add($tabla , $parametro)
	{
			$_Connection->Connect();
			$query = "INSERT INTO ". $tabla . " VALUES ". $parametro ;
			$accion = mysql_query($query); 
			$_Connection->DisConnect();
			return $accion;
	}

	//Eliminar Registro de tabla mencionada
	public function Del($tabla , $registro, $parametro)
	{
			$_Connection->Connect();
			$query = "DELETE FROM " . $tabla . " WHERE " . $registro "=" $parametro ;
			$accion = mysql_query($query); 
			$_Connection->DisConnect();
			return $accion;
	}
}
?>