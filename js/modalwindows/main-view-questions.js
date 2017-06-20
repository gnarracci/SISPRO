		$(function(){
			//Ventana Listar Preguntas
			$('#lista-anim').dialog({
				autoOpen: false,
				width: 1040,
				height: 400,
				show: 'clip',
				hide: 'puff'			
			});

			//Funcionalidad del boton que abre la Ventana
				$('#ver-preguntas').on('click',function(){
				$('#lista-anim').dialog('open');
				});
		});