	$(function(){
		//Ventana Formulario con JQuery-UI Jornadas
		$('#tabla').dialog({
			autoOpen: false,
			show: 'clip',
			hide: 'puff'			
		});

		//Funcionalidad del boton que abre el formulario
		$('#boton').on('click',function(){
			$('#tabla').dialog('open');
		});
	});