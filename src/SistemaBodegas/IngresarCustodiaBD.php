<?php 
include ("../ReglasNegocio/custodia.php");


$ingresado_por=$_POST['NombreF'];
$codigocc=$_POST['NombreF'];
$procedencia==$_POST['Procedencia'];
$bodega=$_POST['Bodegas'];
$observacion=$_POST['ObservacionC'];
$tipo=$_POST['Tipos'];
$reservado=$_POST['reservado'];
$custodia = new custodia();
$fecha= time();
$fechaactual=date("Y-m-d h:m:s",$fecha);

$custodia->Add($ingresado_por,$fechaactual,$tipo,$observacion,$reservado);


?>