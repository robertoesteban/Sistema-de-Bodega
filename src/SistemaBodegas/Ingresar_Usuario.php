<html>
<body>
<form method="post" action="AgregarUsuarioBD.php" name="formusuario">
<p class="tituloHead">Ingresar Usuario</p>
<table width="700" align="center" class="filaPar">

<tr>
    <td colspan="6" align="left">
      <p class="respDetalleAD">&nbsp;</p>
    </td>
</tr>
<tr>
    <td>R.U.T.</td>
    <td><input size="17" name="rutusuario1" type="text"/>
   <input size="1" name="rutusuario2" type="text" /></td>
    <td>Apellidos</td>
    <td colspan="3"><input name="apellidosusuario" type="text" size="55"/></td>

</tr>
<tr>
    <td>Nombre</td>
    <td><input name="nombreusuario" type="text"/></td>
    <td>Departamento</td>
    <td colspan="3"><select name="deptousuario">
      <option>departamento 1</option>
      <option>departamento 2</option>
    </select></td>
</tr>
<tr>
	<td>Contrase&ntilde;a</td>
    <td><input name="password1" type="password"/></td>
    <td>contrase&ntilde;a</td>
    <td colspan="3"><input name="password2" type="password"/></td>
</tr>

<tr>
<td>&nbsp;</td>
<td><label></label>
</td>
</tr>

<tr>
<td colspan="6" align="center"><input type="submit" name="GuardarUsuario" value="Guardar" /></td>
</tr>
</table>
</form>
</body>
</html>
