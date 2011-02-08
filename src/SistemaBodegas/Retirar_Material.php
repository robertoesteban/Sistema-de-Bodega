<html>
<head>
<link href="css/estiloMozilla.css" rel="stylesheet" type="text/css">
<p class="tituloHead">Retiro Material Bodega</p>
</head>
<body>
<table width="700" align="center" class="filaPar">
<tr>
<td colspan="6">
<p class="respDetalleAD">Destino</p>
	  <hr>
</td>
</tr>
<tr>
	<td>Nombre</td>
	<td><input type="text" name="nombreD" id="nombreD" />
</td>
	<td>Obra</td>
<td><label>
	  <select name="select">
	    <option>Ninguna</option>
	    <option>Obra 1</option>
      </select>
	</label>
</td>
<td>Fecha</td>
<td><input name="FechaR" type="text" id="FechaR" size="15"/></td>
</tr>
<tr>
	<td>Codigo Departamento</td>
	<td><input type="text" name="CodigoDR" id="CodigoDR"/></td>
	<td>Nombre Departamento</td>
	<td colspan="3"><input name="nombreDep" type="text" id="nombreDep" size="40"/></td>
</tr>
<tr>
	<td>Motivo</td>
	<td colspan="5"><form name="form1" method="post" action="">
	  <label>
	    <textarea name="textarea" cols="79"></textarea>
	    </label>
	  </form>
	</td>
</tr>
<tr>
	<td colspan="6" align="left"><p>&nbsp;</p>
	  <p class="respDetalleAD">Materiales</p>
	  <hr></td>
</tr>
<tr>
		<td>Codigo</td>
		<td><input name="NInventario" type="text" id="NInventario"/></td>
		<td><input type="submit" value="Agregar"/></td>
		<td colspan="3"> </td>
  </tr>

<tr>
<td colspan="6"><table width="680" height="104" border="1" align="center">
  <tr>
    <td width="92" height="22" class="titulosTabla">N&deg; O.C. </td>
    <td width="80" class="titulosTabla">Codigo</td>
    <td width="355" class="titulosTabla"><p>Nombre</p></td>
    <td width="125" class="titulosTabla">Cantidad</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
     <td>&nbsp;</td>
    <td align="center"><select name="select2">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><p>&nbsp;</p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><p>&nbsp;</p></td>
    <td>&nbsp;</td>
  </tr>
</table>
<p> </p></td>
</tr>
<tr>
<td colspan="6" align="center"><input type="submit" name="Ingresar2" value="Ingresar" />
  <input type="submit" name="Imprimir2" value="Imprimir" /></td>
</tr>
</table>
</body>
</html>
