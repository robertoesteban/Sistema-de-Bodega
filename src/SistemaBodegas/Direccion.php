<?php
include("../ReglasNegocio/direccion.php");

?>
<body>
<p class="tituloHead">Direccion</p>
<form method="post" action="AgregarDireccionBD.php" name="form">
<table width="400" align="center" class="filaPar">
<tr>
    <td height="31" colspan="6" align="left" >
        <p align="left" class="respDetalleAD"> Direcciones Municipales </p>
        </td>
</tr>

<tr>
<td>Nombre</td>
<td colspan="5"><input name="direccion" type="text" size="50"/></td>
</tr>
<tr>
<td colspan="6" align="center"><input type="submit" name="Ingresar2" value="Ingresar" />
 </td>
</tr>
</table>
</form>
<br>


		<?php
		
		/*
		function recorrer_array($array)
		{
			foreach($array as $idx => $val)
			{
				echo $idx . " - > " . $val . "<br>";
				if (is_array($idx))
				{
					recorrer_array($idx);
				}
				if (is_array($val))
				{
					recorrer_array($val);
				}
			}
		}

//Llamas a la funcion
$direccion = new direccion();
$AllDireccion = $direccion->GetAll();

recorrer_array($AllDireccion);
*/
$direccion = new direccion();
$AllDireccion = $direccion->GetAll();

$claves= array_keys($AllDireccion);
$cant = count($AllDireccion);
if($cant > 0)
{ 
	echo "<table border=1  width='400' align='center' class='filaPar'>";
	for ($i=0;$i<$cant;$i++)
	{
		echo "<tr align='center'>";
		$value=count($AllDireccion["$claves[$i]"]);
		$claves2 =array_keys($AllDireccion["$claves[$i]"]);
		$cant2 =count($AllDireccion["$claves[$i]"]);
		//echo $cant2."<br>";
		foreach ($AllDireccion["$claves[$i]"] as $valor)
		{
			echo ("<td>$valor </td>");     
		}
		echo "<td><a href='Direccion.php?editar=".$claves[$i]."'><img border=0 src='imagenes/editar.jpg' width='20' height='20' ></a></td>";
		echo "<td><a href='Direccion.php?eliminar=".$claves[$i]."'><img border=0 src='imagenes/delete.jpg' width='20' height='20'></a></td>";
		echo "</tr>";
	}
	echo "</table>";			
}	
		?>



</body>