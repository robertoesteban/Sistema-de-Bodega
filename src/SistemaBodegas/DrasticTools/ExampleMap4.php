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
<link rel="stylesheet" type="text/css" href="css/map_default.css"/>
<title>ExampleMap4</title>
</head><body>

<script type="text/javascript" src="js/mootools-1.2-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2-more.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps?file=api&v=2&key=<?php echo $GApiKey ?>"></script>
<script type="text/javascript" src="js/markermanager.js"></script>
<script type="text/javascript" src="js/drasticMap.js"></script>

<table><tr>
<td><div id="map1" style="width: 400px; height: 400px;"/></td>
</tr></table>
<script type="text/javascript">
var thegrid1 = new drasticMap('map1', {
	pathimg:"img/",
    columns: [
        {name: 'id'},
        {name: 'Name', displayname: 'newName'},
		{name: 'Continent', displayname: 'Cont'}
    ]
	});
</script>

</body></html>