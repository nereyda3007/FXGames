
<?php
    session_start();
    include "./FuncionesPHP/conexionDB.php";
    $ids=[];
    $cats=[];
    $nombres=[];
    $resultado = indexProductos();
    
    while($fila = mysqli_fetch_array($resultado)){
        array_push($ids, $fila['ID']);
        array_push($cats, $fila['TIPO']);
        array_push($nombres, $fila['TITULO']);
    }
    $tamIds = count($ids);
    

    $idsO = [];
    $catsO = [];
    $nombresO = [];
    $resultado2 = indexOfertas();
    
    while($fila = mysqli_fetch_array($resultado2)){
        array_push($idsO, $fila['ID']);
        array_push($catsO, $fila['TIPO']);
        array_push($nombresO, $fila['TITULO']);
    }
    $tamIdsO = count($idsO);


?>
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
    
 <?php 
     include "cabecera.php" ?>
     <!--Iniciamos el contenido del div contenedor-->
<div class="contenedor">
<div style="background-color: black" class="row">
  <div id="demo" class="carousel slide col-lg-12 col-sm-12 col-xl-12 col-xs-12" data-ride="carousel"><br>
    <!-- Indicadores -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <!-- Fotos -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?php echo obtenerImagen('monster'); ?>" class="img-fluid" width="1200" height="350">
        </div>
        <div class="carousel-item">
          <img src="<?php echo obtenerImagen('gow'); ?>" class="img-fluid" width="1200" height="350">
        </div>
        <div class="carousel-item">
          <img src="<?php echo obtenerImagen('tr2'); ?>" class="img-fluid" width="1200" height="350">
        </div>
      </div>
      <!-- Controles de movimiento -->
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
  </div>
    <br>
</div>         
   <div style="background-image: url(<?php echo obtenerImagen('fondo'); ?>) ;" >
   <br>
<!--Abrimos contenedor del contenido central-->
   <div class="row container-fluid">
       <h1 class="col-lg-3 col-sm-3 col-xl-3"></h1>
       <h1 class="titproducto col-lg-6 col-sm-6 col-xl-6 col-xs-6">PRODUCTOS DESTACADOS</h1><br><br><br>
       <h1 class="col-lg-3 col-sm-3 col-xl-3"></h1>
   </div><br>
       <?php 
            for ($i =0; $i<2; $i++) {
                $html = '<div class="row">
                        <p class="col-lg-2 col-sm-2 col-xl-2"></p>';
                echo $html;
                for ($j =0; $j<4; $j++) {
                    
       ?>
           <div class="col-lg-2 col-sm-2 col-xl-2 imgNS">
             <div class="row">
                <?php
                    $pos = rand(0, $tamIds-1);
                    $num = $ids[$pos];
                    $cat = $cats[$pos];
                    $nombre = $nombres[$pos];
                    switch($cat){
                        case "VIDEOJUEGO":
                            $titulo="productoVideojuego.php?id=".$num;
                        break;
                        case "ACCESORIOS":
                            $titulo="productoAccesorio.php?id=".$num;
                        break;
                        case "CONSOLAS":
                            $titulo="productoConsola.php?id=".$num;
                        break;
                        case "MERCHANDISING":
                            $titulo="productoMerchandising.php?id=".$num;
                        break;

                    }
                ?>
                <a class="col-lg-12 col-sm-12 col-xl-12" href="./productos/<?php echo $titulo;?>"><img class="img-fluid imgIndex" src="<?php echo obtenerImagen($nombre); ?>" width="275" height="225"></a>
                <?php
                    unset($ids[$pos]); 
                    $ids = array_values($ids); 
                    $tamIds = count($ids);
                    unset($cats[$pos]);
                    $cats = array_values($cats);
                    unset($nombres[$pos]);
                    $nombres = array_values($nombres);
                 ?>
             </div>
         </div>
       <?php  
            }
                $html='<p class="col-lg-2 col-sm-2 col-xl-2"></p>
                        </div><br><br>';
                echo $html;
       }
       ?>
     
   <div class="row container-fluid">
       <h1 class="col-lg-3 col-sm-3 col-xl-3"></h1>
       <h1 class="col-lg-6 col-sm-6 col-xl-6 titproducto">OFERTAS ACTUALES</h1><br><br><br>
       <h1 class="col-lg-3 col-sm-3 col-xl-3"></h1>
   </div><br>
        <?php 
            for ($i =0; $i<1; $i++) {
                $html = '<div class="row">
                        <p class="col-lg-2 col-sm-2 col-xl-2"></p>';
                echo $html;
                for ($j =0; $j<4; $j++) {
                    
       ?>
         <div class="col-lg-2 col-sm-2 col-xl-2 imgNS">
             <div class="row">
                 <?php
                    $pos = rand(0, $tamIdsO-1);
                    $num = $idsO[$pos];
                    $cat = $catsO[$pos];
                    $nombre = $nombresO[$pos];
                    switch($cat){
                        case "VIDEOJUEGO":
                            $titulo="productoVideojuego.php?id=".$num;
                        break;
                        case "ACCESORIOS":
                            $titulo="productoAccesorio.php?id=".$num;
                        break;
                        case "CONSOLAS":
                            $titulo="productoConsola.php?id=".$num;
                        break;
                        case "MERCHANDISING":
                            $titulo="productoMerchandising.php?id=".$num;
                        break;
                    }
                ?>
                <a class="col-lg-12 col-sm-12 col-xl-12" href="./productos/<?php echo $titulo;?>"><img class="img-fluid imgIndex" src="<?php echo obtenerImagen($nombre); ?>" width="275" height="225"></a>
                 <?php
                    unset($idsO[$pos]); 
                    $idsO = array_values($idsO); 
                    $tamIdsO = count($idsO);
                    unset($catsO[$pos]);
                    $catsO = array_values($catsO);
                    unset($nombresO[$pos]);
                    $nombresO = array_values($nombresO);
                 ?>
             </div>
         </div>
       <?php  
                }
                $html='<p class="col-lg-2 col-sm-2 col-xl-2"></p>
                        </div><br><br>';
                echo $html;
           }
       ?>
    </div>
  </div>
<!--Incluimos footer-->
 <?php include "footer.php" ?>
 </body>
</html>