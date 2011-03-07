<?php
//include("../AccesoDatos/Controller.php");
include("../ReglasNegocio/ciudad.php");
include("../ReglasNegocio/proveedor.php");
include("../ReglasNegocio/contiene.php");
include ("LeerXML.php");
if($_POST["submitO"]=="oc"){
	$leer=new LeerXML();
	$leer->leer($_POST['NumOC']);
	header ("Location: paso.php?c=1.1");
}
else{
session_start();
$_SESSION["numero"]=$_POST['NumOC'];
$_SESSION["fechaoc"]=$_POST['FechaOC'];
$_SESSION["fechatope"]=$_POST['fecha_tope'];
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
$ciu=new ciudad();
$arrc=$ciu->Select2($cuidadP);
$rowciudad=mysql_fetch_array($arrc);
$telefonoP=$_POST['telefonoP'];
$ContactoP=$_POST['contactoP'];
$idciudad=$rowciudad['ID_CIUDAD'];
$prov = new proveedor();
$row=$prov->Select($rut);
$action= mysql_fetch_array($row);
if($action==null){
	$prov->Add($rut,$idciudad,$nombreP,$direccionP,$ContactoP,$telefonoP);
}
include 'IngresarOCBD.php';
$arr =$_SESSION["list"];
$size=$_SESSION["size"];

$cont=new contiene();
for($i=0;$i<$size;$i++){
	$n="c".$i;
	$cont->Add($_POST["$n"],$_POST['NumOC'],"0",$rut,"0",0,$arr[$i][1],0,0,$arr[$i][2]);
}
header ("Location: paso.php?c=1");

//header ("Location: IngresarOCBD.php");
/*if($r==null){
	$fecha= time();
	$fechaactual=date("Y-m-d",$fecha);
	$estado="pendiente";
	$oc->Add($numero,0,$fechaoc,$fechatope,$fechaactual,$solicitante,$observacion,$estado,0,0);
	header ("Location: paso.php?c=0");
}*/


}


?>
