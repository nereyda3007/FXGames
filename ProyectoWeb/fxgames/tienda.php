<?php
    session_start();
    include "./FuncionesPHP/conexionDB.php";
    include "./email.php";

    //si no hay sesión iniciada te deriva a la página de perfil para iniciar o registrarse
    if(!isset($_SESSION['usuario'])){
        header("Location: perfil.php");
    }

    //para insertar en la tabla facturas una vez realizada la compra
    if(isset($_POST['comprar'])){
        echo '<div class="alert alert-primary">
                <strong>Su compra se ha realizado con éxito. Gracias.</strong> 
              </div>';
        //para que el idFactura sea el siguiente a las facturas que ya hubiera
        $idFactura = obtenerTotalFacturas()+1;
        //obtener los datos de cada producto que se escogió
        $productos = obtenerProductosTienda($_SESSION['usuario']);
        $precioTotal = $_POST['total'];
        //para el localizador random
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $localizador = '';
        for ($i = 0; $i < 8; $i++) {
            $localizador .= $characters[rand(0, $charactersLength - 1)];
        }
        //por cada producto se insertará en la tabla facturas
        while($fila = mysqli_fetch_array($productos)){
            insertarDatosFactura($idFactura,$fila['ID'],$fila['NOMBRE'],$fila['CANTIDAD'],$fila['PRECIO'],$precioTotal,$fila['USUARIO'],$localizador);
            actualizarStock($fila['ID'],$fila['CANTIDAD']);
        }
        borrarTablaCompras($_SESSION['usuario']);
        enviarMailCompra($_SESSION['usuario']);
    }

    //para insertar en la tabla compras cada producto, sin modificar la cantidad
    if(isset($_POST['idProducto']) and !isset($_POST['cantidad'])){
        $id = $_POST['idProducto'];
        $resultado = datosVideojuego($id);
        if($resultado['OFERTA']==1){
            $precio = $resultado['PRECIO_OFERTA'];
        }else{
            $precio = $resultado['PRECIO'];
        }
        insertarProductoCompra($id,$resultado['TITULO'],$precio,1,$precio,$_SESSION['usuario']);
    }
    
    //si hay un id por get y damos a la x se borrará el producto de la tabla compras
    if(isset($_GET['id'])) {
        borrarProductoTienda($_GET['id'],$_SESSION['usuario']);
    }

    //insertar productos en la tabla compras modificando la cantidad
    if(isset($_POST['cantidad'])){
        $id = $_POST['idProducto'];
        $cant = $_POST['cantidad'];
        $resultadoCant = cantidadProducto($id);
        if($cant>$resultadoCant['STOCK']){
            $total = $resultadoCant['STOCK'];
            echo '<script type="text/javascript">
                   alert("La cantidad excede del stock actual, visualizará el máximo disponible");
                </script>';
            if($resultadoCant['OFERTA']==1){
                $precio = $resultadoCant['PRECIO_OFERTA'];
            }else{
                $precio = $resultadoCant['PRECIO'];
            }
            $precioTotal = $total*$precio;
        }else{
            $total = $cant;
            if($resultadoCant['OFERTA']==1){
                $precio = $resultadoCant['PRECIO_OFERTA'];
            }else{
                $precio = $resultadoCant['PRECIO'];
            }
            $precioTotal = $total*$precio;
        }
        actualizarCantidadProducto($id,$total,$precioTotal);
    }

    $resultadosIds = obtenerProductosTienda($_SESSION['usuario']);
    $totalFilas = mysqli_num_rows($resultadosIds);
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
        <!--Información de la venta-->
     <br>
     <?php
        if($totalFilas>0){
     ?>
     <div class="row">
        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
        <table class="table table-striped col-lg-10 col-sm-10 col-xl-10 envio3">
            <thead>
              <tr>
                <th class="th"></th>
                <th class="th">Nombre del Producto</th>
                <th class="th">Precio por unidad</th>
                <th class="th">Cantidad</th>
                <th class="th">Total</th>
                <th class="th"></th>
              </tr>
            </thead>
            <?php 
                $sumaTotal = 0;  
                while ($fila = mysqli_fetch_array($resultadosIds)) {
                $sumaTotal += $fila['TOTAL']; 
            ?>
            <tbody>
              <tr>
                <td class="th" style="padding:0"><img src="<?php echo obtenerImagen($fila['NOMBRE']) ?>" class="img-fluid" width="75" height="75"></td>
                <td class="th"><?php echo $fila['NOMBRE']; ?></td>
                <td class="th"><?php echo $fila['PRECIO']." € "; ?></td>
                <td class="th">                    
                    <form action="./tienda.php" method="POST">
                        <div class="form-group row">
                            <p class="col-lg-4 col-sm-4 col-xl-4"></p>
                            <input type="text" name="idProducto" value="<?php echo $fila['ID']; ?>" style="display: none;">
                            <input type="text" class="form-control col-lg-2 col-sm-2 col-xl-2" id="cantidad" placeholder="1" name="cantidad" value="<?php echo $fila['CANTIDAD'];?>">
                            <input type="submit" class="form-control col-lg-3 col-sm-3 col-xl-3 btn-outline-light text-dark" value="actualizar">
                            <p class="col-lg-3 col-sm-3 col-xl-3"></p>
                        </div>
                    </form>
                </td>
                <td class="th"><?php
                        echo $fila['TOTAL']." € ";
                    ?></td>
                <td class="th"><a href="./tienda.php?id=<?php echo $fila['ID']; ?>"><img src="<?php echo obtenerImagen('x'); ?>" class="img-fluid" width="40" height="40"></a></td>
              </tr>
            </tbody>
            <?php 
                   }
            ?>
            
        </table>
        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
      </div><br><br>
        <div class="row">
            <p class="col-lg-1 col-sm-1 col-xl-1"></p>
             <div class="col-lg-3 col-sm-3 col-xl-3 envio">
                <div class="row">
                   <h3 style="color:#26295F" class="col-lg-12 col-sm-12 col-xl-12">Modo de envío</h3>
                </div>
                <div class="row">
                       <div class="form-check col-lg-12 col-sm-12 col-xl-12">
                          <label class="form-check-label">
                             <input type="radio" class="form-check-input" name="optradio">Recoger en oficina de Correos
                          </label>
                       </div>
                </div>
                <div class="row">
                       <div class="form-check col-lg-12 col-sm-12 col-xl-12">
                          <label class="form-check-label">
                             <input type="radio" class="form-check-input" name="optradio">Entrega a domicilio
                          </label>
                       </div>
                </div>
             </div>
            
             <div class="col-lg-3 col-sm-3 col-xl-3 envio">
                <div class="row">
                   <h3 style="color:#26295F" class="col-lg-12 col-sm-12 col-xl-12">Métodos de pago</h3>
                </div>
                <div class="row">
                       <div class="form-check col-lg-12 col-sm-12 col-xl-12">
                          <label class="form-check-label">
                             <input type="radio" class="form-check-input" name="optradio1">Pago mediante transferencia bancaria
                          </label>
                       </div>
                </div>
                <div class="row">
                       <div class="form-check col-lg-12 col-sm-12 col-xl-12">
                          <label class="form-check-label">
                             <input type="radio" class="form-check-input" name="optradio1">Pago contra reembolso
                          </label>
                       </div>
                </div>
             </div>
            <p class="col-lg-1 col-sm-1 col-xl-1"></p>
            <div class="col-lg-3 col-sm-3 col-xl-3 envio2">
                <div class="row">
                    <h5 style="color:#26295F" class="col-lg-12 col-sm-12 col-xl-12">Total (IVA incluido): <?php echo $sumaTotal;?>€</h5>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xl-12">
                        <form action="./tienda.php" method="POST">
                            <input type="text" value="<?php echo $sumaTotal;?>" name="total" style="display:none;">
                            <button type="submit" class="btn btn-dark btnpedido" name="comprar"<?php if(!isset($_SESSION['usuario'])) {echo 'disabled';} ?>>Tramitar pedido</button>
                        </form>
                    </div>
                </div>
            </div>
             <p class="col-lg-1 col-sm-1 col-xl-1"></p>
        </div><br><br>
        <?php
            } //se cierra la llave del if
        else{
        ?>
            <div class="row" style="padding: 1% 2%;">
			<h1 class="col-lg-12 col-xl-12 col-sm-12">Tu cesta está vacía.</h1>	
		</div>
		<div class="row" style="padding-left: 2%;">
			<p class="col-lg-12 col-xl-12 col-sm-12">Haz que tu cesta de compra sea útil: llénala de Videojuegos, merchandising y todo tipo de accesorios para tu videoconsola. Si ya tienes una cuenta, <a href="./perfil.php">Identifícate</a> para ver tu cesta.</p>
			<p class="col-lg-12 col-xl-12 col-sm-12">Siga comprando en <a href="./index.php">FXGames.</a></p>
			<p class="col-lg-12 col-xl-12 col-sm-12">Tu vida será más divertida! compra nuestros productos y no te arrepentirás</p>
		</div>
		<br>
        <?php 
            } //se cierra la llave del else
        ?>
        <!--Tabla productos recomendados random-->
		<hr class="hrTienda" width="75%">
		<div class="table-responsive" style="padding: 0% 2%;">
			<h3 class="text-info tablaTienda"><b>Productos recomendados</b></h3>
			<table class="table table-bordered">
				<tbody>
					<tr>
						<?php 
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
                            
                        for ($i = 0; $i<4; $i++) {
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
                        <td class="tablaTienda"><a href="./productos/<?php echo $titulo;?>"><img class="img-fluid" src="<?php echo obtenerImagen($nombre); ?>" width="200" height="150"></a></td>
                        <?php 
                            unset($ids[$pos]); 
                            $ids = array_values($ids); 
                            $tamIds = count($ids);
                            unset($cats[$pos]);
                            $cats = array_values($cats);
                            unset($nombres[$pos]);
                            $nombres = array_values($nombres);
                            }
                        ?>
					</tr>
				</tbody>
			</table>
		</div>	
     <!--Incluimos el footer-->
	<?php include "./footer.php" ?> 
</body>
</html>