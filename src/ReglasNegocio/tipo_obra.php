<?php

include("../AccesoDatos/Controller.php");

class tipo_obra {
	private $_id_tipo_obra;
	private $_nombre_tipo_obra;
	private $_tabla;
	private $registro;
	
	function __construct()
	{
		$this->_tabla = "TIPO_OBRAS";
		$this->_registro = 'id_tipo_obra';
	}
	
	function Getid_tipo_obra()	{return $this->_id_tipo_obra;}
	
	function Getnombre_tipo_obra()	{return $this->_nombre_tipo_obra;}
	
	function Setid_tipo_obra($id_tipo_obra) {$this->_id_tipo_obra= $id_tipo_obra;}
	
	function Setnombre_tipo_obra($nombre_tipo_obra) {$this->_nombre_tipo_obra= $nombre_tipo_obra;}
	
	public function Add($nombre_tipo_obra)
	{
		if(isset($nombre_tipo_obra) && $nombre_tipo_obra != "")
		{
			$Controller= new Controller();
			$sql=" '$nombre_tipo_obra' ";
			$Controller->Add($_tabla, $sql);
		}
		
	}
	
	public function Delete( $id_tipo_obra )
	{
		$Controller = new Controller();
		$Controller->Del($_tabla, $_registro, $id_tipo_obra );
	}
		
/*	public function Update($rut_proveedor,$id_ciudad,$nombre_proveedor,$direccion_proveedor,$contacto_proveedor,$fono_proveedor )
	{
		$Controller = new Controller();
		$parametro=array("rut"=>$rut_proveedor , "id_ciudad"=>$id_ciudad , "nombre_proveedor"=>$nombre_proveedor , "direccion_proveedor"=>$direccion_proveedor , "contacto_proveedor"=>$contacto_proveedor , "fono_proveedor"=>$fono_proveedor);
		$Controller->Update($_tabla, $_registro, $parametro);
	}
*/
}
	
?>