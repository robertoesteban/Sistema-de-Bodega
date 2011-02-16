<?php
include("../AccesoDatos/Controller.php");

class ordencompra {
	private $_numero_oc;
	private $_id_unidad;
	private $_fecha_oc;
	private $_fechatope_oc;
	private $_fechaingreso_oc;
	private $_solicitante_oc;
	private $_observacion_oc;
	private $_estado_oc;
	private $_neto_oc;
	private $_total_oc;
	private $Controller;
	private $_tabla="ORDENCOMPRA";
	private $registro="NUMERO_OC";
	
	
	function __construct(){
		$Controller= new Controller();
	}
	
	public function Getnumero_oc(){ return $this->_numero_oc;}
	public function Getid_unidad(){ return $this->_id_unidad;}
	public function Getfecha_oc(){ return $this->_fecha_oc;}
	public function Getfechatope_oc(){ return $this->_fechatope_oc;}
	public function Getfechaingreso_oc(){ return $this->_fechaingreso_oc;}
	public function Getsolicitante_oc(){ return $this->_solicitante_oc;}
	public function Getobservacion_oc(){ return $this->_observacion_oc;}
	public function Getestado_oc(){ return $this->_estado_oc;}
	public function Getneto_oc(){ return $this->_neto_oc;}
	public function Gettotal_oc(){ return $this->_total_oc;}
	

	public function Setnumero_oc($numero_oc){$this->_numero_oc=$numero_oc;}
	public function Setid_unidad($id_unidad){$this->_id_unidad=$id_unidad;}
	public function Setfecha_oc($fecha_oc){$this->_fecha_oc=$fecha_oc;}
	public function Setfechatope_oc($fechatope_oc){ $this->_fechatope_oc=$fechatope_oc;}
	public function Setfechaingreso_oc($fechaingreso_oc){ $this->_fechaingreso_oc=$fechaingreso_oc;}
	public function Setsolicitante_oc($solicitante_oc){$this->_solicitante_oc=$solicitante_oc;}
	public function Setobservacion_oc($observacion_oc){$this->_observacion_oc=$observacion_oc;}
	public function Setestado_oc($estado_oc){$this->_estado_oc=$estado_oc;}
	public function Setneto_oc($neto_oc){$this->_neto_oc=$neto_oc;}
	public function Settotal_oc($total_oc){$this->_total_oc=$total_oc;}
	
	public function Select($numero_oc){
	if(isset($numero_oc) && $numero_oc != "")
		{
			$arr=$this->Controller->Select($this->_tabla,$this->registro,"'$numero_oc'");
			return $arr;
		}
	}
	
	public function Add($numero_oc,$id_unidad,$fecha_oc,$fechatope_oc,$fechaingreso_oc,$solicitante_oc,$observacion_oc,$estado_oc,$neto_oc,$total_oc){
		if(isset($numero_oc) && $numero_oc != "")
		{
			$sql="'$numero_oc' ,$id_unidad, '$fecha_oc' , '$fechatope_oc' , '$fechaingreso_oc' , '$solicitante_oc', '$observacion_oc', '$estado_oc', $neto_oc, $total_oc ";
			$this->Controller->Add($this->_tabla, $sql);	
		}
	}
	
	public function Del($numero_oc, $estado_oc){
		$sql=array("NUMERO_OC"=>"'$numero_oc'","ESTADO_OC"=>"'$estado_oc'");
		$this->Controller->Update($this->_tabla,$this->registro,$sql);
	}
	
	public function Update($numero_oc,$id_unidad,$fecha_oc,$fechatope_oc,$fechaingreso_oc,$solicitante_oc,$observacion_oc,$estado_oc,$neto_oc,$total_oc){
		$sql=array("NUMERO_OC"=>"'$numero_oc'","ID_UNIDAD"=>"$id_unidad","FECHA_OC"=>"'$fecha_oc'","FECHATOPE_OC"=>"'$fechatope_oc'","FECHAINGRESO_OC"=>"'$fechaingreso_oc'","SOLICITANTE_OC"=>"'$solicitante_oc'","OBSERVACION_OC"=>"'$observacion_oc'","ESTADO_OC"=>"'$estado_oc'","NETO_OC"=>"$neto_oc","TOTAL_OC"=>"$total_oc");
		$this->Controller->Update($this->_tabla,$this->registro,$sql);
	}
	
	
}

	
	
	

?>
