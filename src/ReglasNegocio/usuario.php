<?php
include("../AccesoDatos/Controller.php");

class usuario{
public $_id_departamento;
public $_rut_usuario;
public $_nombre_usuario;
public $_apellidos_usuario;
public $_password_usuario;
private $_tabla = "USUARIOS";
private $_registro="ID_USUARIO";
private $_registro2="RUT_USUARIO";
private $_Controller;

function __construct(){ $this->_Controller=new Controller();}

function usuario($depto,$rut,$nombre,$apellidos,$password){
$this->_id_departamento=$depto;
$this->_rut_usuario=$rut;
$this->_nombre_usuario=$nombre;
$this->_apellidos_usuario=$apellidos;
$this->_password_usuario=$password;
}

function Getrut_usuario()	{return $this->_rut_usuario;}
function Getid_departamento()	{return $this->_id_departamento;}
function Getnombre_usuario()	{return $this->_nombre_usuario;}
function Getapellidos_usuario()	{return $this->_apellidos_usuario;}
function Getpassword_usuario()	{return $this->_password_usuario;}

function Setrut_usuario($rut_usuario) {$this->_rut_usuario= $rut_usuario;}
function Setid_departamento($id_departamento) {$this->_id_departamento= $id_departamento;}
function Setnombre_usuario($nombre_usuario) {$this->_nombre_usuario= $nombre_usuario;}
function Setapellidos_usuario($apellidos_usuario) {$this->_apellidos_usuario= $apellidos_usuario;}
function Setpassword_usuario($password_usuario) {$this->_password_usuario= $password_usuario;}


public function Select($id_usuario)
{
	
	if(isset($id_usuario) && $id_usuario != "")
	{
		$sql="$id_usuario";
		$arr=$this->_Controller->Select($this->_tabla,$this->_registro, $sql);
		return $arr;
	}
}


public function Select2($rut)
{
	$resultado="";
	if(isset($rut) && $rut != "")
	{
		$sql="'$rut'";
		$arr=$this->_Controller->Select($this->_tabla,$this->_registro2, $sql);
		$resultado = mysql_result($arr, 0);
		return $resultado; 
	}
	return $resultado;
}	



public function Add($rut_usuario,$id_departamento,$nombre_usuario,$apellidos_usuario,$password_usuario)
{
	if(isset($rut_usuario) && $rut_usuario != "")
	{
		$sql=" 0 ,$id_departamento, '$rut_usuario' , '$nombre_usuario' , '$apellidos_usuario' , '$password_usuario' 0";
		return $this->_Controller->Add($this->_tabla, $sql);
	}
}



public function Update($id_usuario,$rut_usuario,$nombre_usuario,$apellidos_usuario,$password_usuario)
{
	if(!empty($password_usuario)) 
	{	
		$sql=array("ID_USUARIO"=>$id_usuario,"RUT_USUARIO"=>"'$rut_usuario'","NOMBRE_USUARIO"=>"'$nombre_usuario'","APELLIDOS_USUARIO"=>"'$apellidos_usuario'","PASSWORD_USUARIO"=>"'$password_usuario'");
		$this->_Controller->Update($this->_tabla,$this->_registro,$sql);
	}
	else
	{
		$sql=array("ID_USUARIO"=>$id_usuario,"RUT_USUARIO"=>"'$rut_usuario'","NOMBRE_USUARIO"=>"'$nombre_usuario'","APELLIDOS_USUARIO"=>"'$apellidos_usuario'");
		$this->_Controller->Update($this->_tabla,$this->_registro,$sql);
	}	

}



public function Table()
{
	$sql= "SELECT * FROM USUARIOS";
	$result = $this->_Controller->ejecute($sql);
	$nfilas = mysql_num_rows($result);
	$tabla="";
	if($nfilas > 0)
	{
		$tabla = "<table class='filapar' align='center' border=1>"; 
		$tabla = $tabla. "<tr class='titulosTabla'><td>N°</td><td>Usuario</td><td>Departamento</td><td>Editar</td></tr>";
		for($i=0;$i<$nfilas;$i++)
		{
			$id_usuario= mysql_result($result,$i,0);
			$departamento = mysql_result($result,$i,1);
			$nombre_usuario = mysql_result($result,$i,3);
			$apellidos_usuario = mysql_result($result,$i,4);
			$indice = $i+1;
			$tabla = "$tabla <tr>";
			$tabla = "$tabla <td> $indice </td>";
			$tabla = "$tabla <td> $nombre_usuario $apellidos_usuario </td>";
			$tabla = "$tabla <td>$departamento</td>";
			$tabla = "$tabla <td align='center' ><a href='paso.php?c=8&editar=".$id_usuario."'><img border=0 src='imagenes/editar.jpg' width='15' height='15' ></a></td>";
			//$tabla = "$tabla <td align='center' ><a href='javascript: display_alert($id_usuario)' ><img border=0 src='imagenes/delete.jpg' width='15' height='15'></a></td>";
			$tabla = "$tabla </tr>";
		}
		$tabla = $tabla . "</table>";
	}
	return $tabla;
}




}
?>
