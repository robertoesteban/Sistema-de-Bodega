<?php 
class retiro{
	private $id_retiro;
	private $persona_retiro;
	private $motivo_retiro;
	private $estado_retiro;
	private $_tabla="RETIROS";
	private $registro="ID_RETIRO";
	private $Controller;
	function __construct(){
		$this->Controller=new Controller();
	}
	public function Select($id_retiro){
		return $this->Controller->Select($this->_tabla,$this->registro,$id_retiro);
	}
	public function Add($persona,$motivo,$estado){
		$sql="0,'$persona','$motivo',$estado";
		$this->Controller->Add($this->_tabla,$sql);
	}
	public function Select2($persona,$motivo,$estado){
		$sql="Select * from RETIROS where PERSONA_RETIRO="."'$persona'"." AND MOTIVO_RETIRO="."'$motivo'"." AND ESTADO_RETIRO=".$estado;
		//echo $sql;
		return $this->Controller->ejecute($sql);
	}
}
?>
