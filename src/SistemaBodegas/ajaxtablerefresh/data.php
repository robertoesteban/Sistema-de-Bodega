<?php
//connect to database
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'galadriel';
$dbname = 'BodegaMunicipal';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db($dbname);

//NOTE: MAKE SURE YOU DO YOUR OWN APPROPRIATE SERVERSIDE ERROR CHECKING HERE!!!
if(!empty($_POST) && isset($_POST))
{
	//make variables safe to insert
  $name = mysql_real_escape_string($_POST['name']);
  $surname = mysql_real_escape_string($_POST['surname']);
  $rut = mysql_real_escape_string($_POST['rut']);

	//query to insert data into table
	$sql = "INSERT INTO USUARIOS SET NOMBRE_USUARIO = '$name', APELLIDOS_USUARIO = '$surname',RUT_USUARIO='$rut'";
	$result = mysql_query($sql);
	if(!$result)
	{
		echo "Failed to insert record";
	}
	else
	{
		echo "Record inserted successfully";
	}
}
?>

<table width="300" border="1">
	<tr>
		<td><b>#</b></td>
		<td><b>Name</b></td>
		<td><b>Email</b></td>
	</tr>
	<?php
	//show data from tables
	$sql = "SELECT * FROM USUARIOS";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	while($row[0]!=null)
	{
	?>
	<tr>
		<td><?php echo $row['USUARIO_ID']; ?></td>
		<td><?php echo $row['NOMBRE_USUARIO']; ?></td>
		<td><?php echo $row['APELLIDOS_USUARIO']; ?></td>
		<td><?php echo $row['RUT_USUARIO']; ?></td>
	</tr>
	<?php
	$row = mysql_fetch_array($result);
	}
	?>
</table>
