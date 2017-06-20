$(function(){
		// creación de ventana con formulario con jquery ui
		$('#agregarPerfil').dialog({
			autoOpen: false,
			modal:true,
			width:305,
			height:'auto',
			resizable: false,
			close:function(){
				$('#formProfesional fieldset > span').removeClass('error').empty();
				$('#formProfesional input[type="text"]').val('');
		    	$('#formProfesional select > option').removeAttr('selected');
		    	$('#id_profesional').val('0');
			}
		});

		// funcionalidad del botón que abre el formulario
		$('#save').on('click',function(){
			// Asignamos valor a la variable acción
			$('#accion').val('addPregunta');

			//Abrimos el Formulario
			$('#agregarPerfil').dialog({
			title: 'Agregar Pregunta de Formación',
			autoOpen: true
			});
		});

		//Validando Formulario
		$('#formProfesional').validate();

		//Al hacer Click
		$('#agregar').click(function(){

			var string = $('#formProfesional').serialize();

			//alert(string);

			$.ajax({
				beforeSend: function(){
					$('#formProfesional .ajaxLoader').show();
				},
				cache: false,
				type: "POST",
				dataType: "json",
				url: "include/phpAjaxQuestionsFor.inc.php",
				data: string,
				success: function(response){

					//Validar Mensaje de Error
					if(response.respuesta == 'error'){
						alert(response.mensaje);
					}
					else{

						//Si es exitosa la operación						
						$('#agregarPerfil').dialog('close');

						// alert(response.contenido);					

						if($('#sinDatos').lenght){
							$('#sinDatos').remove();
						}

						//Validar Tipo de Accion
						if($('#accion').val() == 'editPregunta'){
							$('#listaPreguntasOK').empty();
						}

						$('#listaPreguntasOK').append(response.contenido);

					}

					$('#formProfesional .ajaxLoader').hide();					

				},
				error: function(){
					alert('ERROR GENERAL DEL SISTEMA!!!, Intente más Tarde');

					$('#agregarPerfil').dialog('close');
				}

			});

			return false;

		});

		//Edición de Registros

	$('table').on('click','#listaPreguntasOK a', function (event){
		event.preventDefault();

		//alert($(this).attr('href'));

		//Valor de la acción
		$('#accion').val('editPregunta');

		//Id Pregunta
		$('#id_formacion').val($(this).attr('href'));

		//Abrimos el formulario
		$('#agregarPerfil').dialog('open');

		//Llenamos el formulario con los datos del registro seleccionado

		//Seleccionando el Puesto de Trabajo
		$('#puesto_trabajo').val($(this).parent().parent().children('td:eq(0)').text());

		//Seleccionando Pregunta del Perfil Profesional
		$('#pregunta_formacion').val($(this).parent().parent().children('td:eq(1)').text());

		//Seleccionando Tipo de Respuesta
		$('#respuesta_formacion').val($(this).parent().parent().children('td:eq(2)').text());

		//Seleccionando Porcentaje de Evaluación aplicado a la pregunta
		$('#pregunta_pctaje').val($(this).parent().parent().children('td:eq(3)').text());

		//Abrimos el Formulario
		$('#agregarPerfil').dialog({
			title: 'Editar Pregunta de Formación',
			autoOpen: true
		});
	});
});