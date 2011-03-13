<?php session_start(); 
include ("../AccesoDatos/Controller.php");
include ("../ReglasNegocio/contiene.php");
include ("../ReglasNegocio/ejecuta.php");
include ("../ReglasNegocio/obra.php");
include '../ReglasNegocio/unidad.php';
$contiene = new contiene();
$ejecuta=new ejecuta();
$unidad=new unidad();
$obra=new obra();
$folio=(($ejecuta->GetMayor())+1);
$boton="verifica()";
$boton2="verifica2()";
?>
<script LANGUAGE="JavaScript">

function verifica()
{
	if (document.miform.codigom.value.length==0)
   {
		alert("Debe ingresar un Codigo de Material");
		document.miform.codigom.focus();
      	return 0;
	}
	document.miform.submit();
	
}
function verifica2()
{
	if(document.miform.nombreD.value.length==0){
		alert("Debe seleccionar un Nombre del destinatario del material");
      	return 0;
	}
	else{
	document.miform.submitRM.value="Retirar";
	document.miform.submit();
	}
}
</script>
<body>
<form name="miform" action="RetirarMaterialBD.php" method="post">
<input type="hidden" name="submitRM" value="Agregar" />
<p class="tituloHead">Retiro Material Bodega</p>
<p><?php echo $_SESSION["RTMensaje"];?></p>
<table width="700" align="center" class="filaPar">
<tr>
<td colspan="6">
<p class="respDetalleAD">Destino</p>
	  <hr>
</td>
</tr>
<tr>
	<td>Nombre</td>
	<td colspan="3"><input type="text" name="nombreD" id="nombreD" size="49"/>
</td>
	<td>Obra</td>
<td><label>
	  <select name="obras">
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
      </select>
	</label>
</td>

</tr>
<tr>
	<td>Destino</td>
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
</tr>
<tr>
	<td>Motivo</td>
	<td colspan="5">
	    <textarea name="motivo" cols="79"></textarea>
	</td>
</tr>
<tr>
	<td colspan="6" align="left"><p>&nbsp;</p>
	  <p class="respDetalleAD">Materiales</p>
	  <hr></td>
</tr>
<tr>
		<td>Codigo</td>
		<td><input name="codigom" type="text""/></td>
		<td><input type="button" value="Agregar" name="submit1" onclick="<?php echo $boton;?>"/></td>
		<td colspan="3"> </td>
  </tr>

<tr>
<td colspan="6"><table width="680" height="104" border="1" align="center" class="filaPar">
  <tr>
    <td width="57" height="22" class="titulosTabla">Codigo</td>
    <td width="314" class="titulosTabla">Nombre</td>
	 <td width="53" class="titulosTabla">Cantidad en Bodega </td>
    <td width="59" class="titulosTabla">Cantidad </td>
  </tr>
  <?php $arr=$_SESSION["lista"];
  for($i=0;$i<count($arr);$i++){ ?>
  <tr>
    <td><?php echo $arr[$i][0];?></td>
    <td><?php echo $arr[$i][1];?></td>
    <td><?php echo $arr[$i][2];?></td>
    <td align="center"><input name="<?php echo "cantidad".$i;?>" type="text" size="3" onkeypress="if ((event.keyCode!=8 && event.keyCode < 45) || event.keyCode > 57) event.returnValue = false;"/></td>
  </tr>
  <?php }?>
  </table>
  </td>
</tr>
<tr>
<td colspan="6" align="center"><input type="button" name="input1" value="Retirar" onclick="<?php echo $boton2;?>" /></td>
</tr>
</table>
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
</form>
</body>