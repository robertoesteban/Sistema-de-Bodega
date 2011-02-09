<?php

include("../AccesoDatos/conf.php");
include("../AccesoDatos/conexion.php");

class usuario{
	public $id_usuario;
	public $id_departamento;
	public $rut_usuario;
	public $nombre_usuario;
	public $apellido_usuario;
	public $password_usuario;

	function usuario($id,$depto,$rut,$nombre,$apellido,$password){
		$this->id_usuario=$id;
		$this->id_departamento=$depto;
		$this->rut_usuario=$rut;
		$this->nombre_usuario=$nombre;
		$this->apellido_usuario=$apellido;
		$this->password_usuario=$password;
	}
	function Get($rut_usuario){
		$con = new conexion();
		$con->conectar($ConexionConf['host'], $ConexionConf['user'], $ConexionConf['password'], $ConexionConf['bd11']);
		$conec = $con->ReturnConex();
		$query = mysql_query("select * from 'usuario' where 'rut_usuario'='".intval($id_usuario)."' LIMIT 1");
		$arr=mysql_fetch_array($query);
		$this->id_usuario = $arr['id_usuario'];
		$this->rut_usuario = $arr['rut_usuario'];
		$this->nombre_usuario = $arr['nombre_usuario'];
		$this->apellido_usuario = $arr['apellido_usuario'];
		$this->password_usuario = $arr['password_usuario'];
		$this->id_departamento = $arr['id_departamento'];
		return $this;
	}
	
	function GetAll(){
		$con = new conexion();
		$i=0;
		$con->conectar($ConexionConf['host'], $ConexionConf['user'], $ConexionConf['password'], $ConexionConf['bd11']);
		$conec = $con->ReturnConex();
		$thisObjectName = get_class($this);
		$query = mysql_query("select * from 'usuario'");
		$arr=mysql_fetch_array($query);
		$usuarios = array();
		while ($arr[0]!=null)
		{
			$usuario = new $thisObjectName();
			$usuario->id_usuario = $arr['id_usuario'];
			$usuario->rut_usuario = $arr['rut_usuario'];
			$usuario->nombre_usuario = $arr['nombre_usuario'];
			$usuario->apellido_usuario = $arr['apellido_usuario'];
			$usuario->password_usuario = $arr['password_usuario'];
			$usuario->id_departamento = $arr['id_departamento'];
			$usuarios[$i]=$usuario;
			$arr=mysql_fetch_array($query);
			$i++;
		}
		return $this;
	}
	function save(){
		$query = mysql_query("select 'usuarioid' from 'usuario' where 'id_usuario'='".$this->id_usuario."' LIMIT 1");
		$arr=mysql_fetch_array($query);
		$query2="";
		if ($arr > 0)
		{
			$query2 = "update 'usuario' set 
			'nombre_usuario'='".$this->nombre_usuario."', 
			'apellido_usuario'='".$this->apellido_usuario."', 
			'password_usuario'='".$this->password_usuario."', 
			'id_departamento'='".$this->id_departamento."' where 'rut_usuario'='".$this->rut_usuario."'";
		}
		else
		{
			$query2 = "insert into 'usuario' ('rut_usuario', 'nombre_usuario', 'apellido_usuario', 'password_usuario', 'id_departamento' ) values (
			'".$this->nombre_usuario."', 
			'".$this->apellido_usuario."', 
			'".$this->password_usuario."', 
			'".$this->id_departamento."' )";
		}
		mysql_fetch_array($query2);
	}
	
	

}
?>