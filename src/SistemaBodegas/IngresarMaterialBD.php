<?php 
include("../ReglasNegocio/documento.php");
include("../ReglasNegocio/contiene.php");

$rutp1=$_POST["rutp1"];
$rutp2=$_POST["rutp2"];
$rut=$rutp1.'-'.$rutp2;
$ndoc=$_POST["NDocumento"];
$tipod=$_POST["tipod"];
$fechad=$_POST["fecha_reclamo"];
$obra=$_POST["obras"];
$observ=$_POST["ObservacionDoc"];
$size=$_SESSION["size"];
$cont=new contiene();
$doc=new documento();
$arr=$_SESSION["lista"];
$docs=$doc->Select($ndoc);
$selectdoc=mysql_fetch_array($docs);
if($selectdoc==null){
$doc->Add($ndoc,$tipod,$fechad,$observ);
for($i=0;$i<$size;$i++){
	$n="cantidadr".$i;
	$bod=($arr[$i][3])+($_POST["$n"]);
	$numoc=$_SESSION['oc'];
	$cont->Add($arr[$i][0],$_SESSION['oc'],$ndoc,$rut,$arr[$i][2],$arr[$i][3],$bod,$_POST["$n"],0);
	$sql="update contiene set CANTIDADBODEGA_CONTIENE=".$bod." where ID_MATERIAL=".$arr[$i][0]. "and NUMERO_OC="."'$numoc'"." and ID_DOCUMENTO='0' AND RUT_PROVEEDOR="."'$rut'";
	$accion=mysql_query($sql); 
}
}
?>