<?php

define('HEADERS', 'From: fxgames2020@gmail.com');
define('TO', 'fxgames2020@gmail.com');


function recuperarPass($email, $pass) {
    $subject = "[FXGames] Recuperación de contraseña";
    $msg = "Hemos modificado su contraseña. \n Puede acceder a nuestra web con la contraseña que le facilitamos. \n \t Nueva Contraseña: ".$pass."\nLe recomendamos que modifique la contraseña facilitada una vez se haya logueado.";
    mail($email, $subject, $msg, HEADERS);
}

function enviarIncidencia($tit,$nombre,$ape,$email,$asunto){
    $header = "From: ".$email;
    $msg = "Nombre: ".$nombre." ".$ape."\n\n".$asunto;
    mail(TO, $tit, $msg, $header);
    reenviarIncidencia($email,$msg,$tit);
}

function reenviarIncidencia($email,$msg,$tit){
    $tit = "RE:".$tit;
    $msg = "Hemos recibido su solicitud. Nuestro departamento de Atención al Cliente tramitará la petición en un plazo de 24/48h hábiles.\nGracias por contactar con nosotros.\nA continuación le mostramos su solicitud:\n\n".$msg."\n\n Por favor, no responder a este correo.\nAtentamente el equipo de FXGames S.L.";
    mail($email,$tit,$msg,HEADERS);
}

function enviarMailCompra($email){
    $tit = "FXGames Compra Realizada";
    $msg = "Su compra se ha realizado correctamente. En breve recibirá los productos que ha adquirido.\n\nGracias por confiar en nosotros! \nLe animamos a seguir confiando en nosotros para sus futuras compras :)\nAtentamente el equipo de FXGames S.L.";
    mail($email,$tit,$msg,HEADERS);
}

function enviarMailNuevoUsuario($email,$nombre,$ape,$pass){
    $tit = "Alta en FXGames!";
    $msg = $nombre." ".$ape." Bienvenido a nuestra comunidad de FXGames!\n\nLe damos las gracias por registrarse en nuestra web y confiar en nosotros.\nLos datos de acceso son los siguientes:\nUsuario:\t".$email."\nContraseña:\t".$pass."\n\nVisite nuestra web y disfrute de nuestras Ofertas.\nAtentamente el equipo de FXGames S.L.";
    mail($email,$tit,$msg,HEADERS);
}