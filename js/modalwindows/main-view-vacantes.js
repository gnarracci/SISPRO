	$(function(){
		//Ventana listado de Vacantes
		$('#vacantes-anim').dialog({
			autoOpen: false,
			width: 640,
			height: 'auto',
			show: 'clip',
			hide: 'clip'			
		});

		//Funcionalidad del boton lista de Vacantes
		$('#ver-vacantes').on('click',function(){
			$('#vacantes-anim').dialog('open');
		});
	});