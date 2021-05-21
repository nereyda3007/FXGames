<?php
    session_start();
    include "./FuncionesPHP/conexionDB.php";

    if(isset($_POST['buscador'])){
        $buscar = $_POST['buscador'];
        $resultado = devolverResultados($buscar);
        $hayResultados = mysqli_num_rows($resultado);
    }else{
        header("Location: index.php");
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
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xl-12">
            <div class="row lado">    
                <?php
                    if ($hayResultados==0) {
                        
                    }else {
                        while ($fila = mysqli_fetch_array($resultado))  {
                ?>        
                <div class="col-lg-4 col-sm-4 col-xl-4 imgNS">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xl-12">
                            <p class="col-lg-2 col-sm-2 col-xl-2"></p>
                            <a href="./productos/productoVideojuego.php?id=<?php echo $fila['ID']; ?>"><img class="img-fluid prod col-lg-8 col-sm-8 col-xl-8" style="display: block;margin: auto;" src="<?php echo obtenerImagen($fila['TITULO']); ?>" width="250" height="200"></a>
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
                    }
                ?>    
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>
</body>
</html>