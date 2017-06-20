	$(function(){
		//Ventana Formulario con JQuery-UI Jornadas
		$('#jornada-anim').dialog({
			autoOpen: false,
			show: 'clip',
			hide: 'puff'			
		});

		//Funcionalidad del boton que abre el formulario
		$('#ver-jornadas').on('click',function(){
			$('#jornada-anim').dialog('open');
		});
	});
