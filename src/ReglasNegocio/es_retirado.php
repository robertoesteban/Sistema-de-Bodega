<?php 
class es_retirado{
	private $id_material;
	private $id_retiro_custodia;
	private $folio_es_retirado;
	private $_tabla="ES_RETIRADO";
	private $_registro="ID_MATERIAL";
	private $_registro2="ID_RETIRO_CUSTODIA";
	
	function __construct(){}
	
	public function GetMayor(){
		$Controller=new Controller();
		$sql="select max(FOLIO_ES_RETIRADO) as mayor from ".$this->_tabla;
		$result=$Controller->ejecute($sql);
		$row=mysql_fetch_array($result);
		return $row["mayor"];
	}
	
	public function Add($material,$id_retiro,$folio){
		$Controller=new Controller();
		$sql="$material, $id_retiro ,$folio";
		$Controller->Add($this->_tabla, $sql);
	}
}

?>