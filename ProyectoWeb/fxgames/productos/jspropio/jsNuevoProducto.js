$(document).ready(function(){
	var VALIDADO = true;

	//validar formato de precio
	$('#precio').change(function(){
		var precio = $(this).val();
		if(!precio.match(/^[0-9]+([,||.][0-9]{1,2})?$/) || precio<=0){
			$('#precio').addClass('datosErroneos');
			VALIDADO = false;
            //posible utilidad de dato del error
            /*$("#errorPrecio").html("el dato no es correcto");
            $("#errorPrecio").show();
            */
		}else{
			$('#precio').removeClass('datosErroneos');
            //$("#errorPrecio").hide();
			var precioDes = $('#preciodesc');
			if (precioDes.prop('disabled')==false) {
				var cantDes = precioDes.val();
				if(precio<=cantDes){
					precioDes.addClass('datosErroneos');
					VALIDADO = false;
				}else{
					precioDes.removeClass('datosErroneos');
					VALIDADO = true;
				}
			}else{
				VALIDADO = true;	
			}
			
		}

	});

    //validar si se quiere poner en oferta el producto, se activará el campo de introducir precio producto
    $('#oferta').change(function(){
        var oferta = $('#oferta').val();
        var precioDes = $('#preciodesc');
        if(oferta=="No"){
            precioDes.prop('disabled', true);
            precioDes.removeClass('datosErroneos');
            precioDes.val(0);
        }else{
            precioDes.prop("readonly",false);
            precioDes.prop('disabled', false);
            precioDes.prop('required', true);
        }
    });
    
    //validar precio oferta
    $('#preciodesc').change(function(){
    	var precio = parseFloat($('#precio').val());
    	var precioDes = parseFloat($("#preciodesc").val());
    	if (!$("#preciodesc").val().match(/^[0-9]+([,||.][0-9]{1,2})?$/)) {
    		$('#preciodesc').addClass('datosErroneos');
    		VALIDADO = false;
    	}else{
    		if(precio<=precioDes || precioDes==0){
	    		$('#preciodesc').addClass('datosErroneos');
	    		VALIDADO = false;
	    	}else{
	    		$('#preciodesc').removeClass('datosErroneos');
	    		VALIDADO = true;
	    	}
    	}
		
    	
    	
    });

    //validar si hay disponibilidad o no y habilitar el campo para introducir número de stock
    $('#Disponibilidad').change(function(){
        var disp = $(this).val();
        var stock = $('#stock');
        console.log(disp);
        if(disp=="No"){
            stock.val(0);
            stock.prop('readonly', true);
            stock.removeClass('datosErroneos');
        }else{
            stock.val("");
            stock.prop('readonly', false);
        }
    });

    $('#stock:not(:disabled)').keyup(function(){
    	var stock = $(this).val();
    	if (!stock.match(/^[0-9]+$/) || stock<=0) {
    		$(this).addClass('datosErroneos');
    	}else{
    		$(this).removeClass('datosErroneos');
    	}
    });

    $('#formRegistroProducto').submit(function(){
    	if (VALIDADO) {
    		// send data
    	}else{
            //con esa linea se muestra el alert, por ahora desactivado, se controlará cada error en un futuro
            //$('body').prepend('<div class="alert alert-danger"><strong>Datos no válidos</strong></div>');
    		event.preventDefault();
    	}
    });
});