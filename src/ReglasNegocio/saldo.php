<?php
include("../AccesoDatos/Controller.php");
class saldo {
	private $_id_saldo;
	private $_observacion_saldo;
	private $_tabla = "SALDOS";
	private $_registro="ID_SALDO";
	private $_registro2="OBSERVACION_SALDO";

	function __construct(){ }


	function Getid_saldo()	{return $this->_id_saldo;}
	function Getobservacion_saldo()	{return $this->_observacion_saldo;}
	
	function Setid_saldo($id_saldo) {$this->_id_saldo= $id_saldo;}
	function Setobservacion_saldo($observacion_saldo) {$this->_observacion_saldo= $observacion_saldo;}
	
		
	public function Select($id_saldo)
	{
		$Controller=new Controller();
		if(isset($id_saldo) && $id_saldo != "")
		{
			$Controller= new Controller();
			$sql="$id_saldo";
			$arr=$Controller->Select($this->_tabla,$this->_registro, $sql);
			return $arr; 
		}
	}
	
	public function Select2($observacion_saldo)
	{
		$Controller=new Controller();
		if(isset($observacion_saldo) && $observacion_saldo != "")
		{
			$Controller= new Controller();
			$sql="'$observacion_saldo'";
			$arr=$Controller->Select($this->_tabla,$this->_registro2, $sql);
			return $arr; 
		}
	}	
	
	
	public function GetAll()
	{
		$Controller= new Controller();
		return $Controller->GetAll($this->_tabla);
	}	
	
	public function Add($observacion_saldo)
	{
		$resultado;		
		if(isset($observacion_saldo) && $observacion_saldo != "")
		{
			$Controller= new Controller();
			$sql="0, '".$observacion_saldo. "'";
			$resultado =$Controller->Add($this->_tabla, $sql);
		}
		return $resultado;
	}
	
	
	
	
	public function Del($id_saldo)
	{
		if(isset($id_saldo) && $id_saldo != "")
		{
			$Controller= new Controller();
			$sql=" $id_saldo ";
			$Controller->Del($this->_tabla,$this->_registro, $sql);
			
		}
		
	}
	
	public function Update($id_saldo,$observacion_saldo){
		$Controller = new Controller();
		$sql=array("ID_SALDO"=>"$id_saldo","OBSERVACION_SALDO"=>"'$observacion_saldo'");
		return $Controller->Update($this->_tabla,$this->_registro,$sql);
		
	}

	
}
?>