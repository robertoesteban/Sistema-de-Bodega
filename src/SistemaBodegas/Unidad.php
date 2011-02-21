<?php
include("../ReglasNegocio/unidad.php");
include("../ReglasNegocio/departamento.php");
include("../ReglasNegocio/direccion.php");

$departamento = new departamento();
$unidad = new unidad();
$direccion = new direccion();

$editar = $_GET["editar"];
$boton = "verifica()";
if(!empty($editar))
{
	$id_unidad = $unidad->Select($editar);
	$row = mysql_fetch_array($id_unidad);
	$id_departamento=$row['ID_DEPARTAMENTO'];
	$nombre_unidad = $row['NOMBRE_UNIDAD'];
	//echo $id_departamento;
	$boton = "VerificaUpdate()";
	
}


?>        
        
<script LANGUAGE="JavaScript">

function verifica()
{
	if (document.form.unidad.value.length==0)
   {
		alert("Debe ingresar un Nombre");
      return 0;
	}
	else if (document.form.departamento.value==0)
   {
		alert("Debe Seleccionar una Departamento");
      return 0;
	}
   document.form.hd_variable.value="ingresar";
	document.form.submit();
}

function verifica2()
{
   document.form.unidad.value = "";
   document.form.submit();
}

function VerificaUpdate()
{
	if (document.form.unidad.value.length==0)
   {
		alert("Debe ingresar un Nombre");
      return 0;
	}
	else if (document.form.departamento.value==0)
   {
		alert("Debe Seleccionar una Departamento");
      return 0;
	}
	document.form.hd_variable.value="editar";
	document.form.submit();
	
}

</script>

<script type="text/javascript" src="ajaxcombobox/select_dependientes_3_niveles.js"></script>

<body>
<p class="tituloHead">Unidades Municipales</p>
<form method="post" action="AgregarUnidadBD.php" name="form">
<table width="400" align="center" class="filaPar">
<tr>
    <td height="31" colspan="6" align="left" >
        <p align="left" class="respDetalleAD"> Unidades </p>
        </td>
</tr>

<tr>
<td>Nombre</td>
<td colspan="5"><input name="unidad" type="text" size="50" value="<?php echo $nombre_unidad; ?>" /></td>
</tr>


<tr>
<td> Departamento</td>
<td colspan="5">
	<select name="departamento">
		<option value=0> Seleccionar </option>
		<?php
		$AllDepartamento = $departamento->GetAll();
		$claves= array_keys($AllDepartamento);
		$cant = count($AllDepartamento);
		if($cant > 0)
		{
			for ($i=0;$i<$cant;$i++)
			{
							
				echo "<option value=$claves[$i]";
				if($claves[$i]==$id_departamento) echo " selected ";
				echo ">";
				foreach ($AllDepartamento["$claves[$i]"] as $valor)
				{
					echo "$valor</option>";     
				}
			}
		}			
		?>
	</select>
</td>
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

$AllUnidad = $unidad->GetAll();

$claves= array_keys($AllUnidad);
$cant = count($AllUnidad);
if($cant > 0)
{ 
	echo "<table border=1  width='400' align='center' class='filaPar'>";
	for ($i=0;$i<$cant;$i++)
	{
		echo "<tr align='center'>";
		foreach ($AllUnidad["$claves[$i]"] as $valor)
		{
			echo ("<td>$valor </td>");     
		}
		echo "<td><a href='paso.php?c=w&editar=".$claves[$i]."'><img border=0 src='imagenes/editar.jpg' width='20' height='20' ></a></td>";
		echo "<td><a href='paso.php?c=w&eliminar=".$claves[$i]."'><img border=0 src='imagenes/delete.jpg' width='20' height='20'></a></td>";
		echo "</tr>";
	}
	echo "</table>";			
}	
		?>



</body>