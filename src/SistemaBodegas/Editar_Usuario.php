<?php session_start();?>
<body>
<form name="form2" method="post" action="EditarUsuarioBD.php">
<p class="tituloHead">Editar Usuario</p>
<table width="700" align="center" class="filaPar">

<tr>
    <td colspan="6" align="left">
      <p class="respDetalleAD">&nbsp;</p>
    </td>
</tr>
<tr>
    <td>R.U.T.</td>
    <td><?php echo $_SESSION["rut_u"];?></td>
    <td>Apellidos</td>
    <td colspan="3"><input name="Apellidosusuario" type="text" size="55" value="<?php echo $_SESSION["apellidos_u"];?>"/></td>

</tr>
<tr>
    <td>Nombre</td>
    <td><input name="nombreusuario" type="text" value="<?php echo  $_SESSION["nombre_u"];?>"/></td>
    <td>Departamento</td>
    <td colspan="3"><select name="deptousuario">
      <option>departamento 1</option>
      <option>departamento 2</option>
    </select></td>
</tr>
<tr>
	<td>Contrase&ntilde;a</td>
    <td><input name="password1" type="password" value="<?php echo $_SESSION["password_u"]?>"/></td>
    <td>contrase&ntilde;a</td>
    <td colspan="3"><input name="password2" type="password" id="password2" value="<?php echo $_SESSION["password_u"];?>"/></td>
</tr>

<tr>
<td>&nbsp;</td>
<td><label></label>
</td>
</tr>

<tr>
<td colspan="6" align="center"><input type="submit" name="GuardarUsuario" value="Guardar" />
<form method="post" action="EliminarUsuarioBD.php"><a href="EliminarUsuarioBD.php" class="ask"><input type="submit" name="EliminarUsuario" value="Eliminar" /></a></form>
</td>
</tr>
</table>
</body>
