$(document).ready(function(){

$('#nacimiento').datepicker({
    format: "dd/mm/yyyy",
    endDate: "31-12-1999",
    language: "es",
    autoclose: true
});

/* VALIDACION SOLICITUD BEAUTY CARD */

		$('#btn-enviar').click(function() {
			var todoOk = true;
			
			var nombre = $('#nombre').val();
			if (nombre.length < 5) {
				$('.nombre.invalid').removeClass('hidden');
				totodoOk = false;
			};
			
			var cedula = $('#cedula').val();
			if (cedula.length !== 8) {
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

			var archivo = $('#archivo').val();
			if (archivo == '') {
				$('.archivo.invalid').removeClass('hidden');
				todoOk = false;
			};

			var area = $('input[name=area]:checked').val();
			if (area == undefined) {
				$('.area.invalid').removeClass('hidden');
				todoOk = false;
			};

			var institucion = $('input[name=institucion]:checked').val();
			if (institucion == undefined) {
				$('.institucion.invalid').removeClass('hidden');
				todoOk = false;
			};

			var rol = $('input[name=rol]:checked').val();
			if (rol == undefined) {
				$('.rol.invalid').removeClass('hidden');
				todoOk = false;
			};

			if (!($('#condiciones').is(':checked'))) {
				$('.condiciones.invalid').removeClass('hidden');
				todoOk = false;
			};
		
		return todoOk;
			
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
			if (cedula.length == 8) {
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


		$('#archivo').change(function(){
			var archivo = $('#archivo').val();
			if (archivo !== '') {
				$('.archivo.invalid').addClass('hidden');
			} else {
				$('.archivo.invalid').removeClass('hidden');
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

	});