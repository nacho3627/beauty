$(document).ready(function(){
	$('[data-bs-hover-animate]')
		.mouseenter( function(){ var elem = $(this); elem.addClass('animated ' + elem.attr('data-bs-hover-animate')) })
		.mouseleave( function(){ var elem = $(this); elem.removeClass('animated ' + elem.attr('data-bs-hover-animate')) });

	// Ventana modal aval
	$('#ver-aval').click(function(){
		$('#modal-aval').fadeIn('300');
	});

	$('#cerrar-aval').click(function(){
		$('#modal-aval').fadeOut('300');
	});

	$('.dato').click(function(){
		$(this).toggleClass("seleccionado");
	});

	// Busqueda filtro clientes
	$('#buscar').keyup(function(){
		var rex = new RegExp($(this).val(), 'i');
		if($('#buscar').val() !== '') {
			$('tr.Si, tr.No, tr.Sofya').hide();
			$('tr.Si, tr.No, tr.Sofya').filter(function(){
				return rex.test($(this).text());
			}).show();
		} else {
			$('tr.Si, tr.No, tr.Sofya').show();
			};
		
	});

	//Alert al borrar
	$('#borrar').click(function(){
		confirm("Estas seguro?");
	});


});