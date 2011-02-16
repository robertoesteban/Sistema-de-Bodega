<?php
define("PATHDRASTICTOOLS", "");
include (PATHDRASTICTOOLS . "Examplemysqlconfig.php");
include (PATHDRASTICTOOLS . "drasticSrcMySQL.class.php");
class mysrc extends drasticSrcMySQL {
	protected function select(){
		$res = mysql_query("SELECT * FROM mountains JOIN mountains_additional ON mountains.id = mountains_additional.id2" . $this->orderbystr, $this->conn) or die(mysql_error());
		return ($res);
	}
	protected function metadata(){
		$res = mysql_query("SELECT * FROM mountains JOIN mountains_additional ON mountains.id = mountains_additional.id2 LIMIT 1" . $this->orderbystr, $this->conn) or die(mysql_error());
		return ($res);
	}	
}
$options = array(
	"add_allowed" => false,
	"delete_allowed" => false,
	"editablecols" => array()
);
$src = new mysrc($server, $user, $pw, $db, "mountains", $options);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/grid_default.css"/>
<title>ExampleGrid10</title>
</head><body>
<script type="text/javascript" src="js/mootools-1.2-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2-more.js"></script>
<script type="text/javascript" src="js/drasticGrid.js"></script>

<h2>Readonly access to a join of two tables:</h2>
<div id="grid1"></div>

<script type="text/javascript">
thegrid = new drasticGrid('grid1', {
	pathimg:"img/",
	pagelength:15
});
</script>

</body></html>