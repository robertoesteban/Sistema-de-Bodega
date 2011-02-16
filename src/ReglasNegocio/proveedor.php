<?php

include("../AccesoDatos/Controller.php");

class proveedor {
	private $_rut_proveedor;
	private $_id_cuidad;
	private $_nombre_proveedor;
	private $_direccion_proveedor;
	private $_contacto_proveedor;
	private $_fono_proveedor;
	private $_tabla = "PROVEEDORES";
	private $registro="RUT_PROVEEDOR";
	private $Controller;
	
	function __construct()	{ $this->Controller=new Controller();}
	
	function Getrut_proveedor()	{return $this->_rut_proveedor;}
	
	function Getid_cuidad()	{return $this->_id_cuidad;}
	
	function Getnombre_proveedor()	{return $this->_nombre_proveedor;}
	
	function Getdireccion_proveedor()	{return $this->_direccion_proveedor;}
	
	function Getcontacto_proveedor()	{return $this->_contacto_proveedor;}
	
	function Getfono_proveedor()	{return $this->_fono_proveedor;}
		
	function Setrut_proveedor($rut_proveedor) {$this->_rut_proveedor= $rut_proveedor;}
	
	function Setid_cuidad($id_cuidad) {$this->_id_cuidad= $id_cuidad;}
	
	function Setnombre_proveedor($nombre_proveedor) {$this->_nombre_proveedor= $nombre_proveedor;}
	
	function Setdireccion_proveedor($direccion_proveedor) {$this->_direccion_proveedor= $direccion_proveedor;}
	
	function Setcontacto_proveedor($contacto_proveedor) {$this->_contacto_proveedor= $contacto_proveedor;}
	
	function Setfono_proveedor($fono_proveedor) {$this->_fono_proveedor= $fono_proveedor;}
	

	public function Add($rut_proveedor,$id_cuidad,$nombre_proveedor,$direccion_proveedor,$contacto_proveedor,$fono_proveedor)
	{
		if(isset($rut_proveedor) && $rut_proveedor != "")
		{
			$sql=" $rut_proveedor , $id_cuidad , '$nombre_proveedor' , '$direccion_proveedor' , '$contacto_proveedor' , '$fono_proveedor' ";
			$this->Controller->Add($_tabla, $sql);
			
		}
		
	}
	
	public function Del($rut)
	{
		$sql="'$rut'";
		$this->Controller->Del($this->_tabla,$this->registro,$sql);	
	}
	public function Update($rut,$ciudad,$nombre,$direccion,$contacto,$fono){
		$sql=array("RUT_PROVEEDOR"=>"'$rut'","ID_CIUDAD"=>"'$ciudad'","NOMBRE_PROVEEDOR"=>"'$nombre'","DIRECCION_PROVEEDOR"=>"'$direccion'","CONTACTO_PROVEEDOR"=>"'$contacto'","FONO_PROVEEDOR"=>"'$fono'");	
		$this->Controller->Update($this->_tabla,$this->registro,$sql);
	
	}
}
	
?>