<?php 
session_start();
include ("../ReglasNegocio/proveedor.php");
include ("../ReglasNegocio/contiene.php");

$numero=$_POST['NumOC'];
$cont = new contiene();
$res=$cont->Select($numero);
$row=mysql_fetch_array($res);

if($row!=null){
	$prov = $row["RUT_PROVEEDOR"];
	$proveedor = new proveedor();
	$resultado=$proveedor->Select($prov);
	$row2=mysql_fetch_array($resultado);
	$rut = $row2['RUT_PROVEEDOR'];
	$r = explode("-",$rut); 
	$_SESSION["rutp1"]=$r[0];
	$_SESSION["rutp2"]=$r[1];
	$codciudad=$row2["ID_CIUDAD"];
	$_SESSION["nombrep"]=$row2['NOMBRE_PROVEEDOR'];
	$_SESSION["direccionp"]=$row2['DIRECCION_PROVEEDOR'];
	$_SESSION["telefonop"]=$row2['FONO_PROVEEDOR'];
	$_SESSION["contactop"]=$row2['CONTACTO_PROVEEDOR'];
}
header ("Location: paso.php?c=2");
?>