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
if($_POST["NImventario"]==""||$_POST["NombreI"]==""||$_POST["periodo"]==""){
$_SESSION["MensajeIC"]="NO HA INGRESADO TODOS LOS DATOS DEL MATERIAL";
}
else{
$arr=$_SESSION["custodia"];
$arr[]=array($_POST["NInventario"],$_POST["NombreI"],$_POST["periodo"],$_POST["estado"]);
$_SESSION["custodia"]=$arr;
$_SESSION["listcust"]=$arr;
}
header ("Location: paso.php?c=3");
}
else{
include ("../ReglasNegocio/bodega.php");
include ("../ReglasNegocio/custodia.php");
include ("../ReglasNegocio/asociado.php");
include ("../ReglasNegocio/unidad.php");
include ("../ReglasNegocio/material.php");
$ingresado_por=$_POST['NombreF'];
if($ingresado_por==""){
$_SESSION["MensajeIC"]="NO HA INGRESADO NOMBRE DE FUNCIONARIO";
}
else{
$procedencia=$_POST['unidadp'];
$id_bodega=$_POST['Bodegas'];
$observacion=$_POST['ObservacionC'];
$tipo=$_POST['Tipos'];
$custodia = new custodia();
$fecha= time();
$fechaactual=date("Y-m-d",$fecha);
$reservado=0;
//checkbox
if($_POST['reservado']=="on"){
$reservado=1;
}
//arreglo lista de materiales en custodia
$arr=$_SESSION["custodia"];
if(count($arr)==0){
$_SESSION["MensajeIC"]="NO HAY MATERIAL PARA INGRESAR A CUSTODIA";
}
else{
//insertar en custodia
$custodia->Add($ingresado_por,$fechaactual,$tipo,$observacion,$reservado);
//obtener id custodia
$selectcustodia=$custodia->Select2($ingresado_por,$fechaactual,$tipo,$observacion,$reservado);
$rowcustodia=mysql_fetch_array($selectcustodia);
$id_custodia=$rowcustodia["ID_CUSTODIA"];

//obtener id de area dependiendo del estado del material
$asociado=new asociado();
$material=new material();
for ($i=0;$i<count($arr);$i++){
//asignar area
	$area="resago";
	if($arr[$i][3]=="usado"||$arr[$i][3]=="nuevo"){ $area="usado"; }
	
	$id_area=2;
//	agregar a material si es que no esta
	$selectmaterial=$material->Select($arr[$i][0]);
	$rowmaterial=mysql_fetch_array($selectmaterial);
	if($rowmaterial==null){
		$material->Add($arr[$i][0],$arr[$i][1],0,"un");
	}
//agregar a asociado
	$asociado->Add($id_custodia,$arr[$i][0],$id_area,$id_bodega,$procedencia,$_SESSION["folio_custodia"],$arr[$i][2],$arr[$i][3],0);
}
}}
header ("Location: paso.php?c=3");

//ciclo insetar en material si se debe y obtener el id para insertar en asociado
//numero de inventario = id_material

}

?>