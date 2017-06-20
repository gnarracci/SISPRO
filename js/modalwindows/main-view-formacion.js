$(function(){
		$('#agregarRespuesta').dialog({
			autoOpen: false,
			modal: true,
			width: 305,
			height: 'auto',
			resizable: false,
			close:function(){
				$('#formResp fieldset > span').removeClass('error').empty();
				$('#formResp input[type="text"]').val('');
		    	$('#formResp select > option').removeAttr('selected');
		    	$('#id_resp_formacion').val('0');
			}
		});

		// funcionalidad del botón que abre el formulario
		$('#save').on('click',function(){
			// Asignamos valor a la variable acción
			$('#accion').val('addRespuesta');

		//Abrimos el Formulario
		$('#agregarRespuesta').dialog({
			title: 'Agregar Respuesta de Formación',
			autoOpen: true
			});
		});

		//Validando Formulario
		$('#formResp').validate();

		//Al hacer Click
		$('#agregar').click(function(){

			var string = $('#formResp').serialize();

			// alert(string);

			$.ajax({
				beforeSend: function(){
					$('#formResp .ajaxLoader').show();
				},
				cache: false,
				type: "POST",
				dataType: "json",
				url: "include/phpAjaxRespForm.inc.php",
				data: string,
				success: function(response){

					//Validar Mensaje de Error
					if(response.respuesta == 'error'){
						alert(response.mensaje);
					}
					else{

						//Si es exitosa la operación						
						$('#agregarRespuesta').dialog('close');

						// alert(response.contenido);					

						if($('#sinDatos').lenght){
							$('#sinDatos').remove();
						}

						//Validar Tipo de Accion
						if($('#accion').val() == 'editRespuesta'){
							$('#listaRespuestasOK').empty();
						}

						$('#listaRespuestasOK').append(response.contenido);

					}

					$('#formResp .ajaxLoader').hide();					

				},
				error: function(){
					alert('ERROR GENERAL DEL SISTEMA!!!, Intente más Tarde');

					$('#agregarRespuesta').dialog('close');
				}

			});

			return false;
		});

		//Edición de Registros

		$('table').on('click','#listaRespuestasOK a', function (event){
			event.preventDefault();

			// alert($(this).attr('href'));

			//Valor de la acción
			$('#accion').val('editRespuesta');

			//Id Respuesta
			$('#id_resp_formacion').val($(this).attr('href'));

			//Abrimos el formulario
			$('#agregarRespuesta').dialog('open');

			//Llenamos el formulario con los datos del registro seleccionado

			//Seleccionando el Puesto de Trabajo
			$('#resp_formacion').val($(this).parent().parent().children('td:eq(0)').text());

			//Seleccionando Pregunta del Perfil Profesional
			$('#id_asociado').val($(this).parent().parent().children('td:eq(1)').text());

			//Seleccionando Porcentaje de Evaluación aplicado a la pregunta
			$('#pctaje_minimo').val($(this).parent().parent().children('td:eq(2)').text());

			//Abrimos el Formulario
			$('#agregarRespuesta').dialog({
				title: 'Editar Respuesta de Formación',
				autoOpen: true
			});
		});	
	});