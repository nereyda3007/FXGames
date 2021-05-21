<?php
    session_start();
    include "./FuncionesPHP/conexionDB.php";
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
 <body sytle="overflow-y:scroll">
<!--Incluimos la cabecera-->
  <?php include "./cabecera.php" ?>
    <div class="row">
        <p class="col-lg-4 col-sm-4 col-xl-4"></p>
        <h2 class="col-lg-4 col-sm-4 col-xl-4 titproducto">INFORMACIÓN LEGAL</h2>
        <p class="col-lg-4 col-sm-4 col-xl-4"></p>
    </div><br>
     <!--Contenido legal-->
     <div class="fondolegal">
     <div class="row legal">
        <p class="col-lg-2 col-sm-2 col-xl-2"></p>
        <p class="text-info col-lg-8 col-sm-8 col-xl-8 infoCondTitulos"><b>OBJETO</b></p>
        <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">El presente aviso legal regula el uso del Portal de Internet "www.fxgames.es" (en adelante, el portal), o cualquier otro que en el futuro le sustituyese, que FXGames, S.L.U. (en adelante FXG) pone a disposición de los usuarios, constituyendo un punto de encuentro de información, productos relacionados con los videojuegos y las nuevas tecnologías, así como otros servicios.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">FXGames, S.L.U, tiene su domicilio social en la calle Virgilio, número 7-9, Edificio FXG, 28223 Pozuelo de Alarcón, Madrid, España, estando inscrita en el Registro Mercantil de Madrid, Tomo 9.627, seccion 8ª, libro 0, Folio 12, Hoja nº M-154.792, CIF B81209751. Para comunicaciones legales y organismos e instituciones públicas, contactar con legal@fxg.es. Para cualquier consulta, duda o incidencia relacionada con los productos y servicios ofrecidos por FXG, contactar con <a href="./atc.php">Atención al cliente.</a></p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">De conformidad con lo previsto en el Reglamento UE 524/2013, de 21 de mayo de 2013 y de la Ley 7/2017, de 2 de noviembre sobre resolución de litigios en línea en materia de consumo se inserta a continuación enlace a la plataforma de resolución de litigios en línea puesta en marcha por la Comisión Europea a la que podrán recurrir los clientes para resolver cualquier discrepancia o controversia con relación a los servicios prestados por FXG en su web.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">La utilización del Portal atribuye la condición de Usuario, lo cual implica la adhesión a las presentes condiciones en la versión publicada en el momento en que se acceda al mismo. FXG se reserva el derecho a modificar, en cualquier momento, la presentación y configuración del Portal, así como las Condiciones Generales de Acceso y Utilización del mismo. Por ello, FXG recomienda al Usuario leer estas Condiciones Generales atentamente cada vez que acceda a cualquiera de los Portales.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">El acceso a determinados Contenidos ofrecidos a través del Portal puede encontrarse sometido a ciertas condiciones particulares propias que, según los casos, sustituyen, completan y/o modifican estas Condiciones Generales. Por tanto, con anterioridad al acceso y/o utilización de dichos Contenidos, el Usuario ha de leer atentamente también las correspondientes condiciones particulares.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row legal">
        <p class="col-lg-2 col-sm-2 col-xl-2"></p>
        <p class="text-info col-lg-8 col-sm-8 col-xl-8 infoCondTitulos"><b>ACCESO Y SEGURIDAD</b></p>
        <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">Con carácter general, los Usuarios podrán acceder al Portal de forma gratuita, tras el correspondiente registro solicitado por FXG. Una vez solicitado el registro, y con independencia de que provisionalmente se comiencen a prestar los servicios incluidos en el Portal, FXG dispondrá de un plazo de un mes para verificar que los datos introducidos por el Usuario son correctos, completos, lícitos, no son ilegales ni irrespetuosos, y que permiten la correcta identificación del usuario, así como que correspondan a personas físicas o jurídicas que FXG identifique como Público destinatario del presente Portal.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">Con independencia de las posibles acciones de verificación que llevará a cabo FXG, la aceptación del registro no supone en absoluto la asunción por parte de FXG de que dicha información es correcta, completa, lícita ni legal, sino que la misma va a ser empleada a los meros efectos de proceder con el Registro. Por lo tanto, el usuario responderá, el cualquier caso, de la veracidad y licitud de los datos facilitados, eximiendo expresamente a FXG de cualquier responsabilidad por la inclusión de dichos datos, y reservándose el derecho a no aceptar la solicitud de registro en función de las circunstancias descritas en el párrafo anterior, sin perjuicio de las demás acciones que pudieran proceder en Derecho.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">El "Público destinatario del Portal" son aquellas personas físicas o jurídicas a los que van destinados, en función del tipo de información, los servicios y/o productos incluidos en el Portal, entre los que se encuentran, fundamentalmente, aficionados y profesionales de los juegos para ordenador y consolas. En cualquier caso, FXG podrá denegar el registro a todos aquellos solicitantes que no sean considerados como "Publico destinatario del Portal.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">La denegación del registro implica automáticamente la cesación en la consideración de Usuario y, por tanto, la denegación de acceso al Portal y la terminación de los servicios y contenidos recogidos en el Portal.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">El uso de la contraseña es personal e intransferible, no estando permitida la cesión, ni siquiera temporal, a terceros. En tal sentido, el Usuario se compromete a hacer un uso diligente de la contraseña y a mantener en secreto la misma, asumiendo toda responsabilidad por las consecuencias de su divulgación a terceros.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">En el supuesto de que el Usuario conozca o sospeche que terceros puedan conocer o pudiesen estar haciendo uso de su contraseña, deberá poner tal circunstancia en conocimiento de FXG con la mayor brevedad.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row legal">
        <p class="col-lg-2 col-sm-2 col-xl-2"></p>
        <p class="text-info col-lg-8 col-sm-8 col-xl-8 infoCondTitulos"><b>CARÁCTER Y UTILIZACIÓN CORRECTA DE LOS CONTENIDOS Y SERVICIOS</b></p>
        <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">El Usuario se compromete a utilizar los Contenidos de conformidad con la ley, con estas Condiciones Generales, así como con la moral y buenas costumbres generalmente aceptadas y el orden público. El Usuario se obliga a usar los Contenidos de forma diligente, legal, correcta y lícita y, en particular, se compromete a título meramente enunciativo y no exhaustivo a abstenerse de:</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">Utilizar los Contenidos de forma y con fines contrarios a la ley, a la moral y a las buenas costumbres generalmente aceptadas o al orden público. Transmitir o difundir información, datos, contenidos, mensajes, gráficos, dibujos, archivos de sonido y/o imagen, fotografías, grabaciones, software, y en general, cualquier material obsceno, ofensivo, vulgar o que induzca actuaciones delictivas, denigratorias, difamatorias, infamantes, violentas o, en general, contrarias a la ley, a la moral y buenas costumbres generalmente aceptadas o al orden público. Reproducir, copiar, o distribuir los Contenidos, así como permitir el acceso del público a los mismos a través de cualquier modalidad de comunicación pública, o transformarlos o modificarlos, a menos que se cuente con la autorización del titular de los correspondientes derechos o ello resulte legalmente permitido. Vulnerar derechos de propiedad intelectual o industrial pertenecientes a FXG o a terceros, en especial los correspondientes a la marca "FXG", así como el nombre de dominio "fxgames.es". Emplear los Contenidos y, en particular, la información de cualquier clase obtenida a través del Portal con cualquier tipo de finalidad publicitaria y, en especial, para remitir publicidad, comunicaciones con fines de venta directa o con cualquier otra clase de finalidad comercial, mensajes no solicitados individualizados o dirigidos a una pluralidad de personas, así como de comercializar o divulgar de cualquier modo dicha información.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">El Usuario responderá por los daños y perjuicios de toda naturaleza que FXG pueda sufrir, directa o indirectamente, como consecuencia del incumplimiento de cualquiera de las obligaciones derivadas de estas Condiciones Generales o de la ley en relación con la utilización del Portal.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">FXG velará en todo momento por el respeto del ordenamiento jurídico vigente, y estará legitimada para interrumpir, a su entera discreción, los Contenidos o excluir al Usuario del Portal en su conjunto o de alguno de los servicios y/ o contenidos incluidos en el mismo, en caso de (i) la presunta comisión por su parte de cualquier infracción, ya sea por acción u omisión, tipificada en cualquier norma, sea civil, penal, administrativa o de cualquier otra índole, (ii) en caso de que se observase cualesquiera conductas que, a juicio de FXG, que puedan perturbar el buen funcionamiento, imagen, credibilidad y/o prestigio de FXG.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">Asimismo, para hacer uso de los Contenidos del Portal los menores de edad deben obtener previamente permiso de sus padres, tutores o representantes legales, quienes serán considerados responsables de todos los actos realizados por los menores a su cargo. La plena responsabilidad en la determinación de los concretos contenidos y servicios a los que acceden los menores de edad corresponde a los mayores a cuyo cargo se encuentran.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row legal">
        <p class="col-lg-2 col-sm-2 col-xl-2"></p>
        <p class="text-info col-lg-8 col-sm-8 col-xl-8 infoCondTitulos"><b>EXCLUSIÓN DE GARANTÍAS Y RESPONSABILIDAD</b></p>
        <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">FXG se reserva el derecho a interrumpir el acceso al Portal, así como la prestación de cualquiera o de todos los Contenidos que se prestan a través del mismo en cualquier momento y sin previo aviso, ya sea por motivos técnicos, de seguridad, de control, de mantenimiento, por fallos de suministro eléctrico o por cualquier otra causa. En consecuencia, FXG no garantiza la fiabilidad, la disponibilidad ni la continuidad de su Portal ni de los Contenidos, por lo que la utilización de los mismos por parte del Usuario se lleva a cabo por su propia cuenta y riesgo, sin que, en ningún momento puedan exigirse responsabilidades a FXG en este sentido.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">FXG no será responsable en caso de que existan interrupciones del servicio, demoras, errores, mal funcionamiento del mismo y, en general, demás inconvenientes que tengan su origen en causas que escapan del control de FXG, y/o debidas a una actuación dolosa o culposa del Usuario y/o tengan por origen causas de Fuerza Mayor. Sin perjuicio de lo establecido en el artículo 1105 del Código Civil, se entenderán incluidos en el concepto de Fuerza Mayor, además, y a los efectos de las presentes condiciones generales, todos aquellos acontecimientos acaecidos fuera del control de FXG tales como: fallo de terceros, operadores o compañías de servicios, actos de Gobierno, falta de acceso a redes de terceros, actos u omisiones de las Autoridades Públicas, aquellos otros producidos como consecuencia de fenómenos naturales, apagones, etc. En cualquier caso, sea cual fuere su causa, FXG no asumirá responsabilidad alguna ya sea por daños directos o indirectos, daño emergente y/o por lucro cesante.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">FXG excluye cualquier responsabilidad por los daños y perjuicios de toda naturaleza que puedan deberse a la falta de veracidad, exactitud, exhaustividad y/o actualidad de los Contenidos transmitidos, difundidos, almacenados, puestos a disposición o recibidos, obtenidos o a los que se haya accedido a través del Portal, ni tampoco por los Contenidos prestados u ofertados por terceras personas o entidades. FXG tratará en la medida de lo posible de actualizar y rectificar aquella información alojada en su Portal que no cumpla con las mínimas garantías de veracidad. No obstante quedará exonerada de responsabilidad por su no actualización o rectificación así como por los contenidos e informaciones vertidos en la misma. MMGo se responsabiliza por el contenido de la información recogida en su portal, así como por aquellas opiniones, comentarios, apreciaciones o cualquier otra manifestación recogida en el mismo que no sean emitidas directamente por FXG.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">FXG no garantiza ni asume ningún tipo de responsabilidad por los daños y perjuicios sufridos por el acceso a Contenidos de terceros a través de conexiones, vínculos o links de los sitios enlazados. La función de los enlaces que aparecen en el Portal es exclusivamente la de informar al Usuario sobre la existencia de otras fuentes de información u otros contenidos y servicios en Internet. FXG no será en ningún caso responsable del resultado obtenido a través de dichos enlaces o de las consecuencias que se deriven del acceso por los Usuarios a los mismos. Estos Contenidos de terceros son proporcionados por éstos, por lo que FXG no puede controlar y no controla la licitud de los Contenidos ni la calidad de los servicios ofrecidos. En consecuencia, el Usuario debe extremar la prudencia en la valoración y utilización de la información y servicios existentes en los contenidos de terceros.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">FXG excluye cualquier responsabilidad por los daños y perjuicios de toda clase que puedan deberse a la presencia de virus o a la presencia de otros elementos lesivos en los contenidos que puedan producir alteración en los sistemas informáticos, así como en los documentos o sistemas almacenados en los mismos. FXG no se hace responsable de los contenidos, cualesquiera que sean los mismos, que los Usuarios envíen a FXG por medio del portal, por medio del servicio de correo electrónico o por cualquier otro medio, siendo por tanto imputable a los Usuarios cualquier responsabilidad dimanante de los contenidos enviados por los mismos.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row legal">
        <p class="col-lg-2 col-sm-2 col-xl-2"></p>
        <p class="text-info col-lg-8 col-sm-8 col-xl-8 infoCondTitulos"><b>DERECHOS DE PROPIEDAD DEL CONTENIDO</b></p>
        <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">Todos los Contenidos incluidos en el portal, tales como textos, gráficos, fotografías, logotipos, iconos, imágenes, así como el diseño gráfico, código fuente y software, la marca "FXG" y el dominio "fxgames.es" son de la exclusiva propiedad de FXG o de terceros, cuyos derechos en su caso reconoce FXG, y están sujetos a derechos de propiedad intelectual e industrial protegidos por la legislación nacional e internacional.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">Queda estrictamente prohibido cualquier utilización de cualquiera de los elementos objeto de propiedad industrial e intelectual con cualquier tipo de finalidad, en especial comercial, así como su distribución, comunicación pública, modificación, alteración, transformación o descompilación, salvo autorización expresa por escrito por parte del titular de los mismos. La infracción de cualquiera de los citados derechos puede constituir una vulneración de las presentes disposiciones, así como una acción constitutiva de delito tipificada en los artículos 270 y siguientes del Código Penal.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">Aquellos Usuarios que envíen por medio del Portal observaciones, informaciones, opiniones, comentarios o cualquier tipo de contenidos por medio del servicio de correo electrónico o por cualquier otro medio, en los casos en los que por la naturaleza de los servicios o contenidos ello sea posible, se entiende que autorizan a FXG para la reproducción, distribución, comunicación pública, transformación, y el ejercicio de cualquier otro derecho de explotación, de tales contenidos, por todo el tiempo de protección de derecho de autor que esté previsto legalmente y sin limitación territorial, salvo mención expresa del Usuario en contrario. Asimismo, se entiende que esta autorización se hace a título gratuito.</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row legal">
        <p class="col-lg-2 col-sm-2 col-xl-2"></p>
        <p class="text-info col-lg-8 col-sm-8 col-xl-8 infoCondTitulos"><b>LEY APLICABLE</b></p>
        <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
     <div class="row">
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
         <p class="col-lg-8 col-sm-8 col-xl-8">Para toda cuestión litigiosa o que incumba a los Portales, será de aplicación la legislación española, siendo competentes para la resolución de todos los conflictos derivados o relacionados con el uso de los Portales, los Juzgados y Tribunales de la ciudad de Pozuelo de Alarcón, Madrid (España).</p>
         <p class="col-lg-2 col-sm-2 col-xl-2"></p>
     </div>
    </div>
  <!--Incluimos footer-->
  <?php include "footer.php" ?>
 </body>
</html>