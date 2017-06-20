$(function(){
		//Ventana Formulario con JQuery-UI Solicitantes No Evaluados
		$('#perfil-anim').dialog({
			autoOpen: false,
			width: 1060,
			height: 'auto',
			draggable: true,
			show: 'clip',
			hide: 'puff'			
		});

		//Funcionalidad del boton que abre el formulario
		$('#ver-profile').on('click',function(){
			$('#perfil-anim').dialog('open');
		});
	});