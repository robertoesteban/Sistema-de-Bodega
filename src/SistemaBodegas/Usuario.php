<?php
include("../ReglasNegocio/usuario.php");
include("../ReglasNegocio/departamento.php");
$departamento = new departamento();
$usuario = new usuario();
$editar = $_GET["editar"];
$cerrar = $_GET["cerrar"];

$boton = "verificaUsuario()";
$visible=true;
if(!empty($editar))
{
	$id_usuario = $usuario->Select($editar);
	$row = mysql_fetch_array($id_usuario);
	$id_departamento=$row['ID_DEPARTAMENTO'];
	$rut_usuario=$row['RUT_USUARIO'];
	$nombre_usuario = $row['NOMBRE_USUARIO'];
	$apellidos_usuario = $row['APELLIDOS_USUARIO'];
	$boton = "VerificaUsuarioUpdate()";
	$visible=false;
	
}

?>

<script language="JavaScript" src="js/java_script.js">  

</script>
<body>
<form method="post" action="AgregarUsuarioBD.php" name="form">
<p class="tituloHead">Usuarios</p>
<table  align="center" class="filaPar">

<tr>
    <td colspan="2" align="left">
      <p class="respDetalleAD">&nbsp;</p>
    </td>
</tr>
<tr>
    <td>R.U.T.</td>
    <td>
    <input name="rut" type="text" size="14" maxlength="14" value="<?php echo $rut_usuario; ?>"  <?php if (!$visible) echo readonly;?>  onChange="checkRutField(document.form.rut.value);" >(*)
    </td>
</tr>
<tr>
    <td>Nombres</td>
    <td><input name="nombreusuario" type="text" value="<?php echo $nombre_usuario; ?>"  size="35"/>(*)</td>
</tr>
<tr>
	<td>Apellidos</td>
   <td><input name="apellidosusuario" type="text" value="<?php echo $apellidos_usuario; ?>" size="35"/>(*)</td>
</tr>
<tr>
	<td>Departamento</td>
   <td>
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
	<td>Contrase&ntilde;a</td>
    <td><input name="password1" type="password"/>(*)</td>
</tr>
<tr>
	<td>Repita Contrase&ntilde;a</td>
   <td><input name="password2" type="password"/>(*)</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><label></label>
</td>
</tr>

<tr>
<td colspan="6" align="center"><input type="button" name="button1" value="<?php if(!empty($editar)) echo 'Actualizar'; else echo 'Ingresar'?>" onclick="<?php echo $boton; ?>"/>
<?php if(!empty($editar)) echo "<input type='button' name='button2' value='Limpiar' onclick='verifica2usuario();' />"; ?>
 </td>
</tr>
</table>
<input type="hidden" name="hd_variable" value="<?php echo $editar; ?>"/>
<input type="hidden" name="id_variable" value="<?php echo $editar; ?>"/>
</form>
<br>
<?php
echo $usuario->Table();
?>
</body>