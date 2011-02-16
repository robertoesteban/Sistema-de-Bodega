<?php
include ("Examplemysqlconfig.php");
include ("drasticSrcMySQL.class.php");
class mysrc extends drasticsrcmysql {
	protected function select(){
		$res = mysql_query("SELECT * FROM $this->table WHERE Continent='Europe'" . $this->orderbystr, $this->conn) or die(mysql_error());
		return ($res);
	}
}
$src = new mysrc($server, $user, $pw, $db, "country_map");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/grid_default.css"/>
<link rel="stylesheet" type="text/css" href="css/map_default.css"/>
<title>ExampleMapGrid1</title>
</head><body>

<script type="text/javascript" src="js/mootools-1.2-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2-more.js"></script>
<script type="text/javascript" src="js/drasticGrid.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps?file=api&v=2&key=<?php echo $GApiKey ?>"></script>
<script type="text/javascript" src="js/markermanager.js"></script>
<script type="text/javascript" src="js/drasticMap.js"></script>

<div id="map1" style="width: 700px; height: 300px;"></div>
<div id="grid1"></div>
<script type="text/javascript">
var themap = new drasticMap('map1', {
	pathimg: "img/",
	displaycol: "Population",
	onClick: function(id){themap.DefaultOnClick(id); thegrid.DefaultOnClick(id)}
});
var thegrid = new drasticGrid('grid1', {
	pathimg: "img/",
	pagelength: 10,
	onClick: function(id){themap.DefaultOnClick(id); thegrid.DefaultOnClick(id)}
});
</script>

</body></html>