<?php
include ("../ReglasNegocio/tipo_obra.php");
$codigo_tipo_obra=$_POST["id_tipo_obra"];
$tipo_obra=$_POST["tipo_obra"];
$hd_variable=$_POST["hd_variable"];
$id_variable=$_POST["id_variable"];
//echo $hd_variable."<br>";
$address= new tipo_obra();
if(empty($tipo_obra)) 
	header ("Location: paso.php?c=v");
elseif($hd_variable == "ingresar" )
{
	$value =	$address->Select2($id_tipo_obra);
	if (empty($value))
		$value = $address->Add($id_tipo_obra,$tipo_obra);
	header ("Location: paso.php?c=v");
}
elseif($hd_variable == "editar")
{
	$value =  $address->Update($id_variable, $codigo_tipo_obra, $tipo_obra);
	header ("Location: paso.php?c=v");
	//echo "edicion";
}

?>
