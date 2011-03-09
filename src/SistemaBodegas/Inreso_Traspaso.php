<html>
<head>
<link href="css/estiloMozilla.css" rel="stylesheet" type="text/css">
<p class="tituloHead">Ingreso por Traspaso de Material</p>
</head>
<body>
<table width="700" align="center" class="filaPar">
<tr>
    <td height="31" colspan="6" align="left">
        <p align="left" class="respDetalleAD"> Origen </p>
        <hr></td>
</tr>
<tr>
<td width="66" >Bodega</td>
<td width="144"><label>
  <select name="select">
    <option>Bodega 1</option>
    <option>Bodega 2</option>
  </select>
</label></td>
<td width="63" align="left">Area</td>
<td width="115"><select name="select2">
  <option>Area 1</option>
  <option>Area 2</option>
</select></td>
<td width="72">Obra</td>
<td width="212"><select name="select3">
  <option>Ninguna</option>
  <option>Obra 1</option>
</select></td>
<tr>
<tr>
	<td height="30">Observacion</td>
	<td colspan="5"><form name="form1" method="post" action="">
	  <label>
	    <textarea name="textarea" cols="83"></textarea>
	    </label>
	  </form>
	</td>
<tr>
	<td colspan="6" align="left"><p>&nbsp;</p>
	  <p class="respDetalleAD">Materiales</p>
	  <hr></td>
</tr>
<tr>
	<td>Codigo</td>
	<td><input type="text" name="ninventario" id="ninventario"/></td>
	<td><input type="submit" value="agregar"/></td>
</tr>
<tr>
<td colspan="6"><table width="678" height="104" border="1" align="center">
  <tr>
    <td width="72" height="22" class="titulosTabla">Codigo Matereial </td>
    <td width="504" class="titulosTabla">Nombre Material </td>
    <td width="80" class="titulosTabla">Cantidad</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><select name="select4">
      <option>1</option>
      <option>2</option>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
