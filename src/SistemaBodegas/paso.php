<?php $c = $_GET[c];?>
<html>
<head>
<title>Sistema bodega Municipal</title>
<link href="css/estiloMozilla.css" rel="stylesheet" type="text/css">
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<SCRIPT LANGUAGE="JavaScript" SRC="../funcionesJC/ValidaRut.js"></SCRIPT><!-- JC -->
<link type="text/css" rel="stylesheet" href="CalendarioJC/src/css/jscal2.css" />
<link type="text/css" rel="stylesheet" href="CalendarioJC/src/css/border-radius.css" />

    <!-- <link type="text/css" rel="stylesheet" href="src/css/reduce-spacing.css" /> -->
    <link id="skin-win2k" title="Win 2K" type="text/css" rel="alternate stylesheet" href="CalendarioJC/src/css/win2k/win2k.css" />
    <link id="skin-steel" title="Steel" type="text/css" rel="alternate stylesheet" href="CalendarioJC/src/css/steel/steel.css" />
    <link id="skin-gold" title="Gold" type="text/css" rel="alternate stylesheet" href="CalendarioJC/src/css/gold/gold.css" />
    <link id="skin-matrix" title="Matrix" type="text/css" rel="alternate stylesheet" href="CalendarioJC/src/css/matrix/matrix.css" />
    <link id="skinhelper-compact" type="text/css" rel="alternate stylesheet" href="CalendarioJC/src/css/reduce-spacing.css" />
    <script src="CalendarioJC/src/js/jscal2.js"></script>
    <script src="CalendarioJC/src/js/lang/es.js"></script>
    <script src="CalendarioJC/src/js/lang/en.js"></script>


</head>
<body>
<p class="tituloHead">
<?php include("menu.php");?>
</p>
<?php 
		if($c=="1"){
			include("ingresar_oc.php");
		}
		if($c=="2"){
			include("Ingresar_Material.php");}
		if($c=="3"){
			include("Ingresar_Custodia.php");}
		if($c=="4"){
			include("Ingresar_Obra.php");}
		if($c=="5"){
			include("Retirar_Material.php");}
		if($c=="6"){
			include("Retirar_Custodia.php");}
		if($c=="7"){
			include("Eliminar_Obra.php");}?>
			
			<?php include("pie.php");?>
</body>
<html>
