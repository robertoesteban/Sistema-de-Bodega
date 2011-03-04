<?php
include("../ReglasNegocio/bodega.php");
$bodega = new bodega();

$editar = $_GET["editar"];
$boton = "verifica()";
if(!empty($editar))
{
	$nombre_bodega = $bodega->Select($editar);
	
	$row = mysql_fetch_array($nombre_bodega);
	
	$nombre_bodega=$row['NOMBRE_BODEGA'];	
	$boton = "VerificaUpdate()";
	
}
?>
<script LANGUAGE="JavaScript">

function verifica()
{
	if (document.form.bodega.value.length==0)
   {
		alert("Debe ingresar un Nombre");
      return 0;
	}
   document.form.hd_variable.value="ingresar";
	document.form.submit();
}

function verifica2()
{
   document.form.bodega.value = "";
   document.form.submit();
}

function VerificaUpdate()
{
	if (document.form.bodega.value.length==0)
   {
		alert("Debe ingresar un Nombre");
      return 0;
	}
	document.form.hd_variable.value="editar";
	document.form.submit();
	
}

</script>


<body>
<p class="tituloHead">Bodegas</p>
<form method="post" action="AgregarBodegaBD.php" name="form">
<table width="400" align="center" class="filaPar">
<tr>
    <td height="31" colspan="6" align="left" >
        <p align="left" class="respDetalleAD"> Bodegas Municipales </p>
        </td>
</tr>

<tr>
<td>Nombre</td>
<td colspan="5"><input name="bodega" type="text" size="50" value="<?php echo $nombre_bodega; ?>" /></td>
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
		
$Allbodega = $bodega->GetAll();

$claves= array_keys($Allbodega);
$cant = count($Allbodega);
if($cant > 0)
{ 
	echo "<table border=1  width='400' align='center' class='filaPar'>";
	for ($i=0;$i<$cant;$i++)
	{
		echo "<tr align='center'>";
		$value=count($Allbodega["$claves[$i]"]);
		$claves2 =array_keys($Allbodega["$claves[$i]"]);
		$cant2 =count($Allbodega["$claves[$i]"]);
		//echo $cant2."<br>";
		foreach ($Allbodega["$claves[$i]"] as $valor)
		{
			echo ("<td>$valor </td>");     
		}
		echo "<td><a href='paso.php?c=x&editar=".$claves[$i]."'><img border=0 src='imagenes/editar.jpg' width='20' height='20' ></a></td>";
		echo "<td><a href='paso.php?c=x&eliminar=".$claves[$i]."'><img border=0 src='imagenes/delete.jpg' width='20' height='20'></a></td>";
		echo "</tr>";
	}
	echo "</table>";			
}	
		?>



</body>