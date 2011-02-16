<?php
define("PATHDRASTICTOOLS", "");
include (PATHDRASTICTOOLS . "Examplemysqlconfig.php");
include (PATHDRASTICTOOLS . "drasticSrcMySQLExampleGrid9.class.php");
$src = new drasticSrcMySQL($server, $user, $pw, $db, "does not matter");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/grid_default.css"/>
<title>ExampleGrid9</title>
</head><body>
<script type="text/javascript" src="js/mootools-1.2-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2-more.js"></script>
<script type="text/javascript" src="js/drasticGrid.js"></script>

<span style="font-family: arial">Table:</span>
<select id='tablename'>
<option value='country'>country</option>
<option value='mountains'>mountains</option>
<option value='examplegrid8'>examplegrid8</option>
</select>
<br><br>
<div id="grid1"></div>
<script type="text/javascript">

var tableselector = $('tablename');
tableselector.addEvent('change', function(){rebuild_table()});
var thegrid = null;
rebuild_table();

function rebuild_table() {
	if (thegrid) $('grid1').empty();
	thegrid = new drasticGrid('grid1', {
		pathimg:"img/",
		pagelength:10,
		addparams:"&tablename="+tableselector.value
	});
}
</script>

</body></html>