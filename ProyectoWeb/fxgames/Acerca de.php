<?php
    session_start();
    include "./FuncionesPHP/conexionDB.php";
?>
<!DOCTYPE html> 
<html lang="es-ES">
 <head>
    <title>FXGames</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/jpg" href="<?php echo obtenerImagen('icono'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./csspropio/estilos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./jspropio/jsPropio.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
 <body>
     <!--Inluimos la cabecera-->
      <?php include "./cabecera.php" ?>
     <!--Iniciamos contenido página-->
       <div class="row">
        <p class="col-lg-4 col-sm-4 col-xl-4"></p>
        <h2 class="col-lg-4 col-sm-4 col-xl-4 titproducto">ACERCA DE</h2>
        <p class="col-lg-4 col-sm-4 col-xl-4"></p>
    </div><br>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
          <p class="col-lg-8 col-sm-8 col-xl-8">Nuestro equipo se compone de personas expertas, que llevan muchos años en el sector de los videojuegos. Esta experiencia nos avala y nos garantiza la posibilidad de ofrecer un servicio de calidad con precios importantes, un gran catálogo con productos en stock y la disponibilidad de los productos más buscados.</p>
          <p class="col-lg-2 col-sm-8 col-xl-8"></p>
     </div>
     <!--Incluimos ubicación-->
     <div class="row">
       <p class="col-lg-1 col-sm-1 col-xl-1"></p>  
   <iframe class="col-lg-6 col-sm-6 col-xl-6" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12152.930404038474!2d-3.6812295814220617!3d40.40369766972558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd42260a991af9a1%3A0x9ae0407bee4eaf17!2sVallekas+Gamer!5e0!3m2!1ses!2ses!4v1549616476937" width="600" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
     <div class="col-lg-5 col-sm-5 col-xl-5">
         <div class="row" style="margin:8%">
            <p class="col-lg-12 col-sm-12 col-xl-12"><b>FXGames</b></p><br>
            <p class="col-lg-12 col-sm-12 col-xl-12">Calle Picos de Europa, 1, 28038 Madrid</p><br>
            <p class="col-lg-12 col-sm-12 col-xl-12"><b>Horarios</b></p><br>
            <p class="col-lg-12 col-sm-12 col-xl-12">Lunes a Viernes de 08.00-13.30 y de 15.30 a 19.00 horas.</p><br>
            <p class="col-lg-12 col-sm-12 col-xl-12">Sabados 09.00-14.00 horas.</p><br>
            <p class="col-lg-12 col-sm-12 col-xl-12"><b>Telefono</b> : 622 11 45 83 fxgames2020@gmail.com.</p><br>
         </div>
       </div>
     </div>
     <div class="row" style="text-align:center;font-size:20px; ">
         <p class="col-lg-1 col-sm-1 col-xl-1"></p>
         <p class="col-lg-10 col-sm-10 col-xl-10">Si te apasionan los videojuegos y quieres participar en nuestro proyecto.</p><br>
         <p class="col-lg-1 col-sm-1 col-xl-1"></p>
     </div>
     <div class="row" style="text-align:center;font-size:20px; ">   
         <p class="col-lg-1 col-sm-1 col-xl-1"></p>
         <p class="col-lg-10 col-sm-10 col-xl-10" style="border-bottom: PowderBlue 8px solid"><b>¡Contáctanos!</b></p><br>  <br>
         <p class="col-lg-1 col-sm-1 col-xl-1"></p>
     </div>
     <!--Incluimos el footer-->
       <?php include "footer.php" ?>
     </body>
    </html>

       