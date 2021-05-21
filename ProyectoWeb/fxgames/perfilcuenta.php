

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
 <?php include "./cabecera.php" ?>
  <div class="row">
        <p class="col-lg-4 col-sm-4 col-xl-4"></p>
        <h2 class="col-lg-4 col-sm-4 col-xl-4 titproducto">PERFIL</h2>
        <p class="col-lg-4 col-sm-4 col-xl-4"></p>      
  </div><br>
  <!--primer div-->
  <div class="row">
       <p class="col-lg-1 col-sm-1 col-xl-1"></p>
       <div class="col-lg-3 col-sm-3 col-xl-3"><br><img class="img-fluid" style="border-bottom: PowderBlue 8px solid;margin-left:auto" src="<?php echo obtenerImagen('descarga2'); ?>" width="300" height="400">
           <div class="row">
               <p class="col-lg-2 col-sm-2 col-xl-2"></p>
               <button type="submit" class="btn btn-light btnpedido col-lg-4 col-sm-4 col-xl-4" style="margin-top: 4%;background-color: PowderBlue" name="sesion"><b>Cerrar sesión</b></button>
               <p class="col-lg-6 col-sm-6 col-xl-6"></p>
           </div>
       </div>
       <ul class="list-group col-lg-3 col-sm-3 col-xl-3">
            <li class="list-group-item">&gt;<a class="text-info" data-toggle="collapse" href="#Datos"><b>Datos personales</b></a>
                <div class="collapse show" id="Datos"><br>
                    <p><a><?php echo $fila['NOMBRE'];?></a></p>
                    <p><a><?php echo $fila['APELLIDOS'];?></a></p>
                    <p><a><?php echo $fila['EMAIL'];?></a></p>
                    <p><a><?php echo $fila['FECHA_NAC'];?></a></p>
                    <p><a><?php echo $fila['DIRECCION'];?></a></p>
                </div>
            </li>
       </ul>
       <ul class="list-group col-lg-4 col-sm-4 col-xl-4">
            <li class="list-group-item">&gt;<a class="text-info" data-toggle="collapse" href="#Historial"><b>Historial de Compras</b><img src="<?php echo obtenerImagen('historial'); ?>" class="img-fluid" style="margin-left: 1%;" width="15" height="15"></a><br>
                <div class="collapse row" id="Historial"><br><br>
                    <table class="table table-striped envio3 col-lg-12 col-sm-12 col-xl-12"><br>
                        <thead>
                          <tr><br>
                            <th class="th">Artículos</th>
                            <th class="th">Cantidad</th>
                            <th class="th">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="th"></td>
                            <td class="th"></td>
                            <td class="th"></td>
                          </tr>
                        </tbody>
                    </table>
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
                    <form class="formregistro" action="" method="POST">
                        <div class="form-group">
                            <label for="text">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
                        </div>
                        <div class="form-group">
                            <label for="text">Apellido</label>
                            <input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido">
                        </div>
                        <div class="form-group">
                            <label for="text">Dirección</label>
                            <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion">
                        </div>
                        <div class="form-group">
                            <label for="text">Contraseña</label>
                            <input type="password" class="form-control" id="pass" placeholder="Contraseña" name="pass">
                        </div>
                        <div class="form-group">
                            <label for="text">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fechanac" placeholder="Fecha de nacimiento" name="fechanac">
                        </div>
                        <button type="submit" class="btn btn-dark col-lg-2 col-sm-2 col-xl-2">Editar perfil</button>
                    </form>
                </div>
            </li>
        </ul>
        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
     </div><br>
      <!--Incluimos el footer-->
      <?php include "footer.php" ?>
  </body>
</html>