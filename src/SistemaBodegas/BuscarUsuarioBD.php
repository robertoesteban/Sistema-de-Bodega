<?php
session_start();
include ("../ReglasNegocio/usuario.php"); 
$rut = $_POST['rutusuario1'];
$user = new usuario();
$usuario1=$user->Select($rut);
$row = mysql_fetch_array($usuario1);
$_SESSION["rut_u"]=$row['RUT_USUARIO'];
$_SESSION["nombre_u"]=$row['NOMBRE_USUARIO'];
$_SESSION["apellidos_u"]=$row['APELLIDOS_USUARIO'];
$_SESSION["password_u"]=$row['PASSWORD_USUARIO'];
header ("Location: paso.php?c=a");?>