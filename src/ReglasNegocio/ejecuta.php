<?php 
class ejecuta{
	private $id_retiro;
	private $id_material;
	private $id_unidad;
	private $folio;
	private $fecha;
	private $cantidad;
	private $_tabla="EJECUTA";
	private $Controller;
	function __construct(){
		$this->Controller=new Controller();
	}
	
	public function Add($idretiro,$idmaterial,$idunidad,$folio,$fecha,$cantidad){
		$sql="$idretiro,$idmaterial,$idunidad,$folio,'$fecha',$cantidad";
		$this->Controller->Add($this->_tabla,$sql);
	}
	
public function GetMayor(){
		$sql="select max(FOLIO_EJECUTA) as mayor from ".$this->_tabla;
		$result=$this->Controller->ejecute($sql);
		$row=mysql_fetch_array($result);
		return $row["mayor"];
	}
}
?>