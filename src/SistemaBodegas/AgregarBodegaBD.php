<?php
include ("../ReglasNegocio/bodega.php");
$bodega=$_POST["bodega"];
$hd_variable=$_POST["hd_variable"];
$id_variable=$_POST["id_variable"];
//echo $hd_variable."<br>";
$address= new bodega();
if(empty($bodega)) 
	header ("Location: paso.php?c=x");
elseif($hd_variable == "ingresar" )
{
	$value =	$address->Select2($bodega);
	if ($value <> 0)
		$value = $address->Add($bodega);
	header ("Location: paso.php?c=x");
	//echo "insercion";
}
elseif($hd_variable == "editar")
{
	$value =  $address->Update($id_variable, $bodega);
	header ("Location: paso.php?c=x");
	//echo "edicion";
}

?>