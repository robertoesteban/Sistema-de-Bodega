<?php 
session_start();
if($_POST["submit"]=="Buscar"){
include ("../ReglasNegocio/ciudad.php");
include ("../ReglasNegocio/proveedor.php");
include ("../ReglasNegocio/contiene.php");
include ("../ReglasNegocio/material.php");

$numero=$_POST['NumOC'];
$_SESSION["numoc"]=$numero;
$cont = new contiene();
$ciu=new ciudad();
$ma=new material();
$res=$cont->Select0($numero);
$row=mysql_fetch_array($res);

if($row!=null){
	$prov = $row["RUT_PROVEEDOR"];
	$proveedor = new proveedor();
	$resultado=$proveedor->Select($prov);
	$row2=mysql_fetch_array($resultado);
	$rut = $row2['RUT_PROVEEDOR'];
	$r = explode("-",$rut); 
	$_SESSION["rutp1"]=$r[0];
	$_SESSION["rutp2"]=$r[1];
	$codciudad=$row2["ID_CIUDAD"];
	$row3=$ciu->Select($codciudad);
	$r2=mysql_fetch_array($row3);
	$_SESSION["ciudadp"]=$r2['NOMBRE_CIUDAD'];
	$_SESSION["nombrep"]=$row2['NOMBRE_PROVEEDOR'];
	$_SESSION["direccionp"]=$row2['DIRECCION_PROVEEDOR'];
	$_SESSION["telefonop"]=$row2['FONO_PROVEEDOR'];
	$_SESSION["contactop"]=$row2['CONTACTO_PROVEEDOR'];
	$arrmat=$cont->Select($numero,0,$rut);
	$list=array();
	$materiales=mysql_fetch_array($arrmat);
	$i=0;
	while($materiales!=null){
		$name = $ma->Select($materiales["ID_MATERIAL"]);
		$namem=mysql_fetch_array($name);
		$list[$i]=array($materiales["ID_MATERIAL"],$namem["NOMBRE_MATERIAL"],$materiales["CANTIDADTOTAL_CONTIENE"],$materiales["CANTIDADBODEGA_CONTIENE"],$namem["UNIDADMEDIDA_MATERIAL"]);
		$i++;
		$materiales=mysql_fetch_array($arrmat);
	}
	$_SESSION["lista"]=$list;
	
}
header ("Location: paso.php?c=2");
}
else{
include("../ReglasNegocio/documento.php");
include("../ReglasNegocio/contiene.php");
include("../ReglasNegocio/obra.php");

$rutp1=$_POST["rutp1"];
$rutp2=$_POST["rutp2"];
$rut=$rutp1.'-'.$rutp2;
$ndoc=$_POST["NDocumento"];
$tipod=$_POST["tipod"];
$fechad=$_POST["fecha_reclamo"];
$r = explode("-",$fechad); 
$fecha=$r[2].'-'.$r[1].'-'.$r[0];
$obra=$_POST["obras"];
$obra1=new obra();
$rowobra=$obra1->Select($obra);
$idobra=mysql_fetch_array($rowobra);
$observ=$_POST["ObservacionDoc"];
$size=$_SESSION["size"];
$cont=new contiene();
$doc=new documento();
$arr=$_SESSION["lista1"];
$docs=$doc->Select($ndoc);
//if($docs==null){
	$doc->Add($ndoc,$tipod,$fecha,$observ);
	$selctdoc=$doc->Select($ndoc);
	$rowdoc=mysql_fetch_array($selctdoc);
	$iddoc=$rowdoc["ID_DOCUMENTO"];
for($i=0;$i<$size;$i++){
	$n="cantidadr".$i;
	$bod=($arr[$i][3])+($_POST["$n"]);
	$numoc=$_SESSION['oc'];
	//FOLIO MAYOR
	$con=new Connection();
	$con->Connect();
	$sql1="select max(FOLIO_CONTIENE) as mayor from CONTIENE";
	$accion1=mysql_query($sql1); 
	$con->DisConnect();
	$cont->Add($arr[$i][0],$_SESSION['oc'],$iddoc,$rut,1,($accion1["mayor"]+1),$arr[$i][2],$arr[$i][3],$_POST["$n"],0);
	$sql="update CONTIENE set CANTIDADBODEGA_CONTIENE=".$bod." where ID_MATERIAL=".$arr[$i][0]. " and NUMERO_OC="."'$numoc'"." and ID_DOCUMENTO='0' AND RUT_PROVEEDOR="."'$rut'"." AND ID_OBRA=0"." AND FOLIO_CONTIENE=0";
	//echo $sql;
	$con->Connect();
	$accion=mysql_query($sql); 
	$con->DisConnect();
}
//}
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
header ("Location: paso.php?c=2");
}
?>