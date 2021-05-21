<?php 
    session_start();
    include "./FuncionesPHP/conexionDB.php";
    include "./email.php";
    if (isset($_POST['emailI']) && isset($_POST['pswd'])) {
        $email = $_POST['emailI'];
        $pass = $_POST['pswd'];
        if (login($email,$pass)) {
            $_SESSION['usuario']=$email;
            if(isset($_POST['remember']) && !isset($_COOKIE['Cuser']) && !isset($_COOKIE['Cpass'])) {
                setcookie('Cuser',$email,strtotime('+365 days'));
                setcookie('Cpass',$pass,strtotime('+365 days'));
            } 
              // echo "Esto accedería a la página del perfil de usuario";
        }else {
          echo '<div class="alert alert-danger">
                <strong>Usuario o contraseña incorrectos. Por favor, verifique sus datos o proceda a registrarse.</strong> 
              </div>';
        }
    }

    if (isset($_POST['emailR'])) {
        $email = $_POST['emailR'];
        if (comprobarUsuario($email)!=0) {
            $pass = generarClave(8);
            $passCode = password_hash($pass, PASSWORD_BCRYPT);
            updatePass($email, $passCode);
            recuperarPass($email, $pass);
        }
    }
    
    if(isset($_POST['actualizar'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dir = $_POST['direccion'];
        $passActual = $_POST['passActual'];
        $pass = $_POST['pass'];
        if($pass=='') {
            $pass = $passActual;
        }
        $fech = $_POST['fechanac'];
        if (login($_SESSION['usuario'],$passActual)) {
            $passCode = password_hash($pass, PASSWORD_BCRYPT);
            actualizarDatosPersonales($nombre, $apellido, $_SESSION['usuario'], $passCode, $fech,$dir);
        }else {
             echo '<div class="alert alert-danger">
                <strong>La contraseña es incorrecta. Por favor, vuelva a introducirla.</strong> 
              </div>';
        }
    }

    if(isset($_POST['imgperfil'])) {
        if(isset($_FILES['imgPpal']['name'])){
            //echo $_FILES['fileToUpload']['name'];
            //$data = file_get_contents( $_FILES['fileToUpload']['tmp_name']);
            $type = pathinfo($_FILES['imgPpal']['tmp_name'], PATHINFO_EXTENSION);
            $data = file_get_contents($_FILES['imgPpal']['tmp_name']);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            $email = $_SESSION['usuario'];
            editarImagenPerfil($email,$base64);
        }
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
<?php include "cabecera.php" ?>

    <?php 
        if(!isset($_SESSION['usuario'])) {
            
    ?>
<!--Inciciamos los dos formularios, el de inicio de sesión y el que te llevará al registro-->
    <div class="row">
      <p class="col-lg-1 col-sm-1 col-xl-1"></p>
        <!--Iniciamos el formulario de inicio de sesión-->
      <div class="col-lg-4 col-sm-4 col-xl-4 forminicio">
        <br><br>
        <h2>Iniciar sesión:</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="emailI" <?php if(isset($_COOKIE['Cuser'])) {$strhtml = 'value='.$_COOKIE['Cuser']; echo $strhtml;} ?> required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" <?php if(isset($_COOKIE['Cpass'])) {$strhtml = 'value='.$_COOKIE['Cpass']; echo $strhtml;} ?> required>
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember">Recordarme
                </label>
            </div>
            <a href="" data-toggle="modal" data-target="#myModal">¿Olvidaste tu contraseña?</a><br><br>
            <button type="submit" class="btn btn-dark">Iniciar sesión</button>
        </form>
        <br>
        <!--Iniciamos pantalla emergente del formulario para recuperar contraseña-->
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">¿OLVIDASTE TU CONTRASEÑA?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <p><b>Por favor, introduzca el email con el que se registró y en breve le enviaremos una nueva contraseña</b></p>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="emailR" required>
                    </div>
                    <button type="submit" class="btn btn-dark">Recuperar</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <p class="col-lg-2 col-sm-2 col-xl-2"></p>
        <!--Iniciamos el formulario que nos llevará al registro completo-->
      <div class="col-lg-4 col-sm-4 col-xl-4 formcuenta">
        <br><br>
        <h2>Registrarse:</h2><br>
        <p><b>Escriba su correo electrónico para crear la cuenta</b></p>
        <form action="./registro.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email"  name="email" required>
            </div>
            <button type="submit" class="btn btn-dark">Crear cuenta</button>
        </form>
        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
      </div>
    </div>
    <?php 
            
        }else {
            $filaDatos = datosPersonales($_SESSION['usuario']);
    ?>
    
    <div class="row">
        <p class="col-lg-4 col-sm-4 col-xl-4"></p>
        <h2 class="col-lg-4 col-sm-4 col-xl-4 titproducto">PERFIL</h2>
        <p class="col-lg-4 col-sm-4 col-xl-4"></p>      
    </div><br>
  <!--primer div-->
  <div class="row">
       <p class="col-lg-1 col-sm-1 col-xl-1"></p>   
       <div class="col-lg-3 col-sm-3 col-xl-3">
           <div>
               <form action="" method="post" enctype="multipart/form-data">
                   <label for="fichero">Actualizar imagen (máx.1MB):</label>
                   <div class="input-group">
                          <div class="input-group-prepend">
                             <span class="input-group-text" id="inputGroupFileAddon01">Fichero</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imgPpal" name="imgPpal" aria-describedby="inputGroupFileAddon01" required>
                            <label class="custom-file-label" for="inputGroupFile01" id="ficheroElegido">Seleccionar archivo</label>
                          </div>
                       
                     </div>
                   <button type="submit" class="btn btn-light btnpedido" style="margin-top: 7%; margin-left: 15%; background-color: PowderBlue" name="imgperfil"><b>Editar imagen</b></button><br>
               </form>
           </div>
           <img class="img-fluid" style="border-bottom: PowderBlue 8px solid;margin:auto" src="<?php echo obtenerImagenPerfil($filaDatos['ID']); ?>" width="300" height="400">
           <div class="row">
               <p class="col-lg-2 col-sm-2 col-xl-2"></p>
               <div class="col-lg-8 col-sm-8 col-xl-8" >
                   <div class="row">
                       <form action="./logout.php" method="post">
                           <button type="submit" class="btn btn-light btnpedido col-lg-12 col-sm-12 col-xl-12" style="margin-top: 7%; margin-left: 15%; background-color: PowderBlue" name="sesion"><b>Cerrar sesión</b></button>            
                       </form>
                   </div>
               </div>
               <p class="col-lg-2 col-sm-2 col-xl-2"></p>
           </div>
       </div><br>
       <ul class="list-group col-lg-2 col-sm-2 col-xl-2">
            <li class="list-group-item">&gt;<a class="text-info" data-toggle="collapse" href="#Datos"><b>Datos personales</b></a>
                <div class="collapse show" id="Datos"><br>
                    <p><a><?php echo $filaDatos['NOMBRE'];?></a></p>
                    <p><a><?php echo $filaDatos['APELLIDOS'];?></a></p>
                    <p><a><?php echo $filaDatos['EMAIL'];?></a></p>
                    <p><a><?php echo $filaDatos['FECHA_NAC'];?></a></p>
                    <p><a><?php echo $filaDatos['DIRECCION'];?></a></p>
                </div>
            </li>
       </ul>
       <ul class="list-group col-lg-5 col-sm-5 col-xl-5">
            <li class="list-group-item">&gt;<a class="text-info" data-toggle="collapse" href="#Historial"><b>Historial de Compras</b><img src="<?php echo obtenerImagen('historial'); ?>" class="img-fluid" style="margin-left: 1%;" width="15" height="15"></a><br>
                <div class="collapse row" id="Historial">
                    <?php 
                        $id = 0;
                        $resultado =  misPedidos($_SESSION['usuario']);
                        $idAnterior= 0;
                        $hayFacturas = false;
                        $localizador = '';
                        $estado = '';
                        while($fila = mysqli_fetch_array($resultado)){
                            $hayFacturas = true;
                            $id = $fila['IDFACTURA'];
                            
                            $estado = $fila['ESTADO'];
                            if($id!=$idAnterior && $idAnterior!=0){
                                $html = '<tbody style="display:none" id="'.$localizador.'">
                                          <tr>
                                            <td class="th" colspan=4>PEDIDO CON LOCALIZADOR '.$localizador.': '.$estado.'</td>
                                          </tr>
                                        </tbody>';
                                echo $html;
                                echo '</table>';
                            }
                            $localizador = $fila['LOCALIZADOR'];
                            if($id!=$idAnterior){
                            echo '<table class="table table-striped envio3 col-lg-12 col-sm-12 col-xl-12">';    
                        ?>

                        <thead>
                            <tr>
                                <th class="th" >Artículos</th>
                                <th class="th">Cantidad</th>
                                <th class="th">Precio/U</th>
                                <th class="th"><img src="<?php echo obtenerImagen('camion'); ?>" style="float:right" class="img-fluid"  width="50" height="50" id="camion" onclick="ejemplo('<?php echo $localizador; ?>')">Total</th>
                            </tr>
                        </thead>

                        <?php 
                            }
                        ?>
                        <tbody>
                          <tr>
                            <td class="th"><?php echo $fila['TITULO']; ?></td>
                            <td class="th"><?php echo $fila['CANTIDAD']; ?></td>
                            <td class="th"><?php echo $fila['PRECIO']; ?></td>
                            <td class="th"><?php echo $fila['CANTIDAD']*$fila['PRECIO']; ?></td>
                          </tr>
                          
                        </tbody>
                   
                        <?php 
                            $idAnterior = $id;
                        }
                        if($id!=0) {
                              $html = '<tbody style="display:none" id="'.$localizador.'">
                                  <tr>
                                    <td class="th" colspan=4>PEDIDO CON LOCALIZADOR '.$localizador.': '.$estado.'</td>
                                  </tr>
                                </tbody>';
                                echo $html;
                        }
             
                        echo '</table>';
                        if(!$hayFacturas){
                            echo '<li class="list-group-item collapse" id="Historial" style="text-align: center; color: #26295F">No hay pedidos realizados. Le animamos a que pruebe nuestros productos.</li>';
                        }
                    ?>
                </div>
           </li>
      </ul>
      <p class="col-lg-1 col-sm-1 col-xl-1"></p>
    </div><br>
    <!--segundo div-->
    <div class="row">
        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
        <ul class="list-group col-lg-10 col-sm-10 col-xl-10">
            <li class="list-group-item">&gt;<a class="text-info" data-toggle="collapse" href="#editar"><b>Editar datos personales:</b></a>
                <div class="collapse" id="editar"><br>
                    <form class="formregistro" action="" method="POST" id="formEditPerfil">
                        <div class="form-group">
                            <label for="nombreP">Nombre</label>
                            <input type="text" class="form-control" id="nombreP" placeholder="Nombre" name="nombre" value="<?php echo $filaDatos['NOMBRE'];?>">
                        </div>
                        <div class="form-group">
                            <label for="text">Apellido</label>
                            <input type="apellidoP" class="form-control" id="apellidoP" placeholder="Apellido" name="apellido" value="<?php echo $filaDatos['APELLIDOS'];?>">
                        </div>
                        <div class="form-group">
                            <label for="text">Dirección</label>
                            <input type="direccionP" class="form-control" id="direccionP" placeholder="Dirección" name="direccion" value="<?php echo $filaDatos['DIRECCION'];?>">
                        </div>
                        <div class="form-group">
                            <label for="text">Contraseña actual *</label>
                            <input type="password" class="form-control" id="passActual" placeholder="Contraseña Actual" name="passActual" required>
                        </div>
                        <div class="form-group">
                            <label for="passP">Contraseña</label>
                            <input type="password" class="form-control" id="passP" placeholder="Contraseña" name="pass">
                        </div>
                        <div class="form-group">
                            <label for="text">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fechanac" placeholder="Fecha de nacimiento" name="fechanac" value="<?php echo $filaDatos['FECHA_NAC'];?>">
                        </div>
                            <input type="submit" class="btn btn-dark col-lg-2 col-sm-2 col-xl-2" name="actualizar" value="Editar Perfil"> 

                    </form>
                </div>
            </li>
        </ul>
        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
     </div><br>
    <?php 
        }
    ?>
<?php include "footer.php" ?>
</body>
</html>