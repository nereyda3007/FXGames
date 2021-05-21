<?php
//session_start();
    //include "./FuncionesPHP/conexionDB.php";
    /*if(isset($_POST['sesion'])){
        session_unset();
        session_destroy();
    }*/

    if(isset($_SESSION['usuario'])){
        $user = $_SESSION['usuario'];
        $datos = datosPersonales($user);
        if($datos['ADMIN']==1){
            $isAdmin = true;
        }else{
            $isAdmin = false;
        }
    }

?>
<!--<head>
	<link rel="stylesheet" href="./csspropio/estilos.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>-->
<!--Enlaces cabecera -->
<div class="loader">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>
<div class="row infoheader">
 <nav class="navbar navbar-expand-sm bg-light navbar-light col-lg-3 col-sm-3 col-xl-3 justify-content-center">
		<ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="./atc.php" target="_top"><b>Atención al cliente</b></a></li>
			<li class="nav-item"><a class="nav-link" href="./Mapa_Web.php" target="_top"><b>Mapa Web</b></a></li>
		</ul>
</nav>
    <!--Texto cabecera -->
    <p class="col-lg-3 col-sm-3 col-xl-3"></p>
	<marquee class="col-lg-6 col-sm-6 col-xl-6" style="color:white; font-weight:bold;margin:auto">¡¡Esta semana un 50% en MERCHANDISING!! -- Gastos de envío GRATUITOS</marquee>
</div>
<!--Logo,buscador y botones perfil y tienda -->
<div class="row bg-light">
    <a class="col-lg-3 col-sm-3 col-xl-3" href="./index.php" target="_top"><img style="display:block;margin:auto;" class="img-fluid" src="<?php echo obtenerImagen('logo'); ?>" width="300" height="250"></a>
    <form class="col-lg-7 col-sm-7 col-xl-7" style="margin:auto" action="./buscador.php" method="POST">
        <input class="form-control" id="myInput" type="text" name="buscador" placeholder="Search..">
    </form>
    <!--script buscador 
    <script type="text/javascript">
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#contenedor *").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>-->
    <div class="col-lg-2 col-sm-2 col-xl-2">
    <a href="./perfil.php" target="_top"><img style="display:block;margin:10% 0;margin-left: 20%" align="left" class="img-fluid" src="<?php if(isset($user)){ echo obtenerImagen('perfil2');}else{ echo obtenerImagen('perfil');}?>" <?php if(isset($user)){ echo "title='Bienvenido/a, $user' ";}?> width="46" height="46" ></a>
    <a href="./tienda.php" target="_top" <?php if(!isset($_SESSION['usuario'])) {echo 'onclick="return false" title="Por favor, indentifícate o registrate para acceder a la tienda"';} ?>><img style="display:block;margin:10% 0;margin-right: 20%" align="right" class="img-fluid" src="<?php if(isset($user)){ echo obtenerImagen('tienda2');}else{ echo obtenerImagen('tienda');}?>" width="50" height="50"></a>
    </div>
</div>
<!--Menú principal -->
   <div class="contenedor" >
      <nav class="navbar navbar-expand-lg bg-dark justify-content-center navbar-dark">
        <ul class="menudes navbar-nav">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" target="_top"><b>Videojuegos</b></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="./productos/plantillaVideojuegos.php?categoria=PS4" target="_top">Juegos para PS4</a>
                    <a class="dropdown-item" href="./productos/plantillaVideojuegos.php?categoria=XBOX" target="_top">Juegos para XBOX ONE</a>
                    <a class="dropdown-item" href="./productos/plantillaVideojuegos.php?categoria=PC" target="_top">Juegos para PC</a>
                    <a class="dropdown-item" href="./productos/plantillaVideojuegos.php?categoria=PSVITA" target="_top">Juegos para VITA</a>
                    <a class="dropdown-item" href="./productos/plantillaVideojuegos.php?categoria=SWITCH" target="_top">Juegos para SWITCH</a>
                </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" target="_top"><b>Electrónica</b></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="./productos/plantillaAccesorios.php?categoria=ACC_PS4" target="_top">Accesorios PS4</a>
                    <a class="dropdown-item" href="./productos/plantillaAccesorios.php?categoria=ACC_XBOX" target="_top">Accesorios XBOX ONE</a>
                    <a class="dropdown-item" href="./productos/plantillaAccesorios.php?categoria=ACC_VITA" target="_top">Accesorios VITA</a>
                    <a class="dropdown-item" href="./productos/plantillaAccesorios.php?categoria=ACC_SWITCH" target="_top">Accesorios SWITCH</a>
                </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" target="_top"><b>Videoconsolas</b></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="./productos/plantillaConsolas.php?categoria=CON_PS4" target="_top">Videoconsolas PS4</a>
                    <a class="dropdown-item" href="./productos/plantillaConsolas.php?categoria=CON_XBOX" target="_top">Videoconsolas XBOX ONE</a>
                    <a class="dropdown-item" href="./productos/plantillaConsolas.php?categoria=CON_SWITCH" target="_top">Videoconsolas SWITCH</a>
                </div>  
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" target="_top"><b>Ofertas</b></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="./productos/plantillaAccesorios.php?tipo=ACCESORIOS" target="_top">Accesorios</a>
                    <a class="dropdown-item" href="./productos/plantillaConsolas.php?tipo=CONSOLAS" target="_top">Videoconsolas</a>
                    <a class="dropdown-item" href="./productos/plantillaMerchandising.php?tipo=MERCHANDISING" target="_top">Merchandising</a>
                    <a class="dropdown-item" href="./productos/plantillaVideojuegos.php?tipo=VIDEOJUEGO" target="_top">Juegos</a>
                </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" target="_top"><b>Merchandising</b></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="./productos/plantillaMerchandising.php?categoria=PELUCHES" target="_top">Peluches</a>
                    <a class="dropdown-item" href="./productos/plantillaMerchandising.php?categoria=ROPA" target="_top">Ropa</a>
                    <a class="dropdown-item" href="./productos/plantillaMerchandising.php?categoria=FIGURAS" target="_top">Figuras</a>
                    <a class="dropdown-item" href="./productos/plantillaMerchandising.php?categoria=OTROS" target="_top">Otros</a>
                </div>
            </li>
            <?php
                if(isset($isAdmin) && $isAdmin){
                    echo '<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" target="_top"><b>Administrador</b></a>
                           <div class="dropdown-menu">
                                <a class="dropdown-item" href="./administrador.php" target="_top">Administración</a>
                            </div> 
                    </li>';
                }
            ?>
          </ul>
     </nav>
    </div>
<!--Se abre la etiqueta para el buscador que se cerrará en el footer -->
<!--<div id="contenedor">-->