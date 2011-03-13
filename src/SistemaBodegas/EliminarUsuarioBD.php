<?php 
session_start();
include '../ReglasNegocio/usuario.php';
$rut=$_SESSION["rut_u"];
$user=new usuario();
$user->Del($rut);
header ("Location: paso.php?c=9");
?>