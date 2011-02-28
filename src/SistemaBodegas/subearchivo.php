<? 
if($_POST["submit"]=="Enviar"){
//datos del arhivo 
$nombre_archivo = $_FILES['userfile']['name']; 
$tipo_archivo = $_FILES['userfile']['type']; 
$tamano_archivo = $_FILES['userfile']['size']; 
$destino="./OC/".$nombre_archivo;
//compruebo si las características del archivo son las que deseo 
if (!($tamano_archivo < 100000)) { 
    echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
}else{ 
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $destino)){ 
     //  echo "El archivo ha sido cargado correctamente."; 
     header ("Location: paso.php?c=1");
    }else{ 
       echo "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
    } 
}
}
header ("Location: paso.php?c=1"); 
?>
