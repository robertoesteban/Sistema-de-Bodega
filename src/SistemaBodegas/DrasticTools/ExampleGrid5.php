<?php
include("Examplemysqlconfig.php");
include("drasticSrcMySQL.class.php");

$options = array(
	"defaultcols" => array("Continent" => "Europe")
);
$src = new drasticSrcMySQL($server, $user, $pw, $db, $table, $options);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/grid_default.css"/>
<title>ExampleGrid5</title>
</head><body>
<script type="text/javascript" src="js/mootools-1.2-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2-more.js"></script>
<script type="text/javascript" src="js/drasticGrid.js"></script>

<div id="grid1"></div>
<script type="text/javascript">
var thegrid = new drasticGrid('grid1', {
	pathimg:"img/",
	pagelength: 10,
	//renamecols: {"Continent":"Cont", "LocalName":"LN"} 
	//the renamecols option is no longer supported; instead use this:
    columns: [
        {name: 'id', width: 40},
//		{name: 'Code'},        
        {name: 'Name', width: 140, editable: false},
        {name: 'Continent', displayname:'Cont', editable: false},
//		{name: 'SurfaceArea', editable: true},
        {name: 'Population', width: 140, editable: true},
        {name: 'LocalName', displayname:'LN', width: 140, editable: false}				
        ],
	// example of validating a changed value:
	onUpdateStart: function(id, colname, value) {
		if (colname == 'Population' && (value < 300 || value > 10000)) {
			alert('Value of population must be between 300 and 10000');
			this.do_update = false;
		}
		else this.do_update = true;		
	}
});
</script>

</body></html>