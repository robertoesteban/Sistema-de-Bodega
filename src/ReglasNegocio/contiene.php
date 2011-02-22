<?php

class contiene {
	private $_id_material;
	private $_numero_oc;
	private $_id_documento;
	private $_rut_proveedor;
	private $_cantidadtotal_contiene;
	private $_cantidadbodega_contiene;
	private $_cantidadrecibida_contiene;
	private $_valor_contiene;
	private $_tabla="CONTIENE";
	private $registro="NUMERO_OC";
	private $Controller;
	
	
	function __construct(){
		$this->Controller= new Controller();
	}
	
	public function Getid_material(){ return $this->_id_material;}
	public function Getnumero_oc(){ return $this->_numero_oc;}
	public function Getid_documento(){ return $this->_id_documento;}
	public function Getrut_proveedor(){ return $this->_rut_proveedor;}
	public function Getcantidadtotal_contiene(){ return $this->_cantidadtotal_contiene;}
	public function Getcantidadbodega_contiene(){ return $this->_cantidadbodega_contiene;}
	public function Getcantidadrecibida_oc(){ return $this->_cantidadrecibida_contiene;}
	public function Getvalor_contiene(){ return $this->_valor_contiene;}
	
	

	public function Setnumero_oc($numero_oc){$this->_numero_oc=$numero_oc;}
	public function Setid_material($id_material){$this->_id_material=$id_material;}
	public function Setid_documento($id_documento){$this->_id_documento=$id_documento;}
	public function Setrut_proveedor($rut_proveedor){ $this->_fechatope_oc=$rut_proveedor;}
	public function Setcantidadtotal_contiene($cantidadtotal_contiene){ $this->_cantidadtotal_contiene=$cantidadtotal_contiene;}
	public function Setcantidadbodega_contiene($cantidadbodega_contiene){$this->_cantidadbodega_contiene=$cantidadbodega_contiene;}
	public function Setcantidadrecibida_contiene($cantidadrecibida_contiene){$this->_cantidadrecibida_contiene=$cantidadrecibida_contiene;}
	public function Setvalor_contiene($valor_contiene){$this->_valor_contiene=$valor_contiene;}
	
	public function Select2($id_material){
		if(isset($id_material) && $id_material != "")
		{
			$arr=$this->Controller->Select($this->_tabla,"ID_MATERIAL","$id_material");
			return $arr;
		}
	}
	public function Select3($id_documento){
		if(isset($id_documento) && $id_documento != "")
		{
			$arr=$this->Controller->Select($this->_tabla,"ID_DOCUMENTO","'$id_documento'");
			return $arr;
		}
	}
	
	public function Select($numero_oc,$id_documento,$rut_proveedor){
		if(isset($numero_oc) && $numero_oc != "")
		{
			$ar1=array("NUMERO_OC","ID_DOCUMENTO","RUT_PROVEEDOR");
			$ar2=array("'$numero_oc'","'$id_documento'","'$rut_proveedor'");
			$arr=$this->Controller->Select2($this->_tabla,$ar1,$ar2);
			return $arr;
		}
	}
	
	public function Add($id_material,$numero_oc,$id_documento,$rut_proveedor,$cantidad_total,$cantidad_bodega,$cantidad_recibida,$valor_contiene){
		if(isset($numero_oc) && $numero_oc != "")
		{
			$sql="$id_material ,'$numero_oc' ,$id_documento, '$rut_proveedor' , $cantidad_total , $cantidad_bodega , $cantidad_recibida, $valor_contiene";
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
