<?php
    session_start();
    include "./FuncionesPHP/conexionDB.php";
    include "./email.php";
    if(isset($_POST['titulo']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['asunto'])){
        $tit = $_POST['titulo'];
        $nombre = $_POST['nombre'];
        $ape = $_POST['apellido'];
        $email = $_POST['email'];
        $asunto = $_POST['asunto'];
        registrarIncidencia($tit,$nombre,$ape,$email,$asunto);
        enviarIncidencia($tit,$nombre,$ape,$email,$asunto);
        echo '<div class="alert alert-primary">
                <strong>Su consulta se ha registrado correctamente. En breve, tramitaremos su solucitud. Gracias.</strong> 
              </div>';
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
<!--Formulario de contacto-->
<div style="background: linear-gradient(90deg,#B9BFC6  5%, #F2F6FA  95%);" class="contenedor">
    <?php include "./cabecera.php" ?>
   <div><br>
   <div  class="row justify-content-center">
    <p class="col-lg-1 col-sm-1 col-xl-1"></p>
    <form class="formregistro col-lg-10 col-sm-10 col-xl-10" action="" id="formContacto" method="POST">
    	<div class="row">
    	 	<legend class="col-lg-12 col-sm-12 col-xl-12">Contacta con nosotros!</legend>
		</div>
		<div class="row">    	 	
    	 	<div class="col-lg-4 col-sm-4 col-xl-4">
            <div class="form-group">
                <label for="titulo">Asunto*</label>
                <input type="text" class="form-control" id="titulo" placeholder="Asunto" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre*</label>
                <input type="text" class="form-control" id="nombre" placeholder="Usuario" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido*</label>
                <input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico*</label>
                <input type="email" class="form-control" id="email" placeholder="Correo electrónico" name="email" required>
            </div>
         </div>
			<div class="col-lg-8 col-sm-8 col-xl-8">
				<div class="form-group">
					<label for="asunto">Asunto del mensaje*</label>
					<textarea class="form-control" rows="9" id="asunto" name="asunto" required></textarea>
                </div>
                <div class="row justify-content-center">
                    <p class="col-lg-1"></p>
                <div class="custom-file col-lg-6 col-sm-6 col-xl-6">
    				<input type="file" class="custom-file-input" id="customFile">
    				<label class="custom-file-label" for="customFile">Seleccionar archivo...</label>
  		        </div>
                <!--script browser-->
                    <script>
                        $("#customFile").on("change",function(){
                            var texto=$(this).val();
                            $(this).next(".custom-file-label").addClass("selected").html(texto);
                        })
                    </script>
                <div class="form-group col-lg-5 col-sm-5 col-xl-5">
            	    <input type="submit" class="btn btn-dark" value="Enviar">
            	    <input type="reset"	class="btn btn-secondary" value="Limpiar campos">
                </div>
                </div>
			</div>
		</div>	
    </form>
    <p class="col-lg-1 col-sm-1 col-xl-1"></p>
    </div>
    <br>
  </div>
</div>
<!--Incluimos footer-->
    <?php include "footer.php" ?>
    </body>
</html>