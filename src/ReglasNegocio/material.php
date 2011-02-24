<?php

class material{
	public $_id_material;
	public $_id_stock;
	public $_nombre_material;
	public $_estado_material;
	public $_unidadmedida_material;
	private $_tabla = "MATERIALES";
	private $registro="ID_MATERIAL";
	private $Controller;

	function __construct(){ $Controller=new Controller(); }

	function usuario($id_material,$id_stock,$nombre_material,$estado_material,$unidad_medida){
		$this->_id_material=$id_material;
		$this->_nombre_material=$nombre_material;
		$this->_estado_material=$estado_material;
		$this->_unidadmedida_material=$unidad_medida;
	}
	
	function Getid_material()	{return $this->_id_material;}
	function Getnombre_material()	{return $this->_nombre_material;}
	function Getestado_material()	{return $this->_estado_material;}
	function Getunidadmedida_material()	{return $this->_unidadmedida_material;}
	
	function Setid_material($id_material) {$this->_id_material= $id_material;}
	function Setnombre_material($nombre_material) {$this->_nombre_material= $nombre_material;}
	function Setestado_material($estado_material) {$this->_estado_material= $estado_material;}
	function Setunidadmedida_material($unidad_medida){$this->_unidadmedida_material= $unidad_medida;}
	
	
	public function Select($id_material){
	if(isset($id_material) && $id_material != "")
		{
			$Controller2=new Controller();
			$sql="$id_material";
			$arr=$Controller2->Select($this->_tabla,$this->registro, $sql);
			return $arr; 
		}
	}
	
	public function Add($id_material,$nombre_material,$estado_material,$unidad_medida)
	{
		if(isset($id_material) && $id_material != "")
		{
			$sql="$id_material, '$nombre_material' , '$estado_material' , '$unidad_medida'";
			$this->Controller->Add($this->_tabla, $sql);	
		}
	}
	public function Del($id_material)
	{
		if(isset($id_material) && $id_material != "")
		{
			$sql="$id_material";
			$Controller->Del($this->_tabla,$this->registro, $sql);
			
		}
		
	}
	
	public function Update($id_material,$nombre_material,$estado_material,$unidad_medida){
		$sql=array("ID_MATERIAL"=>"$id_material","NOMBRE_MATERIAL"=>"'$nombre_material'","ESTADO_MATERIAL"=>"'$estado_material'","UNIDADMEDIDA_MATERIAL"=>"'$unidad_medida'");
		$this->Controller->Update($this->_tabla,$this->registro,$sql);	
	}
}
?>
