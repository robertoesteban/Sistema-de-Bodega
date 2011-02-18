<?php
include ("../ReglasNegocio/proveedor.php");
session_start();
$_SESSION["numero"]=$_POST['NumOC'];
$_SESSION["fechaoc"]=$_POST['FechaOC'];
$_SESSION["fechatope"]=$_POST['fecha_reclamo'];
$_SESSION["codigoD"]=$_POST['CodigoD'];
$_SESSION["nombreD"]=$_POST['NombreD'];
$_SESSION["solicitante"]=$_POST['SolicitanteOC'];
$_SESSION["observacion"]=$_POST['ObservacionesOC'];

$rut1=$_POST['rutp1'];
$rut2=$_POST['rutp2'];
$rut=$rut1.'-'.$rut2;
$nombreP=$_POST['NombreP'];
$direccionP=$_POST['direccionP'];
$cuidadP=$_POST['ciudadP'];
$telefonoP=$_POST['telefonoP'];
$ContactoP=$_POST['contactoP'];

$prov = new proveedor();
$row=$prov->Select($rut);
$action= mysql_fetch_array($row);
if($action==null){
	$prov->Add($rut,0,$nombreP,$direccionP,$ContactoP,$telefonoP);
}
header ("Location: IngresarOCBD.php");
/*if($r==null){
	$fecha= time();
	$fechaactual=date("Y-m-d",$fecha);
	$estado="pendiente";
	$oc->Add($numero,0,$fechaoc,$fechatope,$fechaactual,$solicitante,$observacion,$estado,0,0);
	header ("Location: paso.php?c=0");
}*/





?>