$(document).ready(function(){
    
    //script para el filtro del precio
    $('#precio').change(function() {
        //$('#valorPrecio').val($(this).val());
        var valor = $(this).val()+"€";
        $('#valorPrecio').text(valor);
    });
    
    //script para pantalla de carga
    $(window).on("load", function(){
       $(".loader").fadeOut(); 
    });
    
    //validar campos del formulario Contacto 
    $('#formContacto').submit(function(){
        var camposValidos = [false,false,false,false];
        var titulo = $('#titulo').val();
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var email = $('#email').val();
        console.log(titulo.length);
        if(titulo.length<100){
            $('#titulo').removeClass('datosErroneos');
            camposValidos[0] = true;
        }else{
            $('#titulo').addClass('datosErroneos');
        }
        if(nombre.match(/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/)){
            $('#nombre').removeClass('datosErroneos');
            camposValidos[1] = true;
        }else{
            $('#nombre').addClass('datosErroneos');   
        }
        if(apellido.match(/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/)){
            $('#apellido').removeClass('datosErroneos');
            camposValidos[2] = true;
        }else{
            $('#apellido').addClass('datosErroneos');
        }
        if(email.match(/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/)){
            $('#email').removeClass('datosErroneos');
            camposValidos[3] = true;
        }else{
            $('#email').addClass('datosErroneos');
        }
        var enviar = true;
        for (var i = 0; i < camposValidos.length; i++) {
            if(camposValidos[i]==false){
                enviar = false;
            }
        }
        return enviar;
    });

    //validar campos del formulario del registro
    $('#registrarse').submit(function(){
        var camposValidos = [false,false,false];
        var nombre = $('#nombreR').val();
        var apellido = $('#apellidoR').val();
        var password = $('#pwdR').val();
        if(nombre.match(/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/)){
            $('#nombreR').removeClass('datosErroneos');
            camposValidos[0] = true;
        }else {
            $('#nombreR').addClass('datosErroneos'); 
            camposValidos[0] = false;
        }
        if(apellido.match(/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/)){
            $('#apellidoR').removeClass('datosErroneos');
            camposValidos[1] = true;
        }else {
            $('#apellidoR').addClass('datosErroneos');  
            camposValidos[1] = false;
        }
        if(password.length>=8){
            $('#pwdR').removeClass('datosErroneos');
            camposValidos[2] = true;
        }else {
            $('#pwdR').addClass('datosErroneos');  
            camposValidos[2] = false;
        }
        var enviar = true;
        for (var i = 0; i < camposValidos.length; i++) {
            if(camposValidos[i]==false){
                enviar = false;
            }
        }
        return enviar;
    });
    
    //validar campos del formulario de modificar datos del perfil
    $('#formEditPerfil').submit(function(){
       var camposValidos = [false,false,false]; 
        var nombre = $('#nombreP').val();
        var apellido = $('#apellidoP').val();
       // var direccion = $('#direccionP').val();
        var password = $('#passP').val();
        if(nombre.match(/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/)){
            $('#nombreP').removeClass('datosErroneos');
            camposValidos[0] = true;
        }else {
            $('#nombreP').addClass('datosErroneos'); 
            camposValidos[0] = false;
        }
        if(apellido.match(/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/)){
            $('#apellidoP').removeClass('datosErroneos');
            camposValidos[1] = true;
        }else {
            $('#apellidoP').addClass('datosErroneos');  
            camposValidos[1] = false;
        }
        if(password !== ''){
             if(password.length>=8){
                $('#passP').removeClass('datosErroneos');
                camposValidos[2] = true;
            }else {
                $('#passP').addClass('datosErroneos');  
                camposValidos[2] = false;
            }
        }else{
            camposValidos[2] = true;
        }
        
        var enviar = true;
        for (var i = 0; i < camposValidos.length; i++) {
            if(camposValidos[i]==false){
                enviar = false;
            }
        }
        return enviar;
    });
    
    //cambiar el texto del label del fichero elegido en el menu administrador para insertar un producto nuevo
    $('#imgPpal').change(function(e){
        var fileName = e.target.files[0].name;
        $('#ficheroElegido').text(fileName);
    });
    
});

    function ejemplo(texto){
        var element = document.getElementById(texto);
        if (element.style.display==="none") {
            element.style.display="table-row-group";
        }else {
            element.style.display="none";
        }
    }

