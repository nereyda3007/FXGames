<?php
    session_start();
    include './FuncionesPHP/conexionDB.php';
    include "./email.php";
    //se comprueba que los datos obligatorios existen
    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['pswd']) && isset($_POST['acuerdo']) && isset($_POST['condiciones'])){
        if(isset($_POST['tratamiento'])){
             $tra = $_POST['tratamiento'];
        }else{
            $tra = '';
        }
        $nombre = $_POST['nombre'];
        $ape    = $_POST['apellido'];
        $email  = $_POST['email'];
        $pass   = $_POST['pswd'];
        $fecha  = $_POST['fecha'];
        $nov    = isset($_POST['novedades']);
        if($nov){
            $nov = 1;
        }else{
            $nov = 0;
        }
        $passCode = password_hash($pass, PASSWORD_BCRYPT);
        
        if(comprobarUsuario($email)==0){
            nuevoUsuario($tra,$nombre,$ape,$email,$passCode,$fecha,$nov,1,1);
            enviarMailNuevoUsuario($email,$nombre,$ape,$pass);
            echo '<div class="alert alert-primary">
                <strong>Su usuario se ha registrado correctamente. Inicie sesión para acceder a su perfil.</strong> 
              </div>';
        }else{
           echo '<div class="alert alert-danger">
                <strong>Correo ya registrado. Por favor inicie sesión.</strong> 
              </div>';
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
<!--Iniciamos formulario de registro completo-->
  <div style="background: linear-gradient(90deg,#B9BFC6  10%, #F2F6FA  90%);" class="row"> 
    <p class="col-lg-2 col-sm-2 col-xl-2 form-group"></p>
    <div class="col-lg-8 col-sm-8 col-xl-8">
    <br>
    <form class="formregistro" action="" method="POST" id="registrarse">
            <legend>Datos personales:</legend>
            <div class="form-group">
                <label for="text">Tratamiento:</label>
            <br>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="customRadio" name="tratamiento" value="Sr">
                <label class="custom-control-label" for="customRadio">Sr.</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="customRadio2" name="tratamiento" value="Sra">
                <label class="custom-control-label" for="customRadio2">Sra.</label>
            </div><br><br>
            <div class="form-group">
                <label for="nombreR">Nombre*</label>
                <input type="text" class="form-control" id="nombreR" placeholder="Usuario" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellidoR">Apellido*</label>
                <input type="text" class="form-control" id="apellidoR" placeholder="Apellido" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico*</label>
                <input type="email" class="form-control" id="email" placeholder="Correo electrónico" name="email" value="<?php echo $_POST['email'] ?>" readonly >
            </div>
            <div class="form-group">
                <label for="pwdR">Contraseña*</label>
                <input type="password" class="form-control" id="pwdR" placeholder="Contraseña" name="pswd" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fecha" placeholder="----" name="fecha">
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck" name="novedades" value="">
                <label class="custom-control-label" for="customCheck">Quiero recibir las últimas novedades a mi correo electrónico</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck2" name="acuerdo" value="" required>
                <label class="custom-control-label" for="customCheck2">Estoy de acuerdo con los términos y condiciones del servicio <a href="" data-toggle="modal" data-target="#myModal">Lea los Términos y Condiciones del Servicio</a></label>
            <div class="modal" id="myModal">
            <!--Iniciamos pantalla de condiciones-->
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">POLITICA DE PRIVACIDAD</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
             <div class="modal-body">
    <pre>La Política de Privacidad es parte integrante de las Condiciones Generales de la relación contractual y del uso del servicio web entre FXGames, S.L.U. (en adelante FXG) y el socio o cliente. El acceso o navegación en el Sitio Web, o el uso de los servicios del mismo, implican la aceptación de las Condiciones Generales y, por tanto, de la Política de Privacidad y la Política de Cookies. Por favor, léelas atentamente. 
    
    <b>En esta Política de Privacidad te informamos de:</b>

    ¿Quién es el responsable del tratamiento de tus datos?
    ¿Con qué finalidad tratamos tus datos?
    ¿Cuánto tiempo almacenamos tus datos?
    ¿Cuál es la legitimación para el tratamiento de tus datos personales?
    ¿Comunicamos tus datos personales a terceros?
    ¿Qué derechos tienes como cliente de GAME?
    ¿De dónde hemos obtenido tus datos?
    ¿QUIÉN ES EL RESPONSABLE DEL TRATAMIENTO DE TUS DATOS?
    Todos los datos facilitados por los Usuarios, sean mediante la navegación por el Sitio Web, el cumplimiento de formularios o la firma del contrato de Socio, serán incorporados a nuestros ficheros y tratados a través de medios automatizados o no automatizados, siguiendo las normas establecidas por el Reglamento General Europeo de Protección de Datos (RGPD), así como la legislación española y las instrucciones de la Agencia Española de Protección de datos.

    <b>Los datos del Responsable del Tratamiento son los siguientes:</b>

    Responsable del tratamiento:
    FX GAMES S.L.U. - CIF: B87256418
    Calle Virgilio 7-9. 28223 Pozuelo de Alarcón (Madrid)

    Delegado de Protección de Datos:
    FX GAMES S.L.U.
    Contacto DPO: atc@fxg.es
    atc@fxg.es Tfno. 91 330 01 00

    <b>¿CON QUÉ FINALIDAD TRATAMOS TUS DATOS?</b>
    En FXG tratamos los datos necesarios para gestionar y optimizar nuestros servicios y relaciones comerciales de cara a nuestros socios y clientes. Además, también usamos esta información para enviar publicidad de interés a los usuarios, relacionada con nuestros productos, novedades, ofertas y promociones.

    Los datos se recogen con las siguientes finalidades:

    Gestionar el registro en la Página Web.
    Gestionar y tramitar las relaciones comerciales efectuadas por los clientes.
    Realizar el envío de comunicaciones comerciales (boletín de noticias).
    Responder a las solicitudes de información que nos envíen nuestros clientes.
    Cumplir obligaciones legales.
    Realizar análisis estadísticos.
    Con el fin de poder ofrecer productos y servicios de acuerdo con sus intereses, elaboramos perfiles comerciales en base a la información facilitada y las compras realizadas por nuestros clientes. No se tomarán decisiones automatizadas en base a dicho perfil.

    A efectos informativos, el “Boletín de noticias FXG” puede incluir información sobre novedades, ofertas, promociones, productos relaciones y/o cualquier otro tipo de información comercial que pudiera ser de interés para el cliente.

    En cualquier caso, el usuario podrá darse de baja en cualquier momento, de manera fácil y gratuita a través del link proporcionado en los correos, la casilla de publicidad de la Zona de Socios, o bien mediante comunicación directa a la siguiente dirección de correo electrónico: atc@fxg.es.

    Si, en su caso, quiere dejar de recibir notificaciones push a través de nuestra App, puede configurar esta opción en la sección de Ajustes de Privacidad de su teléfono móvil.

    <b>¿CUÁNTO TIEMPO ALMACENAMOS TUS DATOS?</b>
    Los datos de carácter personal proporcionados por nuestros socios y clientes, serán conservados únicamente durante el tiempo necesario para la realización de las finalidades para la que fueron recogidos, siempre que se mantenga la relación comercial o contractual.

    Todos nuestros clientes podrán solicitar la supresión de sus datos de nuestros ficheros, conservándose los datos únicamente para atender posibles responsabilidades legales y por el plazo mínimo legalmente establecido.

    En el caso de los datos facilitados para la inscripción a las ofertas de empleo publicadas, serán conservados durante el plazo de un año desde la fecha de la última actualización. Transcurrido dicho periodo sin que hayan sido actualizados, los datos serán suprimidos, salvo indicación contraria del usuario.

    <b>¿CUÁL ES LA LEGITIMACIÓN PARA EL TRATAMIENTO DE TUS DATOS?</b>
    La base legal para el tratamiento de los datos de socios y clientes por parte de FXG reside en el consentimiento expreso del interesado prestado al inicio de la relación contractual y/o comercial y, según los términos y condiciones que figuran en el contrato y en nuestra página web.

    La gestión de la contratación de productos o servicios, pago, facturación, garantías y envíos correspondientes, está legitimada por la propia ejecución del contrato.

    La oferta de productos y servicios a través de medios electrónicos está basada, en su caso, en el consentimiento expreso proporcionado por el socio o cliente, o mediante el interés legítimo derivado de la relación comercial. En ningún caso la retirada de este consentimiento condicionará la ejecución del contrato o la relación comercial con los clientes.

    Los menores de dieciséis años deberán contar con el consentimiento de sus padres o tutores legales para el tratamiento de sus datos personales.

    Adicionalmente, la legitimación para el tratamiento de sus datos en relación con la remisión de CVs e inscripciones en ofertas profesionales que podamos publicar, se basa en el consentimiento del usuario que remite los datos, pudiendo retirarlo en cualquier momento. La retirada del consentimiento no afectará a la licitud de los tratamientos efectuados con anterioridad en los procesos de selección.

    <b>¿COMUNICAMOS TUS DATOS PERSONALES A TERCEROS?</b>
    Los datos personales de nuestros socios y clientes no serán comunicados a terceras personas o empresas ajenas a FXG.

    Si fuera necesario ceder estos datos a terceros para la prestación de un servicio específico, el usuario será informado adecuadamente y se le requerirá para aportar de nuevo el consentimiento autorizando dicha cesión.

    Si dicho consentimiento fuera necesario para la prestación del servicio específico, podrá negarse al usuario la contratación del mismo si éste no aceptase las condiciones.

    ¿QUÉ DERECHOS TIENES COMO CLIENTE DE FXG?
    Con la nueva regulación, se han ampliado los derechos de los usuarios. Además de los ya existentes, se añaden nuevos derechos como la limitación del tratamiento y la portabilidad de los datos.

    Cualquier persona podrá ejercitar el derecho de acceso a sus datos personales, el derecho de rectificación para modificar aquellos datos desactualizados o inexactos y, en su caso, el derecho de cancelación cuando los datos ya no sean necesarios para la relación comercial o el usuario quiera dar de baja la relación contractual.

    En el caso del derecho de cancelación, oposición o limitación del tratamiento, los datos de nuestros clientes sólo serán conservados para poder atender reclamaciones judiciales.

    El usuario puede ejercer sus derechos en los términos establecidos en la legislación vigente. A tal efecto puede remitir escrito a FX GAMES, S.L.U. con domicilio social en la Calle Virgilio 7-9, 28223 Pozuelo de Alarcón, Madrid (España), con la indicación en el sobre “Protección datos FXG” o con el mismo asunto a la dirección de correo electrónico atc@fxg.es.

    Para el ejercicio del derecho de cancelación o baja de socio, el usuario deberá completar el formulario "Baja Socio" habilitado en el apartado de Contratos de la Web y enviarlo, junto a una fotocopia de su DNI, a la dirección de correo electrónico atc@fxg.es 

    <b>¿DE DÓNDE HEMOS OBTENIDO TUS DATOS?</b>
    Los datos personales que tratamos en FXG proceden de los socios y clientes que, voluntariamente, han establecido relaciones comerciales y/o contractuales con nuestra empresa.

    Las categorías de datos que se tratan para personas socias de FXG son: nombre, apellidos, fecha de nacimiento, documento nacional de identidad/tarjeta de residencia, domicilio, imagen, número de tarjetas (tokenizadas), teléfono, correo electrónico, nombre y apellidos de personas autorizadas (incluyendo, en su caso, datos de menores de edad con el consentimiento de su tutor/a legal), información comercial.

    Las categorías de datos que se tratan para clientes Web son: nombre, apellidos, fecha de nacimiento, documento nacional de identidad/tarjeta de residencia, domicilio, número de tarjetas (tokenizadas), teléfono, correo electrónico, información comercial. 

    El Usuario responderá, en cualquier caso, de la veracidad de los datos facilitados, reservándose FXG el derecho a excluir de los servicios registrados a todo Usuario que haya facilitado datos falsos, así como por el resto de circunstancias recogidas al respecto en el presente aviso legal, sin perjuicio de las demás acciones que procedan en Derecho.</pre>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck3" name="condiciones" value="" required>
                <label class="custom-control-label" for="customCheck3">Acepto las condiciones generales de protección de datos que puedes leer en los Términos y Condiciones del Servicio</label>
            </div>
        </div>
        <div class="row">
            <p class="col-lg-9 col-sm-9 col-xl-9"></p>
            <button type="submit" class="btn btn-dark col-lg-2 col-sm-2 col-xl-2">Registrarse</button>
            <p class="col-lg-1 col-sm-1 col-xl-1"></p>
        </div>
      </form>
      <p class="col-lg-2 col-sm-2 col-xl-2"></p><br>
    </div>
  </div>
    <!--Incluimos footer-->
<?php include "footer.php" ?>
 </body>
</html>