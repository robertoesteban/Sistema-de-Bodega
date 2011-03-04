<?php
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
/*$listadoSelects=array(
"select1"=>"select_1",
"select2"=>"select_2"
);*/

$listadoSelects=array(
"tipo"=>"estandar_05tipopersonal",
"subtipo"=>"estandar_05tipohonorario"
);



function validaSelect($selectDestino)
{
	// Se valida que el select enviado via GET exista
	global $listadoSelects;
	if(isset($listadoSelects[$selectDestino])) return true;
	else return false;
}

function validaOpcion($opcionSeleccionada)
{
	// Se valida que la opcion seleccionada por el usuario en el select tenga un valor numerico
	if(is_numeric($opcionSeleccionada)) return true;
	else return false;
}

$selectDestino=$_GET["select"]; $opcionSeleccionada=$_GET["opcion"];

if(validaSelect($selectDestino) && validaOpcion($opcionSeleccionada))
{
	$tabla=$listadoSelects[$selectDestino];
	include 'conexion.php';
	conectar2();
	$consulta=mysql_query("SELECT id_tipohonorario, nombre_tipohonorario FROM $tabla WHERE id_tipopersonal='$opcionSeleccionada'") or die(mysql_error());
	desconectar2();
	
	// Comienzo a imprimir el select
	$cantidad=mysql_num_rows($consulta);
	$desabilitado="";
	if ($cantidad == 0)
		$desabilitado="disabled='disabled'";
	echo "<select ".$desabilitado." name='".$selectDestino."' id='".$selectDestino."' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>Elige</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		$registro[1]=htmlentities($registro[1]);
		// Imprimo las opciones del select
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}			
	echo "</select>";
}
?>
