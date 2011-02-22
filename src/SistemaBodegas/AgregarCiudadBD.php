<?php
include ("../ReglasNegocio/ciudad.php");
$ciudad=$_POST["ciudad"];
$hd_variable=$_POST["hd_variable"];
$id_variable=$_POST["id_variable"];
//echo $hd_variable."<br>";
$city= new ciudad();
if(empty($ciudad)) 
	header ("Location: paso.php?c=z");
elseif($hd_variable == "ingresar" )
{
	$value =$city->Select2($ciudad);
	if ($value <> 0)
	$value = $city->Add($ciudad);
	header ("Location: paso.php?c=z");
	//echo "insercion";}
}
elseif($hd_variable == "editar")
{
	$value =  $city->Update($id_variable, $ciudad);
	header ("Location: paso.php?c=z");
	//echo "edicion";
}

?>
