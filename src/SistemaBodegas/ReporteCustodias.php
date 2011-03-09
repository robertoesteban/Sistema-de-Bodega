<?php
include("../AccesoDatos/Controller.php");
include("../ReglasNegocio/custodia.php");
include("../ReglasNegocio/asociado.php");
include("../ReglasNegocio/material.php");
$custodia=new custodia();
$asociado=new asociado();
$sasocuado=$asociado->getAll2();
$rowas=mysql_fetch_array($sasocuado);
?>

<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script language="javascript">
$(document).ready(function() {
	$(".botonExcel").click(function(event) {
		$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
		$("#form1").submit();
	});
});
</script>
<style type="text/css">
.botonExcel{cursor:pointer;}
</style>
<body>
<form name="form1" id="form1" method="post" action="ficheroExcel.php">
<p align="center" class="tituloHead">Reporte de Custodias</p>
<table id="Exportar_a_Excel" align="center" class="filaPar" width="700" >
<tr>
<td class="titulosTabla" align="center">Unidad</td>
<td align="center" class="titulosTabla">area</td>
<td align="center" class="titulosTabla">Bodega</td>
<td align="center" class="titulosTabla">Material</td>
<td align="center" class="titulosTabla">Procedencia</td>
<td align="center" class="titulosTabla">Fecha Ingreso</td>
<td align="center" class="titulosTabla">Periodo</td>
</tr>
<?php while($rowas!=null){
$sarea=$asociado->getArea($rowas["ID_AREA"]);
$rowarea=mysql_fetch_array($sarea);
?>
<tr>
<td align="center" class="filaPar"><?php echo $rowas["NOMBRE_UNIDAD"];?></td>
<td align="center" class="filaPar"><?php echo $rowarea["NOMBRE_AREA"];?></td>
<td align="center" class="filaPar"><?php echo $rowas["NOMBRE_BODEGA"];?></td>
<td align="center" class="filaPar"><?php echo $rowas["NOMBRE_MATERIAL"];?></td>
<td align="center" class="filaPar"><?php echo $rowas["INGRESADOPOR_CUSTODIA"];?></td>
<td align="center" class="filaPar"><?php echo $rowas["FECHAINGRESO_CUSTODIA"];?></td>
<td align="center" class="filaPar"><?php echo $rowas["PERIODO_ASOCIADO"]." dias";?></td>
</tr>
<?php 
$rowas=mysql_fetch_array($sasocuado);
}
?>
</table>
<p align="center">Exportar a Excel  <img src="export_to_excel.gif" class="botonExcel" /></p>
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form>
</body>