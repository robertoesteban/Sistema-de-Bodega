<?php

include("../AccesoDatos/Connection.php");

class Controller
{
	private $Connection= new Connection();

	function __construct()
	{
		
	}

	//Insertar en Valores en tabla mencionada
	public function Add($tabla , $parametro)
	{
			$Connection->Connect();
			
			$Connection->DisConnect();
	}

	//Eliminar Registro de tabla mencionada
	public function Del($tabla , $parametro)
	{
			$Connection->Connect();
			
			$Connection->DisConnect();
	}
}
?>