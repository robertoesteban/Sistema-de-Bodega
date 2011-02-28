<?php
require_once("XML.inc.php");

class LeerXML{


function __construct(){}
function leer($oc){
session_start();
//$xml_file="./demo.xml";
$xml_file="./OC/Orden_".$oc.".xml";
#$xml_data=implode("",file($xml_file)); //get XML data for alternative direct parsing

$xml=new XML();
$xml->file_read($xml_file);
#$xml->parse($xml_data); //parse direct XML data
$xml->parse();
#$xml->debug();

//Samples...
//echo $xml->demo->tag1->_param["say"];
//echo $xml->demo->tag4->item[1]->_value;
$_SESSION["numoc"]=$oc;
$fecha=$xml->OrdersResults->OrdersList->Order->OrderHeader->OrderDates->PromiseDate->_value;
$fechaoc=explode("T",$fecha);
$_SESSION["fechaoc"]=$fechaoc[0];
$_SESSION["depto"]=$xml->OrdersResults->OrdersList->Order->OrderHeader->OrderParty->BuyerParty->NameAddress->Name1->_value;
$rut = $xml->OrdersResults->OrdersList->Order->OrderHeader->OrderParty->SellerParty->PartyID->Ident->_value;
$r = explode(".",$rut); 
$rut2=$r[0].$r[1].$r[2];
$r2= explode("-",$rut2);
$_SESSION["rutp1"]=$r2[0];
$_SESSION["rutp2"]=$r2[1];
$_SESSION["namep"]=$xml->OrdersResults->OrdersList->Order->OrderHeader->OrderParty->SellerParty->NameAddress->Name1->_value;
$_SESSION["direccionp"]=$xml->OrdersResults->OrdersList->Order->OrderHeader->OrderParty->SellerParty->NameAddress->District->_value;
$_SESSION["ciudadp"]=$xml->OrdersResults->OrdersList->Order->OrderHeader->OrderParty->SellerParty->NameAddress->City->_value;
$_SESSION["contactop"]=$xml->OrdersResults->OrdersList->Order->OrderHeader->OrderParty->SellerParty->PrimaryContact->ContactName->_value;
$_SESSION["telefonop"]=$xml->OrdersResults->OrdersList->Order->OrderHeader->OrderParty->SellerParty->PrimaryContact->ListOfContactNumber->ContactNumber[1]->ContactNumberValue->_value;
$_SESSION["solicitante"]=$xml->OrdersResults->OrdersList->Order->OrderHeader->OrderParty->BuyerParty->PrimaryContact->ContactName->_value;
$_SESSION["Total"]=$xml->OrdersResults->OrdersList->Order->OrderSummary->OrderTotal->MonetaryAmount->_value;
$_SESSION["neto"]=$xml->OrdersResults->OrdersList->Order->OrderSummary->OrderSubTotal->MonetaryAmount->_value;


$size=$xml->OrdersResults->OrdersList->Order->OrderSummary->NumberOfLines->_value;
$_SESSION["size"]=$size;
$list=array();
if($size==1){
	$name=$xml->OrdersResults->OrdersList->Order->OrderDetail->ListOfItemDetail->ItemDetail->BaseItemDetail->ItemIdentifiers->ItemDescription->_value;
	$cantidad=$xml->OrdersResults->OrdersList->Order->OrderDetail->ListOfItemDetail->ItemDetail->BaseItemDetail->TotalQuantity->QuantityValue->_value;
	$preciou=$xml->OrdersResults->OrdersList->Order->OrderDetail->ListOfItemDetail->ItemDetail->PricingDetail->ListOfPrice->Price->UnitPrice->UnitPriceValue->_value;
	$preciot=$xml->OrdersResults->OrdersList->Order->OrderDetail->ListOfItemDetail->ItemDetail->PricingDetail->LineItemTotal->MonetaryAmount->_value;
	$list[0]=array($name,$cantidad,$preciou,$preciot);
}
else{
for($i=0;$i<$size;$i++){
	$name=$xml->OrdersResults->OrdersList->Order->OrderDetail->ListOfItemDetail->ItemDetail[$i]->BaseItemDetail->ItemIdentifiers->ItemDescription->_value;
	$cantidad=$xml->OrdersResults->OrdersList->Order->OrderDetail->ListOfItemDetail->ItemDetail[$i]->BaseItemDetail->TotalQuantity->QuantityValue->_value;
	$preciou=$xml->OrdersResults->OrdersList->Order->OrderDetail->ListOfItemDetail->ItemDetail[$i]->PricingDetail->ListOfPrice->Price->UnitPrice->UnitPriceValue->_value;
	$preciot=$xml->OrdersResults->OrdersList->Order->OrderDetail->ListOfItemDetail->ItemDetail[$i]->PricingDetail->LineItemTotal->MonetaryAmount->_value;
	$list[$i]=array($name,$cantidad,$preciou,$preciot);
}
}
$_SESSION["list"]=$list;
/*echo "<hr />";
foreach($xml->demo->tag2->text as $key=>$value){
	echo "$key = $value->_value<br />";
}*/
}
}
?>
