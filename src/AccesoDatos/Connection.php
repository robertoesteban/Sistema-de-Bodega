<?php
class Connection
{
	private $_bdhost, $_bduser, $_bdpasswd, $_bdbase, $_bdconnection, $_bd;

	function Getbdhost()	{return $this->_bdhost;}
	function Getbduser()	{return $this->_bduser;}
	function Getbdpasswd()	{return $this->_bdpasswd;}
	public function Getbdbase()	{return $this->_bdbase;}
	
	function __construct()
	{
		$this->_bdhost = "localhost";
		$this->_bduser ="user";
		$this->_bdpasswd = "pwd";
		$this->_bdbase = "bd";
	}

	//Conectarse con el Servidor
	public function Connect()
	{
		$this->_bdconnection = mysql_connect($this->_bdhost, $this->_bduser, $this->_bdpasswd)
			or die ("No se puede Conectar con el Servidor ");
		$this->_bd = mysql_select_db($this->_bdbase)
			or die ("No se puede seleccionar la BD ");
	}

	// DesConectarse del Servidor
	public function Disconnect()
	{
		mysql_close($this->_bdconnection);
	}
}
?>
