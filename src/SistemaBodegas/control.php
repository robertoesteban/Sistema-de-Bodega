<?php
include("../AccesoDatos/Controller.php");
ini_set("session.use_only_cookies","1");
ini_set("session.use_trans_sid","0");
//private $_Controller;
$_Controller=new Controller();
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
$db="bd";
$dbuser="user";
$dbhost="localhost";
$dbpasswd="1234";

//$db=$_Controller->Getbdbase();
//$dbuser= $this->_Controller->bduser;
//$dbhost= $this->_Controller->bdhost;
//$dbpasswd=$this->_Controller->bdpasswd;
//conecto con la base de datos
$conn = mysql_connect($dbhost,$dbuser,$dbpasswd);
//selecciono la BBDD
mysql_select_db($db,$conn);
$sql="SELECT NOMBRE_USUARIO, APELLIDOS_USUARIO FROM USUARIOS WHERE RUT_USUARIO ='$usuario' and PASSWORD_USUARIO='$contrasena'";
$rs = mysql_query($sql); 
if (mysql_num_rows($rs)!=0)
{
	$nombre_usuario = mysql_result($rs,0,0);
	$apellidos_usuario= mysql_result($rs,0,1);
	session_start();
	session_set_cookie_params(0, "/", $HTTP_SERVER_VARS["HTTP_HOST"], 0); 
	$_SESSION["autentificado"]= "SI";
	$_SESSION["nombre_usuario"]=$nombre_usuario;
	$_SESSION["apellidos_usuario"]=$apellidos_usuario;
	$_SESSION["tipo"]="Usuario";
	session_name("Ususario");
	$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");	
	header ("Location: paso.php?c=0");
}
else
{
	header("Location: index.php?e=s");
}
mysql_free_result($rs);
mysql_close($conn); 
?> 
