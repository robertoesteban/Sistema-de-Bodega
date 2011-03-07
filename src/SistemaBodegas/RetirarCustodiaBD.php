<?php
session_start();
include("../AccesoDatos/Controller.php");
include("../ReglasNegocio/material.php"); 
include("../ReglasNegocio/asociado.php");
if($_POST["submitRC"]=="agregar"){
	$nombre=$_POST['NombreRC'];
	$obs=$_POST['obs'];
	$_SESSION["nombre"]=$nombre;
	$_SESSION["obs"]=$obs;
	$numeroi=$_POST["ninventario"];
	$material=new material();
	$arr=$_SESSION["rcustodia"];
	if($numeroi==""){
		$_SESSION["mensaje"]="NUMERO DE INVENTARIO VACIO";
	}
	else{
	$listmaterial=$material->Select($numeroi);
	if($listmaterial==null){
		$_SESSION["mensaje"]="NO EXISTE EL MATERIAL EN CUSTODIA";
	}
	else{
	$asociado=new asociado();
	$listaa=$asociado->SelectM($numeroi);
	if($listaa==null){$_SESSION["mensaje"]="NO EXISTE EL MATERIAL EN CUSTODIA";}
	else{
	$arr2=mysql_fetch_array($listaa);
	if($arr2["ESTADO_RETIRO_ASOCIADO"]==1){
		$_SESSION["mensaje"]="EL MATERIAL YA FUE RETIRADO";
	}
	else{
	$rowmaterial=mysql_fetch_array($listmaterial);
	$arr[]=array($numeroi,$rowmaterial["NOMBRE_MATERIAL"]);
	}}}
	$_SESSION["rcustodia"]=$arr;
	$_SESSION["listrcust"]=$arr;
	}
	header ("Location: paso.php?c=6");
}
else{
include ("../ReglasNegocio/es_retirado.php");
include ("../ReglasNegocio/retiros_custodia.php");
$nombre=$_POST['NombreRC'];
$obs=$_POST['obs'];
if ($nombre==""||$obs==""){
	$_SESSION["mensaje"]="NO HA INGRESADO NOMBRE U OBSERVACION";
}
else{
$arr=$_SESSION["rcustodia"];
if (count($arr)==0){
	$_SESSION["mensaje"]="NO HAY MATERIAL PARA INGRESAR";
}
else{
$retiros= new retiros_custodia();
$fecha= time();
$fechaactual=date("Y-m-d h:m:s",$fecha);
$retiros->Add($nombre,$obs,$fechaactual);
$listaretiro=$retiros->Select($nombre,$obs,$fechaactual);
$rowretiros=mysql_fetch_array($listaretiro);
$id_retiro=$rowretiros["ID_RETIRO_CUSTODIA"];
$material=new material();
$asociado=new asociado();
$folio=$_SESSION["folio_rcustodia"];
$es_retirado=new es_retirado();
for($i=0;$i<count($arr);$i++){
	$asociado->Update($arr[$i][0]);
	$material->Update2($arr[$i][0]);
	$es_retirado->Add($arr[$i][0],$id_retiro,$folio,$fechaactual);
}
}
}
header ("Location: paso.php?c=6");
}
?>
