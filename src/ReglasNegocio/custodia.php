<?php
class custodia{

	public $id_custodia;
	public $ingresadopor_custodia;
	public $fechaingreso_custodia;
	public $tipo_custodia;
	public $comentarios_custodia;
	public $reserva_custodia;
	private $_tabla = "CUSTODIAS";
	private $registro="ID_CUSTODIA";

	function __construct(){}
	
	function Getid_custodia()			{return $this->id_custodia;}
	function Getingresadopor_custodia()	{return $this->ingresadopor_custodia;}
	function Getfechaingreso_custodia()	{return $this->fechaingreso_custodia;}
	function Gettipo_custodia()			{return $this->tipo_custodia;}
	function Getcomentarios_custodia()	{return $this->comentarios_custodia;}
	function Getreserva_custodia()		{return $this->reserva_custodia;}
	
	function Setid_custodia($id_custodia) 				{$this->id_custodia= $id_custodia;}
	function Setingresadopo_custodia($ingresado_por) 	{$this->ingresadopor_custodia= $ingresado_por;}
	function Setfechaingreso_custodia($fecha_ingreso) 	{$this->fechaingreso_custodia= $fecha_ingreso;}
	function Settipo_custodia($tipo_custodia) 			{$this->tipo_custodia= $tipo_custodia;}
	function Setcomentarios_custodia($comentarios_custodia) {$this->comentarios_custodia= $comentarios_custodia;}
	function Setreserva_custodia($reserva)				{ $this->reserva_custodia=$reserva_custodia; }
	
	
	public function Select($id_custodia){
	if(isset($id_custodia) && $id_custodia != "")
		{
			$Controller=new Controller();
			$sql="'$id_custodia'";
			$arr=$Controller->Select($this->_tabla,$this->registro, $sql);
			return $arr; 
		}
	}
	
	public function Select2($ingresado_por,$fecha_ingreso,$tipo_custodia,$comentario,$reserva){
		$Controller=new Controller();
		$arr1=array("INGRESADOPOR_CUSTODIA","FECHAINGRESO_CUSTODIA","TIPO_CUSTODIA","COMENTARIOS_CUSTODIA","RESERVA_CUSTODIA");
		$arr2=array("'$ingresado_por'","'$fecha_ingreso'","'$tipo_custodia'","'$comentario'",$reserva);
		$result=$Controller->Select2($this->_tabla,$arr1,$arr2);
		return $result;
	}
	
	public function Add($ingresado_por,$fecha_ingreso,$tipo_custodia,$comentarios,$reserva)
	{
		$Controller=new Controller();
		$sql=" 0 ,'$ingresado_por', '$fecha_ingreso' , '$tipo_custodia' , '$comentarios' , $reserva ";
		$Controller->Add($this->_tabla, $sql);	
	}
	public function Del($id_custodia)
	{
		if(isset($id_custodia) && $id_custodia != "")
		{
			$Controller=new Controller();
			$sql="$id_custodia";
			$Controller->Del($this->_tabla,$this->registro, $sql);
			
		}
		
	}
	
	public function Update($id_custodia,$ingresado_por,$fecha_ingreso,$tipo_custodia,$comentarios,$reserva){
		$Controller=new Controller();
		$sql=array("ID_CUSTODIA"=>"$id_custodia","INGRESADOPOR_CUSTODIA"=>"'$ingresado_por'","FECHAINGRESO_CUSTODIA"=>"'$fecha_ingreso'","COMENTARIOS_CUSTODIA"=>"'$comentarios'","RESERVA_CUSTODIA"=>"$reserva");
		$Controller->Update($this->_tabla,$this->registro,$sql);
		
	}

}
?>
