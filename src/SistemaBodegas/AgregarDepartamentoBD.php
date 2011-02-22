<?php
include ("../ReglasNegocio/departamento.php");
$departamento=$_POST["departamento"];
$id_direccion=$_POST["direccion"];


//echo $departamento;
$hd_variable=$_POST["hd_variable"];
$id_variable=$_POST["id_variable"];
//echo $hd_variable."<br>";
//echo "id_depto= ". $id_variable."<br>";
//echo "id_direccion= ". $id_direccion."<br>";
//echo "nombre_depto= ". $departamento."<br>";
$address= new departamento();
if(empty($departamento)) 
	header ("Location: paso.php?c=y");
	//echo $departamento."<br>";
elseif($hd_variable == "ingresar" )
{
	$value =	$address->Select2($departamento);
	//echo $direccion;
	if ($value <> 0)
		$value = $address->Add($id_direccion,$departamento);
	header ("Location: paso.php?c=y");
	//echo "insercion";
}

elseif($hd_variable == "editar")
{
	
	$value =  $address->Update($id_variable,$id_direccion, $departamento);
	header ("Location: paso.php?c=y");
	//echo "edicion";
}

?>