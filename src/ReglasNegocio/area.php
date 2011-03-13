<?php 
class area{
	private $id_area;
	private $id_bodega;
	private $nombre_area;
	private $Controller;
	private $tabla="AREAS";
	private $registro="ID_AREA";
	private $registro2="ID_BODEGA";

	function __construct(){ $this->Controller=new Controller();}
	
	public function Add($idbodega,$nombre){
		$sql="0,$idbodega,'$nombre'";
		$this->Controller->Add($this->tabla,$sql);
	}
	public function Select($idarea){
		return $this->Controller->Select($this->tabla,$this->registro,$idarea);
	}
	public function Select2($idbodega){
		return $this->Controller->Select($this->tabla,$this->registro2,$idbodega);
	}
	public function GetAll(){
		return $this->Controller->GetAllarea($this->tabla);
	}
}
?>