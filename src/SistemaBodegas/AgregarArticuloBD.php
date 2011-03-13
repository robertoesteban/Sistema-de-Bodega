<?php
include ("../ReglasNegocio/articulo.php");
$id_articulo=$_POST["id_articulo"];
$nombre_articulo=$_POST["nombre_articulo"];
$unidadmedida_articulo=$_POST["unidadmedida_articulo"];
$hd_variable=$_POST["hd_variable"];
$id_variable=$_POST["id_variable"];
//echo $hd_variable."<br>";
$address= new articulo();
if($hd_variable == "ingresar" )
{
	$value =	$address->Select2($id_articulo);
	if (empty($value))
		$value = $address->Add($id_articulo,$nombre_articulo,$unidadmedidad_articulo);
	header ("Location: paso.php?c=t");
}
elseif($hd_variable == "editar")
{
	$value =  $address->Update($id_variable, $nombre_articulo, $unidadmedida_articulo);
	header ("Location: paso.php?c=t");
	//echo "edicion";
}
elseif(empty($codigo_tipo_obra)) 
	header ("Location: paso.php?c=t");


?>
