<?php
require_once("XML.inc.php");

$xml_file="./demo.xml";
#$xml_data=implode("",file($xml_file)); //get XML data for alternative direct parsing

$xml=new XML();
$xml->file_read($xml_file);
#$xml->parse($xml_data); //parse direct XML data
$xml->parse();
#$xml->debug();

//Samples...
echo $xml->demo->tag1->_param["say"];
echo $xml->demo->tag4->item[1]->_value;

echo "<hr />";
foreach($xml->demo->tag2->text as $key=>$value){
	echo "$key = $value->_value<br />";
}
?>