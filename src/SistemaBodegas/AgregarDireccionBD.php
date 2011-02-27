<?php
include ("../ReglasNegocio/direccion.php");
$direccion=$_POST["direccion"];
$hd_variable=$_POST["hd_variable"];
$id_variable=$_POST["id_variable"];
$address= new direccion();
//echo $id_variable;
if(empty($direccion))
{ 
	header ("Location: paso.php?c=e");
}
elseif(!empty($direccion) && empty($id_variable))
{
	$value =	$address->Select2($direccion);
	if (empty($value))
		$value = $address->Add($direccion);
	header ("Location: paso.php?c=e");
}
elseif (!empty($id_variable) && !empty($direccion))
{
	$value =  $address->Update($id_variable, $direccion);
	header ("Location: paso.php?c=e");
}
?>
