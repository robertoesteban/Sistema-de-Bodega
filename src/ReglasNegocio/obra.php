<?php

include("../AccesoDatos/Controller.php");

class obra {
	private $_rut_proveedor;
	private $_id_ciudad;
	private $_nombre_proveedor;
	private $_direccion_proveedor;
	private $_contacto_proveedor;
	private $_fono_proveedor;
	private $_tabla;
	private $registro;
	
	function __construct()
	{
		$this->_tabla = "PROVEEDORES";
		$this->_id_ciudad=1;
		$this->_registro = 'rut_proveedor';
	}
	
	function Getrut_proveedor()	{return $this->_rut_proveedor;}
	
	function Getid_ciudad()	{return $this->_id_ciudad;}
	
	function Getnombre_proveedor()	{return $this->_nombre_proveedor;}
	
	function Getdireccion_proveedor()	{return $this->_direccion_proveedor;}
	
	function Getcontacto_proveedor()	{return $this->_contacto_proveedor;}
	
	function Getfono_proveedor()	{return $this->_fono_proveedor;}
		
	function Setrut_proveedor($rut_proveedor) {$this->_rut_proveedor= $rut_proveedor;}
	
	function Setid_cuidad($id_ciudad) {$this->_id_cuidad= $id_ciudad;}
	
	function Setnombre_proveedor($nombre_proveedor) {$this->_nombre_proveedor= $nombre_proveedor;}
	
	function Setdireccion_proveedor($direccion_proveedor) {$this->_direccion_proveedor= $direccion_proveedor;}
	
	function Setcontacto_proveedor($contacto_proveedor) {$this->_contacto_proveedor= $contacto_proveedor;}
	
	function Setfono_proveedor($fono_proveedor) {$this->_fono_proveedor= $fono_proveedor;}
	

	public function Add($rut_proveedor,$id_ciudad,$nombre_proveedor,$direccion_proveedor,$contacto_proveedor,$fono_proveedor)
	{
		if(isset($rut_proveedor) && $rut_proveedor != "")
		{
			$Controller= new Controller();
			$sql=" $rut_proveedor , $id_ciudad , '$nombre_proveedor' , '$direccion_proveedor' , '$contacto_proveedor' , '$fono_proveedor' ";
			$Controller->Add($_tabla, $sql);
		}
		
	}
	
	public function Delete( $rut_proveedor )
	{
		$Controller = new Controller();
		$Controller->Del($_tabla, $_registro, $rut_proveedor );
	}
		
	public function Update($rut_proveedor,$id_ciudad,$nombre_proveedor,$direccion_proveedor,$contacto_proveedor,$fono_proveedor )
	{
		$Controller = new Controller();
		$parametro=array("rut"=>$rut_proveedor , "id_ciudad"=>$id_ciudad , "nombre_proveedor"=>$nombre_proveedor , "direccion_proveedor"=>$direccion_proveedor , "contacto_proveedor"=>$contacto_proveedor , "fono_proveedor"=>$fono_proveedor);
		$Controller->Update($_tabla, $_registro, $parametro);
	}

}
	
?>