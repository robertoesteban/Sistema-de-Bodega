<?php
include ("../ReglasNegocio/usuario.php");

$rut1=$_POST['rutusuario1'];
$rut2=$_POST['rutusuario2'];
$rut=$rut1.'-'.$rut2;
$departamento=$_POST['deptousuario'];
$nombre=$_POST['nombreusuario'];
$apellidos=$_POST['apellidosusuario'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];

if ($password1==$password2){
	$user= new usuario();
	$user->Add($rut,1,$nombre,$apellidos,$password1);
	header ("Location: paso.php?c=8");
}
else {
	header ("Location: paso.php?c=8");
}	
	

?>
