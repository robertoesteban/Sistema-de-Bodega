<?php 
include '../ReglasNegocio/bodega.php';
include '../ReglasNegocio/unidad.php';
include ("../ReglasNegocio/asociado.php");
$asociado = new asociado();
$folio=(($asociado->GetMayor())+1);

	$unidad=new unidad();
	$bodega=new bodega();
$boton="verifica()";
$boton2="verifica2()";
?>
<script LANGUAGE="JavaScript">

function verifica()
{
	if (document.miform.NInventario.value.length==0)
   {
		alert("Debe ingresar un Numero de Inventario");
		document.miform.MInventario.focus();
      	return 0;
	}
	if(document.miform.NombreI.value.length==0){
		alert("Debe ingresar un Nombre de Inventario");
		document.miform.NombreI.focus();
      	return 0;
	}
	if(document.miform.periodo.value.length==0){
		alert("Debe ingresar un Periodo, si es indefinido ingrese '-1'");
		document.miform.periodo.focus();
      	return 0;
	}
	document.miform.submit();
	
}
function verifica2()
{
	if(document.miform.NombreF.value.length==0){
		alert("Debe seleccionar un Nombre de Funcionario");
      	return 0;
	}
	else{
	document.miform.submitC.value="Ingresar";
	document.miform.submit();
	}
}
</script>
<body>
<form name="miform" action="IngresarCustodiaBD.php" method="post"><input
	type="hidden" name="submitC" value="agregar" />
<p class="tituloHead">Ingresar Material Custodia</p>
<p align="center" class="tituloError"><?php echo $_SESSION["MensajeIC"];?></p>
<table width="700" align="center" class="filaPar">
<tr>
    <td height="31" colspan="6" align="left">
        <p align="left" class="respDetalleAD"> Procedencia </p>
    <hr></td>
</tr>
<tr>
<td>Folio:</td>
<td colspan="5"><label>INC-<?php echo $folio;?></label></td>
</tr>
<tr>
<td width="87" align="left">Nombre Funcionario</td>
<td colspan="5"><input name="NombreF" type="text" id="NombreF" size="86" value="<?php echo $_SESSION["ingresadopor"]; ?>" /></td>
<tr>
<tr>
	
	<td>Procedencia</td>
	<td colspan="5"><select name="unidadp">
      <?php
		$Allunidad = $unidad->GetAll();
		$claves= array_keys($Allunidad);
		$cant = count($Allunidad);
		if($cant > 0)
		{
			for ($i=0;$i<$cant;$i++)
			{
							
				echo "<option value=$claves[$i]";
				if($claves[$i]==$_SESSION["procedencia"]) echo " selected ";
				echo ">";
				foreach ($Allunidad["$claves[$i]"] as $valor)
				{
					echo "$valor</option>";     
				}
			}
		}			
		?>
    </select></td>
<tr>
<td colspan="6">
<p class="respDetalleAD">Recepcion</p>
	  <hr></td>
</tr>
<tr>
	<td>Bodega</td>
	<td colspan="5"><label>
	  <select name="Bodegas">
	     <?php
		$AllBodegas = $bodega->GetAll();
		$claves= array_keys($AllBodegas);
		$cant = count($AllBodegas);
		if($cant > 0)
		{
			for ($i=0;$i<$cant;$i++)
			{
							
				echo "<option value=$claves[$i]";
				if($claves[$i]==$_SESSION["nbodega"]) echo " selected ";
				echo ">";
				foreach ($AllBodegas["$claves[$i]"] as $valor)
				{
					echo "$valor</option>";     
				}
			}
		}			
		?>
      </select>
	</label>	</td>
	<tr><td>Observacion</td>
	<td colspan="5" align="left">
    <textarea name="ObservacionC" cols="85" rows="3" id="ObservacionC" value="<?php echo $_SESSION["obs"];?>"></textarea>	</td></tr>
</tr>
<tr>
<td>Tipo</td>
<td><label></label>
  <select name="Tipos">
    <option>Normal</option>
    <option <?php if($_SESSION["tipo"]=="Especial") echo 'selected' ?>>Especial</option>
  </select></td>
<td colspan="4">Reservado
  <input type="checkbox" name="reservado"></td>
</tr>
<tr>
	<td colspan="6" align="left"><p>&nbsp;</p>
	  <p class="respDetalleAD">Materiales</p>
	  <hr></td>
</tr>
<tr>
		<td>N&deg; Inventario</td>
		<td><input name="NInventario" type="text" id="NInventario" size="15"/></td>
		<td>Detalle Articulos</td>
	  <td width="430" colspan="3"><input name="NombreI" type="text" id="NombreI" size="54"/></td>
  </tr>
	<tr>
		<td>Periodo(dias)</td>
	  <td width="93"><input type="text" name="periodo" size="15" onkeypress="if ((event.keyCode!=8 && event.keyCode < 45) || event.keyCode > 57) event.returnValue = false;"/></td>
	  <td> (-1 para indefinido)</td>
		<td width="70">Estado</td>
		<td colspan="2"><label>
	  <select name="estado">
	    <option selected>Usado</option>
	    <option>Mal Estado</option>
	    <option>nuevo</option>
      </select>
	</label><input type="button" name="submit1" value="agregar" onclick="<?php echo $boton;?>"/></td>
	</tr>
<tr>
<td colspan="6"><table width="685" height="104" border="1" align="center" class="filaPar">
  <tr>
    <td width="90" height="22" class="titulosTabla">Numero Inventario </td>
    <td width="252" class="titulosTabla">Detalle Articulo</td>
    <td width="90" class="titulosTabla">Periodo (dias) </td>
    <td width="225" class="titulosTabla">Estado </td>
    </tr>
    <?php $arr=$_SESSION["listcust"];
     for($i=0;$i<count($arr);$i++){?>
  <tr>
    <td><?php echo $arr[$i][0]; ?></td>
    <td><?php echo $arr[$i][1]; ?></td>
    <td><?php echo $arr[$i][2]; ?></td>
    <td><?php echo $arr[$i][3]; ?></td>
    </tr>
    <?php } ?>
</table>
<p> </p></td>
</tr>
<tr>
<td colspan="6" align="center"><input type="button" name="submit1" value="Guardar" onclick="<?php echo $boton2;?>" />
  <input type="submit" name="Imprimir2" value="Imprimir" /></td>
</tr>
</table>
<?php $au=$_SESSION["autentificado"];
$name=$_SESSION["nombre_usuario"];
$ap=$_SESSION["apellidos_usuario"];
$tipo=$_SESSION["tipo"];
session_unset();
$_SESSION["autentificado"]=$au;
$_SESSION["nombre_usuario"]=$name;
$_SESSION["apellidos_usuario"]=$ap;
$_SESSION["tipo"]=$tipo;
$_SESSION["custodia"]=$arr;
$_SESSION["folio_custodia"]=$folio;?>
</form>
</body>
