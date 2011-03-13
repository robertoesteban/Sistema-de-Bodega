<?php
include("../AccesoDatos/Controller.php");
include("../ReglasNegocio/material.php");
include("../ReglasNegocio/contiene.php");
include("../ReglasNegocio/ejecuta.php");
include("../ReglasNegocio/retiro.php");
include("../ReglasNegocio/stock.php");
session_start();
if($_POST["submitRM"]=="Agregar"){
	$contiene=new contiene();
	$codigo=$_POST["codigom"];
	$idobra=$_POST["obras"];
	if($idobra=="Ninguna"){$idobra=0;}
	//codigo material,id documento, id obra, folio
	$selectcontiene=$contiene->SelectR($codigo,0,$idobra,0);
	$rowcontiene=mysql_fetch_array($selectcontiene);
	if($rowcontiene!=null){
		$material = new material();
		$selectm = $material->Select($rowcontiene["ID_MATERIAL"]);
		$rowm=mysql_fetch_array($selectm);
		$arr=$_SESSION["lista1"];
		$arr[]=array($rowcontiene["ID_MATERIAL"],$rowm["NOMBRE_MATERIAL"],$rowcontiene["CANTIDADBODEGA_CONTIENE"]);
		$_SESSION["lista1"]=$arr;
		$_SESSION["lista"]=$arr;
	}
	header ("Location: paso.php?c=5");
}
else{
//NOTA:FALTA DESCONTAR DE STOCK SI EL ID DE OBRA ES 0;
	$stock=new stock();
	$idobra=$_POST["obras"];
	if($idobra=="Ninguna"){$idobra=0;}
	$folio=$_SESSION["folio"];
	$fecha= time();
	$fechaactual=date("Y-m-d h:m:s",$fecha);
	$arr=$_SESSION["lista1"];
	$ejecuta=new ejecuta();
	$stock = new stock();
	//ingresar retiro
	$contiene = new contiene();
	$retiro=new retiro();
	$retiro->Add($_POST["nombreD"],$_POST["motivo"],0);
	$sretiro=$retiro->Select2($_POST["nombreD"],$_POST["motivo"],0);
	$rowretiro=mysql_fetch_array($sretiro);
	//ingresar ejecuta
	for($i=0;$i<count($arr);$i++){
		$n="cantidad".$i;
		$ejecuta->Add($rowretiro["ID_RETIRO"],$arr[$i][0],$_POST["unidadp"],$folio,$fechaactual,$_POST["$n"]);
		$contiene->Update($_POST["$n"],$arr[$i][0],$idobra);
		if($idobra==0){
		//descontar de stock si es que se saca de bodega general osea el id de obra es 0
			$stock->UpdateRC($arr[$i][0],$_POST["$n"]);
		}
	}
	//$contiene->Update();
}

?>