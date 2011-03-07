<?php
include ("../ReglasNegocio/usuario.php");

$rut=$_POST['rut'];
$departamento=$_POST['departamento'];
$nombre=$_POST['nombreusuario'];
$apellidos=$_POST['apellidosusuario'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$hd_variable=$_POST["hd_variable"];
$id_variable=$_POST["id_variable"];
//echo $id_variable;
$user= new usuario();
if ($hd_variable=="ingresar")
{
	$value =	$user->Select2($rut);
	if (empty($value))
	{
		$result = $user->Add($rut,$departamento,$nombre,$apellidos,$password1);
		header ("Location: paso.php?c=8");
	}
}
elseif ($hd_variable=="actualizar")
{
	$value =  $user->Update($id_variable,$rut, $nombre, $apellidos, $password1);
	header ("Location: paso.php?c=8");
}
else
{
	header ("Location: paso.php?c=8");
}

?>
