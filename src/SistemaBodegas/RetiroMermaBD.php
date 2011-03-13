<?php
include("../AccesoDatos/Controller.php");
include("../ReglasNegocio/material.php");
include("../ReglasNegocio/contiene.php");
include("../ReglasNegocio/merma.php");
include("../ReglasNegocio/stock.php");
session_start();
if($_POST["submitMerma"]=="agregar"){
	$contiene=new contiene();
	$codigo=$_POST["CodigoMM"];
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
	//	echo $rowcontiene["ID_MATERIAL"];
		$a=0;
		for($i=0;$i<count($arr);$i++){
			if($rowcontiene["ID_MATERIAL"]==$arr[$i][0])
				$a=1;
		}
		if($a==0){
		$arr[]=array($rowcontiene["ID_MATERIAL"],$rowm["NOMBRE_MATERIAL"],$rowm["UNIDADMEDIDA_MATERIAL"]);
		}
		$_SESSION["lista1"]=$arr;
		$_SESSION["lista"]=$arr;
	}
	header ("Location: paso.php?c=d");
}
else{
	$arr=$_SESSION["lista1"];
	$folio=$_SESSION["folio"];
	$idobra=$_POST["obras"];
	if($_POST["obras"]=="Ninguna"){
		$idobra=0;
	}
	$contiene=new contiene();
	$stock=new stock();
	$fecha= time();
	$fechaactual=date("Y-m-d h:m:s",$fecha);
	$merma=new merma();
	for($i=0;$i<count($arr);$i++){
	$n="cantidad".$i;
	$merma->Add($folio,$_POST["areas"],$_POST["Bodegas"],$arr[$i][0],$idobra,$_POST["obs"],$_POST["$n"],$fechaactual);
	$contiene->Update($_POST["$n"],$arr[$i][0],$idobra);
	if($idobra==0){
		//descontar de stock si es que se saca de bodega general osea el id de obra es 0
			$stock->UpdateRC($arr[$i][0],$_POST["$n"]);
		}
	}
}

?>