$(document).ready(function(){

	$('#nacimiento').datepicker({
    	format: "dd/mm/yyyy",
    	endDate: "31-12-1999",
    	language: "es",
    	autoclose: true
	});

	/* VALIDACION SOLICITUD BEAUTY CARD */

		$('#enviar-solicitud').click(function(e) {
			e.preventDefault();
			let todoOk = true;
			
			var nombre = $('#nombre').val();
			if (nombre.length < 5) {
				$('.nombre.invalid').removeClass('hidden');
				todoOk = false;
			};
			
			var cedula = $('#cedula').val();
			if (cedula.length !== 8 || isNaN(cedula)) {
				$('.cedula.invalid').removeClass('hidden');
				todoOk = false;
			};

			var nacimiento = $('#nacimiento').val();
			var fecha = nacimiento.split("/");
			var year = fecha[2];
			var yearActual = (new Date).getFullYear();
			if (nacimiento == '' || (yearActual - year) < 18) {
				$('.nacimiento.invalid').removeClass('hidden');
				todoOk = false;
			};

			var telefono = $('#telefono').val();
			var celular = $('#celular').val();
			if ((telefono.length !== 8) && (celular.length !== 9)) {
				$('.telefono.invalid').removeClass('hidden');
				todoOk = false;
			};

			var domicilio = $('#domicilio').val();
			if (domicilio == '') {
				$('.domicilio.invalid').removeClass('hidden');
				todoOk = false;
			};

			var departamento = $('#departamento').val();
			if (departamento == '') {
				$('.departamento.invalid').removeClass('hidden');
				todoOk = false;
			};

			var ciudad = $('#ciudad').val();
			if (ciudad == '') {
				$('.ciudad.invalid').removeClass('hidden');
				todoOk = false;
			};

			var razonSocial = $('#razon-social').val();
			var rut = $('#rut').val();
			if (razonSocial !== '' && rut == '') {
				$('.rut.invalid').removeClass('hidden');
				todoOk = false;
			};

			if (rut !== '' && razonSocial == '') {
				$('.razon-social.invalid').removeClass('hidden');
				todoOk = false;
			};

			var email = $('#email').val();
			var expr = /^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/;
			if (email == '' || !expr.test(email)) {
				$('.email.invalid').removeClass('hidden');
				todoOk = false;
			};

			var archivo = $('#fichero-aval').val();
			if(archivo){
				var split = archivo.split(".");
				var ext = split[1] ? split[1].toLowerCase() : undefined;
				var validExt = ['jpg', 'png', 'jpeg', 'gif', 'tif', 'bmp'];	
			};
			if (archivo == '' || $.inArray(ext, validExt) == -1) {
					$('.fichero-aval.invalid').removeClass('hidden');
					todoOk = false;
				};

			var archivoCedula = $('#fichero-cedula').val();
			if(archivoCedula){
				var split = archivoCedula.split(".");
				var extCedula = split[1] ? split[1].toLowerCase() : undefined;
				var validExt = ['jpg', 'png', 'jpeg', 'gif', 'tif', 'bmp'];			
			};
			if (archivoCedula == '' || $.inArray(extCedula, validExt) == -1) {
					$('.fichero-cedula.invalid').removeClass('hidden');
					todoOk = false;
				};

			var area = $('input[name=area]:checked').val();
			if (!area) {
				$('.area.invalid').removeClass('hidden');
				todoOk = false;
			};

			var institucion = $('input[name=institucion]:checked').val();
			if (!institucion) {
				$('.institucion.invalid').removeClass('hidden');
				todoOk = false;
			};

			var rol = $('input[name=rol]:checked').val();
			if (!rol) {
				$('.rol.invalid').removeClass('hidden');
				todoOk = false;
			};

			var nombreAut1 = $('#nombre-aut-1').val();
			var nombreAut2 = $('#nombre-aut-2').val();
			var cedulaAut1 = $('#cedula-aut-1').val();
			var cedulaAut2 = $('#cedula-aut-2').val();

			if (!($('#condiciones').is(':checked'))) {
				$('.condiciones.invalid').removeClass('hidden');
				todoOk = false;
			};
		
			if(todoOk){
				
				// Envio al servidor
		    	$.ajax({
    	    		async: true,
    	    		dataType: "html",
    	    		contentType: "application/x-www-form-urlencoded",
    	    		url: "enviar-solicitud.php",
    	    		// Enviar un parámetro post con el nombre base64 y con la imagen en el
    	    		data: {
    	        		nombre: nombre,
    	        		cedula: cedula,
    	        		nacimiento: nacimiento,
    	        		telefono: telefono,
    	        		celular: celular,
    	        		domicilio: domicilio,
    	        		departamento: departamento,
    	        		ciudad: ciudad,
    	        		razonSocial: razonSocial,
    	        		rut: rut,
    	        		email: email,
    	        		imagen_aval: dataurl_aval,
    	        		imagen_cedula: dataurl_cedula,
    	        		area: area,
    	        		institucion: institucion,
    	        		rol: rol,
    	        		nombreAut1: nombreAut1,
    	        		nombreAut2: nombreAut2,
    	        		cedulaAut1: cedulaAut1,
    	        		cedulaAut2: cedulaAut2        		
    	    			},
    	    		type: "post",
    	    		success: function(response){
             			$('#form-solicitud')[0].reset();
             			$('#img-aval img').remove();
             			$('#img-cedula img').remove();

             			$('#aval-icon').removeClass('hidden');
             			$('#cedula-icon').removeClass('hidden');
             			$('#form-solicitud').css('visibility', 'hidden');
             			$('#solicitud').prepend('<p id="response">' + response + '<br/><a href="javascript:location.reload();">Volver</a></p>');          
           					},
           			error: function() {
    	        		$('#form-solicitud').css('visibility', 'hidden');
             			$('#solicitud').prepend('<p id="response">Se produjo un error al intentar enviar la solicitud. Por favor comuníquese con la empresa.<br/><a href="javascript:location.reload();">Volver</a></p>');
    					}
    				});
           			
			} else {
				return false;
				};

			
		});
		

/* CONTROLES KEY UP */		

		$('#nombre').keyup(function(){
			var nombre = $('#nombre').val();
			if (nombre.length > 5 ) {
				$('.nombre.invalid').addClass('hidden');
			} else {
				$('.nombre.invalid').removeClass('hidden');
			};
		});
		
		
		$('#cedula').keyup(function(){
			var cedula = $('#cedula').val();
			if (cedula.length == 8 && !isNaN(cedula)) {
				$('.cedula.invalid').addClass('hidden');
			} else {
				$('.cedula.invalid').removeClass('hidden');
			};
		});


		$('#nacimiento').change(function(){
			var nacimiento = $('#nacimiento').val();
			var fecha = nacimiento.split("/");
			var year = fecha[2];
			var yearActual = (new Date).getFullYear();
			if (nacimiento !== '' && (yearActual - year) > 17) {
				$('.nacimiento.invalid').addClass('hidden');
			} else {
				$('.nacimiento.invalid').removeClass('hidden');
			};
		});


		$('#telefono, #celular').keyup(function(){
			var telefono = $('#telefono').val();
			var celular = $('#celular').val();
			if (telefono.length == 8 || celular.length == 9) {
				$('.telefono.invalid').addClass('hidden');
			} else {
				$('.telefono.invalid').removeClass('hidden');
			};
		});


		$('#domicilio').keyup(function(){
			var domicilio = $('#domicilio').val();
			if (domicilio !== '') {
				$('.domicilio.invalid').addClass('hidden');
			} else {
				$('.domicilio.invalid').removeClass('hidden');
			};
		});

		$('#departamento').change(function(){
			var departamento = $('#departamento').val();
			if (departamento !== '') {
				$('.departamento.invalid').addClass('hidden');
			} else {
				$('.departamento.invalid').removeClass('hidden');
			};
		});

		$('#ciudad').keyup(function(){
			var ciudad = $('#ciudad').val();
			if (ciudad !== '') {
				$('.ciudad.invalid').addClass('hidden');
			} else {
				$('.ciudad.invalid').removeClass('hidden');
			};
		});


		$('#razon-social, #rut').keyup(function(){
			var razonSocial = $('#razon-social').val();
			var rut = $('#rut').val();
			if((razonSocial !== '' && rut !== '') || (razonSocial == '' && rut == '')){
				$('.rut.invalid').addClass('hidden');
				$('.razon-social.invalid').addClass('hidden');
			} else if (razonSocial !== '' && rut == '') {
				$('.rut.invalid').removeClass('hidden');
				$('.razon-social.invalid').addClass('hidden');
			} else if (razonSocial == '' && rut !== '') {
				$('.rut.invalid').addClass('hidden');
				$('.razon-social.invalid').removeClass('hidden');
			};
		});


		$('#email').keyup(function(){
			var email = $('#email').val();
			var expr = /^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/;
			if (email !== '' && expr.test(email)) {
				$('.email.invalid').addClass('hidden');
			} else {
				$('.email.invalid').removeClass('hidden');
			};
		});


		$('#fichero-aval').change(function(){
			var archivo = $('#fichero-aval').val();
			if (archivo !== '') {
				$('.fichero-aval.invalid').addClass('hidden');
			} else {
				$('.fichero-aval.invalid').removeClass('hidden');
			};
		});

		$('#fichero-cedula').change(function(){
			var archivoCedula = $('#fichero-cedula').val();
			if (archivoCedula !== '') {
				$('.fichero-cedula.invalid').addClass('hidden');
			} else {
				$('.fichero-cedula.invalid').removeClass('hidden');
			};
		});


		$('input[name=area]').change(function(){
			var area = $('input[name=area]:checked').val();
			if (area !== undefined) {
				$('.area.invalid').addClass('hidden');
			} else {
				$('.area.invalid').removeClass('hidden');
			};
		});

		$('input[name=institucion]').change(function(){
			var institucion = $('input[name=institucion]:checked').val();
			if (institucion !== undefined) {
				$('.institucion.invalid').addClass('hidden');
			} else {
				$('.institucion.invalid').removeClass('hidden');
			};
		});


		$('input[name=rol]').change(function(){
			var rol = $('input[name=rol]:checked').val();
			if (rol !== undefined) {
				$('.rol.invalid').addClass('hidden');
			} else {
				$('.rol.invalid').removeClass('hidden');
			};
		});


		$('#condiciones').change(function(){
			if ($(this).is(':checked')) {
				$('.condiciones.invalid').addClass('hidden');
			} else {
				$('.condiciones.invalid').removeClass('hidden');
			};
		});

		$('#nombre-aut-1, #cedula-aut-1').keyup(function(){
			let nombreAut1 = $('#nombre-aut-1').val();
			let cedulaAut1 = $('#cedula-aut-1').val();

			if((nombreAut1 !== '' && cedulaAut1 !== '') || (nombreAut1 == '' && cedulaAut1 == '')){
				$('.nombre-aut-1.invalid').addClass('hidden');
			} else if (nombreAut1 !== '' && cedulaAut1 == '') {
				$('.nombre-aut-1.invalid').removeClass('hidden');
			} else if (nombreAut1 == '' && cedulaAut1 !== '') {
				$('.nombre-aut-1.invalid').removeClass('hidden');
			};
		});

		$('#nombre-aut-2, #cedula-aut-2').keyup(function(){
			let nombreAut2 = $('#nombre-aut-2').val();
			let cedulaAut2 = $('#cedula-aut-2').val();

			if((nombreAut2 !== '' && cedulaAut2 !== '') || (nombreAut2 == '' && cedulaAut2 == '')){
				$('.nombre-aut-2.invalid').addClass('hidden');
			} else if (nombreAut2 !== '' && cedulaAut2 == '') {
				$('.nombre-aut-2.invalid').removeClass('hidden');
			} else if (nombreAut2 == '' && cedulaAut2 !== '') {
				$('.nombre-aut-2.invalid').removeClass('hidden');
			};
		});


	/* VALIDACION MODIFICACION DE DATOS BEAUTY CARD */

		$('#enviar-mod-datos').click(function(e) {
			e.preventDefault();
			
			let domicilio = $('#domicilio-mod').val();
			let departamento = $('#departamento-mod').val();
			let ciudad = $('#ciudad-mod').val();
			let razonSocial = $('#razon-social-mod').val();
			let nombreAut1 = $('#nombre-aut-1-mod').val();
			let nombreAut2 = $('#nombre-aut-2-mod').val();

			let todoOk = true;
			
			let cedula = $('#cedula-mod').val();
			if (cedula.length !== 8 || isNaN(cedula)) {
				$('.cedula.invalid').removeClass('hidden');
				todoOk = false;
			};

			let telefono = $('#telefono-mod').val();
			if (telefono.length != '') {
				if ((telefono.length != 8) || (isNaN(telefono))) {
					$('.telefono.invalid').removeClass('hidden');
					todoOk = false;
				};
			};

			let celular = $('#celular-mod').val();
			if (celular.length != '') {
				if ((celular.length != 9) || (isNaN(celular))) {
					$('.celular.invalid').removeClass('hidden');
					todoOk = false;
				};
			};

			let rut = $('#rut-mod').val();
			if (isNaN(rut)) {
				$('.rut.invalid').removeClass('hidden');
				todoOk = false;
			};

			let email = $('#email-mod').val();
			let expr = /^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/;
			
			if (email != '' && !expr.test(email)) {
				$('.email.invalid').removeClass('hidden');
				todoOk = false;
			};

			let archivoCedula = $('#fichero-cedula-mod-datos').val();
			if(archivoCedula){
				let split = archivoCedula.split(".");
				let extCedula = split[1] ? split[1].toLowerCase() : undefined;
				let validExt = ['jpg', 'png', 'jpeg', 'gif', 'tif', 'bmp'];	
				if (archivoCedula == '' || $.inArray(extCedula, validExt) == -1) {
					$('.fichero-cedula.invalid').removeClass('hidden');
					todoOk = false;
				};		
			} else {
				$('.fichero-cedula.invalid').removeClass('hidden');
					todoOk = false;
				};
			

			let cedulaAut1 = $('#cedula-aut-1-mod').val();
			if (cedulaAut1 !== '' && cedulaAut1 !== 8) {
				if (isNaN(cedulaAut1)){
					$('.cedula-aut-1.invalid').removeClass('hidden');
					todoOk = false;
				};	
			};


			let cedulaAut2 = $('#cedula-aut-2-mod').val();
			if (cedulaAut2 !== '' && cedulaAut2 !== 8) {
				if (isNaN(cedulaAut2)){
					$('.cedula-aut-2.invalid').removeClass('hidden');
					todoOk = false;
				};	
			};

			if (!($('#acuerdo-mod').is(':checked'))) {
				$('.acuerdo.invalid').removeClass('hidden');
				todoOk = false;
			};


			if(todoOk){
				
				// Envio al servidor
		    	$.ajax({
    	    		async: true,
    	    		dataType: "html",
    	    		contentType: "application/x-www-form-urlencoded",
    	    		url: "enviar-modificacion.php",
    	    		// Enviar un parámetro post con el nombre dataurl y con la imagen en el
    	    		data: {
    	        		cedula: cedula,
    	        		telefono: telefono,
    	        		celular: celular,
    	        		domicilio: domicilio,
    	        		departamento: departamento,
    	        		ciudad: ciudad,
    	        		razonSocial: razonSocial,
    	        		rut: rut,
    	        		email: email,
    	        		imagen_cedula: dataurl_cedula_mod,
    	        		nombreAut1: nombreAut1,
    	        		nombreAut2: nombreAut2,
    	        		cedulaAut1: cedulaAut1,
    	        		cedulaAut2: cedulaAut2        		
    	    			},
    	    		type: "post",
    	    		success: function(response){
             			$('#form-modifica')[0].reset();
             			$('#img-cedula img').remove();

             			$('#cedula-icon').removeClass('hidden');
             			$('#form-modifica').css('visibility', 'hidden');
             			$('#mod-datos').prepend('<p id="response">' + response + '<br/><a href="javascript:location.reload();">Volver</a></p>');          
           					},
           			error: function() {
    	        		$('#form-modifica').css('visibility', 'hidden');
             			$('#mod-datos').prepend('<p id="response">Se produjo un error al intentar enviar la modificación. Por favor comuníquese con la empresa.<br/><a href="javascript:location.reload();">Volver</a></p>');
    					}
    				});
           			
			} else {
				return false;
				};

			
		});
		

/* CONTROLES KEY UP MODIFICACION DE DATOS */				
		
		$('#cedula-mod').keyup(function(){
			let cedula = $(this).val();
			if (cedula.length == 8 && !isNaN(cedula)) {
				$('.cedula.invalid').addClass('hidden');
			} else {
				$('.cedula.invalid').removeClass('hidden');
			};
		});


		$('#telefono-mod').keyup(function(){
			let telefono = $(this).val();
			if (((telefono.length == '') || (telefono.length == 8)) && (!isNaN(telefono))) {
				$('.telefono.invalid').addClass('hidden');
			} else {
				$('.telefono.invalid').removeClass('hidden');
			};
		});


		$('#celular-mod').keyup(function(){
			let celular = $(this).val();
			if (((celular.length == '') || (celular.length == 9)) && (!isNaN(celular))) {
				$('.celular.invalid').addClass('hidden');
			} else {
				$('.celular.invalid').removeClass('hidden');
			};
		});

		$('#rut-mod').keyup(function(){
			let rut = $('#rut-mod').val();
			if((rut !== '') && (isNaN(rut))){
				$('.rut.invalid').removeClass('hidden');
			} else {
				$('.rut.invalid').addClass('hidden');
			};
		});


		$('#email-mod').keyup(function(){
			let email = $('#email-mod').val();
			let expr = /^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/;
			if (email !== '' && !expr.test(email)) {
				$('.email.invalid').removeClass('hidden');
			} else {
				$('.email.invalid').addClass('hidden');
			};
		});

		$('#fichero-cedula-mod-datos').change(function(){
			let archivoCedula = $('#fichero-cedula-mod-datos').val();
			if (archivoCedula !== '') {
				$('.fichero-cedula.invalid').addClass('hidden');
			} else {
				$('.fichero-cedula.invalid').removeClass('hidden');
			};
		});


		$('#acuerdo-mod').change(function(){
			if ($(this).is(':checked')) {
				$('.acuerdo.invalid').addClass('hidden');
			} else {
				$('.acuerdo.invalid').removeClass('hidden');
			};
		});


		$('#cedula-aut-1-mod').keyup(function(){
			let cedulaAut1 = $(this).val();
			if ((cedulaAut1 != '' && cedulaAut1.length !== 8) || isNaN(cedulaAut1)) {
				$('.cedula-aut-1.invalid').removeClass('hidden');
			} else {
				$('.cedula-aut-1.invalid').addClass('hidden');
			};
		});

		$('#cedula-aut-2-mod').keyup(function(){
			let cedulaAut2 = $(this).val();
			if ((cedulaAut2 != '' && cedulaAut2.length !== 8) || isNaN(cedulaAut2)) {
				$('.cedula-aut-2.invalid').removeClass('hidden');
			} else {
				$('.cedula-aut-2.invalid').addClass('hidden');
			};
		});


});


var reset_form = function(){
             			$('#img-aval img').remove();
             			$('#img-cedula img').remove();
             			$('#aval-icon').removeClass('hidden');
             			$('#cedula-icon').removeClass('hidden');
             			$('#img-cedula-mod-datos img').remove();
             			$('#cedula-icon-mod-datos').removeClass('hidden');
             			$('#form-solicitud')[0].reset();
             			$('#form-modifica')[0].reset();
             			$('.invalid').addClass('hidden');
			}
