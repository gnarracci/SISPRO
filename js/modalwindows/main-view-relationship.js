	$(function(){
		//Ventana Formulario con JQuery-UI Relacion Preguntas y Respuestas
		$('#corresponde-anim').dialog({
			autoOpen: false,
			width: 500,
			height: 450,
			show: 'clip',
			hide: 'puff'			
		});

		//Funcionalidad del boton que abre el formulario
		$('#relacion').on('click',function(){
			$('#corresponde-anim').dialog('open');
		});
	});