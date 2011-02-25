<?php

include("../ReglasNegocio/departamento.php");
include("../ReglasNegocio/tipo_obra.php");
$tipo_obra = new tipo_obra();

$departamento = new departamento();
$boton = "verifica()";

$editar = $_GET["editar"];


?>    
<script LANGUAGE="JavaScript">

function verifica()
{
	if (document.form.nombre_obra.value.length==0)
   {
		alert("Debe ingresar un Nombre");
      return 0;
	}
	else if (document.form.tipo_obra.value==0)
   {
		alert("Debe Seleccionar una Tipo de Obra");
      return 0;
	}
   document.form.hd_variable.value="ingresar";
	document.form.submit();
}

function VerificaUpdate()
{
	if (document.form.nombre_obra.value.length==0)
   {
		alert("Debe ingresar un Nombre");
      return 0;
	}
	else if (document.form.tipo_obra.value==0)
   {
		alert("Debe Seleccionar una Tipo de Obra");
      return 0;
	}
	document.form.hd_variable.value="editar";
	document.form.submit();
	
}


function pulsarobra(e) {
    tecla=(document.all) ? e.keyCode : e.which;
    if (tecla==13) return document.form.tipo_obra.focus(); ;
} 
</script>
<body onload="document.form.nombre_obra.focus();">
<p class="tituloHead">Obras</p>
<form method="post" action="AgregarObraBD.php" name="form">
<table width="700" align="center" border="0" class="filaPar">
<tr>
    <td height="31" colspan="4" align="left" >
        <p align="left" class="respDetalleAD"> Obras Municipales </p>
    </td>
</tr>
<tr>
	<td width="70">
		Nombre
	</td>
	<td colspan="3">
		<input name="nombre_obra" type="text" size="50" onkeypress="return pulsarobra(event)"/>
	
	<?php
		$fecha= time();
		$fecha_inicio_obra=date("d-m-Y",$fecha);
	?>
	
		<input name="fecha_inicio_obra" type="text" DISABLED value="<?php echo $fecha_inicio_obra; ?>" />
	</td>
</tr>
<tr  >
	<td width="70">
		Tipo de Obra
	</td>
	<td width="230">
		<select name="tipo_obra">
		<option value=0> Seleccionar </option>
		<?php
		$AllTipo_Obra = $tipo_obra->GetAll();
		$claves= array_keys($AllTipo_Obra);
		$cant = count($AllTipo_Obra);
		if($cant > 0)
		{
			for ($i=0;$i<$cant;$i++)
			{
				$value = "";			
				echo "<option value=$claves[$i]";
				if($claves[$i]==$id_tipo_obra) echo " selected ";
				echo ">";
				foreach ($AllTipo_Obra["$claves[$i]"] as $key => $valor)
				{
					if ($key == "val1")
						$value = $valor;
					elseif ($key == "val2")
					{
						$value = $value . " ( " . $valor ." ) ";
						echo "$value</option>";
					}       
				}
			}
		}			
		?>
	</select>
	</td>
	<td width="70">
		Departamento Ejecutante
	</td>
	<td width="230">
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
	<td>
		Encargado
	</td>
	<td colspan="3">
		<input name="encargado_obra" type="text" size="50"/>
	</td>
</tr>
<tr>
	<td >
		Observacion
	</td>
	<td colspan="3">
		<textarea name="observacion_obra" cols="57" rows="3"></textarea>
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
</body>