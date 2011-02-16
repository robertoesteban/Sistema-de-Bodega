<?php
include("../AccesoDatos/Controller.php");

class documento{
	public $_id_documento;
	public $_numero_documento;
	public $_tipo_documento;
	public $_fecha_documento;
	public $_observacion_documento;
	private $_tabla = "DOCUMENTOS";
	private $registro="NUMERO_DOCUMENTO";
	private $Controller;

	function __construct(){ $Controller=new Controller(); }

	function usuario($numero_documento,$tipo_documento,$fecha_documento,$observacion_documento){
		$this->_id_documento=0;
		$this->_numero_documento=$numero_documento;
		$this->_tipo_documento=$tipo_documento;
		$this->_fecha_documento=$fecha_documento;
		$this->_observacion_documento=$observacion_documento;
	}
	
	function Getid_documento()	{return $this->_id_documento;}
	function Getnumero_documento()	{return $this->_numero_documento;}
	function Gettipo_documento()	{return $this->_tipo_documento;}
	function Getfecha_documento()	{return $this->_fecha_documento;}
	function Getobservacion_documento()	{return $this->_observacion_documento;}
	
	function Setid_documento($id_documento) {$this->_id_documento= $id_documento;}
	function Setnumero_documento($numero_documento) {$this->_numero_documento= $numero_documento;}
	function Settipo_documento($tipo_documento) {$this->_tipo_documento= $tipo_documento;}
	function Setfecha_documento($fecha_documento) {$this->_fecha_documento= $fecha_documento;}
	function Setobservacion_documento($observacion_documento) {$this->_observacion_documento= $observacion_documento;}
	
	
	public function Select($numero_documento){
	if(isset($numero_documento) && $numero_documento != "")
		{
			$sql="$numero_documento";
			$arr=$this->Controller->Select($this->_tabla,$this->registro, $sql);
			return $arr; 
		}
	}
	
	public function Add($numero_documento,$tipo_documento,$fecha_documento,$observacion_documento)
	{
		if(isset($numero_documento) && $numero_documento != "")
		{
			$sql=" 0 ,$numero_documento, '$tipo_documento' , '$fecha_documento' , '$observacion_documento'";
			$this->Controller->Add($this->_tabla, $sql);	
		}
	}
	public function Del($numero_documento)
	{
		if(isset($numero_documento) && $numero_documento != "")
		{
			$sql="$numero_documento";
			$Controller->Del($this->_tabla,$this->registro, $sql);
			
		}
		
	}
	
	public function Update($numero_documento,$tipo_documento,$fecha_documento,$observacion_documento){
		$sql=array("NUMERO_DOCUMENTO"=>"'$numero_documento'","TIPO_DOCUMENTO"=>"'$tipo_documento'","FECHA_DOCUMENTO"=>"'$fecha_documento'","OBSERVACION_DOCUMENTO"=>"'$observacion_documento'");
		$this->Controller->Update($this->_tabla,$this->registro,$sql);	
	}
}
?>
