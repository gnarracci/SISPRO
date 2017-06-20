	$(function(){
		//Ventana Formulario con JQuery-UI Solicitantes No Evaluados
		$('#solicitantes-anim').dialog({
			autoOpen: false,
			width: 650,
			height: 400,
			show: 'clip',
			hide: 'puff'			
		});

		//Funcionalidad del boton que abre el formulario
		$('#ver-solicitantes').on('click',function(){
			$('#solicitantes-anim').dialog('open');
		});
	});
