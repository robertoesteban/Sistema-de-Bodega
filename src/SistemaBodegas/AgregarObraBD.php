<?php
include("../AccesoDatos/Controller.php");
include ("../ReglasNegocio/obra.php");
$nombre_obra=$_POST["nombre_obra"];
$tipo_obra=$_POST["tipo_obra"];
$departamento=$_POST["departamento"];
$comentario_obra=$_POST["comentario_obra"];
$encargado_obra=$_POST["encargado_obra"];
//$fecha_inicio_obra=$_POST["fecha_inicio_obra"];

$fecha= time();
		$fecha_inicio_obra=date("Y-m-d",$fecha);

//$observacion_obra=$_POST["observacion_obra"];
$hd_variable=$_POST["hd_variable"];
$id_variable=$_POST["id_variable"];
$address= new obra();


if(empty($nombre_obra)) 
	header ("Location: paso.php?c=4");
	//echo $departamento."<br>";
elseif($hd_variable == "ingresar" )
{
	$value =	$address->Select2($nombre_obra);
	//echo $value;
	if (empty($value)){
		$value = $address->Add($tipo_obra,$departamento,$nombre_obra,$encargado_obra,$fecha_inicio_obra,$comentario_obra);
	header ("Location: paso.php?c=4");
	//echo "insercion";
	}
}
/*
elseif($hd_variable == "editar")
{
	
	$value =  $address->Update($id_variable,$id_departamento, $unidad);
	header ("Location: paso.php?c=w");
	//echo "edicion";
}


?>