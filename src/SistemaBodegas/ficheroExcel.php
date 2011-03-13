<?php
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=ficheroExcel.xls");
header("Pragma: no-cache");
header("Expires: 0");
$tabla = $_POST['datos_a_enviar'];
$tabla = utf8_decode($tabla);
echo $tabla;
?>
