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
    
});
