<?php 
session_start();
include ("../ReglasNegocio/ciudad.php");
include ("../ReglasNegocio/proveedor.php");
include ("../ReglasNegocio/contiene.php");
include ("../ReglasNegocio/material.php");

$numero=$_POST['NumOC'];
$cont = new contiene();
$ciu=new ciudad();
$ma=new material();
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
	$row3=$ciu->Select($codciudad);
	$r2=mysql_fetch_array($row3);
	$_SESSION["ciudadp"]=$r2['NOMBRE_CIUDAD'];
	$_SESSION["nombrep"]=$row2['NOMBRE_PROVEEDOR'];
	$_SESSION["direccionp"]=$row2['DIRECCION_PROVEEDOR'];
	$_SESSION["telefonop"]=$row2['FONO_PROVEEDOR'];
	$_SESSION["contactop"]=$row2['CONTACTO_PROVEEDOR'];
	$arrmat=$cont->Select($numero,0,$rut);
	$list=array();
	$materiales=mysql_fetch_array($arrmat);
	$i=0;
	while($materiales!=null){
		$name = $ma->Select($materiales["ID_MATERIAL"]);
		$namem=mysql_fetch_array($name);
		$list[$i]=array($materiales["ID_MATERIAL"],$namem["NOMBRE_MATERIAL"],$materiales["CANTIDADTOTAL_CONTIENE"],$materiales["CANTIDADBODEGA_CONTIENE"]);
		$i++;
		$materiales=mysql_fetch_array($arrmat);
	}
	$_SESSION["lista"]=$list;
	
}
header ("Location: paso.php?c=2");
?>