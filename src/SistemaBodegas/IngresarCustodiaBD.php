<?php 
session_start();

if($_POST["submit"]=="agregar"){

$ingresado_por=$_POST['NombreF'];
$procedencia=$_POST['unidadp'];
$nombrebodega=$_POST['Bodegas'];
$observacion=$_POST['ObservacionC'];
$tipo=$_POST['Tipos'];
$reservado=$_POST['reservado'];

$_SESSION["ingresadopor"]=$ingresado_por;
$_SESSION["procedencia"]=$procedencia;
$_SESSION["nbodega"]=$nombrebodega;
$_SESSION["obs"]=$observacion;
$_SESSION["tipo"]=$tipo;

$arr=$_SESSION["custodia"];
$arr[]=array($_POST["NInventario"],$_POST["NombreI"],$_POST["periodo"],$_POST["estado"]);
$_SESSION["custodia"]=$arr;
$_SESSION["listcust"]=$arr;
header ("Location: paso.php?c=3");
}
else{
include ("../ReglasNegocio/bodega.php");
include ("../ReglasNegocio/custodia.php");
include ("../ReglasNegocio/asociado.php");
include ("../ReglasNegocio/unidad.php");
include ("../ReglasNegocio/material.php");
$ingresado_por=$_POST['NombreF'];
$procedencia=$_POST['unidadp'];
$nombrebodega=$_POST['Bodegas'];
$observacion=$_POST['ObservacionC'];
$tipo=$_POST['Tipos'];
$custodia = new custodia();
$fecha= time();
$fechaactual=date("Y-m-d h:m:s",$fecha);
$reservado=0;
//checkbox
if($_POST['reservado']=="on"){
$reservado=1;
}
//arreglo lista de materiales en custodia
$arr=$_SESSION["custodia"];
//insertar en custodia
$custodia->Add($ingresado_por,$fechaactual,$tipo,$observacion,$reservado);
//obtener id custodia
$selectcustodia=$custodia->Select2($ingresado_por,$fechaactual,$tipo,$observacion,$reservado);
$rowcustodia=mysql_fetch_array($selectcustodia);
$id_custodia=$rowcustodia["ID_CUSTODIA"];
//obtener id de bodega
$bodega=new bodega();
$selectbodega=$bodega->Select2($nombrebodega);
$rowbodega=mysql_fetch_array($selectbodega);
$id_bodega=$rowbodega["ID_BODEGA"];
//obtener id de la unidad
$unidad=new unidad();
$selectunidad=$unidad->Select2($procedencia);
$rowunidad=mysql_fetch_array($selectunidad);
$id_unidad=$rowunidad["ID_UNIDAD"];
//obtener id de area dependiendo del estado del material
$asociado=new asociado();
$material=new material();
for ($i=0;$i<count($arr);$i++){
	$area="resago";
	if($area[$i][3]=="usado"||$area[$i][3]=="nuevo"){ $area=""; }
	$id_area;
	$selectmaterial=$material->Select($arr[$i][0]);
	$rowmaterial=mysql_fetch_array($selectmaterial);
	if($rowmaterial==null){
		$material->Add($arr[$i][0],$arr[$i][1],0,"un");
	}
	$asociado->Add($id_custodia,$arr[$i][0],$id_area,$id_unidad,$arr[$i][2],$arr[$i][3],0);
}
header ("Location: paso.php?c=3");

//ciclo insetar en material si se debe y obtener el id para insertar en asociado
//numero de inventario = id_material

}

?>