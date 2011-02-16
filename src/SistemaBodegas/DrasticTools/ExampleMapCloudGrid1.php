<?php
define("PATHDRASTICTOOLS", "");
include(PATHDRASTICTOOLS."Examplemysqlconfig.php");
include(PATHDRASTICTOOLS."drasticSrcMySQL.class.php");
$options = array(
	"delete_allowed" => false,
	"add_allowed" => false,
	"editablecols" => array ()
);
$src = new drasticSrcMySQL($server, $user, $pw, $db, "mountains", $options);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/cloud_default.css"/>
<link rel="stylesheet" type="text/css" href="css/grid_default.css"/>
<link rel="stylesheet" type="text/css" href="css/map_default.css"/>
<title>ExampleMapCloudGrid1</title>
</head><body>
<script type="text/javascript" src="js/mootools-1.2-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2-more.js"></script>
<script type="text/javascript" src="js/drasticCloud.js"></script>
<script type="text/javascript" src="js/drasticGrid.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps?file=api&v=2&key=<?php echo $GApiKey ?>"></script>
<script type="text/javascript" src="js/markermanager.js"></script>
<script type="text/javascript" src="js/drasticMap.js"></script>
<div>
<div id="map1" style="position: absolute; width: 350px; height: 300px; left: 0; top: 0;"></div>
<div id="grid1" style="position: absolute; left: 350px; top: 0;"></div>
<div id="cloud1" style="position: absolute; left: 0; top: 310px"></div>
</div>

<script type="text/javascript">
var themap = new drasticMap('map1', {
	pathimg:"img/", 
	displaycol: "Height",
	onClick: function(id){thecloud.DefaultOnClick(id); thegrid.DefaultOnClick(id); themap.DefaultOnClick(id)}
});
var thecloud = new drasticCloud('cloud1', {
	showmenu: false,
	namecol: "Name",
	sizecol: "Height",
	sortcol: "Height",
	sort: "d",
	onClick: function(id){thecloud.DefaultOnClick(id); thegrid.DefaultOnClick(id); themap.DefaultOnClick(id)}
});
var thegrid = new drasticGrid('grid1', {
	pathimg:"img/",
	pagelength: 14,
	onClick: function(id){thecloud.DefaultOnClick(id); thegrid.DefaultOnClick(id); themap.DefaultOnClick(id)}
});
</script>

</body></html>