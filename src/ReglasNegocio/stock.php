<?php
include("../AccesoDatos/Controller.php");

class stock{
	public $id_stock;
	public $precio_stock;
	public $cantidad_stock;
	public $minimo_stock;
	private $_tabla = "STOCK";
	private $registro="ID_STOCK";
	private $Controller;

	function __construct(){ $this->Controller=new Controller();}

	function usuario($id_stock,$precio_stock,$cantidad_stock,$minimo_stock){
		$this->id_stock=$id_stock;
		$this->precio_stock=$precio_stock;
		$this->cantidad_stock=$cantidad_stock;
		$this->minimo_stock=$minimo_stock;
	}
	
	function Getid_stock()	{return $this->id_stock;}
	function Getprecio_stock()	{return $this->precio_stock;}
	function Getcantidad_stock()	{return $this->cantidad_stock;}
	function Getminimo_stock()	{return $this->minimo_stock;}
	
	function Setid_stock($id_stock) {$this->id_stock= $id_stock;}
	function Setprecio_stock($precio_stock) {$this->precio_stock= $precio_stock;}
	function Setcantidad_stock($cantidad_stock) {$this->cantidad_stock= $cantidad_stock;}
	function Setminimo_stock($minimo_stock) {$this->minimo_stock= $minimo_stock;}
	
	
	public function Select($id_stock){
	if(isset($id_stock) && $id_stock != "")
		{
			$sql="$id_stock";
			$arr=$Controller->Select($this->_tabla,$this->registro, $sql);
			return $arr; 
		}
	}
	
	public function Add($id_stock,$precio_stock,$cantidad_stock,$minimo_stock)
	{
		if(isset($id_stock) && $id_stock != "")
		{
			$sql=" 0 ,$id_stock, $precio_stock , $cantidad_stock , $minimo_stock";
			$this->Controller->Add($this->_tabla, $sql);	
		}
	}
	public function Del($id_stock)
	{
		if(isset($id_stock) && $id_stock != "")
		{
			$sql="$id_stock";
			$Controller->Del($this->_tabla,$this->registro, $sql);
			
		}
		
	}
	
	public function Update($id_stock,$precio_stock,$cantidad_stock,$minimo_stock){
		$sql=array("ID_STOCK"=>"$id_stock","PRECIO_STOCK"=>"$precio_stock","CANTIDAD_STOCK"=>"$cantidad_stock","MINIMO_STOCK"=>"$minimo_stock");
		$Controller->Update($this->_tabla,$this->registro,$sql);
		
	}

}
?>
