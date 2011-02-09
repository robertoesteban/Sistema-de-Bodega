<html>
<head>
<link href="css/estiloMozilla.css" rel="stylesheet" type="text/css">
<p class="tituloHead">Ingresar Material Custodia</p>
</head>
<body>
<table width="700" align="center" class="filaPar">
<tr>
    <td height="31" colspan="6" align="left">
        <p align="left" class="respDetalleAD"> Procedencia </p>
    <hr></td>
</tr>
<tr>

<td width="86" align="left">Nombre Funcionario</td>
<td colspan="5"><input name="NombreF" type="text" id="NombreF" size="86" /></td>
<tr>
<tr>
	<td height="30">Codigo C.C.</td>
	<td width="97"><input name="CodigoCC" type="text" id="CodigoCC" size="15"/></td>
	<td>Procedencia</td>
	<td colspan="3"><input name="Procedencia" type="text" id="Procedencia" size="56"/></td>

<tr>
<td colspan="6">
<p class="respDetalleAD">Resepcion</p>
	  <hr>
</td>
</tr>
<tr>
	<td>Bodega</td>
	<td><label>
	  <select name="select">
	    <option>Bodega 0</option>
	    <option>Bodega 1</option>
      </select>
	</label>
	</td>
	<td colspan="2">Observacion</td>
	<td width="345" colspan="2" rowspan="2" align="left"><form name="form1" method="post" action="">
	  <label>
	    <textarea name="ObservacionDoc" cols="56" rows="3" id="ObservacionDoc"></textarea>
	    </label>
	  </form>
	</td>
</tr>
<tr>
<td>Tipo</td>
<td><label></label>
  <select name="select2">
    <option selected>Normal</option>
    <option>Especial</option>
  </select></td>
<td colspan="2">Recervado
  <input type="checkbox" name="checkbox" value="checkbox"></td>
</tr>
<tr>
	<td colspan="6" align="left"><p>&nbsp;</p>
	  <p class="respDetalleAD">Materiales</p>
	  <hr></td>
</tr>
<tr>
		<td>N° Inventario</td>
		<td><input name="NInventario" type="text" id="NInventario" size="15"/></td>
		<td>Nombre</td>
		<td colspan="3"><input name="NombreI" type="text" id="NombreI" size="54"/></td>
  </tr>
	<tr>
		<td>Periodo</td>
		<td width="97"><label>
	  <select name="select">
	    <option>30</option>
	    <option>1</option>
	    <option selected>Indefinido</option>
      </select>
	</label></td>
		<td width="152">Estado</td>
		<td colspan="3"><label>
	  <select name="select">
	    <option selected>Usado</option>
	    <option>Mal Estado</option>
	    <option>nuevo</option>
      </select>
	</label><input type="submit" value="agregar"/></td>
	</tr>
<tr>
<td colspan="6"><table width="685" height="104" border="1" align="center">
  <tr>
    <td width="90" height="22" class="titulosTabla">Numero Inventario </td>
    <td width="252" class="titulosTabla">Nombre</td>
    <td width="90" class="titulosTabla">Periodo (dias) </td>
    <td width="225" class="titulosTabla">Estado </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>
<p> </p></td>
</tr>
<tr>
<td colspan="6" align="center"><input type="submit" name="Ingresar2" value="Guardar" />
  <input type="submit" name="Imprimir2" value="Imprimir" /></td>
</tr>
</table>
</body>
</html>
