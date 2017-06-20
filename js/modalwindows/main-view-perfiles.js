	$(function(){
		//Ventana Formulario con JQuery-UI Solicitantes No Evaluados
		$('#perfiles-anim').dialog({
			autoOpen: false,
			width: 1060,
			height: '500',
			draggable: true,
			show: 'clip',
			hide: 'puff'			
		});

		//Funcionalidad del boton que abre el formulario
		$('#ver-perfiles').on('click',function(){
			$('#perfiles-anim').dialog('open');
		});
	});
