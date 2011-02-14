<?php
include("../AccesoDatos/Controller.php");

class usuario{
	public $id_departamento;
	public $rut_usuario;
	public $nombre_usuario;
	public $apellidos_usuario;
	public $password_usuario;
	private $_tabla = "USUARIOS";
	private $registro="RUT_USUARIO";

	function __construct(){}

	function usuario($depto,$rut,$nombre,$apellidos,$password){
		$this->id_departamento=$depto;
		$this->rut_usuario=$rut;
		$this->nombre_usuario=$nombre;
		$this->apellidos_usuario=$apellidos;
		$this->password_usuario=$password;
	}
	
	function Getrut_usuario()	{return $this->rut_usuario;}
	function Getid_departamento()	{return $this->id_departamento;}
	function Getnombre_usuario()	{return $this->nombre_usuario;}
	function Getapellidos_usuario()	{return $this->apellidos_usuario;}
	function Getpassword_usuario()	{return $this->password_usuario;}
	
	function Setrut_usuario($rut_usuario) {$this->rut_usuario= $rut_usuario;}
	function Setid_departamento($id_departamento) {$this->id_departamento= $id_departamento;}
	function Setnombre_usuario($nombre_usuario) {$this->nombre_usuario= $nombre_usuario;}
	function Setapellidos_usuario($apellidos_usuario) {$this->apellidos_usuario= $apellidos_usuario;}
	function Setpassword_usuario($password_usuario) {$this->password_usuario= $password_usuario;}
	
	
	public function Select($rut_usuario){
		$Controller=new Controller();
	if(isset($rut_usuario) && $rut_usuario != "")
		{
			$Controller= new Controller();
			$sql="'$rut_usuario'";
			$arr=$Controller->Select($this->_tabla,"RUT_USUARIO", $sql);
			return $arr; 
		}
	}
	
	public function Add($rut_usuario,$id_departamento,$nombre_usuario,$apellidos_usuario,$password_usuario)
	{
		if(isset($rut_usuario) && $rut_usuario != "")
		{
			$Controller= new Controller();
			$sql=" 0 ,$id_departamento, '$rut_usuario' , '$nombre_usuario' , '$apellidos_usuario' , '$password_usuario' ";
			$Controller->Add($this->_tabla, $sql);	
		}
	}
	public function Del($rut_usuario)
	{
		if(isset($rut_usuario) && $rut_usuario != "")
		{
			$Controller= new Controller();
			$sql=" $rut_usuario ";
			$Controller->Del($_tabla,"RUT_USUARIO", $sql);
			
		}
		
	}
	
	public function Update($rut_usuario,$nombre_usuario,$apellidos_usuarios,$password_usuario){
		$Controller = new Controller();
		$sql=array("NOMBRE_USUARIO"=>"'$nombre_usuario'","APELLIDOS_USUARIO"=>"'$apellidos_usuarios'","PASSWORD_USUARIO"=>"'$password_usuario'");
		$Controller->Update($this->_tabla,$this->registro,$sql);
		
	}

}
?>
