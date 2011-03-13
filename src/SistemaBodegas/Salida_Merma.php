<?php 
include '../ReglasNegocio/bodega.php';
include '../ReglasNegocio/obra.php';
include '../ReglasNegocio/area.php';
include '../ReglasNegocio/merma.php';
session_start();
$bodega=new bodega();
$obra=new obra();
$area=new area();
$arr=$_SESSION["lista"];
$boton="verifica()";
$boton2="verifica2()";
$merma = new merma();
$folio=$merma->GetMayor()+1;
?>
<script LANGUAGE="JavaScript">

function verifica()
{
	if (document.miform.CodigoMM.value.length==0)
   {
		alert("Debe ingresar un Codigo de Articulo");
		document.miform.CodigoMM.focus();
      	return 0;
	}
	document.miform.submit();
}
function verifica2()
{
	document.miform.submitMerma.value="Ingresar";
	document.miform.submit();
}
</script>
<body>
<form name="miform" action="RetiroMermaBD.php" method="post">
<input type="hidden" name="submitMerma" value="agregar" />
<p class="tituloHead">Salida por Merma</p>
<table width="700" align="center" class="filaPar">
<tr>
    <td height="31" colspan="4" align="left" class="respDetalleAD">Procedencia</td>
</tr>
<tr>
<td width="76" >Bodega</td>
<td width="171"><select name="Bodegas">
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
      </select></td>
      <td>Folio:</td>
      <td><?php echo "ME-$folio";?></td>
      </tr>
      <tr>
<td width="66" align="left">Area</td>
<td width="114"><select name="areas">
	     <?php
		$Allareas = $area->GetAll();
		$claves= array_keys($Allareas);
		$cant = count($Allareas);
		if($cant > 0)
		{
			for ($i=0;$i<$cant;$i++)
			{
							
				echo "<option value=$claves[$i]";
				if($claves[$i]==$_SESSION["nareas"]) echo " selected ";
				echo ">";
				foreach ($Allareas["$claves[$i]"] as $valor)
				{
					echo "$valor</option>";     
				}
			}
		}			
		?>
      </select></td>
<td width="71">Obra</td>
<td width="174"><select name="obras">
	<option>Ninguna</option>
	     <?php
		$AllObras = $obra->GetAll();
		$claves= array_keys($AllObras);
		$cant = count($AllObras);
		if($cant > 0)
		{
			for ($i=0;$i<$cant;$i++)
			{
							
				echo "<option value=$claves[$i]";
				if($claves[$i]==$_SESSION["nobra"]) echo " selected ";
				echo ">";
				foreach ($AllObras["$claves[$i]"] as $valor)
				{
					echo "$valor</option>";     
				}
			}
		}			
		?>
      </select></td>
<tr>
<td>Observacion</td>
<td colspan="3">
  <label>
  <textarea name="obs" cols="72"></textarea>
  </label></td>
<tr>
<td height="31" colspan="4" align="left" class="respDetalleAD"> Materiales</td>
</tr>
<tr>
	<td>Codigo</td>
	<td><input type="text" name="CodigoMM" id="CodigoMM"/></td>
	<td colspan="2"><input type="button" value="Agregar" onclick="<?php echo $boton;?>"/></td>
</tr>
<tr>
	<td colspan="4">
	<table width="680" height="104" border="1" align="center" class="filaPar">
  <tr>
    <td width="77" class="titulosTabla">Codigo</td>
    <td width="460" class="titulosTabla">Detalle Articulo </td>
    <td width="57" class="titulosTabla"><p>Unidad Medida</p></td>
    <td width="58" class="titulosTabla">Cantidad</td>
  </tr>
 <?php 
 for($i=0;$i<count($arr);$i++){ ?>
  <tr>
    <td width="77"><?php echo $arr[$i][0];?></td>
    <td width="460"><?php echo $arr[$i][1];?></td>
     <td width="57"><?php echo $arr[$i][2];?></td>
    <td width="58"><input type="text" name="<?php echo 'cantidad'.$i;?>"/></td>
  </tr>
  <?php }?>
</table>
</td>
</tr>
<tr>
<td colspan="4" align="center"><input type="button" value="Ingresar" onclick="<?php echo $boton2;?>"/></td>
</tr>
</table>
</form>
</body>
<?php 
$au=$_SESSION["autentificado"];
$name=$_SESSION["nombre_usuario"];
$ap=$_SESSION["apellidos_usuario"];
$tipo=$_SESSION["tipo"];
session_unset();
$_SESSION["autentificado"]=$au;
$_SESSION["nombre_usuario"]=$name;
$_SESSION["apellidos_usuario"]=$ap;
$_SESSION["tipo"]=$tipo;
$_SESSION["lista1"]=$arr;
$_SESSION["folio"]=$folio;
?>