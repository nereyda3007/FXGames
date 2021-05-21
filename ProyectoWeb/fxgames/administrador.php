<?php
    session_start();
    include "./FuncionesPHP/conexionDB.php";

    //función que si no hay usuario iniciado o no es administrador nos deriva al index
    if(isset($_SESSION['usuario'])){
        $user = $_SESSION['usuario'];
        $datos = datosPersonales($user);
        if(!$datos['ADMIN']==1){
            header("Location: index.php");
        }
    }else{
        header("Location: index.php");
    }

    //función para dar permisos de administrador. Si el email no corresponde con un usuario registrado o ya es administrador saldrán los alerts pertinentes
    if(isset($_POST['dar']) && isset($_POST['email'])) {
        $email = $_POST['email'];
        $datos = datosUsuario($email);
        if(is_null($datos)) {
               echo '<div class="alert alert-danger">
                <strong>Este usuario no está registrado</strong> 
              </div>';
        }else {
            if($datos['ADMIN']==0) {
                darQuitarPermisos(1,$email);
                echo '<div class="alert alert-primary">
                    <strong>Se han concedido permisos de administrador al usuario '.$email.'</strong> 
                    </div>';
            }else {
                echo '<div class="alert alert-danger">
                    <strong>Este usuario ya es administrador</strong> 
                </div>';
            }
        } 
    }

    //función para quitar permisos de admin. Si el email no existe o ya es administrador saldrán los alerts pertinentes
    if(isset($_POST['quitar']) && isset($_POST['email'])) {
        $email = $_POST['email'];
        $datos = datosUsuario($email);
        if(is_null($datos)) {
              echo '<div class="alert alert-danger">
                <strong>Este usuario no está registrado</strong> 
              </div>';
        }else {
            if($datos['ADMIN']==1) {
                if($email==$_SESSION['usuario']){
                    echo '<div class="alert alert-danger">
                        <strong>Esta acción no puede realizarse sobre sí mismo.</strong> 
                    </div>';
                }else{
                    darQuitarPermisos(0,$email);
                    echo '<div class="alert alert-primary">
                        <strong>Se han eliminado los permisos de administrador al usuario '.$email.'</strong> 
                      </div>';
                }
                 
            }else {
                 echo '<div class="alert alert-danger">
                    <strong>Este usuario no es administrador</strong> 
                  </div>';
            }
        }
    }

    //funcion para insertar producto
    if(isset($_POST['registrar'])) {
        $tit = $_POST['titulo'];
        $des = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $of = $_POST['oferta'];
        if($of=="Sí") {
            $of=1;
        }else {
            $of=0;
        }
        $pdes = $_POST['preciodesc'];
        $dis = $_POST['disponibilidad'];
        if($dis=="Sí") {
            $dis=1;
        }else {
            $dis=0;
        }
        $stock = $_POST['stock'];
        $plat = $_POST['plataforma'];
        $edad = $_POST['edad'];
        $fecha = $_POST['fecha'];
        $gen = $_POST['genero'];
        $video = $_POST['video'];
        $cat = $_POST['cat'];
        $tipo = $_POST['tipo'];
        //se requiere el atributo nombre del fichero de la imagen, de ahí que se ponga el ['name']
        if(isset($_FILES['imgPpal']['name'])){
            //echo $_FILES['fileToUpload']['name'];
            //guardamos la extensión del fichero temporal que se crea en el input
            $type = pathinfo($_FILES['imgPpal']['tmp_name'], PATHINFO_EXTENSION);
            $data = file_get_contents($_FILES['imgPpal']['tmp_name']);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            insertarProducto($tit,$des,$precio,$of,$pdes,$dis,$stock,$plat,$edad,$fecha,$gen,$video,$cat,$tipo);
            insertarImagen($tit,$base64,'PRINCIPAL');
        }
        if(isset($_FILES['imgSecond']['name'][0]) && !empty($_FILES['imgSecond']['name'][0])) {
            $total = count($_FILES['imgSecond']['name']);
            for ($i = 0; $i < $total; $i++) {
                $type = pathinfo($_FILES['imgSecond']['tmp_name'][$i], PATHINFO_EXTENSION);
                $data = file_get_contents($_FILES['imgSecond']['tmp_name'][$i]);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                insertarImagen($tit,$base64,'CARRUSEL');
            }
        }
        echo '<div class="alert alert-primary">
                    <strong>El producto se ha registrado correctamente.</strong> 
                  </div>';
    }

    //eliminar todas las ofertas
    if(isset($_POST['eliminarOfertas'])) {
        $resultado = indexOfertas();
        while ($fila = mysqli_fetch_array($resultado)) {
            eliminarOfertas($fila['ID']);
        }
        echo '<div class="alert alert-primary">
                    <strong>Las ofertas se han eliminado correctamente.</strong> 
                    </div>';
    }

    //generar las ofertas aleatoriamente en función de los datos especificados en número y porcentaje
    if(isset($_POST['generarOfertas'])) {
        $totalOfertas = $_POST['numofertas'];
        $porcentaje = $_POST['porcentaje'];
        $resultado = obtenerProductos();
        $ids=[];
        $precios=[];
        while($fila = mysqli_fetch_array($resultado)){
            array_push($ids, $fila['ID']);
            array_push($precios, $fila['PRECIO']);
        }
        $tamArray = count($ids);
        for ($i = 0; $i<$totalOfertas; $i++) {
            $pos = rand(0, $tamArray-1);
            $id = $ids[$pos];
            $precio = $precios[$pos];
            $preciodesc = $precio -(($precio*$porcentaje)/100);
            agregarOfertas($id,$preciodesc);
            //elimino posición del array usada y con el array_values redimensiono el array
            unset($ids[$pos]); 
            $ids = array_values($ids); 
            $tamArray = count($ids);
            unset($precios[$pos]);
            $precios = array_values($precios);
        }
           echo '<div class="alert alert-primary">
                    <strong>Se han generado las ofertas correctamente.</strong> 
                    </div>';
    }

    //con esta función controlamos si existe o no el producto que se quiere aplicar oferta
    if(isset($_POST['buscarProducto'])) {
        $nombre = $_POST['nomProducto'];
        $resultado = buscarPorNombre($nombre);
        $hayResultados = mysqli_num_rows($resultado);
        if($hayResultados==0){
            echo '<div class="alert alert-danger">
              <strong>No existe el producto sobre el que aplicar oferta alguna.</strong> 
              </div>';
        }
    }

    //función para aplicar descuento al producto
    if(isset($_POST['aplicarDesc'])) {
        $tit = $_POST['tituloProducto'];
        $preciodesc = $_POST['precioDescProducto'];
        actualizarPrecio($tit,$preciodesc);
         echo '<div class="alert alert-primary">
              <strong>El producto se ha actualizado correctamente.</strong> 
              </div>';
    }

    //función para eliminar la oferta de un producto especifico siempre que exista en la BD
    if(isset($_POST['eliOferta'])) {
        $nProducto = $_POST['nProducto'];
        $resultadoEli = buscarPorNombre($nProducto);
        $hayResultadosEli = mysqli_num_rows($resultadoEli);
        if($hayResultadosEli>0){
            eliminarOfertaEspecifica($nProducto);
            echo '<div class="alert alert-primary">
              <strong>La oferta se ha eliminado correctamente.</strong> 
              </div>';
        }else{
            echo '<div class="alert alert-danger">
              <strong>No existe el producto a eliminar.</strong> 
              </div>';
        }
        
    }

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
     <script src="./jspropio/jsNuevoProducto.js" type="text/javascript"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
 </head>
 <body>
    
 <?php 
     include "cabecera.php" ?>
     <!--Título de la página-->
    <div class="row">
        <p class="col-lg-4 col-sm-4 col-xl-4"></p>
        <h2 class="col-lg-4 col-sm-4 col-xl-4 titproducto">ADMINISTRACIÓN</h2>
        <p class="col-lg-4 col-sm-4 col-xl-4"></p>
    </div><br>
    <div class="row">
        <h3 style="margin-left: 2%;color:#26295F" class="col-lg-11 col-sm-11 col-xl-11">OPCIONES DE ADMINISTRACIÓN:</h3>
        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
    </div><br>
<div class="row">
    <div class="col-lg-3 col-sm-3 col-xl-3">
        <nav class="navbar nav flex-column navbar-light justify-content-center">
		  <ul class="navbar-nav">
            <li class="nav-item menuli"><a class="nav-link text-info" data-toggle="collapse" href="#PERMISOS"><b>PERMISOS DE ADMINISTRADOR</b></a></li>
			<li class="nav-item menuli"><a class="nav-link text-info" data-toggle="collapse" href="#PRODUCTO"><b>REGISTRAR PRODUCTO</b></a></li>
            <li class="nav-item menuli"><a class="nav-link text-info" data-toggle="collapse" href="#OFERTAS"><b>ADMINISTRAR OFERTAS</b></a></li>
		  </ul>
        </nav>
    </div>
  <div class="col-lg-8 col-sm-8 col-xl-8">
  <div id="accordion">
      <div class="card">
        <div class="card-body collapse" id="PRODUCTO">
        <div class="row">
            <p class="col-lg-1 col-sm-1 col-xl-1"></p>
            <form class="formregistro col-lg-10 col-sm-10 col-xl-10" action="" method="POST" id="formRegistroProducto" enctype="multipart/form-data">
                <legend>Registrar producto:</legend>
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <select class="form-control" id="tipo" name="tipo">
                        <option>VIDEOJUEGO</option>
                        <option>CONSOLAS</option>
                        <option>ACCESORIOS</option>
                        <option>MERCHANDISING</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cat">Categoría:</label>
                    <select class="form-control" id="cat" name="cat">
                        <option>PS4</option>
                        <option>XBOX</option>
                        <option>PC</option>
                        <option>PSVITA</option>
                        <option>SWITCH</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="plataforma">Plataforma:</label>
                    <select class="form-control" id="plataforma" name="plataforma">
                        <option>Playstation 4</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="genero">Género:</label>
                    <select class="form-control" id="genero" name="genero">
                        <option>Puzzle</option>
                        <option>Social</option>
                        <option>Lucha</option>
                        <option>Baile</option>
                        <option>Conducción</option> 
                        <option>Aventuras</option>
                        <option>Rol</option>
                        <option>Survival</option>
                        <option>Horror</option>
                        <option>Acción</option>
                        <option>Simulador</option>
                        <option>Estrategia</option>
                        <option>Deportes</option>
                        <option>Mundo abierto</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" id="titulo" placeholder="Introduce título" name="titulo" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control" rows="10" id="descripcion" placeholder="Descripción" name="descripcion" required></textarea>
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <p id="errorPrecio" style="display: none;"></p>
                    <input type="text" class="form-control" id="precio" placeholder="Introduce precio" name="precio" required>
                </div>
                <div class="form-group">
                    <label for="oferta">Oferta:</label>
                    <select class="form-control" id="oferta" name="oferta">
                        <option>Sí</option>
                        <option selected>No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="preciodesc">Precio con descuento:</label>
                    <input type="text" class="form-control" id="preciodesc" placeholder="Introduce precio con descuento" name="preciodesc" value="0" readonly>
                </div>
                <div class="form-group">
                    <label for="disponibilidad">Disponibilidad:</label>
                    <select class="form-control" id="Disponibilidad" name="disponibilidad">
                        <option>Sí</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="text" class="form-control" id="stock" placeholder="Introduce cantidad" name="stock" required>
                </div>

                <div class="form-group">
                    <label for="edad">Edad recomendada:</label>
                    <select class="form-control" id="edad" name="edad">
                        <option>3</option>
                        <option>7</option>
                        <option>12</option>
                        <option>16</option>
                        <option>18</option> 
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha de lanzamiento:</label>
                    <input type="date" class="form-control" id="fecha" placeholder="------" name="fecha" required>
                </div>
                <div class="form-group">
                    <label for="video">Vídeo:</label>
                    <input type="text" class="form-control" id="video" placeholder="Introduce url del vídeo" name="video" required>
                </div>
                <div class="form-group">
                    <label for="fichero">Imagen (máx.1MB):</label>
                     <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Fichero</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imgPpal" name="imgPpal"
                              aria-describedby="inputGroupFileAddon01" required>
                            <label class="custom-file-label" for="inputGroupFile01" id="ficheroElegido">Seleccionar archivo</label>
                          </div>
                     </div>
                </div>
                <div class="form-group" style="display:none" id="ficheroMultiple">
                    <label for="fichero">Imágenes muestrarias:</label>
                     <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Fichero/Ficheros</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imgSecond" name="imgSecond[]"
                              aria-describedby="inputGroupFileAddon01" multiple>
                            <label class="custom-file-label" for="inputGroupFile01" id="ficherosMultiples">Seleccionar archivos</label>
                          </div>
                     </div>
                </div>
            <div class="row">
                <p class="col-lg-9 col-sm-9 col-xl-9"></p>
                <button type="submit" class="btn btn-dark col-lg-2 col-sm-2 col-xl-2" name="registrar">Registrar</button>
                <p class="col-lg-1 col-sm-1 col-xl-1"></p>
            </div>
          </form>
            <p class="col-lg-1 col-sm-1 col-xl-1"></p>
        </div>
          </div>
      </div>
    <div class="card">
         <div class="card-header collapse" id="PERMISOS">
           <div class="row">
            <p class="col-lg-1 col-sm-1 col-xl-1"></p>
            <form class="formregistro col-lg-10 col-sm-10 col-xl-10" action="" method="POST">
                <legend>Permisos de administrador:</legend>
                <div class="form-group">
                    <label for="email">Título:</label>
                    <input type="email" class="form-control" id="email" placeholder="Introduce email" name="email">
                </div>
                <div class="row">
                    <p class="col-lg-5 col-sm-5 col-xl-5"></p>
                    <button type="submit" class="btn btn-dark col-lg-3 col-sm-3 col-xl-3" name="dar">Dar permisos</button>
                    <button type="submit" style="margin-left: 1%" class="btn btn-dark col-lg-3 col-sm-3 col-xl-3" name="quitar">Quitar permisos</button>
                    <p class="col-lg-1 col-sm-1 col-xl-1"></p>
                </div>
              </form>
                <p class="col-lg-1 col-sm-1 col-xl-1"></p>
            </div>
         </div>
      </div>
          <div class="card">
         <div class="card-header collapse show" id="OFERTAS">
           <div class="row">
            <p class="col-lg-1 col-sm-1 col-xl-1"></p>
            <form class="formregistro col-lg-10 col-sm-10 col-xl-10" action="" method="POST" id="formOfertas">
                <legend>Administrar ofertas:</legend>
                <div class="form-group">
                    <label for="numofertas">Número de ofertas:</label>
                    <input type="text" class="form-control" id="numofertas" placeholder="Introduce numero de ofertas entre 1 y 30" name="numofertas" required><br>
                    <label for="porcentaje">Porcentaje de descuento:</label>
                    <input type="text" class="form-control" id="porcentaje" placeholder="Introduce el porcentaje de descuento entre 1 y 10" name="porcentaje" required>
                </div>
                <div class="row">
                    <p class="col-lg-8 col-sm-8 col-xl-8"></p>
                    <button type="submit" style="margin-left: 1%" class="btn btn-dark col-lg-3 col-sm-3 col-xl-3" name="generarOfertas">Generar ofertas</button>
                    <p class="col-lg-1 col-sm-1 col-xl-1"></p>
                </div>
              </form>
                <p class="col-lg-1 col-sm-1 col-xl-1"></p>
            </div>
            <div class="row">
                <p class="col-lg-1 col-sm-1 col-xl-1"></p>
                <form class="formregistro col-lg-10 col-sm-10 col-xl-10" action="" method="POST">
                    <div class="row">
                        <legend class="col-lg-9 col-sm-9 col-xl-9">Si quieres eliminar las ofertas actuales pulse en el botón siguiente:</legend>
                        <button type="submit" class="btn btn-dark col-lg-2 col-sm-2 col-xl-2" name="eliminarOfertas">Eliminar ofertas</button>
                        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
                    </div>
                  </form>
                    <p class="col-lg-1 col-sm-1 col-xl-1"></p>
            </div>
            <div class="row">
                <p class="col-lg-1 col-sm-1 col-xl-1"></p>
                <form class="formregistro col-lg-10 col-sm-10 col-xl-10" action="" method="POST" id="formOfertas">
                    <legend>Eliminar oferta de un producto:</legend>
                    <div class="form-group">
                        <label for="nProducto">Nombre del producto:</label>
                        <input type="text" class="form-control" id="nProducto" placeholder="Introduce nombre del producto" name="nProducto" required><br>
                    </div>
                    <div class="row">
                        <p class="col-lg-8 col-sm-8 col-xl-8"></p>
                        <button type="submit" style="margin-left: 1%" class="btn btn-dark col-lg-3 col-sm-3 col-xl-3" name="eliOferta">Eliminar oferta</button>
                        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
                    </div>
                  </form>
                    <p class="col-lg-1 col-sm-1 col-xl-1"></p>
            </div>
            <div class="row">
                <p class="col-lg-1 col-sm-1 col-xl-1"></p>
                <form class="formregistro col-lg-10 col-sm-10 col-xl-10" action="" method="POST" id="formOfertaUnica"  >
                    <legend>Oferta por producto:</legend>
                    <div class="form-group">
                        <label for="nomProducto">Para ofertar un producto específico introduzca su nombre:</label>
                        <input type="text" class="form-control" id="nomProducto" placeholder="Introduce nombre del producto" name="nomProducto">
                        <label for="porcentaje2">Porcentaje de descuento:</label>
                        <input type="text" class="form-control" id="porcentaje2" placeholder="Introduce el porcentaje de descuento entre 1 y 10" name="porcentaje2" required>
                    </div>
                    <div class="row">
                        <p class="col-lg-8 col-sm-8 col-xl-8"></p>
                        <button type="submit" style="margin-left: 1%" class="btn btn-dark col-lg-3 col-sm-3 col-xl-3" name="buscarProducto">Buscar</button>
                        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
                    </div>
                  </form>
                 <p class="col-lg-1 col-sm-1 col-xl-1"></p><br>
             </div>

                  
                    <?php
                        if(isset($hayResultados)) {
                            if($hayResultados==0) {
                                
                            }else {
                        $html = '<div class="row">
                        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
                        <form class="formregistro col-lg-10 col-sm-10 col-xl-10" action="" method="POST"><br>
                            <div class="row">
                            <p class="col-lg-1 col-sm-1 col-xl-1"></p>
                            <table class="table table-striped col-lg-10 col-sm-10 col-xl-10 envio3">
                                <thead>
                                    <tr>
                                        <th class="th">Nombre del Producto</th>
                                        <th class="th">Precio del producto</th>
                                        <th class="th">Precio con descuento</th>
                                    </tr>
                                </thead>';
                            
                        echo $html;
                            while ($fila = mysqli_fetch_array($resultado))  {
                        
                    ?>
                    <tbody>
                      <tr>
                          <td class="th"><input type="hidden" name="tituloProducto" value="<?php echo $fila['TITULO']; ?>"><?php echo $fila['TITULO']; ?></td>
                          <td class="th"><input type="hidden" name="precioProducto"><?php echo $fila['PRECIO']; ?></td>
                        <?php 
                          $precio = $fila['PRECIO'];
                          $porcentaje = $_POST['porcentaje2'];
                          $preciodesc = $precio -(($precio*$porcentaje)/100);

                          ?>
                          <td class="th"><input type="hidden" name="precioDescProducto" value="<?php echo $preciodesc; ?>"><?php echo $preciodesc; ?></td>
                      </tr>
                    </tbody>

                    <?php          
                           }
                            $html = '
                            </table>
                            <p class="col-lg-1 col-sm-1 col-xl-1"></p>
                            </div>
                                <div class="row">
                                    <p class="col-lg-8 col-sm-8 col-xl-8"></p>
                                    <button type="submit" style="margin-left: 1%" class="btn btn-dark col-lg-3 col-sm-3 col-xl-3" name="aplicarDesc">Confirmar</button>
                                    <p class="col-lg-1 col-sm-1 col-xl-1"></p>
                                </div>
                              </form>
                              <p class="col-lg-1 col-sm-1 col-xl-1"></p>
                            </div>';
                            echo $html;
                        }
                      }
                    ?>
              </div>
            </div>
         </div>
      </div>
      </div>

     <br><br><br><br><br><br><br><br><br><br><br>

     <!--Incluimos footer-->
 <?php include "footer.php" ?>
 </body>
</html>