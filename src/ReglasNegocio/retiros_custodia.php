<?php 

class retiros_custodia{
	private $id_retiro_custodia;
	private $nombre_retiro_custodia;
	private $observacion;
	private $fecha_retiro_custodia;
	private $_tabla="RETIROS_CUSTODIA";
	private $_registro="ID_RETIRO_CUSTODIA";
	
	function __construct(){}
	
	public function Add($nombre,$observacion){
		$Controller=new Controller();
		$sql=" 0 ,'$nombre', '$observacion'";
		$Controller->Add($this->_tabla, $sql);
	}
	
	public function Select($nombre,$obs){
		$Controller=new Controller();
		$arr1=array("NOMBRE_RETIRO_CUSTODIA","OBSERVACION_RETIRO_CUSTODIA");
		$arr2=array("'$nombre'","'$obs'");
		return $Controller->Select2($this->_tabla,$arr1,$arr2);
		
	}

	
}

?>
