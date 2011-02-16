<?php
define("PATHDRASTICTOOLS", "");
include(PATHDRASTICTOOLS."Examplemysqlconfig.php");
include(PATHDRASTICTOOLS."drasticSrcMySQL.class.php");
$src = new drasticSrcMySQL($server, $user, $pw, $db, "mountains");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/cloud_default.css"/>
<link rel="stylesheet" type="text/css" href="css/grid_default.css"/>
<title>ExampleCloudGrid1</title>
</head><body>
<script type="text/javascript" src="js/mootools-1.2-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2-more.js"></script>
<script type="text/javascript" src="js/drasticCloud.js"></script>
<script type="text/javascript" src="js/drasticGrid.js"></script>
<div id="cloud1" style="width: 100%"></div>
<div id="space1" style="height: 30px"></div>
<div id="grid1" style="width: 700px; height: 350px;"></div>
<script type="text/javascript">
var thecloud = new drasticCloud('cloud1', {
	showmenufull: true, 
	namecol: "Name",
	sizecol: "Height",
	onClick: function(id){thecloud.DefaultOnClick(id); thegrid.DefaultOnClick(id)}
});
var thegrid = new drasticGrid('grid1', {
	pathimg: "img/",
	pagelength: 8,
	onClick: function(id){thecloud.DefaultOnClick(id); thegrid.DefaultOnClick(id)}
});
</script>

</body></html>