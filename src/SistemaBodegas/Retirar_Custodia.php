<?php 
include("../AccesoDatos/Controller.php");
include ("../ReglasNegocio/es_retirado.php");
$retirado = new es_retirado();
$folio=(($retirado->GetMayor())+1);
$boton="verifica()";
$boton2="verifica2()";
?>
<script LANGUAGE="JavaScript">

function verifica()
{
	if (document.miform.ninventario.value.length==0)
   {
		alert("Debe ingresar un Numero de Inventario");
		document.miform.MInventario.focus();
      	return 0;
	}
	document.miform.submit();
	
}
function verifica2()
{
	if(document.miform.NombreRC.value.length==0){
		alert("Debe seleccionar un Nombre de Funcionario que retira");
      	return 0;
	}
	else{
	document.miform.submitRC.value="Ingresar";
	document.miform.submit();
	}
}
</script>
<body>
<form name="miform" action="RetirarCustodiaBD.php" method="post">
<input
	type="hidden" name="submitRC" value="agregar" />
<p class="tituloHead">Retiro Material Custodia</p>
<p align="center" class="tituloError"><?php echo $_SESSION["mensaje"];?></p>
<table width="700" align="center" class="filaPar">
<tr>
    <td height="31" colspan="6" align="left">
        <p align="left" class="respDetalleAD"> Destino </p>
        <hr></td>
</tr>
<tr>
<td>Folio: </td>
<td>RTC-<?php echo $folio;?></td>
</tr>
<tr>
<td width="130" >Nombre Funcionario</td>
<td colspan="3"><input name="NombreRC" type="text" id="NombreRC" size="50" value="<?php echo $_SESSION["nombre"];?>"/></td>
</tr>
<tr>
	<td height="30">Observacion</td>
	<td colspan="5">
	  <label>
	    <textarea name="obs" cols="83"><?php echo $_SESSION["obs"];?></textarea>
	    </label>
	</td>
<tr>
	<td colspan="6" align="left"><p>&nbsp;</p>
	  <p class="respDetalleAD">Materiales</p>
	  <hr></td>
</tr>
<tr>
	<td>N&deg; Inventario</td>
	<td width="294"><input type="text" name="ninventario" id="ninventario"/><input name="submit1" type="button" value="agregar" onclick="<?php echo $boton;?>"/></td>
</tr>
<tr>
<td colspan="6"><table width="685" height="104" border="1" align="center">
  <tr>
    <td width="90" height="22" class="titulosTabla">Numero Inventario </td>
<<<<<<< HEAD
    <td width="202" class="titulosTabla">Detalle</td>
=======
    <td width="202" class="titulosTabla">Detalle Articulo</td>
>>>>>>> 296e776444bc4ff6a1f032d3a709d3a6c9b39743
	<td width="50" class="tituloSTabla">Dias en Custodia</td> 
    </tr>
    <?php $arr=$_SESSION["listrcust"];
     for($i=0;$i<sizeof($arr);$i++){?>
  	<tr>
    <td><?php echo $arr[$i][0];?></td>
    <td><?php echo $arr[$i][1];?></td>
	<td><?php echo $arr[$i][2];?></td>
    </tr>
	<?php }?>
</table>
<p> </p></td>
</tr>
<tr>
<td colspan="6" align="center"><!--form action="RetirarCustodiaBD.php" method="post"><a href="RetirarCustodiaBD.php" class="ask"--><input type="button" name="submit1" value="Retirar" onclick="<?php echo $boton2;?>" /><!-- /a></form--></td>
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
$_SESSION["rcustodia"]=$arr;
$_SESSION["folio_rcustodia"]=$folio;?>
</form>
</body>
