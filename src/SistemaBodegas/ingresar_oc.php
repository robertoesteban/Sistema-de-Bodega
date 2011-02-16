<html>
<body>
<p class="tituloHead">Ingresar Orden de Compra</p>
<table align="center" class="filaPar" width="700">
<tr>
    <td height="31" colspan="7" align="left">
        <p align="left" class="respDetalleAD"> Orden de Compra </p>
    <hr></td>
</tr>
<tr>
<td width="90" align="left">Numero O.C.</td>
<td width="171"><input name="NumOC" type="text" /></td>
<td width="37"><input type="submit" name="BuscarOC" value="oc" /></td>
<td width="141" align="left">Fecha</td>
<td width="149"><input size="15" name="FechaOC" type="text" value="<?php ?>" /></td>
<td width="96" align="left">Fecha de Tope</td>
<td width="124"><script type="text/javascript">//<![CDATA[
   
                  LEFT_CAL.addEventListener("onSelect", function(){
                          var ta = document.getElementById("f_selection");
                          ta.value = this.selection.countDays() + " days selected:\n\n" + this.selection.print("%Y/%m/%d").join("\n");
                  });

                //]]></script>
        <input readonly="" name="fecha_tope" size="8" maxlength="8" />
				<!--button id="f_rangeEnd_trigger" >...</button-->
				<a id="f_rangeEnd_trigger" href="#">Calendario</a>
    <!--button id="f_clearRangeEnd" onclick="clearRangeEnd()">clear</button-->      
	<script type="text/javascript">
                  //function CalendarJC(){
				  new Calendar({
                          inputField: "fecha_tope",
                          dateFormat: "%Y-%m-%d",
                          trigger: "f_rangeEnd_trigger",
                          bottomBar: false,
                          onSelect: function() {
                                  var date = Calendar.intToDate(this.selection.get());
                                  LEFT_CAL.args.max = date;
                                  LEFT_CAL.redraw();
                                  this.hide();
                          }
                  });
                  /*function clearRangeEnd() {
                          document.getElementById("fecha_tope").value = "";
                          LEFT_CAL.args.max = null;
                          LEFT_CAL.redraw();
                  };*/
      </script></td>
</tr>
<tr>
    <td align="left">Codigo Depto</td>
    <td colspan="2"><input name="CodigoD" type="text" /></td>
    <td align="left">Nombre Departamento</td>
    <td colspan="3"><input size="45" name="NombreD" type="text" /></td>
</tr>
<tr>
<td align="left">Solicitante</td>
<td colspan="6"><input size="85" name="SolicitanteOC" type="text" /></td>
</tr>
<tr>
    <td align="left">Observaciones</td>
    <td colspan="6"><input size="85" name="ObservacionesOC" type="text" /></td>
</tr>
<tr>
    <td colspan="7" align="left"><p>&nbsp;</p>
      <p class="respDetalleAD">Proveedores</p>
    <hr></td>
</tr>
<tr>
    <td>R.U.T.</td>
    <td><input size="17" name="rutp1" type="text" id="rutp1" />
   <input size="1" name="rutp2" type="text" id="rutp2" /></td>
    <td><input type="submit" name="BuscarPv" value="pv" /></td>
    <td>Nombre Proveedor</td>
    <td colspan="3"><input name="NombreP" type="text" id="NombreP" size="45"/></td>

</tr>
<tr>
    <td>Direccion</td>
    <td colspan="2"><input name="direccionP" type="text" id="direccionP"/></td>
    <td>Ciudad</td>
    <td colspan="3"><input name="ciudadP" type="text" id="ciudadP" size="45"/></td>
</tr>
<tr>
	<td>Telefono</td>
    <td colspan="2"><input name="telefonoP" type="text" id="telefonoP"/></td>
    <td>Contacto</td>
    <td colspan="3"><input name="contactoP" type="text" id="contactoP" size="45"/></td>
</tr>
<tr>
	<td colspan="7" align="left"><p>&nbsp;</p>
	  <p class="respDetalleAD">Materiales</p>
	  <hr></td>
</tr>
<tr>
<td colspan="7"><table width="647" height="102" border="1" align="center">
  <tr>
    <td width="90" class="titulosTabla">Codigo</td>
    <td width="272" class="titulosTabla">Nombre</td>
    <td width="35" class="titulosTabla">Unidad</td>
    <td width="44" class="titulosTabla">Cantidad</td>
    <td width="85" class="titulosTabla">Valor Unitario</td>
    <td width="81" class="titulosTabla">Valor Total</td>
  </tr>
  <tr>
    <td><input name="cod1" type="text" id="cod1" size="15"/></td>
    <td>&nbsp;</td>
    <td><input name="uni1" type="text" id="uni1" size="5"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p> </p></td>
</tr>
<tr>
	<td colspan="6" align="right">Neto</td>
    <td ><input name="neto" type="text" id="neto"/></td>
</tr>
<tr>
	<td colspan="6" align="right">Total</td>
    <td ><input name="total" type="text" id="total"/></td>
</tr>
<tr><td colspan="7" align="center"><input type="button" value="Guardar"/> <input type="submit" value="Imprimir"/></td></tr>
<tr></tr>
</table>
</body>
</html>
