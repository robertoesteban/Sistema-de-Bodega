<?php
include ("../ReglasNegocio/direccion.php");
$direccion=$_POST["direccion"];
$hd_variable=$_POST["hd_variable"];
$id_variable=$_POST["id_variable"];
//echo $hd_variable."<br>";
$address= new direccion();
if(empty($direccion)) 
	header ("Location: paso.php?c=e");
elseif($hd_variable == "ingresar" )
{
	$value =	$address->Select2($direccion);
	if ($value == null)
		$value = $address->Add($direccion);
	header ("Location: paso.php?c=e");
	//echo "insercion";
}
elseif($hd_variable == "editar")
{
	$value =  $address->Update($id_variable, $direccion);
	header ("Location: paso.php?c=e");
	//echo "edicion";
}

?>
