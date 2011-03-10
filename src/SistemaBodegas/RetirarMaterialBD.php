<?php
include("../ReglasNegocio/contiene.php");
session_start(); 
if($_POST["input"]=="Agregar"){
	$codigo=$_POST["codigom"];
	$idobra=$_POST["obras"];
	if($idobra=="Ninguna"){$idobra=0;}
	if($codigo==""){
		$_SESSION["RTMensaje"]="NO INGRESO CODIGO DE MATERIAL";
	}
}

?>