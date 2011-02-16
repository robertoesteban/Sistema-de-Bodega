<?php
define("PATHDRASTICTOOLS", "");
include(PATHDRASTICTOOLS."Examplemysqlconfig.php");
include(PATHDRASTICTOOLS."drasticSrcMySQL.class.php");
// Note that we do not call this file for the datasource
// Since we have two different data sources for two different grids
// we call the data sources from examples 4 and 8 respectively
// see the 'path' variables below
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/grid_default.css"/>
<title>ExampleGrid7</title>
</head><body>
<script type="text/javascript" src="js/mootools-1.2-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2-more.js"></script>
<script type="text/javascript" src="js/drasticGrid.js"></script>

<div id="grid1"></div>
<div id="grid2"></div>
<script type="text/javascript">
var thegrid1 = new drasticGrid('grid1', {
	path: "ExampleGrid4.php",
	pathimg:"img/",
	pagelength: 10,
	columns: [
		{name: 'id', width: 40},
		{name: 'name'},		
		{name: 'email', type: DDTYPEMAILTO, width: 140},
		{name: 'www', type: DDTYPEURL, width: 180},
		{name: 'present'}				
		]});
		
var thegrid2 = new drasticGrid('grid2', {pathimg:"img/", pagelength:10,
	path: "ExampleGrid8.php",
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