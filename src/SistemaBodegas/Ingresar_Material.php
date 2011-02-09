<html>
<head>
<SCRIPT LANGUAGE="JavaScript" SRC="../funcionesJC/ValidaRut.js"></SCRIPT><!-- JC -->
<link type="text/css" rel="stylesheet" href="CalendarioJC/src/css/jscal2.css" />
<link type="text/css" rel="stylesheet" href="CalendarioJC/src/css/border-radius.css" />

    <!-- <link type="text/css" rel="stylesheet" href="src/css/reduce-spacing.css" /> -->
    <link id="skin-win2k" title="Win 2K" type="text/css" rel="alternate stylesheet" href="CalendarioJC/src/css/win2k/win2k.css" />
    <link id="skin-steel" title="Steel" type="text/css" rel="alternate stylesheet" href="CalendarioJC/src/css/steel/steel.css" />
    <link id="skin-gold" title="Gold" type="text/css" rel="alternate stylesheet" href="CalendarioJC/src/css/gold/gold.css" />
    <link id="skin-matrix" title="Matrix" type="text/css" rel="alternate stylesheet" href="CalendarioJC/src/css/matrix/matrix.css" />
    <link id="skinhelper-compact" type="text/css" rel="alternate stylesheet" href="CalendarioJC/src/css/reduce-spacing.css" />
    <script src="CalendarioJC/src/js/jscal2.js"></script>
    <script src="CalendarioJC/src/js/lang/es.js"></script>
    <script src="CalendarioJC/src/js/lang/en.js"></script>

<link href="css/estiloMozilla.css" rel="stylesheet" type="text/css">
<p class="tituloHead">Ingresar Material Bodega</p>
</head>
<body>
<table width="700" align="center" class="filaPar">
<tr>
    <td height="31" colspan="6" align="left">
        <p align="left" class="respDetalleAD"> Orden de Compra </p>
    <hr></td>
</tr>
<tr>
<td width="98" align="left">Numero O.C.</td>
<td width="158"><input name="NumOC" type="text" id="NumOC" /></td>
<td width="105"><input type="submit" name="BuscarOC" value="Buscar" /></td>
<td colspan="3"><a href="Buscar.php">Buscar por Proveedor</a> </td>
<tr>
    <td colspan="6" align="left"><p>&nbsp;</p>
      <p class="respDetalleAD">Proveedores</p>
    <hr></td>
</tr>
<tr>
    <td>R.U.T.</td>
    <td><input size="17" name="rutp1" type="text" id="rutp1" />
   <input size="1" name="rutp2" type="text" id="rutp2" /></td>
    <td>Nombre Proveedor</td>
    <td colspan="3"><input name="NombreP" type="text" id="NombreP" size="55"/></td>

</tr>
<tr>
    <td>Ciudad</td>
    <td><input name="direccionP" type="text" id="direccionP"/></td>
    <td>Direccion</td>
    <td colspan="3"><input name="ciudadP" type="text" id="ciudadP" size="55"/></td>
</tr>
<tr>
	<td>Telefono</td>
    <td><input name="telefonoP" type="text" id="telefonoP"/></td>
    <td>Contacto</td>
    <td colspan="3"><input name="contactoP" type="text" id="contactoP" size="55"/></td>
</tr>
<tr>
<td colspan="6">
<p class="respDetalleAD">Factura o Guia</p>
	  <hr>
</td>
</tr>
<tr>
	<td>N° Factura o Guia</td>
	<td><input name="NDocumento" type="text" id="NDocumento"/></td>
	<td>Tipo de Documento</td>
	<td width="85"><label>
	  <select name="select">
	    <option>Factura</option>
	    <option>Guia</option>
      </select>
	</label></td>
	<td width="107">Fecha Documento</td>
	<td width="134"><script type="text/javascript">//<![CDATA[
   
                  LEFT_CAL.addEventListener("onSelect", function(){
                          var ta = document.getElementById("f_selection");
                          ta.value = this.selection.countDays() + " days selected:\n\n" + this.selection.print("%Y/%m/%d").join("\n");
                  });

                //]]></script>
        <input readonly="" name="fecha_reclamo" id="fecha_reclamo" size="8" maxlength="8" />
				<!--button id="f_rangeEnd_trigger" >...</button-->
				<a id="f_rangeEnd_trigger" href="#">Calendario</a>
    <!--button id="f_clearRangeEnd" onclick="clearRangeEnd()">clear</button-->      
	<script type="text/javascript">
                  //function CalendarJC(){
				  new Calendar({
                          inputField: "fecha_reclamo",
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
                          document.getElementById("fecha_reclamo").value = "";
                          LEFT_CAL.args.max = null;
                          LEFT_CAL.redraw();
                  };*/
      </script></td>
</tr>
<tr>
	<td>Obra</td>
	<td><select name="select2">
      <option>Ninguna</option>
      <option>Obra 1</option>
    </select></td>
	<td>Observacion</td>
	<td colspan="3" rowspan="2"><form name="form1" method="post" action="">
	  <label>
	    <textarea name="ObservacionDoc" cols="53" id="ObservacionDoc"></textarea>
	    </label>
	  </form>
	</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><label></label>
</td>
</tr>
<tr>
	<td colspan="6" align="left"><p>&nbsp;</p>
	  <p class="respDetalleAD">Materiales</p>
	  <hr></td>
</tr>
<tr>
<td colspan="6"><table width="680" height="104" border="1" align="center">
  <tr>
    <td width="97" height="22" class="titulosTabla">Codigo</td>
    <td width="314" class="titulosTabla">Nombre</td>
    <td width="35" class="titulosTabla">Unidad</td>
    <td width="47" class="titulosTabla">Cantidad total </td>
	 <td width="53" class="titulosTabla">Cantidad en Bodega </td>
    <td width="59" class="titulosTabla">Cantidad recibida </td>
    <td width="29" class="titulosTabla">OK</td>
  </tr>
  <tr>
    <td><input name="cod1" type="text" id="cod1" size="15"/></td>
    <td>&nbsp;</td>
    <td><input name="uni1" type="text" id="uni1" size="5"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><form name="form2" method="post" action="">
      <label>
        <input name="checkbox" type="checkbox" value="checkbox" checked>
      </label>
    </form>    </td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
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
