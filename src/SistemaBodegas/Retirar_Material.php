<body>
<p class="tituloHead">Retiro Material Bodega</p>
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
  <td colspan="6"><?php include("./grid/demos/example_row_add_delete.php");?></td>
</tr>
<tr>
<td colspan="6" align="center"><a href="paso.php?c=0" class="ask"><input type="submit" name="Ingresar2" value="Retirar" /></a>
  <input type="submit" name="Imprimir2" value="Imprimir" /></td>
</tr>
</table>
</body>