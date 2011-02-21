<?php
include ("../ReglasNegocio/unidad.php");
$unidad=$_POST["unidad"];
$id_departamento=$_POST["departamento"];


//echo $departamento;
$hd_variable=$_POST["hd_variable"];
$id_variable=$_POST["id_variable"];
//echo $hd_variable."<br>";
//echo "id_depto= ". $id_variable."<br>";
//echo "id_direccion= ". $id_direccion."<br>";
//echo "nombre_depto= ". $departamento."<br>";
$address= new unidad();
if(empty($unidad)) 
	header ("Location: paso.php?c=w");
	//echo $departamento."<br>";
elseif($hd_variable == "ingresar" )
{
	$value =	$address->Select2($unidad);
	//echo $direccion;
	if ($value <> 0)
		$value = $address->Add($id_departamento,$unidad);
	header ("Location: paso.php?c=w");
	//echo "insercion";
}

elseif($hd_variable == "editar")
{
	
	$value =  $address->Update($id_variable,$id_departamento, $unidad);
	header ("Location: paso.php?c=w");
	//echo "edicion";
}

?>