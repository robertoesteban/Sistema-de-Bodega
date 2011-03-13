<?php
include("../AccesoDatos/Controller.php");
include ("../ReglasNegocio/departamento.php");
$departamento=$_POST["departamento"];
$id_direccion=$_POST["direccion"];
$hd_variable=$_POST["hd_variable"];
$id_variable=$_POST["id_variable"];
$address= new departamento();
if(empty($departamento) || $id_direccion == 0)
{ 
	header ("Location: paso.php?c=y");
}
elseif(!empty($departamento) && empty($id_variable) && !empty($id_direccion))
{
	$value =	$address->Select2($departamento);
	if (empty($value))
		$value = $address->Add($id_direccion,$departamento);
	header ("Location: paso.php?c=y");
}
elseif (!empty($id_variable) && !empty($departamento) && !empty($id_direccion))
{
	$value =  $address->Update($id_variable, $id_direccion, $departamento);
	header ("Location: paso.php?c=y");
}


?>