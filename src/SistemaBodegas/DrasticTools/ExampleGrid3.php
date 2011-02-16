<?php
define("PATHDRASTICTOOLS", "");
include(PATHDRASTICTOOLS."Examplemysqlconfig.php");
include(PATHDRASTICTOOLS."drasticSrcMySQL.class.php");
class mysrc extends drasticSrcMySQL {
	protected function select(){
		$res = mysql_query("SELECT * FROM $this->table WHERE Continent='Europe'" . $this->orderbystr, $this->conn) or die(mysql_error());
		return ($res);
	}	
	protected function add(){
		mysql_query("INSERT INTO $this->table (Continent) VALUES('Europe')", $this->conn) or die(mysql_error());
		if (mysql_affected_rows($this->conn) == 1) return(true); else return(false);
	}
}
$options = array(
	"add_allowed" => true,
	"delete_allowed" => true,
	"editablecols" => array("Population", "LocalName"),
	"sortcol" => "Population",
	"sort" => "a"
);
$src = new mysrc($server, $user, $pw, $db, $table, $options);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/grid_default.css"/>
<title>ExampleGrid3</title>
</head><body>
<script type="text/javascript" src="js/mootools-1.2-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2-more.js"></script>
<script type="text/javascript" src="js/drasticGrid.js"></script>

<div id="grid1"></div>
<script type="text/javascript">
var thegrid = new drasticGrid('grid1', {
	pathimg:"img/",	
	sortcol:"LocalName", 
	sort:"a",
	sliderposition: "left"
});
</script>

</body></html>