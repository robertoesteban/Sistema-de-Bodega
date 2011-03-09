<?php

class asociado{

	public $id_custodia;
	public $id_material;
	public $id_area;
	public $id_unidad;
	public $folio;
	public $periodo_asociado;
	public $estado_asociado;
	public $estado_retiro_asociado;
	private $_tabla = "ASOCIADO";
	private $registro="ID_CUSTODIA";

	function __construct(){}
	
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
	
public function GetMayor(){
		$Controller=new Controller();
		$sql="select max(FOLIO_ASOCIADO) as mayor from ".$this->_tabla;
		$result=$Controller->ejecute($sql);
		$row=mysql_fetch_array($result);
		return $row["mayor"];
	}
	
	public function Select2($id_custodia,$id_material,$id_area,$id_bodega,$id_unidad){
		$Controller=new Controller();
		$arr1=array("ID_CUSTODIA","ID_MATERIAL","ID_AREA","ID_BODEGA","ID_UNIDAD");
		$arr2=array($id_custodia,$id_material,$id_area,$id_bodega,$id_unidad);
		$result = $Controller->Select2($this->_tabla,$arr1,$arr2);
		return $result;
	}
	
	public function Select($id_custodia){
	if(isset($id_custodia) && $id_custodia != "")
		{
			$Controller=new Controller();
			$sql="'$id_custodia'";
			$arr=$Controller->Select($this->_tabla,$this->registro, $sql);
			return $arr; 
		}
	}
	
public function SelectM($id_material){
	if(isset($id_material) && $id_material != "")
		{
			$Controller=new Controller();
			$sql="$id_material";
			$arr=$Controller->Select($this->_tabla,"ID_MATERIAL", $sql);
			return $arr; 
		}
	}
	
	public function GetAll(){
		$Controller=new Controller();
		$result=$Controller->GetAll($this->_tabla);
		return $result;
	}
	//LISTO
	public function Add($id_custodia,$id_material,$id_area,$id_bodega,$id_unidad,$folio,$periodo_asociado,$estado_asociado,$estado_retiro_asociado)
	{
		$Controller=new Controller();
		$sql=" $id_custodia ,$id_material, $id_area,$id_bodega, $id_unidad,$folio , $periodo_asociado , '$estado_asociado', $estado_retiro_asociado ";
		$Controller->Add($this->_tabla, $sql);	
	}
	
	//FALTA MODIFICA HACER CONTROLADOR PARA ASOCIADO
	public function Del($id_custodia)
	{
		if(isset($id_custodia) && $id_custodia != "")
		{
			$Controller=new Controller();
			$sql="$id_custodia";
			$Controller->Del($this->_tabla,$this->registro, $sql);
			
		}
		
	}
	//FALTA MODIFICAR
	public function Update($id_material){
		$Controller=new Controller();
		$sql=array("ID_MATERIAL"=>$id_material,"ESTADO_RETIRO_ASOCIADO"=>"1");
		$Controller->Update($this->_tabla,"ID_MATERIAL",$sql);
		
	}

}
?>
