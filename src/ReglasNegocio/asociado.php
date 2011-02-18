<?php
include("../AccesoDatos/Controller.php");

class asociado{

	public $id_custodia;
	public $id_material;
	public $id_area;
	public $id_unidad;
	public $periodo_asociado;
	public $estado_asociado;
	public $estado_retiro_asociado;
	private $_tabla = "ASOCIADO";
	private $registro="ID_CUSTODIA";
	private $Controller;

	function __construct(){ $this->Controller= new Controller();}
	
	function Getid_custodia(){return $this->id_custodia;}
	function Getid_material(){return $this->id_material;}
	function Getid_area(){return $this->id_area;}
	function Getid_unidad(){return $this->id_unidad;}
	function Getperiodo_asociado(){return $this->periodo_asociado;}
	function Getestado_asociado(){return $this->estado_asociado;}
	function Getestado_retiro_asociado(){return $this->estado_retiro_asociado;}
	
	function Setid_custodia($id_custodia){$this->id_custodia= $id_custodia;}
	function Setid_material($id_material){$this->id_material= $id_material;}
	function Setid_area($id_area){$this->id_area= $id_area;}
	function Setid_unidad($id_unidad){$this->id_unidad= $id_unidad;}
	function Setperiodo_asociado($periodo_asociado){$this->periodo_asociado= $periodo_asociado;}
	function Setestado_asociado($estado_asociado){ $this->estado_asociado=$estado_asociado; }
	function Setestado_retiro_asociado($estado_retiro_asociado){ $this->estado_retiro_asociado=$estado_retiro_asociado; }
	
	//FALTA MODIFICAR
	public function Select($id_custodia){
	if(isset($id_custodia) && $id_custodia != "")
		{
			$sql="'$id_custodia'";
			$arr=$this->Controller->Select($this->_tabla,$this->registro, $sql);
			return $arr; 
		}
	}
	//LISTO
	public function Add($id_custodia,$id_material,$id_area,$id_unidad,$periodo_asociado,$estado_asociado,$estado_retiro_asociado)
	{
			$sql=" $id_custodia ,$id_material, $id_area, $id_unidad , $periodo_asociado , $estado_asociado, $estado_retiro_asociado ";
			$this->Controller->Add($this->_tabla, $sql);	
	}
	
	//FALTA MODIFICA HACER CONTROLADOR PARA ASOCIADO
	public function Del($id_custodia)
	{
		if(isset($id_custodia) && $id_custodia != "")
		{
			$sql="$id_custodia";
			$this->Controller->Del($this->_tabla,$this->registro, $sql);
			
		}
		
	}
	//FALTA MODIFICAR
	public function Update($id_custodia,$ingresado_por,$fecha_ingreso,$tipo_custodia,$comentarios,$reserva){
		$sql=array("ID_CUSTODIA"=>"$id_custodia","INGRESADOPOR_CUSTODIA"=>"'$ingresado_por'","FECHAINGRESO_CUSTODIA"=>"'$fecha_ingreso'","COMENTARIOS_CUSTODIA"=>"'$comentarios'","RESERVA_CUSTODIA"=>"$reserva");
		$this->Controller->Update($this->_tabla,$this->registro,$sql);
		
	}

}
?>
