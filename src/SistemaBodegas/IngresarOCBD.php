<?php
include '../ReglasNegocio/proveedor.php';
include '../ReglasNegocio/ordencompra.php';

$numero=$_POST['NumOC'];
$fechaoc=$_POST['FechaOC'];
$fechatope=$_POST['fecha_tope'];
$codigoD=$_POST['CodigoD'];
$nombreD=$_POST['NombreD'];
$solicitante=$_POST['SolicitanteOC'];
$observacion=$_POST['ObservacionOC'];

$rut1=$_POST['rutp1'];
$rut2=$_POST['rutp2'];
$rut=$rut1.'-'.$rut2;
$nombreP=$_POST['NombreP'];
$direccionP=$_POST['direccionP'];
$cuidadP=$_POST['ciudadP'];
$telefonoP=$_POST['telefonoP'];
$ContactoP=$_POST['contactoP'];

$prov = new proveedor();
$oc = new ordencompra();

$row=$prov->Select($rut);
if($row==null){
	$prov->Add($rut,0,$nombreP,$direccionP,$ContactoP,$telefonoP);
}
if(($oc->Select($numero))==null){
$fecha= time();
$fechaactual=date("Y-m-d",$fecha);
$estado="pendiente";
$oc->Add($numero,0,$fechaoc,$fechatope,$fecha,$solicitante,$observacion,$estado,0,0);
}




?>