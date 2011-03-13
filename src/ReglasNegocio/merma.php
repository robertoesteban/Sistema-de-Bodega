<?php 
class merma{

	private $id_merma;
	private $id_area;
	private $id_obra;
	private $id_material;
	private $observacion;
	private $cantidad;
	private $fecha_merma;
	private $Controller;
	private $tabla="MERMAS";
	private $registro="ID_MERMA";

	function __construct(){ $this->Controller=new Controller();}
	
	public function Add($idmerma,$idarea,$idbodega,$idmaterial,$idobra,$observacion,$cantidad,$fecha){
		$sql="$idmerma,$idarea,$idbodega,$idmaterial,$idobra,'$observacion',$cantidad,'$fecha'";
		$this->Controller->Add($this->tabla,$sql);
	}
	public function GetMayor(){
		$Controller=new Controller();
		$sql="select max(ID_MERMA) as mayor from ".$this->tabla;
		$result=$Controller->ejecute($sql);
		$row=mysql_fetch_array($result);
		return $row["mayor"];
	}
}?>