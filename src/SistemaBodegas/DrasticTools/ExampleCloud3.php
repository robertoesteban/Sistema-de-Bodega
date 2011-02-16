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
<title>ExampleCloud3</title>
</head><body>
<script type="text/javascript" src="js/mootools-1.2-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2-more.js"></script>
<script type="text/javascript" src="js/drasticCloud.js"></script>

<div id="cloud"></div>
<script type="text/javascript">
var thecloud = new drasticCloud('cloud', {
	showmenufull: false, 
	namecol: "Name",
	sizecol: "Height",
	colorcol: "Climbed",
	sortcol: "Name",
	sort: "a"
});
</script>

</body></html>