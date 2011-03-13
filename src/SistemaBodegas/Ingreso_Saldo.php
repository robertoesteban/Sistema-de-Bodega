<body>
<p class="tituloHead">Ingreso por Saldo</p>
<table width="700" align="center" class="filaPar">
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
	<td>Observacion</td>
	<td colspan="4" rowspan="2"><form name="form1" method="post">
	  <label>
	    <textarea name="ObservacionDoc" cols="55" rows="3" id="ObservacionDoc"></textarea>
	    </label>
	  </form>
	</td>
</tr>
<tr>
<td>Obra</td>
<td><label>
	  <select name="select">
	    <option>Ninguna</option>
	    <option>Obra 1</option>
      </select>
	</label>
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
    <td width="109" height="22" class="titulosTabla">Codigo </td>
    <td width="401" class="titulosTabla">Nombre</td>
    <td width="148" class="titulosTabla">Cantidad</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><form name="form2" method="post" action="">
      <label>
        <select name="select2">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
        </select>
        </label>
    </form>
    </td>
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