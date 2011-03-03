<?php 
include("../AccesoDatos/Controller.php");
include ("../ReglasNegocio/es_retirado.php");
$retirado = new es_retirado();
$folio=(($retirado->GetMayor())+1);
?>
<body>
<form action="RetirarCustodiaBD.php" method="post">
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
<td width="130" >Nombre</td>
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
	<td width="294"><input type="text" name="ninventario" id="ninventario"/><input name="submit" type="submit" value="agregar"/></td>
</tr>
<tr>
<td colspan="6"><table width="685" height="104" border="1" align="center">
  <tr>
    <td width="90" height="22" class="titulosTabla">Numero Inventario </td>
    <td width="252" class="titulosTabla">Nombre</td>
    </tr>
    <?php $arr=$_SESSION["listrcust"];
     for($i=0;$i<sizeof($arr);$i++){?>
  	<tr>
    <td><?php echo $arr[$i][0];?></td>
    <td><?php echo $arr[$i][1];?></td>
    </tr>
	<?php }?>
</table>
<p> </p></td>
</tr>
<tr>
<td colspan="6" align="center"><!--form action="RetirarCustodiaBD.php" method="post"><a href="RetirarCustodiaBD.php" class="ask"--><input type="submit" name="submit" value="Retirar" /><!-- /a></form--></td>
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