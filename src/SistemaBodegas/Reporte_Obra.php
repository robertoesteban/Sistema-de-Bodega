<?php


$nombre_obra = $_POST["nombre_obra"];
$todos_check = $_POST["todos_check"];
$sFechaNormal = $_POST["fecha_inicio"];
$fecha_inicio = implode( '-', array_reverse( explode( '-', $sFechaNormal ) ) ) ;
$fecha_inicio_check = $_POST["fecha_inicio_check"];
$sFechaNormal = $_POST["fecha_termino"];
$fecha_termino = implode( '-', array_reverse( explode( '-', $sFechaNormal ) ) ) ;
$fecha_termino_check = $_POST["fecha_termino_check"];
$depto = $_POST["departamento"];



include("../AccesoDatos/Controller.php");
include("../ReglasNegocio/departamento.php");
include("../ReglasNegocio/obra.php");

$departamento = new departamento();
$obra = new obra();

?>    
<script LANGUAGE="JavaScript">

function pulsarobra(e) {
    tecla=(document.all) ? e.keyCode : e.which;
    if (tecla==13) return document.form.tipo_obra.focus();
}
 

</script>
<body onload="document.form.nombre_obra.focus();"> 

<p class="tituloHead">Obras</p>
<form method="post" action="" name="form">
<table width="600" align="center" border="0" class="filaPar">
<tr>
    <td height="31" colspan="4" align="left" >
        <p align="left" class="respDetalleAD"> Buscador de Obras Municipales </p>
    </td>
</tr>
<tr>
	<td width="70">
		Nombre
	</td>
	<td colspan="3">
	<input name='nombre_obra' type='text' size='50'  onkeypress='return pulsarobra(event)'  />
	</td>

</tr>
<tr>
	<td >Fecha Inicio</td>
	<td ><script type="text/javascript">//<![CDATA[
   
                  LEFT_CAL.addEventListener("onSelect", function(){
                          var ta = document.getElementById("f_selection");
                          ta.value = this.selection.countDays() + " days selected:\n\n" + this.selection.print("%Y/%m/%d").join("\n");
                  });

                //]]></script>
        <input readonly="" name="fecha_inicio" id="fecha_inicio" size="8" maxlength="8" />
        <input type="checkbox" name="fecha_inicio_check" value="fecha_inicio_check" >
				<!--button id="f_rangeEnd_trigger" >...</button-->
				<a id="f_rangeStart_trigger" href="#">Calendario</a>
    <!--button id="f_clearRangeEnd" onclick="clearRangeEnd()">clear</button-->      
	<script type="text/javascript">
                  //function CalendarJC(){
				  new Calendar({
                          inputField: "fecha_inicio",
                          dateFormat: "%d-%m-%Y",
                          trigger: "f_rangeStart_trigger",
                          bottomBar: false,
                          onSelect: function() {
                                  var date = Calendar.intToDate(this.selection.get());
                                  LEFT_CAL.args.max = date;
                                  LEFT_CAL.redraw();
                                  this.hide();
                          }
                  });
                  
      </script>

      </td>
	<td >Fecha Termino</td>
	<td ><script type="text/javascript">//<![CDATA[
   
                  LEFT_CAL.addEventListener("onSelect", function(){
                          var ta = document.getElementById("f_selection");
                          ta.value = this.selection.countDays() + " days selected:\n\n" + this.selection.print("%Y/%m/%d").join("\n");
                  });

                //]]></script>
        <input readonly="" name="fecha_termino" id="fecha_termino" size="8" maxlength="8" />
                <input type="checkbox" name="fecha_termino_check" value="fecha_termino_check" >
				<!--button id="f_rangeEnd_trigger" >...</button-->
				<a id="f_rangeEnd_trigger" href="#">Calendario</a>
    <!--button id="f_clearRangeEnd" onclick="clearRangeEnd()">clear</button-->      
	<script type="text/javascript">
                  //function CalendarJC(){
				  new Calendar({
                          inputField: "fecha_termino",
                          dateFormat: "%d-%m-%Y",
                          trigger: "f_rangeEnd_trigger",
                          bottomBar: false,
                          onSelect: function() {
                                  var date = Calendar.intToDate(this.selection.get());
                                  LEFT_CAL.args.max = date;
                                  LEFT_CAL.redraw();
                                  this.hide();
                          }
                  });
                  
      </script></td>
</tr>
<tr>
<td> Departamento</td>
<td colspan="5">
	<select name="departamento">
		<option value=0> Seleccionar </option>
		<?php
		$AllDepartamento = $departamento->GetAll();
		$claves= array_keys($AllDepartamento);
		$cant = count($AllDepartamento);
		if($cant > 0)
		{
			for ($i=0;$i<$cant;$i++)
			{
							
				echo "<option value=$claves[$i]";
				if($claves[$i]==$id_departamento) echo " selected ";
				echo ">";
				foreach ($AllDepartamento["$claves[$i]"] as $valor)
				{
					echo "$valor</option>";     
				}
			}
		}			
		?>
	</select>

</td>
</tr>
<tr>
<td colspan="6" align="center">
	<input type="submit" name="button1" value="Consultar" />
</td>
</tr>

</table>
<br>
<?php 

if (empty($nombre_obra)) 	$NOMBRE = "";
else { $NOMBRE = " NOMBRE_OBRA LIKE '%$nombre_obra%'"; }

if ((!$fecha_inicio_check) or (empty($fecha_inicio)) ) $FECHA_INICIO = "";
else	{ $FECHA_INICIO = " FECHA_INICIO_OBRA  > '$fecha_inicio' "; }  
	
if ((!$fecha_termino_check) or (empty($fecha_termino)) )	$FECHA_TERMINO = "";
else	{ $FECHA_TERMINO = " FECHA_INICIO_OBRA  < '$fecha_termino' ";  }

if ($depto == 0 ) $DEPARTAMENTO = "";
else { $DEPARTAMENTO = "ID_DEPARTAMENTO = $depto"; }

$sql = "SELECT * FROM OBRAS ";

if(!empty($NOMBRE))
{
	$sql = "$sql WHERE  ( $NOMBRE";
	if(!empty($FECHA_INICIO))  $sql = "$sql AND $FECHA_INICIO";
	if(!empty($FECHA_TERMINO)) $sql = "$sql AND $FECHA_TERMINO";
	if(!empty($DEPARTAMENTO)) $sql = "$sql AND $DEPARTAMENTO";
	$sql = "$sql )";
}
elseif(!empty($FECHA_INICIO))
{
	$sql = "$sql WHERE ( $FECHA_INICIO";
	if(!empty($FECHA_TERMINO)) $sql = "$sql AND $FECHA_TERMINO";
	if(!empty($DEPARTAMENTO)) $sql = "$sql AND $DEPARTAMENTO";
	$sql = "$sql )";
}	
elseif(!empty($FECHA_TERMINO))
{
	$sql = "$sql WHERE ( $FECHA_TERMINO";
	if(!empty($DEPARTAMENTO)) $sql = "$sql AND $DEPARTAMENTO";
	$sql = "$sql )";
}
elseif(!empty($DEPARTAMENTO))
{
	$sql = "$sql WHERE ( $DEPARTAMENTO";
	$sql = "$sql )";
}

if ($_POST["hd_variable"]=="consultar")
	//echo $sql;
	echo $obra->TablePersonalizada($sql);

?> 
<input type="hidden" name="hd_variable" value="consultar"/>
</form>
<br>
</body>
