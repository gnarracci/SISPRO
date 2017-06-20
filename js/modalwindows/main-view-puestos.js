	$(function(){
		//Ventana Listar Puestos
		$('#puestos-anim').dialog({
			autoOpen: false,
			width: 800,
			height: 600,
			show: 'clip',
			hide: 'clip'			
		});

		//Funcionalidad del boton que abre la Ventana
		$('#ver-puestos').on('click',function(){
			$('#puestos-anim').dialog('open');
		});
	});