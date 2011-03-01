<?php
//esto es un comm de ppalma
include("../ReglasNegocio/departamento.php");
include("../ReglasNegocio/tipo_obra.php");
include("../ReglasNegocio/obra.php");
$tipo_obra = new tipo_obra();
$departamento = new departamento();
$obra = new obra();
$editar = $_GET["editar"];
$cerrar= $_GET["cerrar"];
$boton = "verifica()";
$fecha= time();
$fecha_inicio_obra=date("d-m-Y",$fecha);
$visible = false;
if(!empty($editar))
{
	$id_obra = $obra->Select($editar);
	$row = mysql_fetch_array($id_obra);
	$id_tipo_obra=$row['ID_TIPO_OBRA'];
	$id_departamento = $row['ID_DEPARTAMENTO'];
	$nombre_obra=$row['NOMBRE_OBRA'];
	$encargado_obra = $row['ENCARGADO_OBRA'];
	$fecha_inicio_obra = $row['FECHA_INICIO_OBRA'];
	$comentario_obra = $row['COMENTARIO_OBRA'];
	
	$boton = "VerificaUpdate()";
	
}
elseif (!empty($cerrar))
{
	$id_obra = $obra->Select($cerrar);
	$row = mysql_fetch_array($id_obra);
	$id_tipo_obra=$row['ID_TIPO_OBRA'];
	$id_departamento = $row['ID_DEPARTAMENTO'];
	$nombre_obra=$row['NOMBRE_OBRA'];
	$encargado_obra = $row['ENCARGADO_OBRA'];
	$fecha_inicio_obra = $row['FECHA_INICIO_OBRA'];
	$comentario_obra = $row['COMENTARIO_OBRA'];
	$visible= true;
		$boton = "VerificaCerrar()";
}


?>    
<script LANGUAGE="JavaScript">

function verifica()
{
	if (document.form.nombre_obra.value.length==0)
   {
		alert("Debe ingresar un Nombre");
		document.form.nombre_obra.focus();
      return 0;
	}
	else if (document.form.tipo_obra.value==0)
   {
		alert("Debe Seleccionar una Tipo de Obra");
		document.form.tipo_tipo.focus();
      return 0;
	}
	else if (document.form.departamento.value==0)
   {
		alert("Debe Seleccionar un Departamento");
		document.form.departamento.focus();
      return 0;
	}
   document.form.hd_variable.value="ingresar";
	document.form.submit();
}

function verifica2()
{
 	document.form.nombre_obra.value="";
 	document.form.tipo_obra.value =0;
 	document.form.departamento.value=0;
 	document.form.encargado_obra.value="";
   document.form.submit();
}

function VerificaUpdate()
{
	if (document.form.nombre_obra.value.length==0)
   {
		alert("Debe ingresar un Nombre");
		document.form.nombre_obra.focus();
      return 0;
	}
	else if (document.form.tipo_obra.value==0)
   {
		alert("Debe Seleccionar una Tipo de Obra");
		document.form.tipo_tipo.focus();
      return 0;
	}
	else if (document.form.departamento.value==0)
   {
		alert("Debe Seleccionar un Departamento");
		document.form.departamento.focus();
      return 0;
	}
	document.form.hd_variable.value="editar";
	document.form.submit();
	
}


function VerificaCerrar()
{
	   document.form.hd_variable.value="ingresar";
	   document.form.submit();
}	



function pulsarobra(e) {
    tecla=(document.all) ? e.keyCode : e.which;
    if (tecla==13) return document.form.tipo_obra.focus();
}

function pulsartipoobra(e) {
    tecla=(document.all) ? e.keyCode : e.which;
    if (tecla==13) return document.form.departamento.focus();
} 


function pulsardepartamento(e) {
    tecla=(document.all) ? e.keyCode : e.which;
    if (tecla==13) return document.form.encargado_obra.focus();
} 


function pulsarencargado(e) {
    tecla=(document.all) ? e.keyCode : e.which;
    if (tecla==13) return document.form.comentario_obra.focus();
} 


function pulsarcomentario(e) {
    tecla=(document.all) ? e.keyCode : e.which;
    if (tecla==13) return document.form.button1.focus();
} 

</script>
<?php if ($visible){
	echo "<body onload='document.form.comentario_obra.focus();' >";
	}
else {
echo "<body onload='document.form.nombre_obra.focus();' >"; } ?>

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
	<input name='nombre_obra' type='text' size='50' <?php if ($visible) echo DISABLED;?> value= '<?php echo $nombre_obra ?>' onkeypress='return pulsarobra(event)'  /> 
	<label>Fecha de Creacion: &nbsp;&nbsp; <?php echo $fecha_inicio_obra; ?></label>
	</td>

</tr>
<tr  >
	<td width="70">
		Tipo de Obra
	</td>
	<td width="230">
		<select name="tipo_obra" onkeypress="return pulsartipoobra(event)" <?php if ($visible) echo DISABLED;?> >
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
		<select name="departamento" onkeypress="return pulsardepartamento(event)" <?php if ($visible) echo DISABLED;?> >
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
		<input name="encargado_obra" type="text" size="50" value="<?php echo $encargado_obra; ?> " onkeypress="return pulsarencargado(event)"  <?php if ($visible) echo DISABLED;?> />
	</td>
</tr>
<tr>
	<td >
		Observacion
	</td>
	<td colspan='3'>
		<textarea name='comentario_obra' cols='57' rows='3'  value="<?php echo $comentario_obra; ?> " onkeypress="return pulsarcomentario(event)" ></textarea>
	</td>
</tr>
<tr>
<td colspan="6" align="center"><input type="button" name="button1" value="<?php if(!empty($editar)) {echo 'Actualizar';} elseif (!empty($cerrar)) { echo 'Cerrar';  } else echo 'Ingresar'; ?>" onclick="<?php echo $boton; ?>"/>
<?php if(!empty($editar) ||  !empty($cerrar) ) echo "<input type='button' name='button2' value='Limpiar' onclick='verifica2();' />"; ?>
 </td>
</tr>

</table>

<input type="hidden" name="hd_variable" value="<?php echo $editar; ?>"/>
<input type="hidden" name="id_variable" value="<?php echo $editar; ?>"/>
</form>
<br>
<?php
$AllObra = $obra->GetAll();

$claves= array_keys($AllObra);
$cant = count($AllObra);
if($cant > 0)
{ 
	echo "<table border=1   align='center' class='filaPar'>";
	echo "<tr class='titulosTabla'><td>Nombre</td><td>Encargado</td><td>Fecha de Creacion</td><td>Departamento Ejecutor</td><td>Tipo de Obra</td><td>&nbsp;</td><td>Cerrar</td></tr>";
	for ($i=0;$i<$cant;$i++)
	{
		echo "<tr align='center'>";
		foreach ($AllObra["$claves[$i]"] as $valor)
		{
			echo ("<td>$valor </td>");     
		}
		echo "<td width='10%' ><a href='paso.php?c=4&editar=".$claves[$i]."'><img border=0 src='imagenes/editar.jpg' width='20' height='20' ></a></td>";
		echo "<td><a href='paso.php?c=4&cerrar=".$claves[$i]."'>Cerrar</a></td>";
		echo "</tr>";
	}
	echo "</table>";			
}	
		?>
</body>
