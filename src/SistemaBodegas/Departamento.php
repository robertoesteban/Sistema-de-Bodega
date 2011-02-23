<?php
include("../ReglasNegocio/departamento.php");
include("../ReglasNegocio/direccion.php");

$departamento = new departamento();
$direccion = new direccion();

$editar = $_GET["editar"];
$boton = "verifica()";
if(!empty($editar))
{
	$id_departamento = $departamento->Select($editar);
	$row = mysql_fetch_array($id_departamento);
	$id_direccion=$row['ID_DIRECCION'];
	$nombre_departamento = $row['NOMBRE_DEPARTAMENTO'];
	//echo $id_departamento;
	$boton = "VerificaUpdate()";
	
}

?>
<script LANGUAGE="JavaScript">

function verifica()
{
	if (document.form.departamento.value.length==0)
   {
		alert("Debe ingresar un Nombre");
      return 0;
	}
	else if (document.form.direccion.value==0)
   {
		alert("Debe Seleccionar una Direccion");
      return 0;
	}
   document.form.hd_variable.value="ingresar";
	document.form.submit();
}

function verifica2()
{
   document.form.departamento.value = "";
   document.form.submit();
}

function VerificaUpdate()
{
	if (document.form.departamento.value.length==0)
   {
		alert("Debe ingresar un Nombre");
      return 0;
	}
	else if (document.form.direccion.value==0)
   {
		alert("Debe Seleccionar una Direccion");
      return 0;
	}
	document.form.hd_variable.value="editar";
	document.form.submit();
	
}


function pulsar(e) {
    tecla=(document.all) ? e.keyCode : e.which;
    if (tecla==13) return false;
} 
</script>


<body onload="document.form.departamento.focus();">
<p class="tituloHead">Departamentos Municipales</p>
<form method="post" action="AgregarDepartamentoBD.php" name="form">
<table width="400" align="center" class="filaPar">
<tr>
    <td height="31" colspan="6" align="left" >
        <p align="left" class="respDetalleAD"> Departamentos </p>
        </td>
</tr>

<tr>
<td>Nombre</td>
<td colspan="5"><input name="departamento" type="text" size="50" value="<?php echo $nombre_departamento; ?>" /></td>
</tr>
<tr>
<td> Direccion</td>
<td colspan="5">
	<select name="direccion">
		<option value=0> Seleccionar </option>
		<?php
		$AllDireccion = $direccion->GetAll();
		$claves= array_keys($AllDireccion);
		$cant = count($AllDireccion);
		if($cant > 0)
		{
			for ($i=0;$i<$cant;$i++)
			{
							
				echo "<option value=$claves[$i]";
				if($claves[$i]==$id_direccion) echo " selected ";
				echo ">";
				foreach ($AllDireccion["$claves[$i]"] as $valor)
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

$AllDepartamento = $departamento->GetAll();

$claves= array_keys($AllDepartamento);
$cant = count($AllDepartamento);
if($cant > 0)
{ 
	echo "<table border=1  width='400' align='center' class='filaPar'>";
	for ($i=0;$i<$cant;$i++)
	{
		echo "<tr align='center'>";
		foreach ($AllDepartamento["$claves[$i]"] as $valor)
		{
			echo ("<td>$valor </td>");     
		}
		echo "<td width='10%'><a href='paso.php?c=y&editar=".$claves[$i]."'><img border=0 src='imagenes/editar.jpg' width='20' height='20' ></a></td>";
		//echo "<td><a href='paso.php?c=y&eliminar=".$claves[$i]."'><img border=0 src='imagenes/delete.jpg' width='20' height='20'></a></td>";
		echo "</tr>";
	}
	echo "</table>";			
}	
		?>



</body>