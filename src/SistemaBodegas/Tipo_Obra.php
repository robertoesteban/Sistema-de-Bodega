<?php
include("../ReglasNegocio/tipo_obra.php");
$tipo_obra = new tipo_obra();

$editar = $_GET["editar"];
$boton = "verifica()";
if(!empty($editar))
{
	$nombre_tipo_obra = $tipo_obra->Select($editar);
	$row = mysql_fetch_array($nombre_tipo_obra);
	$codigo_tipo_obra=$row['CODIGO_TIPO_OBRA'];	
	$nombre_tipo_obra=$row['NOMBRE_TIPO_OBRA'];
	$boton = "VerificaUpdate()";
	
}
//$nombre_direccion = "Hola";
?>
<script LANGUAGE="JavaScript">

function verifica()
{
	if (document.form.id_tipo_obra.value.length==0)
   {
		alert("Debe ingresar un Codigo");
		document.form.id_tipo_obra.focus();
      return 0;
	}
	if (document.form.tipo_obra.value.length==0)
   {
		alert("Debe ingresar un Nombre");
		document.form.tipo_obra.focus();
      return 0;
	}
   document.form.hd_variable.value="ingresar";
	document.form.submit();
}

function verifica2()
{
   document.form.tipo_obra.value = "";
   document.form.submit();
}

function VerificaUpdate()
{
	if (document.form.id_tipo_obra.value.length==0)
   {
		alert("Debe ingresar un Codigo");
		document.form.id_tipo_obra.focus();
      return 0;
	}
	if (document.form.tipo_obra.value.length==0)
   {
		alert("Debe ingresar un Nombre");
		document.form.tipo_obra.focus();
      return 0;
	}
	document.form.hd_variable.value="editar";
	document.form.submit();
	
}

function pulsartipo(e) {
    tecla=(document.all) ? e.keyCode : e.which;
    if (tecla==13) return document.form.tipo_obra.focus();
} 

function pulsar(e) {
    tecla=(document.all) ? e.keyCode : e.which;
    if (tecla==13) return document.form.button1.focus();
} 


</script>


<body onload="document.form.id_tipo_obra.focus();">
<p class="tituloHead">Tipos de Obras</p>
<form method="post" action="AgregarTipoObraBD.php" name="form">
<table width="400" align="center" class="filaPar">
<tr>
    <td height="31" colspan="6" align="left" >
        <p align="left" class="respDetalleAD"> Tipos de Obras Municipales </p>
        </td>
</tr>

<tr>
<td>Codigo</td>
<td colspan="5"><input name="id_tipo_obra" type="text" size="20" value="<?php echo $codigo_tipo_obra; ?>" onkeypress="return pulsartipo(event)"  /></td>
</tr>

<tr>
<td>Nombre</td>
<td colspan="5"><input name="tipo_obra" type="text" size="50" value="<?php echo $nombre_tipo_obra; ?>" onkeypress="return pulsar(event)"/></td>
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
$AllTipo_obra = $tipo_obra->GetAll();

$claves= array_keys($AllTipo_obra);
$cant = count($AllTipo_obra);
if($cant > 0)
{ 
	echo "<table border=1  width='400' align='center' class='filaPar'>";
	for ($i=0;$i<$cant;$i++)
	{
		echo "<tr align='center'>";
		foreach ($AllTipo_obra["$claves[$i]"] as $valor)
		{
			echo ("<td>$valor </td>");     
		}
		echo "<td width='10%' ><a href='paso.php?c=v&editar=".$claves[$i]."'><img border=0 src='imagenes/editar.jpg' width='20' height='20' ></a></td>";
		//echo "<td><a href='paso.php?c=v&eliminar=".$claves[$i]."'><img border=0 src='imagenes/delete.jpg' width='20' height='20'></a></td>";
		echo "</tr>";
	}
	echo "</table>";			
}	
		?>



</body>