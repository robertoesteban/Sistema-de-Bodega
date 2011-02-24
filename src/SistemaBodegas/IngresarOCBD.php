<?php 
//RECORDATORIO: FALTA LA PARTE DE LOS MATERIALES Y DEL DEPARTAMENTO
include ("../ReglasNegocio/ordencompra.php");
session_start();

$numero=$_SESSION["numero"];
$fechaoc=$_SESSION["fechaoc"];
$fechatope=$_SESSION["fechatope"];
$f = explode("-",$fechatope); 
$dia=$r[0];
$mes=$r[1];
$a=$r[2];
$ftope=$a.'-'.$mes.'-'.$dia;
$codigoD=$_SESSION["codigoD"];
$nombreD=$_SESSION["nombreD"];
$solicitante=$_SESSION["solicitante"];
$observacion=$_SESSION["observacion"];

$oc=new ordencompra();
$row= $oc->Select($numero);
$r = mysql_fetch_array($row);
if($r==null){
	$fecha= time();
	$fechaactual=date("Y-m-d h:m:s",$fecha);
	$estado="pendiente";
	$oc->Add($numero,0,$fechaoc,$ftope,$fechaactual,$solicitante,$observacion,$estado,0,0);
	
}
//header ("Location: paso.php?c=1");


?>