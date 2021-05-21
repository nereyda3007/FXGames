<?php
    session_start();
    include "./FuncionesPHP/conexionDB.php";
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
     <div class="contenedor">
  <?php include "./cabecera.php" ?>
<!--Título de la página-->
<div class="content" style="width:100%,height:400px">
    <div class="row">
        <p class="col-lg-4 col-sm-4 col-xl-4"></p>
        <h2 class="col-lg-4 col-sm-4 col-xl-4 titproducto">ATENCIÓN AL CLIENTE</h2>
        <p class="col-lg-4 col-sm-4 col-xl-4"></p>
    </div>
     <br>
<!--script buscador 
<script>
$(document).ready(function(){
  $("#atcin").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#atc *").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>-->
    <div class="row">
        <h3 style="text-align: center" class="col-lg-6 col-sm-6 col-xl-6 faq">PREGUNTAS FRECUENTES - FAQ</h3>
        <input style="margin:left" class="form-control col-lg-5 col-sm-5 col-xl-5" id="atcin" type="text" placeholder="Por favor, escribe una o más palabras relacionadas con tu pregunta">
        <p class="col-lg-1 col-sm-1 col-xl-1"><img class="img-fluid" src="<?php echo obtenerImagen('iconobuscar'); ?>" width="43" height="43"></p>
    </div>
<!--Menú ATC-->
<div class="row">
    <div class="col-lg-3 col-sm-3 col-xl-3">
        <nav class="navbar nav flex-column navbar-light justify-content-center">
		  <ul class="navbar-nav">
            <li class="nav-item menuli"><a class="nav-link text-info" data-toggle="collapse" href="#CUENTA"><b>MI CUENTA</b></a></li>
			<li class="nav-item menuli"><a class="nav-link text-info" data-toggle="collapse" href="#PEDIDO"><b>MI PEDIDO</b></a></li>
            <li class="nav-item menuli"><a class="nav-link text-info" data-toggle="collapse" href="#POSTVENTA"><b>POSTVENTA</b></a></li>
            <li class="nav-item menuli"><a class="nav-link text-info" data-toggle="collapse" href="#ENVIOS"><b>ENVÍOS</b></a></li>
		  </ul>
        </nav>
    </div>
<!--Contenido del menú de ATC-->
  <div class="col-lg-8 col-sm-8 col-xl-8" id="atc">
<div id="accordion">
      <div class="card">
              <div class="card-header collapse" id="CUENTA">
                  <a class="text-info card-link" data-toggle="collapse" href="#registro"><b>Registro e inicio de sesión</b></a>
              </div>
        <div class="collapse" data-parent="#accordion" id="registro"><br>
            <div class="card-body">
             <p>Para registrarte en FXGames pulsa en el icono con forma de persona en la parte superior derecha de nuestra página web y verás la opción “Nuevo Registro”. Verás un formulario que tendrás que rellenar los campos que encontrarás.La página web a continuación te enviará un correo a tu dirección de correo electrónico, además de una contraseña personal. Cuando quieras iniciar sesión en FXGames debes pulsar en ese mismo icono y rellenar el formulario “Iniciar sesión” y pulsar el botón “Entrar”.</p>
            </div><br>
        </div>
      </div>
      <div class="card">
          <div class="card-header collapse" id="CUENTA">
              <a class="text-info card-link " data-toggle="collapse" href="#compra"><b>¿Debo estar registrado para hacer una compra?</b></a>
          </div>
        <div class="collapse" data-parent="#accordion" id="compra"><br>
            <div class="card-body">
                 <p>Para comprar en FXGames es necesario crear una cuenta online que te identifique como cliente web. Puedes ver cómo registrarte en el menú Mi cuenta-Registro e inicio de sesión</p>
            </div><br>
          </div>
      </div>
      <div class="card">
            <div class="card-header collapse" id="CUENTA">
                <a class="text-info card-link" data-toggle="collapse" href="#pass"><b>¿Cómo recupero mi contraseña?</b></a>
            </div>
        <div class="collapse" data-parent="#accordion" id="pass"><br>
         <div class="card-body">
            <p>Si no recuerdas tu contraseña de FXGames, simplemente selecciona la opción “¿Olvidaste tu contraseña?” al pulsar en el icono del perfil. Lo encontrarás bajo el formulario de Iniciar sesión e introduce el correo electrónico que nos facilitaste cuando te registraste. Recibirás en tu correo una nueva contraseña en unos minutos.</p>
        </div><br>
        </div>
      </div>
    <div class="card">
        <div class="card-header collapse" id="CUENTA">
        <a class="text-info card-link" data-toggle="collapse" href="#datos"><b>¿Cómo puedo modificar los datos de mi perfil?</b></a>
        </div>
        <div class="collapse" data-parent="#accordion" id="datos"><br>
        <div class="card-body">
            <p>Para cambiar datos, como el teléfono o dirección de facturación, es necesario que te pongas en contacto con nuestro servicio de Atención al Cliente, a través del formulario Contacta con nosotros. Para la corrección de datos más sensibles, como un error en el número de documento de identidad o en tu fecha de nacimiento, necesitaremos que adjuntes una imagen del DNI o NIE en la incidencia.</p>
        </div><br>
       </div>
      </div>
    <div class="card">
         <div class="card-header collapse" id="PEDIDO">
             <a class="text-info card-link" data-toggle="collapse" href="#pedido"><b>¿Dónde está mi pedido?</b></a>
         </div>
        <div class="collapse" data-parent="#accordion" id="pedido"><br>
        <div class="card-body">
           <p>Puedes realizar el seguimiento de tu pedido pulsando en el icono del camión que aparece al desplegar tu factura de compra en el apartado "Mis Compras". Allí verás tu número de localizador, el estado y los movimientos de tu pedido. El localizador de tu pedido también te permite hacer el seguimiento en las página web de la empresa de transporte que hayas seleccionado (www.seur.com; www.envialia.com; www.correos.es). Cuando dispongas de localizador pero el pedido todavía no presente movimientos, será porque está en proceso de ser recogido por la empresa de transporte en nuestros almacenes. Si detectas cualquier anomalía durante el proceso de envío, la información de seguimiento es incorrecta o te han informado de que tu pedido se ha extraviado, por favor, contacta cuanto antes con Atención al Cliente.</p>
        </div><br>
       </div>
      </div>
       <div class="card">
        <div class="card-header collapse" id="PEDIDO">
        <a class="text-info card-link" data-toggle="collapse" href="#direccion"><b>¿Puedo modificar mi dirección de entrega?</b></a>
        </div>
        <div class="collapse" data-parent="#accordion" id="direccion"><br>
        <div class="card-body">
            <p>Durante el proceso de compra podrás introducir la dirección a la que deseas que enviemos tu pedido. Si deseas modificar esta dirección, podrás hacerlo contactando con nuestro departamento de Atención al Cliente, siempre que su estado todavía no sea "Finalizado".</p>
        </div><br>
       </div>
      </div>
       <div class="card">
        <div class="card-header collapse" id="PEDIDO">
        <a class="text-info card-link" data-toggle="collapse" href="#paquete"><b>¿Puedo modificar el contenido de mi paquete?</b></a>
        </div>
        <div class="collapse" data-parent="#accordion" id="paquete"><br>
        <div class="card-body">
            <p>Una vez has confirmado tu pedido, no es posible incluir o eliminar los artículos que has seleccionado. Si has olvidado incluir algún artículo en tu pedido puedes realizar una nueva compra con los productos faltantes. Si te arrepientes de haber incluido algún producto en tu pedido, puedes esperar a recibirlo y ejercer tu derecho de desistimiento, o solicitar la cancelación completa del pedido y realizar uno nuevo. Te recordamos que los pedidos cuyo importe es superior a 30 euros no tienen gastos de envío.</p>
        </div><br>
       </div>
      </div>
       <div class="card">
        <div class="card-header collapse" id="PEDIDO">
            <a class="text-info card-link" data-toggle="collapse" href="#finpedido"><b>No puedo finalizar mi pedido</b></a>
        </div>
        <div class="collapse" data-parent="#accordion" id="finpedido"><br>
        <div class="card-body">
            <p>Si surge un error durante el pago, te recomendamos comprobar si el pedido se ha registrado en nuestro sistema correctamente antes de realizarlo de nuevo y que pueda duplicarse. Primero, comprueba tus movimientos bancarios. Generalmente, si se ha sustraído el dinero quiere decir que tenemos constancia de tu compra. A continuación, acude al apartado "Mis compras" de tu "Zona de socios" y comprueba en tu historial de pedidos si aparece el que acabas de realizar, o bien revisa tu correo electrónico para verificar si has recibido el e-mail de confirmación de tu pedido. En caso de que aparezca en tu Zona de Socios o hayas recibido el e-mail, tu compra se ha registrado correctamente. Si el pedido no aparece en tu historial y tampoco hay cambios en tu cuenta bancaria, intenta la compra de nuevo. Te aconsejamos que mientras compras en MMG utilices una conexión a internet estable y que tu navegador se encuentre actualizado a la última versión disponible. Recomendamos también utilizar Google Chrome para un rendimiento más óptimo en nuestra página web.</p>
        </div><br>
      </div>
      </div>
      <div class="card">
        <div class="card-header collapse" id="POSTVENTA">
          <a class="text-info card-link" data-toggle="collapse" href="#devolver"><b>Deseo devolver un pedido</b></a>
        </div>
        <div class="collapse" data-parent="#accordion" id="devolver"><br>
        <div class="card-body">
           <p>Tienes 15 días naturales para ejercer tu derecho de desistimiento desde el momento en que recibes tu pedido web (excepto en el caso de los productos digitales o aquellos cuya activación sea on-line), siempre que los productos adquiridos no hayan sido usados o desprecintados, y se encuentren en el mismo estado en que fueron entregados. Simplemente rellena el documento que se genera en tu pedido, introdúcelo en un paquete junto a los artículos que deseas devolver y una copia de tu factura de compra, y envíanoslo a la dirección que indica la hoja. Podrás realizar el envío a nuestro almacén mediante el método que prefieras, corriendo de tu cuenta los gastos de transporte generados. Una vez nos llegue la mercancía y el almacén haya verificado su estado, te devolveremos el importe del producto en el mismo método de pago que elegiste al comprar. Ten en cuenta que los gastos de envío no se devolverán en este caso. Los plazos de reembolso del dinero dependen del motivo de la devolución y de la forma de pago. Los reembolsos suelen tardar entre 24 y 48 horas desde que solicitas la cancelación. Si el pedido que deseas cancelar ya ha sido enviado, la devolución puede demorarse entre 5 y 7 días naturales, al tener que entrar primero la mercancía en nuestras instalaciones. Las devoluciones en tarjeta bancaria o PayPal no suelen tardar más de 48 horas desde el momento en el que se genera el abono.</p>
        </div><br>
       </div>
      </div>
       <div class="card">
        <div class="card-header collapse" id="POSTVENTA">
        <a class="text-info card-link" data-toggle="collapse" href="#incompleto"><b>Mi pedido está incompleto</b></a>
        <div class="collapse" data-parent="#accordion" id="incompleto"><br>
        <div class="card-body">
            <p>En primer lugar, comprueba que el producto se encuentra listado en la factura. Si es así, ponte en contacto con nuestro servicio de Atención al Cliente para solucionar la incidencia. Una vez nuestro almacén haya hecho las comprobaciones oportunas, procederemos al envío de la mercancía faltante siempre que sea posible. Es importante que tengas en cuenta que el plazo para comunicar un pedido incompleto es de 48 horas desde su recepción.</p>
        </div><br>
       </div>
      </div>
       <div class="card">
        <div class="card-header collapse" id="POSTVENTA">
        <a class="text-info card-link" data-toggle="collapse" href="#erroneo"><b>He recibido un producto erróneo</b></a>
        <div class="collapse" data-parent="#accordion" id="erroneo"><br>
        <div class="card-body">
            <p>En caso de que hayas recibido un producto erróneo, comprueba en primer lugar si aparece o no listado en la factura. Puede ser que seleccionases, por ejemplo, la plataforma equivocada durante la compra. Si el producto recibido no coincide con el de tu factura, ponte en contacto con nuestro servicio de Atención al Cliente para solucionar la incidencia. El departamento de Atención al Cliente se encargará de recoger gratuitamente la mercancía errónea en la dirección que más te convenga y, una vez llegue a nuestro almacén, cambiarla por el producto correcto, si hubiese stock, o por la devolución del dinero en la misma forma de pago que elegiste al hacer la compra. Si tramitamos el cambio de un producto, desde el momento en que recogemos el erróneo o defectuoso, y enviamos el artículo de cambio, pueden transcurrir entre 5 y 7 días naturales. Si detectas cualquier anomalía o una tardanza excesiva, contacta con Atención al Cliente.</p>
        </div><br>
       </div>
      </div>
       <div class="card">
        <div class="card-header collapse" id="POSTVENTA">
        <a class="text-info card-link" data-toggle="collapse" href="#defecto"><b>He recibido un producto defectuoso</b></a>
        <div class="collapse" data-parent="#accordion" id="defecto"><br>
        <div class="card-body">
            <p>Si el producto que has recibido es nuevo, puedes gestionar cómodamente el cambio en cualquiera de nuestras tiendas, dentro del marco estipulado por nuestras Condiciones Generales de Venta, y siempre que cuenten con stock y presentes la factura de compra. Si te resulta complicado acercarte a uno de nuestros establecimientos o el producto es seminuevo, ponte en contacto con nuestro servicio de Atención al Cliente. El departamento tramitará una recogida gratuita de la mercancía defectuosa en la dirección que más te convenga y procederá al cambio o reparación, dependiendo del plazo de tiempo en el que se produzca la incidencia y según el procedimiento habitual de gestión de garantía. Si tramitamos el cambio de un producto, desde el momento en que recogemos el erróneo o defectuoso, y enviamos el artículo de cambio, pueden transcurrir entre 5 y 7 días naturales. Si detectas cualquier anomalía o una tardanza excesiva, contacta con Atención al Cliente.</p>
        </div><br>
      </div>
      </div>
       <div class="card">
        <div class="card-header collapse" id="ENVIOS">
        <a class="text-info card-link" data-toggle="collapse" href="#plazos"><b>Compañías, plazos y tarifas</b></a>
        <div class="collapse" data-parent="#accordion" id="plazos"><br>
        <div class="card-body">
           <p>MMG trabaja con las principales compañías de transporte de ámbito nacional y con Compañías de nueva generación de entrega en el día o entrega en dos horas. Te garantizamos la entrega de tu pedido en el tiempo indicado, en función de la zona geográfica o el servicio elegido, siempre que los productos se encuentren en Stock y con la calidad que garantizamos en todos nuestros artículos. Los pedidos realizados de lunes a viernes antes de las 17.00 horas se entregarán al día siguiente, con el nivel de servicio estándar “Servicio Exprés”. Los pedidos confirmados en sábado, domingo o festivo se considerarán tramitados el primer día laborable posterior al mismo. Para pedidos superiores a 30€ el envío en 24h es gratuito. Las tarifas pueden depender del nivel de servicio seleccionado. Para pedidos inferiores a 30€ el pedido tendrá un coste que se especificará en el carro de la compra, área Selecciona un método de envío.</p>
        </div><br>
       </div>
      </div>
       <div class="card">
        <div class="card-header collapse" id="ENVIOS">
        <a class="text-info card-link" data-toggle="collapse" href="#canarias"><b>Envíos a Canarias, Ceuta, Melilla y extranjero</b></a>
        <div class="collapse" data-parent="#accordion" id="canarias"><br>
        <div class="card-body">
            <p>Actualmente estamos trabajando para ofrecer futuros envíos a las Islas Canarias, Ceuta, Melilla y a algunos países extranjeros.</p>
        </div><br>
      </div>
    </div>
    </div>
   </div>
  </div>
 </div>
</div>
          </div>
         </div>
        <p class="col-lg-1 col-sm-1 col-xl-1"></p>
      </div>
    </div>
</div> 
     <br><br><br>
     <div class="row">
        <p class="col-lg-4 col-sm-4 col-xl-4"></p>
        <h2 class="col-lg-4 col-sm-4 col-xl-4 footatc titproducto"><a href="./contacto.php">CONTACTO</a></h2>
        <p class="col-lg-4 col-sm-4 col-xl-4"></p>
     </div>
<?php include "footer.php" ?>
 </body>
</html>