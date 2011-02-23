<?php
include("../ReglasNegocio/direccion.php");
$direccion = new direccion();

$editar = $_GET["editar"];
$boton = "verifica()";
if(!empty($editar))
{
	$nombre_direccion = $direccion->Select($editar);
	$row = mysql_fetch_array($nombre_direccion);
	$nombre_direccion=$row['NOMBRE_DIRECCION'];
	$boton = "VerificaUpdate()";
	
}
//$nombre_direccion = "Hola";
?>
<script LANGUAGE="JavaScript">

function verifica()
{
	if (document.form.direccion.value.length==0)
   {
		alert("Debe ingresar un Nombre");
      return 0;
	}
   document.form.hd_variable.value="ingresar";
	document.form.submit();
}

function verifica2()
{
   document.form.direccion.value = "";
   document.form.submit();
}

function VerificaUpdate()
{
	if (document.form.direccion.value.length==0)
   {
		alert("Debe ingresar un Nombre");
      return 0;
	}
	document.form.hd_variable.value="editar";
	document.form.submit();
	
}

</script>


<body>
<p class="tituloHead">Direccion</p>
<form method="post" action="AgregarDireccionBD.php" name="form">
<table width="400" align="center" class="filaPar">
<tr>
    <td height="31" colspan="6" align="left" >
        <p align="left" class="respDetalleAD"> Direcciones Municipales </p>
        </td>
</tr>

<tr>
<td>Nombre</td>
<td colspan="5"><input name="direccion" type="text" size="50" value="<?php echo $nombre_direccion; ?>" /></td>
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
		
		/*
		function recorrer_array($array)
		{
			foreach($array as $idx => $val)
			{
				echo $idx . " - > " . $val . "<br>";
				if (is_array($idx))
				{
					recorrer_array($idx);
				}
				if (is_array($val))
				{
					recorrer_array($val);
				}
			}
		}

//Llamas a la funcion
$direccion = new direccion();
$AllDireccion = $direccion->GetAll();

recorrer_array($AllDireccion);
*/

$AllDireccion = $direccion->GetAll();

$claves= array_keys($AllDireccion);
$cant = count($AllDireccion);
if($cant > 0)
{ 
	echo "<table border=1  width='400' align='center' class='filaPar'>";
	for ($i=0;$i<$cant;$i++)
	{
		echo "<tr align='center'>";
		$value=count($AllDireccion["$claves[$i]"]);
		$claves2 =array_keys($AllDireccion["$claves[$i]"]);
		$cant2 =count($AllDireccion["$claves[$i]"]);
		//echo $cant2."<br>";
		foreach ($AllDireccion["$claves[$i]"] as $valor)
		{
			echo ("<td>$valor </td>");     
		}
		echo "<td><a href='paso.php?c=e&editar=".$claves[$i]."'><img border=0 src='imagenes/editar.jpg' width='20' height='20' ></a></td>";
		//echo "<td><a href='paso.php?c=e&eliminar=".$claves[$i]."'><img border=0 src='imagenes/delete.jpg' width='20' height='20'></a></td>";
		echo "</tr>";
	}
	echo "</table>";			
}	
		?>



</body>