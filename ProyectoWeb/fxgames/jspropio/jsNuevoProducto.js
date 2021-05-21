$(document).ready(function(){
	var validado = [false,true,true];
    var validarOfertas = [false,false];
    var validarOfertaUnica = false;

	//validar formato de precio
	$('#precio').change(function(){
		var precio = $(this).val();
		if(!precio.match(/^[0-9]+([.][0-9]{1,2})?$/) || precio<=0){
			$('#precio').addClass('datosErroneos');
			validado[0] = false;
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
					validado[0] = false;
				}else{
					precioDes.removeClass('datosErroneos');
					validado[0] = true;
				}
			}else{
				validado[0] = true;	
			}
			
		}

	});

    //validar si se quiere poner en oferta el producto, se activará el campo de introducir precio producto
    $('#oferta').change(function(){
        var oferta = $('#oferta').val();
        var precioDes = $('#preciodesc');
        if(oferta=="No"){
            precioDes.attr('readonly', true);
            precioDes.removeClass('datosErroneos');
            precioDes.val(0);
            validado[1] = true;
        }else{
            precioDes.attr("readonly",false);
            precioDes.prop('disabled', false);
            precioDes.prop('required', true);
        }
    });
    
    //validar precio oferta
    $('#preciodesc').change(function(){
    	var precio = parseFloat($('#precio').val());
    	var precioDes = parseFloat($("#preciodesc").val());
    	if (!$("#preciodesc").val().match(/^[0-9]+([.][0-9]{1,2})?$/)) {
    		$('#preciodesc').addClass('datosErroneos');
    		validado[1] = false;
    	}else{
    		if(precio<=precioDes || precioDes==0){
	    		$('#preciodesc').addClass('datosErroneos');
	    		validado[1] = false;
	    	}else{
	    		$('#preciodesc').removeClass('datosErroneos');
	    		validado[1] = true;
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
            stock.attr('readonly', true);
            stock.removeClass('datosErroneos');
        }else{
            stock.val("");
            stock.attr('readonly', false);
        }
    });

    //validar si está habilitado controlar el valor del stock
    $('#stock:not(:disabled)').keyup(function(){
        console.log("entro");
    	var stock = $(this).val();
        console.log(stock);
    	if (!stock.match(/^[0-9]+$/) || stock<=0) {
    		$(this).addClass('datosErroneos');
            validado[2] = false;
    	}else{
    		$(this).removeClass('datosErroneos');
            validado[2] = true;
    	}
    });

    //controlar los valores de los select en función del tipo de producto
    $('#tipo').change(function(){
        var genero = $('#genero');
        var edad = $('#edad');
        var video = $('#video');
        var currentVal = $(this).val();
        console.log(currentVal);
        var newOptions;
        var newOptionsGender;
        var newOptionsAge;
        $('#plataforma').attr('readonly',false);
        agregarValoresSelect($('#plataforma'),{"Playstation 4":"Playstation 4"});
        if(currentVal!=="VIDEOJUEGO") {
            genero.attr('readonly', true);
            edad.attr('readonly', true);
            video.attr('readonly', true);
            agregarValoresSelect($('#genero'),{"":"null"});
            agregarValoresSelect($('#edad'),{"":"null"});
        }
        if (currentVal=='VIDEOJUEGO') {
            genero.attr('readonly', false);
            edad.attr('readonly', false);
            video.attr('readonly', false);
            $('#ficheroMultiple').hide();
            $('#ficherosMultiples').empty();
            $('#imgSecond').prop('required', false);
            newOptionsGender = {"Puzzle":"Puzzle",
                "Social":"Social",
                "Lucha":"Lucha",
                "Baile":"Baile",
                "Conducción":"Conducción",
                "Aventuras":"Aventuras",
                "Rol":"Rol",
                "Survival":"Survival",
                "Horror":"Horror",
                "Acción":"Acción",
                "Simulador":"Simulador",
                "Estrategia":"Estrategia",
                "Deportes":"Deportes",
                "Mundo Abierto":"Mundo Abierto"
            };
            newOptionsAge = {"3":"3",
                "7":"7",
                "12":"12",
                "16":"16",
                "18":"18"
            };
            newOptions = {"PS4": "PS4",
                "XBOX": "XBOX",
                "PC": "PC",
                "PSVITA": "PSVITA",
                "SWITCH": "SWITCH"
            };
            agregarValoresSelect($('#genero'),newOptionsGender);
            agregarValoresSelect($('#edad'),newOptionsAge);
        }
        if (currentVal=='CONSOLAS') {
            newOptions = {"CON_PS4":"CON_PS4",
                "CON_XBOX":"CON_XBOX",
                "CON_SWITCH":"CON_SWITCH"
            };
            $('#ficheroMultiple').show();
            $('#imgSecond').prop('required', true);
            
        }
        if (currentVal=='ACCESORIOS') {
            newOptions = {"ACC_PS4": "ACC_PS4",
                "ACC_XBOX": "ACC_XBOX",
                "ACC_SWITCH": "ACC_SWITCH",
                "ACC_VITA": "ACC_VITA"
            };
            $('#ficheroMultiple').show();
            $('#imgSecond').prop('required', true);
        }
        if (currentVal=='MERCHANDISING') {
            $('#ficheroMultiple').hide();
            $('#ficherosMultiples').empty();
            $('#imgSecond').prop('required', false);
            newOptions = {"PELUCHES": "PELUCHES",
                "FIGURAS": "FIGURAS",
                "ROPA": "ROPA",
                "OTROS": "OTROS"
            };
            $('#plataforma').attr('readonly',true);
            agregarValoresSelect($('#plataforma'),{"":"null"});
            
        }
        agregarValoresSelect($('#cat'),newOptions);
        
    });
    
    //metodo para agregar valores al select que se le pase por parámetro
    //element => select
    //options => opciones para agregar como array
    function agregarValoresSelect(element,options){
        element.empty(); // remove old options
        $.each(options, function(key,value) {
          element.append($("<option></option>").attr("value", value).text(key));
        });
    }
      
    //controlar los valores del select en función de la categoría
    $('#cat').change(function(){
        var currentVal = $(this).val();
        var tipo = $('#tipo').val();
        console.log(currentVal);
        var newOptions;
        if (currentVal.includes('SWITCH')) {
            newOptions={"Nintendo Switch":"Nintendo Switch"};
        }
        if (currentVal.includes('PS4')) {
            newOptions={"Playstation 4":"Playstation 4"};
        }
        if (currentVal.includes('XBOX')) {
            newOptions={"Xbox One":"Xbox One"};
        }
        if (currentVal.includes('PC')) {
            newOptions={"PC":"PC"};
        }
        if (currentVal.includes('VITA')) {
            newOptions={"Playstation Vita":"Playstation Vita"};
        }
        if (tipo=='MERCHANDISING') {
            newOptions = {"":"null"};
        }
        agregarValoresSelect($('#plataforma'),newOptions);
    });
    
    //controlar que todos los datos del formulario sean correctos para hacer el insert
    $('#formRegistroProducto').submit(function(){
        var correcto = true;
        for (var i = 0; i<validado.length; i++) {
            console.log(validado[i]);
            if (validado[i]==false) {
                correcto = false;
            }
        }
    	if (!correcto) {
            //con esa linea se muestra el alert, por ahora desactivado, se controlará cada error en un futuro
            $('body').prepend('<div class="alert alert-danger"><strong>Por favor, verifique los datos en rojo</strong></div>');
    		event.preventDefault();
    	}
    });
    
    //cambiar el texto del label del fichero elegido en el menu administrador para insertar un producto nuevo
    $('#imgPpal').change(function(e){
            var fileName = e.target.files[0].name;
            $('#ficheroElegido').text(fileName);
    });
    
    //cambiar el texto del label de los ficheros elegido para el carrusel en el menu administrador para insertar un producto nuevo
    $('#imgSecond').change(function(e){
        var text = "";
        var files = $(this)[0].files;
            for (var i = 0; i < files.length; i++) {
                var tmp = files[i].name;
                text = text.concat(tmp," ; ");
            }
        $('#ficherosMultiples').text(text);
    });
    
    //controlar los datos de la función de ofertas aleatorias
 	$('#numofertas').change(function(){
		var numofertas = $(this).val();
		if(!numofertas.match(/^[0-9]*$/) || numofertas<=0 || numofertas>30){
            $('#numofertas').addClass('datosErroneos');
			validarOfertas[0] = false;
            
        }else{
			$('#numofertas').removeClass('datosErroneos');
            validarOfertas[0] = true;
        }
    });
    
    
       
 	$('#porcentaje').change(function(){
		var porcentaje = $(this).val();
		if(!porcentaje.match(/^[0-9]*$/) || porcentaje<=0 || porcentaje>10){
            $('#porcentaje').addClass('datosErroneos');
			validarOfertas[1] = false;
            
        }else{
			$('#porcentaje').removeClass('datosErroneos');
            validarOfertas[1] = true;
        }
    });
    
    //controlar los datos de la función aplicar descuento a un producto específico
    $('#porcentaje2').change(function(){
		var porcentaje2 = $(this).val();
		if(!porcentaje2.match(/^[0-9]*$/) || porcentaje2<=0 || porcentaje2>10){
            $('#porcentaje2').addClass('datosErroneos');
			validarOfertaUnica = false;
            
        }else{
			$('#porcentaje2').removeClass('datosErroneos');
            validarOfertaUnica = true;
        }
    });
     
    //controlar que todos los datos del formulario sean correctos
    $('#formOfertas').submit(function(){
        var correcto = true;
        for (var i = 0; i<validarOfertas.length; i++) {
            if (validarOfertas[i]==false) {
                correcto = false;
            }
        }
        if (!correcto) {
             //con esa linea se muestra el alert, por ahora desactivado, se controlará cada error en un futuro
            $('body').prepend('<div class="alert alert-danger"><strong>Por favor, verifique los datos en rojo</strong></div>');
            event.preventDefault();
        }
    });
    
    
    $('#formOfertaUnica').submit(function() {
        if (!validarOfertaUnica) {
             //con esa linea se muestra el alert, por ahora desactivado, se controlará cada error en un futuro
            $('body').prepend('<div class="alert alert-danger"><strong>Por favor, verifique los datos en rojo</strong></div>');
            event.preventDefault();
        }
    });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        
});