<?php
    session_start();
    include "../FuncionesPHP/conexionDB.php";
    $tabla = "videojuegos";
    $titulo = '';
    if(isset($_GET['categoria'])){
        $cat = $_GET['categoria'];
        $resultado = videojuegos($tabla,$cat);
        switch($cat){
            case "ACC_SWITCH":
                $titulo="Accesorios Nintendo Switch";
            break;
            case "ACC_PS4":
                $titulo="Accesorios PS4";
            break;
            case "ACC_VITA":
                $titulo="Accesorios PS Vita";
            break;
            case "ACC_XBOX":
                $titulo="Accesorios Xbox One";
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

    if(isset($_GET['disponibildad']) && isset($_GET['categoria']) && !isset($oferta)){
        $disp = $_GET['disponibildad'];
        $cat = $_GET['categoria'];
        $resultado = filtroStock($cat,$disp);
    }else if(isset($_GET['tipo']) && isset($_GET['disponibildad']) && isset($oferta)){
        $disp = $_GET['disponibildad'];
        $tipo = $_GET['tipo'];
        $resultado = filtroStockOfertas($tipo,$disp,1);
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
            <p class="col-lg-2 col-sm-2 col-xl-2"></p>
            <li class="list-group-item col-lg-4 col-sm-4 col-xl-4">&gt;<a class="text-info" data-toggle="collapse" href="#Genero">Precio</a>
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
            <li class="list-group-item col-lg-4 col-sm-4 col-xl-4">&gt;<a class="text-info" data-toggle="collapse" href="#Dispo">Disponibilidad</a>
            <div class="collapse" id="Dispo"><br>
                <p><a href="plantillaAccesorios.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>disponibildad=1&tipo=ACCESORIOS">Stock</a></p>
                <p><a href="plantillaAccesorios.php<?php if(isset($cat)){ echo "?categoria=".$cat."&"; }else{ echo "?";} ?>disponibildad=0&tipo=ACCESORIOS">Reserva</a></p>
            </div></li>
            <p class="col-lg-2 col-sm-2 col-xl-2"></p>
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
                        <a href="./productoAccesorio.php?id=<?php echo $fila['ID']; ?>"><img class="img-fluid prod col-lg-8 col-sm-8 col-xl-8" style="display: block;margin: auto;" src="<?php echo obtenerImagen($fila['TITULO']); ?>" width="250" height="200"></a>
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