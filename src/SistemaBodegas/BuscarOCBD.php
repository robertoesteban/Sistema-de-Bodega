<?php 
session_start();
if($_POST["submit"]=="Buscar"){
include ("../ReglasNegocio/ciudad.php");
include ("../ReglasNegocio/proveedor.php");
include ("../ReglasNegocio/contiene.php");
include ("../ReglasNegocio/material.php");

$numero=$_POST['NumOC'];
if($numero==""){
		$_SESSION["mensajeIM"]="NO HA INGRESADO NUMERO DE ORDEN DE COMPRA PARA BUSCAR";
		header ("Location: paso.php?c=2");
}
else{
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
}}
else{
include("../ReglasNegocio/documento.php");
include("../ReglasNegocio/contiene.php");
include("../ReglasNegocio/obra.php");
include("../ReglasNegocio/stock.php");
//cantidad de materiales
if($_SESSION["size"]==0){
		$_SESSION["mensajeIM"]="NO HAY MATERIAL PARA INGRESAR";
		header ("Location: paso.php?c=2");
	}
else{
//rut proveedor
$rutp1=$_POST["rutp1"];
$rutp2=$_POST["rutp2"];
$rut=$rutp1.'-'.$rutp2;
//numero de la factura o guia
$ndoc=$_POST["NDocumento"];
if($ndoc==""){
		$_SESSION["mensajeIM"]="NO HA INGRESADO LOS DATOS DE FACTURA O GUIA";
		header ("Location: paso.php?c=2");
}
else{
//que tipo de documento es
$tipod=$_POST["tipod"];
//fecha del documento
$fechad=$_POST["fecha_reclamo"];
$r = explode("-",$fechad); 
$fecha=$r[2].'-'.$r[1].'-'.$r[0];
//nombre de la obra
$obra=$_POST["obras"];
//objeto obra para obtener el id de la obra
if($obra=="ninguna"){
$idobra=0;
}
else{
$idobra=$obra;
}
//$obra1=new obra();
//$rowobra=$obra1->Select($obra);
//$idobra=mysql_fetch_array($rowobra);
//observacion
$observ=$_POST["ObservacionDoc"];
//objeto clase contiene
$cont=new contiene();
//objeto clase documento
$doc=new documento();
//objeto clase stock
$stock=new stock();
//lista de materiales
$arr=$_SESSION["lista1"];
//buscar documento
$docs=$doc->Select($ndoc);
//if($docs==null){
	//agregar documento a la bd y obtener el id de este
	$doc->Add($ndoc,$tipod,$fecha,$observ);
	$selctdoc=$doc->Select($ndoc);
	$rowdoc=mysql_fetch_array($selctdoc);
	$iddoc=$rowdoc["ID_DOCUMENTO"]; //id del documento
	
	$con=new Connection();
	/*$sql1="select max(FOLIO_CONTIENE) as mayor from CONTIENE";
	$con->Connect();
	$accion1=mysql_query($sql1); 
	$con->DisConnect();
	$rowcont=mysql_fetch_array($accion1);*/
	$folio=$_SESSION["folio"];
for($i=0;$i<$size;$i++){
	$n="cantidadr".$i;
	$bod=($arr[$i][3])+($_POST["$n"]);
	$numoc=$_SESSION['oc'];
//	echo $folio;
	//FOLIO MAYOR
	if($idobra==0){
		$rowstock=$stock->Select($arr[$i][0]);
		if($rowstock==null){
			//echo "insert";
			$stock->Add($arr[$i][0],0,'0',$_POST["$n"],0);
		}
		else{
			$stock->UpdateC($arr[$i][0],$_POST["$n"]);
		}
	}
	$cont->Add($arr[$i][0],$_SESSION['oc'],$iddoc,$rut,1/*$idobra*/,$folio,$arr[$i][2],$arr[$i][3],$_POST["$n"],0);
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
}}
}
?>