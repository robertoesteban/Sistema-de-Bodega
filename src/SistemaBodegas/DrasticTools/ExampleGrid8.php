<?php
define("PATHDRASTICTOOLS", "");
include (PATHDRASTICTOOLS . "Examplemysqlconfig.php");
include (PATHDRASTICTOOLS . "drasticSrcMySQL.class.php");
$options = array (
	"add_allowed" => true,
	"delete_allowed" => true
);
$src = new drasticSrcMySQL($server, $user, $pw, $db, "examplegrid8", $options);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/grid_default.css"/>
<title>ExampleGrid8</title>
</head><body>
<script type="text/javascript" src="js/mootools-1.2-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2-more.js"></script>
<script type="text/javascript" src="js/drasticGrid.js"></script>

<div id="grid1"></div>
<script type="text/javascript">
var thegrid = new drasticGrid('grid1', {pathimg:"img/", pagelength:10,
	columns: [
		{name: 'id', width: 40},
		{name: 'color'},		
		{name: 'value'},
		{name: 'beautiful'},
		{name: 'Comment', editable: true},
		{name: 'image', type: DDTYPEIMG, width: 100, editable: true}			
		]
});
</script>

</body></html>