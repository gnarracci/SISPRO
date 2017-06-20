	$(function(){
		//Ventana Formulario con JQuery-UI Jornadas
		$('#area-anim').dialog({
			autoOpen: false,
			show: 'clip',
			hide: 'puff'			
		});

		//Funcionalidad del boton que abre el formulario
		$('#ver-areas').on('click',function(){
			$('#area-anim').dialog('open');
		});
	});
