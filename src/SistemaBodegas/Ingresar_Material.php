<?php session_start();
$boton="verifica()";
$boton2="verifica2()";
include ("../AccesoDatos/Controller.php");
include ("../ReglasNegocio/contiene.php");
include ("../ReglasNegocio/obra.php");
$contiene = new contiene();
$obra=new obra();
$folio=(($contiene->GetMayor())+1);
?>
<script LANGUAGE="JavaScript">

function verifica()
{
	if (document.miform.NumOC.value.length==0)
   {
		alert("Debe ingresar un Codigo");
		document.miform.NumOC.focus();
      	return 0;
	}
	document.miform.submit();
	
}
function verifica2()
{
	if(document.miform.NDocumento.value.length==0){
		alert("Debe ingresar numero de la factura o guia");
		document.form.NDocumento.focus();
      	return 0;
	}
	if(document.miform.fecha_reclamo.value.length==0){
		alert("Debe seleccionar la fecha del documento");
      	return 0;
	}else{
	document.miform.submitI.value="Ingresar";
	document.miform.submit();
	}
}
</script>
<body>
<form name="miform" action="BuscarOCBD.php" method="post"><input
	type="hidden" name="submitI" value="Buscar" />
<p class="tituloHead">Ingresar Material Bodega</p>
<p align="center" class="tituloError"><?php echo $_SESSION["mensajeIM"];?></p>
<table width="700" align="center" class="filaPar">
	<tr>
		<td height="31" colspan="6" align="left">
		<p align="left" class="respDetalleAD">Orden de Compra</p>
		<hr>
		</td>
	</tr>
	<tr>
		<td width="98" align="left">Numero O.C.</td>
		<td width="158"><input name="NumOC" type="text"
			value="<?php echo $_SESSION["numoc"]; ?>" /></td>
		<td width="105"><input type="button" name="submit1" value="Buscar"
			onclick="<?php echo $boton; ?>" /></td>
		<td><a href="Buscar.php" target="_blank">Buscar por Proveedor</a></td>
		<td align="right">Folio:</td>
		<td><label name="folio">INM-<?php echo $folio;?></label></td>

		
	
	<tr>
		<td colspan="6" align="left">
		
		
		
		<p>&nbsp;</p>
      <p class="respDetalleAD">Proveedores</p>
    <hr></td>
</tr>
<tr>
    <td>R.U.T.</td>
    <td><input size="17" name="rutp1" type="text"
			value="<?php echo $_SESSION["rutp1"];?>" />
   <input size="1" name="rutp2" type="text"
			value="<?php echo $_SESSION["rutp2"];?>" /></td>
    <td>Nombre Proveedor</td>
    <td colspan="3"><input name="NombreP" type="text"
			value="<?php echo $_SESSION["nombrep"];?>" size="55" /></td>

</tr>
<tr>
    <td>Ciudad</td>
    <td><input name="ciudadP" type="text"
			value="<?php echo $_SESSION["ciudadp"];?>" /></td>
    <td>Direccion</td>
    <td colspan="3"><input name="direccionP" type="text"
			value="<?php echo $_SESSION["direccionp"];?>" size="55" /></td>
</tr>
<tr>
	<td>Telefono</td>
    <td><input name="telefonoP" type="text" id="telefonoP"
			value="<?php echo $_SESSION["telefonop"];?>" /></td>
    <td>Contacto</td>
    <td colspan="3"><input name="contactoP" type="text" id="contactoP"
			value="<?php echo $_SESSION["contactop"];?>" size="55" /></td>
</tr>
<tr>
<td colspan="6">
<p class="respDetalleAD">Factura o Guia</p>
	  <hr>
</td>
</tr>
<tr>
	<td>N&deg; Factura o Guia</td>
	<td><input name="NDocumento" type="text" id="NDocumento" /></td>
	<td>Tipo de Documento</td>
	<td width="85"><label>
	  <select name="tipod">
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
        <input readonly="" name="fecha_reclamo" id="fecha_reclamo"
			size="8" maxlength="8" />
				<!--button id="f_rangeEnd_trigger" >...</button--><a
			id="f_rangeEnd_trigger" href="#">Calendario</a>
		<!--button id="f_clearRangeEnd" onclick="clearRangeEnd()">clear</button-->
		<script type="text/javascript">
                  //function CalendarJC(){
				  new Calendar({
                          inputField: "fecha_reclamo",
                          dateFormat: "%d-%m-%Y",
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
      </script>
		</td>
	</tr>
	
	
	
	

	
	
	
	
	
	<tr>
	<td>Obra</td>
	<td><select name="obras">
      <option>Ninguna</option>
      <?php
      $Allobra = $obra->GetAll();
      $claves= array_keys($Allobra);
      $cant = count($Allobra);
      if($cant > 0)
      {
      for ($i=0;$i<$cant;$i++)
      {
       
      echo "<option value=$claves[$i]";
      if($claves[$i]==$id_obra) echo " selected ";
      echo ">";
      foreach ($Allobra["$claves[$i]"] as $valor)
      {
      echo "$valor</option>";
      }
      }
      }
      ?>
    </select></td>
	<td>Observacion</td>
	<td colspan="3" rowspan="2">
	    <textarea name="ObservacionDoc" cols="53" id="ObservacionDoc"></textarea>
	</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><label></label>
</td>
</tr>
<tr>
	<td colspan="6" align="left">
		
		
		
		<p>&nbsp;</p>
	  <p class="respDetalleAD">Materiales</p>
	  <hr></td>
</tr>
<tr>
<td colspan="6">
		
		
		
		<table width="680" height="104" border="1" align="center"
			class="filaPar">
  <tr>
    <td width="57" height="22" class="titulosTabla">Codigo</td>
    <td width="314" class="titulosTabla">Nombre</td>
    <td width="35" class="titulosTabla">Unidad</td>
    <td width="47" class="titulosTabla">Cantidad total </td>
	 <td width="53" class="titulosTabla">Cantidad en Bodega </td>
    <td width="59" class="titulosTabla">Cantidad recibida </td>
  </tr>
  <?php $arr=$_SESSION["lista"];
  for($i=0;$i<count($arr);$i++){ ?>
  <tr>
    <td><?php echo $arr[$i][0];?></td>
    <td><?php echo $arr[$i][1];?></td>
    <td><?php echo $arr[$i][4];?></td>
    <td><?php echo $arr[$i][2];?></td>
    <td><?php echo $arr[$i][3];?></td>
    <td align="center"><input name="<?php echo "cantidadr".$i;?>"
					type="text" size="3"
					onkeypress="if ((event.keyCode!=8 && event.keyCode < 45) || event.keyCode > 57) event.returnValue = false;" /></td>
  </tr>
  <?php }?>
  </table>
  </td>
  </tr>
  <tr>
  <td colspan="6" align="center"><input type="button" name="submit1" value="Ingresar" onclick="<?php echo $boton2;?>" /></td>
  </tr>
  <?php
  $au=$_SESSION["autentificado"];
  $name=$_SESSION["nombre_usuario"];
  $ap=$_SESSION["apellidos_usuario"];
  $num=$_SESSION["numoc"];
  $tipo=$_SESSION["tipo"];
  session_unset();
  $_SESSION["autentificado"]=$au;
  $_SESSION["nombre_usuario"]=$name;
  $_SESSION["apellidos_usuario"]=$ap;
  $_SESSION["tipo"]=$tipo;
$_SESSION["size"]=count($arr);
$_SESSION["lista1"]=$arr;
$_SESSION["oc"]=$num;
$_SESSION["folio"]=$folio;?>
</table>
</form>
</body>
