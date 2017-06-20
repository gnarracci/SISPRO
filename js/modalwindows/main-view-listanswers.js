		$(function(){
			//Ventana Listar Preguntas
			$('#listaresp').dialog({
				autoOpen: false,
				width: 1040,
				height: 450,
				show: 'clip',
				hide: 'puff'			
			});

			//Funcionalidad del boton que abre la Ventana
				$('#ver-respuestas').on('click',function(){
				$('#listaresp').dialog('open');
				});
		});