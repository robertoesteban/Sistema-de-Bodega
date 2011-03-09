<?php session_start();

if ($_SESSION["autentificado"] == "SI")
	{
	session_destroy();
	}

 ?>
<html>
	<head>
	<link href="css/estiloMozilla.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<?php
	$error = $_GET[e];
	if($error=="s"){?>
	<table width="700" align="center">
	<tr>
	<td class="tituloHead"> Rut o Contrase&ntilde;a Erroneos</td>
	</tr>
	</table>
	<?php }?>
	<table width="700" align="center">
	<tr>
	<td align="center">
	<?php
	 include 'login/index.php';?>
	
	</table>
	</body>
</html>
