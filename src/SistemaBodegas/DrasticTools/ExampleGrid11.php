<?php
/*define("PATHDRASTICTOOLS", "");
include (PATHDRASTICTOOLS . "Examplemysqlconfig.php");
include (PATHDRASTICTOOLS . "drasticSrcMySQL.class.php");
$src = new drasticSrcMySQL("localhost", "root", "galadriel", "drasticdata", "mountains");*/
//$src = new drasticSrcMySQL($server, $user, $pw, $db, "mountains");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<div id="grid1"></div>
<body>
<link rel="stylesheet" type="text/css" href="DrasticTools/css/grid_default.css"/>
<script type="text/javascript" src="DrasticTools/js/mootools-1.2-core.js"></script>
<script type="text/javascript" src="DrasticTools/js/mootools-1.2-more.js"></script>
<script type="text/javascript" src="DrasticTools/js/drasticGrid.js"></script>
<script type="text/javascript">
thegrid = new drasticGrid('grid1', {
	pathimg:"DrasticTools/img/",
	pagelength:15,
	columns: [
		{name: 'ID_TIPO_OGRA', displayname:'#', width: 40},
		{name: 'NOMBRE_TIPO_OBRA', width: 100},
		//{name: 'Height', width: 60},       
		/*{name: 'Continent', displayname:'Renamed Continent',
			type: DDTYPEKEY, values:['Europe','Asia', 'North-America', 'South-America', 'Oceania', 'Africa', 'Antarctica'], labels:['EU','AS', 'NA', 'SA', 'OC', 'AF', 'ANT'], width: 140}                */
		// Of course, the DDTYPEKEY type will typically be used to 
		// map user-unfriendly values ('0', '1', '2') to meaningful names ('Africa', 'Europe', 'Asia').
		// The meaningful names can then be read from a lookup table in the database.
    ]
});
</script>

</body>
