<?php
    session_start();
    include "../FuncionesPHP/conexionDB.php";
    $tabla = "videojuegos";
    $titulo = '';
    if(isset($_GET['categoria'])){
        $cat = $_GET['categoria'];
        $resultado = videojuegos($tabla,$cat);
        switch($cat){
            case "SWITCH":
                $titulo="Nintendo Switch";
            break;
            case "PS4":
                $titulo="Playstation 4";
            break;
            case "PSVITA":
                $titulo="Playstation Vita";
            break;
            case "XBOX":
                $titulo="Xbox One";
            break;
            case "PC":
                $titulo="Juegos PC";
            break;
        }
    }

    if(isset($_GET['tipo']) && !isset($_GET['categoria'])) {
        $tip = $_GET['tipo'];
        $resultado = productosOfertas($tip);
        switch($tip){
            case "ACCESORIOS":
                $titulo="Ofertas accesorios";
            break;
            case "VIDEOJUEGO":
                $titulo="Ofertas videojuegos";
            break;
            case "CONSOLAS":
                $titulo="Ofertas consolas";
            break;
            case "MERCHANDISING":
                $titulo="Ofertas merchandising";
            break;
        }
        $oferta = true;
    }

    if(isset($_GET['edad']) && isset($_GET['categoria'])){
        $edad = $_GET['edad'];
        $cat = $_GET['categoria'];
        $resultado = filtroEdad($cat,$edad);
    }else if(isset($_GET['tipo']) && isset($_GET['edad']) && isset($oferta)){
        $edad = $_GET['edad'];
        $tipo = $_GET['tipo'];
        $resultado = filtroEdadOfertas($tipo,$edad);
    }

    if(isset($_GET['fecha']) && isset($_GET['categoria'])){
        $fecha = $_GET['fecha'];
        $cat = $_GET['categoria'];
        $resultado = filtroFecha($cat,$fecha);
    }else if(isset($_GET['tipo']) && isset($_GET['fecha']) && isset($oferta)){
        $fecha = $_GET['fecha'];
        $tipo = $_GET['tipo'];
        $resultado = filtroFechaOfertas($tipo,$fecha);
    }


    if(isset($_GET['genero']) && isset($_GET['categoria'])){
        $genero = $_GET['genero'];
        $cat = $_GET['categoria'];
        $resultado = filtroGenero($cat,$genero);
    }else if(isset($_GET['tipo']) && isset($_GET['genero']) && isset($oferta)){
        $genero = $_GET['genero'];
        $tipo = $_GET['tipo'];
        $resultado = filtroGeneroOfertas($tipo,$genero);
    }

    if(isset($_GET['disponibildad']) && isset($_GET['categoria'])){
        $disp = $_GET['disponibildad'];
        $cat = $_GET['categoria'];
        $resultado = filtroStock($cat,$disp);
    }else if(isset($_GET['tipo']) && isset($_GET['disponibildad']) && isset($oferta)){
        $disp = $_GET['disponibildad'];
        $tipo = $_GET['tipo'];
        $resultado = filtroStockOfertas($tipo,$disp);
    }

    if(isset($_POST['precio']) && isset($_GET['categoria'])){
        $precio = $_POST['precio'];
        $cat = $_GET['categoria'];
        $resultado = filtroPrecio($cat,$precio);
    }else if(isset($_GET['tipo']) && isset($_POST['precio']) && isset($oferta)){
        $precio = $_POST['precio'];
        $tipo = $_GET['tipo'];
        $resultado = filtroPrecioOfertas($tipo,$precio);
    }
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
    <link rel="stylesheet" href="https://cdn.rawgit.com/zkreations/SheetSlider/master/dist/sheetslider.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./jspropio/jsPropio.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
 <body>
<!--Incluimos la cabecera-->
  <?php include "./cabecera.php" ?>
    <!--Incluimos información de la página-->
    <div class="row">
        <h2 class="col-lg-4 col-sm-4 col-xl-4"></h2>
        <h2 class="col-lg-4 col-sm-4 col-xl-4 titproducto"><?php echo $titulo; ?></h2> <!--Sustituir por variable en la parte inicial del php-->
        <p class="col-lg-4 col-sm-4 col-xl-4"></p>
    </div><br>
    <div class="row">
        <p class="col-lg-12 col-sm-12 col-xl-12 panel">Panel de selección:</p> 
    </div>
      <div class="row">
            <p class="col-lg-1 col-sm-1 col-xl-1"></p>
            <li class="list-group-item col-lg-2 col-sm-2 col-xl-2">&gt;<a class="text-info" data-toggle="collapse" href="#Genero">Precio</a>
            <div class="collapse" id="Genero"><br>
                <div class="row">
                    <form  class="col-lg-12 col-sm-12 col-xl-12" name="rango-precio" action="#" method="POST">
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-xl-4" style="text-align: left">0€</div>
                            <div class="col-lg-4 col-sm-4 col-xl-4" style="text-align: right">400€</div>
                            <p class="col-lg-4 col-sm-4 col-xl-4"></p>
                        </div>
                        <div class="row">
                            <input class="col-lg-8 col-sm-8 col-xl-8" type="range" id="precio" name="precio" min="0" max="400" step="5" value="90" width="100%">
                            <input class="col-lg-4 col-sm-4 col-xl-4 btn btn-dark" type="submit" value="Enviar">
                        </div>
                        <div class="row">
                            <b><p class="col-lg-12 col-sm-12 col-xl-12" style="color:#336699; margin-left:2%" id="valorPrecio">90€</p></b>
                        </div>
                    </form>
                </div>
            </div></li>
            <li class="list-group-item col-lg-2 col-sm-2 col-xl-2">&gt;<a class="text-info" data-toggle="collapse" href="#Edad">Edad recomendada</a>
            <div class="collapse" id="Edad"><br>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>edad=3&tipo=VIDEOJUEGO">Pegi 3</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>edad=7&tipo=VIDEOJUEGO">Pegi 7</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>edad=12&tipo=VIDEOJUEGO">Pegi 12</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>edad=16&tipo=VIDEOJUEGO">Pegi 16</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>edad=18&tipo=VIDEOJUEGO">Pegi 18</a></p>
            </div></li>
            <li class="list-group-item col-lg-2 col-sm-2 col-xl-2">&gt;<a class="text-info" data-toggle="collapse" href="#Fecha">Fecha de lanzamiento</a>
            <div class="collapse" id="Fecha"><br>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>fecha=2014&tipo=VIDEOJUEGO">2014</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>fecha=2015&tipo=VIDEOJUEGO">2015</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>fecha=2016&tipo=VIDEOJUEGO">2016</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>fecha=2017&tipo=VIDEOJUEGO">2017</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>fecha=2018&tipo=VIDEOJUEGO">2018</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>fecha=2019&tipo=VIDEOJUEGO">2019</a></p> 
            </div></li>
            <li class="list-group-item col-lg-2 col-sm-2 col-xl-2">&gt;<a class="text-info" data-toggle="collapse" href="#Dispo">Disponibilidad</a>
            <div class="collapse" id="Dispo"><br>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>disponibildad=1&tipo=VIDEOJUEGO">Stock</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>disponibildad=0&tipo=VIDEOJUEGO">Reserva</a></p>
            </div></li>
            <li class="list-group-item col-lg-2 col-sm-2 col-xl-2">&gt;<a class="text-info" data-toggle="collapse" href="#precio">Género</a>
            <div class="collapse" id="precio"><br>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>genero=Puzzle&tipo=VIDEOJUEGO">Puzzle</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>genero=Social&tipo=VIDEOJUEGO">Social</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>genero=Lucha&tipo=VIDEOJUEGO">Lucha</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>genero=Baile&tipo=VIDEOJUEGO">Baile</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>genero=Conduccion&tipo=VIDEOJUEGO">Conducción</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>genero=PuzAventuraszle&tipo=VIDEOJUEGO">Aventuras</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>genero=Rol&tipo=VIDEOJUEGO">Rol</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>genero=Survival&tipo=VIDEOJUEGO">Survival</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>genero=Horro&tipo=VIDEOJUEGO">Horror</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>genero=Accion&tipo=VIDEOJUEGO">Acción</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>genero=Simulador&tipo=VIDEOJUEGO">Simulador</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>genero=Estrategia&tipo=VIDEOJUEGO">Estrategia</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>genero=Deportes&tipo=VIDEOJUEGO">Deportes</a></p>
                <p><a href="plantillaVideojuegos.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>genero=Mundo_abierto&tipo=VIDEOJUEGO">Mundo abierto</a></p>
            </div></li>
            <p class="col-lg-1 col-sm-1 col-xl-1"></p>
     </div> <br>    
        <div class="row">
         <div class="col-lg-12 col-sm-12 col-xl-12">
          <div class="row lado">    
    <?php
        if(mysqli_num_rows($resultado)!=0){  
            while ($fila = mysqli_fetch_array($resultado))  {
               
    ?>        
        <div class="col-lg-4 col-sm-4 col-xl-4 imgNS">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xl-12">
                        <p class="col-lg-2 col-sm-2 col-xl-2"></p>
                        <a href="./productoVideojuego.php?id=<?php echo $fila['ID']; ?>"><img class="img-fluid prod col-lg-8 col-sm-8 col-xl-8" style="display: block;margin: auto;" src="<?php echo obtenerImagen($fila['TITULO']); ?>" width="250" height="200"></a>
                        <p class="col-lg-2 col-sm-2 col-xl-2"></p>
                    </div>
                </div>
                <hr class="linea2">
                <div class="row">
                    <p class="col-lg-1 col-sm-1 col-xl-1"></p>
                    <div class="col-lg-10 col-sm-10 col-xl-10 produc2">
                        <div class="row">
                            <h3 class="col-lg-12 col-sm-12 col-xl-12"><?php echo $fila['TITULO']; ?></h3><br>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xl-12">
                                <h3>Precio:</h3>
                                <h2><?php 
                                    if($fila['OFERTA']==1){
                                        echo $fila['PRECIO_OFERTA'];    
                                    }else{
                                        echo $fila['PRECIO'];
                                    }     
                                    ?>
                                    €</h2>
                            </div>
                        </div>
                    </div>
                    <p class="col-lg-1 col-sm-1 col-xl-1"></p>
                </div>
            </div>   
    <?php          
            }
        }//if
        else{
            echo "<br><br><br><br><br><br><br><br><br><br><br><br>";
        }
    ?>    
          </div>
        </div>
     </div>
     <br>
<!--Incluimos footer-->
  <?php include "footer.php" ?>
  </body>
</html>