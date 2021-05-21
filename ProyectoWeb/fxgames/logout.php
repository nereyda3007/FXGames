<?php  
session_start();  
//vaciar el contenido de la variable sesión para luego destruirla. Esto es necesario para que funcione en el servidor, porque se cerraba la sesión pero se quedaba el contenido guardado en un archivo temporal.
$_SESSION = array();  

session_destroy();  

header ("Location: index.php"); 
?>