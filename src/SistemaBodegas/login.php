﻿<div style="text-align:right;"> 
  <form id="formulariologin" action="control.php" method="POST" autocomplete="off"> 
    <label><em>Rut : </em><input type="text"     id="usuario"  name="usuario" class="input"/></label> 
    <label><em>Contrase&ntilde;a : </em><input type="password" id="contrasena" name="contrasena" class="input"/></label> 
    <input type="submit" class="button alignright" name="submit" id="submit" value="Aceptar" style="margin:0"/> 
  </form> 
</div> 
 
<!--script type="text/javascript"> 
  $("#formulariologin").submit(function(ev) {
    if ($("nombre").val() == "" | $("password").val() == "") {
      $.lightbox().shake();
      ev.preventDefault();
    }
  });
</script-->
