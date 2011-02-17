<?php
include ("../ReglasNegocio/direccion.php");
$direccion=$_POST["direccion"];
$address= new direccion();
$value= $address->Add($direccion);
header ("Location: paso.php?c=e");
?>
