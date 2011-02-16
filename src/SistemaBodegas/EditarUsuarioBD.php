<?php 
session_start();
include ("../ReglasNegocio/usuario.php"); 
$rut=$_SESSION["rut_u"];
$nombre=$_POST['nombreusuario'];
$_SESSION["nombre_usuario"]=$nombre;
$apellidos=$_POST['Apellidosusuario'];
$_SESSION["apellidos_usuario"]=$apellidos;
$password=$_POST['password1'];
$user=new usuario();
$user->Update($rut,$nombre,$apellidos,$password);
header ("Location: paso.php?c=9");

?>