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
<p class="tituloHead">Retiro Material Custodia</p>
</head>
<body>
<table width="700" align="center" class="filaPar">
<tr>
    <td height="31" colspan="6" align="left">
        <p align="left" class="respDetalleAD"> Destino </p>
        <hr></td>
</tr>
<tr>
<td width="130" >Nombre</td>
<td colspan="3"><input name="NombreRC" type="text" id="NombreRC" size="50" /></td>
<td width="112" align="left">Fecha</td>
<td width="136"><script type="text/javascript">//<![CDATA[
   
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
	<td>N° Inventario</td>
	<td width="294"><input type="text" name="ninventario" id="ninventario"/><input type="submit" value="agregar"/></td>
</tr>
<tr>
<td colspan="6"><table width="685" height="104" border="1" align="center">
  <tr>
    <td width="90" height="22" class="titulosTabla">Numero Inventario </td>
    <td width="252" class="titulosTabla">Nombre</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
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
