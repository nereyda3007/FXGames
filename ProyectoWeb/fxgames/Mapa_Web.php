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
     <!--Incluimos la cabecera-->
     <?php include "./cabecera.php" ?>
     <!--Iniciamos contenido página-->
      <div class="row">
        <p class="col-lg-4 col-sm-4 col-xl-4"></p>
        <h2 class="col-lg-4 col-sm-4 col-xl-4 titproducto">MAPA WEB</h2>
        <p class="col-lg-4 col-sm-4 col-xl-4"></p>
    </div><br>
     <div class="row">   
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <ul class="list-group col-lg-2 col-sm-2 col-xl-2">
             <li class="list-group-item"><b>Ofertas</b></li>
             <li class="list-group-item">&gt;<a class="text-info" href="./productos/plantillaAccesorios.php?tipo=ACCESORIOS">Accesorios</a>
             <li class="list-group-item">&gt;<a class="text-info" href="./productos/plantillaConsolas.php?tipo=CONSOLAS">Videoconsolas</a>
             <li class="list-group-item">&gt;<a class="text-info" href="./productos/plantillaMerchandising.php?tipo=MERCHANDISING">Merchandaising</a>
             <li class="list-group-item">&gt;<a class="text-info" href="./productos/plantillaVideojuegos.php?tipo=VIDEOJUEGO">Juegos</a>
        </ul>
        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
        <ul class="list-group col-lg-2 col-sm-2 col-xl-2">
            <li class="list-group-item"><b>Cuenta</b></li>
            <li class="list-group-item">&gt;<a href="./perfil.php">Iniciar Sesión</a> </li>
            <li class="list-group-item">&gt;<a href="./registro.php">Registrarse</a> </li>
        </ul>
        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
        <ul class="list-group col-lg-2 col-sm-2 col-xl-2">
            <li class="list-group-item"><b>La tienda</b></li>
            <li class="list-group-item">&gt;<a class="text-info" data-toggle="collapse" href="#videojuegos">Videojuegos</a>
                <div class="collapse" id="videojuegos"><br>
                    <p><a href="./productos/plantillaVideojuegos.php?categoria=PS4">Juegos de PS4</a></p>
                    <p><a href="./productos/plantillaVideojuegos.php?categoria=XBOX">Juegos de Xbox</a></p>
                    <p><a href="./productos/plantillaVideojuegos.php?categoria=SWITCH">Juegos de Switch</a></p>
                    <p><a href="./productos/plantillaVideojuegos.php?categoria=PC">Juegos de PC</a></p>
                    <p><a href="./productos/plantillaVideojuegos.php?categoria=PSVITA">Juegos de PS VITA</a></p>
                </div></li>
            <li class="list-group-item">&gt;<a class="text-info" data-toggle="collapse" href="#Electrónica">Electrónica</a>
                <div class="collapse" id="Electrónica"><br>
                    <p><a href="./productos/plantillaAccesorios.php?categoria=ACC_PS4">Accesorios de PS4</a></p>
                    <p><a href="./productos/plantillaAccesorios.php?categoria=ACC_XBOX">Accesorios de Xbox</a></p>
                    <p><a href="./productos/plantillaAccesorios.php?categoria=ACC_SWITCH">Accesorios de Switch</a></p>
                    <p><a href="./productos/plantillaAccesorios.php?categoria=ACC_VITA">Accesorios de PS Vita</a></p>
                </div></li>
            <li class="list-group-item">&gt;<a class="text-info" data-toggle="collapse" href="#Videoconsolas">Videoconsolas</a>
                <div class="collapse" id="Videoconsolas"><br>
                    <p><a href="./productos/plantillaConsolas.php?categoria=CON_PS4">Accesorios de PS4</a></p>
                    <p><a href="./productos/plantillaConsolas.php?categoria=CON_XBOX">Accesorios de Xbox</a></p>
                    <p><a href="./productos/plantillaConsolas.php?categoria=CON_SWITCH">Accesorios de Switch</a></p>
                </div></li>
            <li class="list-group-item">&gt;<a class="text-info" data-toggle="collapse" href="#Merchandaising">Merchandaising</a>
                <div class="collapse" id="Merchandaising"><br>
                    <p><a href="./productos/plantillaMerchandising.php?categoria=PELUCHES">Peluches</a></p>
                    <p><a href="./productos/plantillaMerchandising.php?categoria=ROPA">Ropa</a></p>
                    <p><a href="./productos/plantillaMerchandising.php?categoria=FIGURAS">Figuras</a></p>
                    <p><a href="./productos/plantillaMerchandising.php?categoria=OTROS">Otros</a></p>
                </div></li>
        </ul>
          <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
        <div class="row">
            <p class="col-lg-1 col-sm-1 col-xl-1"></p>
            <p class="col-lg-10 col-sm-10 col-xl-10" style="border-bottom: PowderBlue 8px solid"></p><br><br>
            <p class="col-lg-1 col-sm-1 col-xl-1"></p>
        </div>
     <div class="row">  
        <p class="col-lg-2"></p>
        <ul class="list-group col-lg-2 col-sm-2 col-xl-2">
            <li class="list-group-item "><b>La web</b></li>
            <li class="list-group-item">&gt;<a href="./atc.php">Atención al cliente</a></li>
            <li class="list-group-item">&gt;<a href="./condiciones.php">Condiciones de venta</a></li>
            <li class="list-group-item">&gt;<a href="./infolegal.php">Información legal</a></li>
        </ul>
        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
        <ul class="list-group col-lg-2 col-sm-2 col-xl-2">
            <li class="list-group-item"><b>Compra</b></li>
            <li class="list-group-item">&gt;<a href="./tienda.php">Estado de tu cesta</a></li>
        </ul>
        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
        <ul class="list-group col-lg-2 col-sm-2 col-xl-2">
            <li class="list-group-item"><b>¡Ven a vernos!</b></li>
            <li class="list-group-item">&gt;<a href="./Acerca%20de.php">Acerca de</a></li>
            <li class="list-group-item">&gt;<a href="./contacto.php">Contacto</a></li>
        </ul>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
      </div>
     <!--Incluimos el footer-->
     <?php include "footer.php" ?>
  </body>
</html>
