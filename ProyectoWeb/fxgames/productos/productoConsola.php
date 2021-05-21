<?php
    session_start();
    include "../FuncionesPHP/conexionDB.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $resultado = datosVideojuego($id);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./jspropio/jsPropio.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
 <body>
<!--Incluimos la cabecera-->
<?php include "./cabecera.php" ?>
     <!--Incluimos información del producto-->
    <div class="row">
        <h1 class="col-lg-4 col-sm-4 col-xl-3"></h1>
        <h1 class="col-lg-4 col-sm-4 col-xl-6 titproducto"><?php echo $resultado['TITULO']; ?></h1>
        <h1 class="col-lg-4 col-sm-4 col-xl-3"></h1>
    </div><br>
    <div class="row">  
        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
        <div class="col-lg-4 col-sm-4 col-xl-4"><img class="img-fluid imgproducto" src="<?php echo obtenerImagen($resultado['TITULO']); ?>" width="400" height="350"></div>
        <div class="col-lg-4 col-sm-4 col-xl-4">
            <br><br>
            <p class="parrprod">Plataforma: </p><p><?php echo $resultado['PLATAFORMA']; ?></p>
            <p class="parrprod">Comparte este producto:</p>
            <div style="text-align: left">
                <a href="https://www.facebook.com/Fxgames-104505944573990/?modal=admin_todo_tour"><img class="img-fluid" src="<?php echo obtenerImagen('iconofb'); ?>" width="30" height="30"></a>
                <a href="https://www.instagram.com/fxgames2020/?hl=es"><img class="img-fluid" src="<?php echo obtenerImagen('iconoig'); ?>" width="40" height="40"></a>
                <a href="https://twitter.com/FXGames7"><img class="img-fluid" src="<?php echo obtenerImagen('iconotw'); ?>" width="30" height="30"></a>
            </div><br>
        </div>
        <div class="col-lg-3 col-sm-3 col-xl-3">
            <br><br><br>
            <h1 class="parrprod">Precio:
                <?php 
                    if($resultado['OFERTA']==1){
                        echo $resultado['PRECIO_OFERTA']."€ ";
                        echo '<b style="color: red; text-decoration: line-through;">'.$resultado['PRECIO']."€ </b>";
                    }else{
                        echo $resultado['PRECIO']."€ ";
                    }
                ?>
            </h1>
            <p class="texttienda">
                <?php
                    if($resultado['DISPONIBILIDAD']==1){
                        echo "DISPONIBLE";
                    }else{
                        echo "RESERVA AHORA";
                    }
                ?>
            </p>
            <p class="texttienda">
                <?php
                    if($resultado['DISPONIBILIDAD']==1){
                        echo "¡Solo quedan ".$resultado['STOCK']." unidades!";
                    }else{
                        echo "¡Rápido, no te quedes sin el tuyo!";
                    }
                ?>
            </p>
            <a class="btn btn-light" href="" data-toggle="modal" data-target="#myModal"><img src="<?php echo obtenerImagen('tienda'); ?>" class="img-fluid textoicono" width="50" height="50"><b class="textoicono">- Añadir a la cesta</b></a>
            <!--Iniciamos modal de la cesta-->
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"><b>ARTÍCULO AÑADIDO AL CARRITO</b></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="row">
                    <img src="<?php echo obtenerImagen($resultado['TITULO']); ?>" class="img-fluid col-lg-7 col-sm-7 col-xl-7" width="50" height="50">
                    <div class="col-lg-5 col-sm-5 col-xl-5">
                        <div class="row">
                            <p class="col-lg-12 col-sm-12 col-xl-12" style="font-size: 20px;padding: 25% 0"><b><?php echo $resultado['TITULO']; ?></b></p>
                        </div>
                        <div class="row">
                            <p class="col-lg-12 col-sm-12 col-xl-12" style="font-size: 25px;padding: 0 50%"><b>
                                <?php 
                                    if($resultado['OFERTA']==1){
                                        echo $resultado['PRECIO_OFERTA']."€ ";
                                        echo '<b style="color: red; text-decoration: line-through;">'.$resultado['PRECIO']."€ </b>";
                                    }else{
                                        echo $resultado['PRECIO']."€ ";
                                    }
                                ?>
                            </b></p>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <form action="" method="POST" class="col-lg-6 col-sm-6 col-xl-6">
                        <div class="form-group row">
                           <p class="col-lg-2 col-sm-2 col-xl-2"></p>
                           <button type="submit" class="btn btn-dark col-lg-8 col-sm-8 col-xl-8">Seguir comprando</button>
                           <p class="col-lg-2 col-sm-2 col-xl-2"></p>
                        </div>
                    </form>
                    <form action="../tienda.php" method="POST" class="col-lg-6 col-sm-6 col-xl-6">
                        <div class="form-group row">
                           <p class="col-lg-2 col-sm-2 col-xl-2"></p>
                           <input type="text" name="idProducto" value="<?php echo $resultado['ID']; ?>" style="display: none;">
                           <?php
                                if($resultado['DISPONIBILIDAD']==1){
                                    echo '<button type="submit" class="btn btn-dark col-lg-8 col-sm-8 col-xl-8">Ir a la cesta</button>';
                                }else{
                                    echo '<button type="submit" class="btn btn-dark col-lg-8 col-sm-8 col-xl-8" disabled>Ir a la cesta</button>';
                                    $texto = true;
                                }
                            ?>
                           <p class="col-lg-2 col-sm-2 col-xl-2"></p>
                        </div>
                     </form>
                    <?php
                        if(isset($texto)){        
                    ?>
                    <div class="row">
                        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
                        <p class="col-lg-10 col-sm-10 col-xl-10" style="color: red">*Este producto no está disponible en estos momentos. Contacta con nosotros y resérvalo.</p>
                        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
                    </div>
                    <?php
                        }
                    ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div><br>
    <div class="row">
        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
        <h1 class="col-lg-5 col-sm-5 col-xl-5">&gt;<a class="text-info" data-toggle="collapse" href="#Mario1">Descripción</a>
        <div class="collapse show" id="Mario1"><br>
            <p class="descripcion"><?php
                $str = str_replace("\r\n", '<br>', $resultado['DESCRIPCION']);
                echo $str; 
                ?>
            </p>      
        </div></h1>
        <p class="col-lg-1 col-sm-1 col-xl-1 bordedes"></p>
        <div class="col-lg-5 col-sm-5 col-xl-5" id="#valoracion">               
            <div class="row">
              <div id="demo" class="carousel slide col-lg-12 col-sm-12 col-xl-12 col-xs-12" data-ride="carousel"><br>
                <!-- Indicadores -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                 <!-- Fotos -->
                  <div class="carousel-inner">
                      <?php
                             $pos = 0;
                             $res = datosImagenesCarrusel($resultado['TITULO']);
                             while($fila = mysqli_fetch_array($res)) {
                      ?>
                    <div class="carousel-item <?php if ($pos==0){echo 'active';} ?>">
                      <img src="<?php echo $fila['BASE']; ?>" class="img-fluid" width="1200" height="350">
                    </div>
                      <?php
                           $pos= $pos+1;      
                             }
                      ?>
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
        </div>
    </div><br>
<!--Incluimos footer-->
<?php include "footer.php" ?>
  </body>
</html>
