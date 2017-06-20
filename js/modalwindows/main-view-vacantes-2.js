	$(function(){
		//Ventana listado de Vacantes
		$('#vacantes-anim-1').dialog({
			autoOpen: false,
			width: 640,
			height: 'auto',
			show: 'clip',
			hide: 'clip'			
		});

		//Funcionalidad del boton lista de Vacantes
		$('#ver-vacantes-1').on('click',function(){
			$('#vacantes-anim-1').dialog('open');
		});
	});