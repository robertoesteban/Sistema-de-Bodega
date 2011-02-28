<?php
session_start();
$c = $_GET[c];
$$errorusuario = $_GET[errorusuario];

define("PATHDRASTICTOOLS", "");
include (PATHDRASTICTOOLS . "DrasticTools/Examplemysqlconfig.php");
include (PATHDRASTICTOOLS . "DrasticTools/drasticSrcMySQL.class.php");
$src = new drasticSrcMySQL("localhost", "root", "galadriel", "BodegaMunicipal", "TIPOS_OBRAS");?>
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
	<link rel="stylesheet" type="text/css" media="screen, projection" href="confirmacion/jConfirmAction/jConfirmAction/demo.css" />
		<script type="text/javascript" src="confirmacion/jConfirmAction/jConfirmAction/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="confirmacion/jConfirmAction/jConfirmAction/jconfirmaction.jquery.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.ask-plain').click(function(e) {
					e.preventDefault();
					thisHref	= $(this).attr('href');
					if(confirm('Are you sure')) {
						window.location = thisHref;
					}
				});
				$('.ask-custom').jConfirmAction({question : "Anda Yakin?", yesAnswer : "Ya", cancelAnswer : "Tidak"});
				$('.ask').jConfirmAction();
			});
		</script>
</head>
<?php
	if ($_SESSION["autentificado"] == "SI")
	{?>
	<p class="tituloHead">
		<?php include("menu.php");?>
	</p>
	<?php 
		if($c=="0"){
			include 'Bienvenido.php';
		}
		if($c=="1"|| $c=="1.1"){
			if($c=="1"){
			session_start();
			$au=$_SESSION["autentificado"];
			$name=$_SESSION["nombre_usuario"];
			$ap=$_SESSION["apellidos_usuario"];
			$tipo=$_SESSION["tipo"];
			session_unset();
			$_SESSION["autentificado"]=$au;
			$_SESSION["nombre_usuario"]=$name;
			$_SESSION["apellidos_usuario"]=$ap;
			$_SESSION["tipo"]=$tipo;
			}
			include'ingresar_oc.php';
		}
		if($c=="2"){
			include 'Ingresar_Material.php';}
		if($c=="3"){
			include 'Ingresar_Custodia.php';}
		if($c=="4"){
			include 'Ingresar_Obra.php';}
		if($c=="5"){
			include 'Retirar_Material.php';}
		if($c=="6"){
			include 'Retirar_Custodia.php';}
		if($c=="7"){
			include 'Eliminar_Obra.php';}
		if($c=="8"){
			include 'Ingresar_Usuario.php';}
		if($c=="9"){
			include 'Buscar_Usuario.php';}
		if($c=="a"){
			include 'Editar_Usuario.php';}
		if($c=="b"){
			include 'Ingreso_Traspaso.php';}
		if($c=="c"){
			include 'Salida_Traspaso.php';}
		if($c=="d"){
			include 'Salida_Merma.php';}
		if($c=="e"){
			include 'Direccion.php';}
		if($c=="f"){
			include 'subir.php';}
		if($c=="y"){
			include 'Departamento.php';}
		if($c=="z"){
			include 'Ciudad.php';}
		if($c=="x"){
			include 'Bodega.php';}
		if($c=="w"){
			include 'Unidad.php';}?>
			
			<?php include 'pie.php';

}
else{?>
<table width="990" align="center">
	<tr><td  class="respDetalleAD"><p align="center" class="Estilo3"> NO HA INICIADO SESION</p></td>
	</tr>
</table>
<?php }
?>

<html>
