<?php
include("../ReglasNegocio/articulo.php");
$articulo = new articulo();

$editar = $_GET["editar"];
$boton = "verifica()";
if(!empty($editar))
{
	$nombre_articulo = $articulo->Select($editar);
	$row = mysql_fetch_array($nombre_articulo);
	$id_articulo=$row['ID_MATERIAL'];	
	$nombre_articulo=$row['NOMBRE_MATERIAL'];
	$boton = "VerificaUpdate()";
	
}
//$nombre_direccion = "Hola";
?>
<script LANGUAGE="JavaScript">

function verifica()
{
	if (document.form.id_articulo.value.length==0)
   {
		alert("Debe ingresar un Codigo");
		document.form.id_articulo.focus();
      return 0;
	}
	if (document.form.nombre_articulo.value.length==0)
   {
		alert("Debe ingresar un Nombre");
		document.form.nombre_articulo.focus();
      return 0;
	}
   document.form.hd_variable.value="ingresar";
	document.form.submit();
}

function verifica2()
  {
   document.form.id_articulo.value="";
   document.form.nombre_articulo.value="";
   document.form.submit();
  }
  
function VerificaUpdate()
{
	if (document.form.id_articulo.value.length==0)
   {
		alert("Debe ingresar un Codigo");
		document.form.id_articulo.focus();
      return 0;
	}
	if (document.form.nombre_articulo.value.length==0)
   {
		alert("Debe ingresar un Nombre");
		document.form.nombre_articulo.focus();
      return 0;
	}
	document.form.hd_variable.value="editar";
	document.form.submit();
	
}

function pulsartipo(e) {
    tecla=(document.all) ? e.keyCode : e.which;
    if (tecla==13) return document.form.id_articulo.focus();
} 

function pulsar(e) {
    tecla=(document.all) ? e.keyCode : e.which;
    if (tecla==13) return document.form.button1.focus();
} 


</script>


<body onload="document.form.id_articulo.focus();">
<p class="tituloHead">Articulos</p>
<form method="post" action="AgregarArticuloBD.php" name="form">
<table width="400" align="center" class="filaPar">
<tr>
    <td height="31" colspan="6" align="left" >
        <p align="left" class="respDetalleAD"> Articulos Municpales </p>
        </td>
</tr>

<tr>
<td>Codigo</td>
<td colspan="5"><input name="id_articulo" type="text" size="20" value="<?php echo $id_articulo; ?>" onkeypress="return pulsartipo(event)"  /></td>
</tr>

<tr>
<td>Nombre</td>
<td colspan="5"><input name="nombre_articulo" type="text" size="50" value="<?php echo $nombre_articulo; ?>" onkeypress="return pulsar(event)"/></td>
</tr>
<tr>
<td colspan="6" align="center"><input type="button" name="button1" value="<?php if(!empty($editar)) echo 'Actualizar'; else echo 'Ingresar'?>" onclick="<?php echo $boton; ?>"/>
<?php if(!empty($editar)) echo "<input type='button' name='button2' value='Limpiar' onclick='verifica2();' />"; ?>
 </td>
</tr>
</table>

<input type="hidden" name="hd_variable" value="<?php echo $editar; ?>"/>
<input type="hidden" name="id_variable" value="<?php echo $editar; ?>"/>
</form>
<br>
<?php
$AllArticulo = $articulo->GetAll();

$claves= array_keys($AllArticulo);
$cant = count($AllArticulo);
if($cant > 0)
{ 
	echo "<table border=1  width='400' align='center' class='filaPar'>";
	for ($i=0;$i<$cant;$i++)
	{
		echo "<tr align='center'>";
		echo ("<td>$claves[$i] </td>"); 
		foreach ($AllArticulo["$claves[$i]"] as $key => $valor)
		{
			if ($key=="val1")
				echo ("<td>$valor </td>");     
		}
		echo "<td width='10%' ><a href='paso.php?c=t&editar=".$claves[$i]."'><img border=0 src='imagenes/editar.jpg' width='20' height='20' ></a></td>";
		//echo "<td><a href='paso.php?c=v&eliminar=".$claves[$i]."'><img border=0 src='imagenes/delete.jpg' width='20' height='20'></a></td>";
		echo "</tr>";
	}
	echo "</table>";			
}	
		?>



</body>