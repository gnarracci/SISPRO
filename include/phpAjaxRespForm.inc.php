<?php
// Script para ejecutar AJAX

// Insertar y actualizar tabla de usuarios
sleep(3);

// Inicializamos variables de mensajes y JSON
$respuestaOK = false;
$mensajeError = "No se puede ejecutar la aplicación";
$contenidoOK = "";

// Incluimos el archivo de funciones y conexión a la base de datos
include('mainFuncRespForm.inc.php');

// Validar conexión con la base de datos
if($errorDbConexion == false){
	// Validamos qe existan las variables post
	if(isset($_POST) && !empty($_POST)){
		// Verificamos las variables de acción
		switch ($_POST['accion']) {
			case 'addRespuesta':
				// Armamos el query
				$query = sprintf("INSERT INTO resp_formacion
								 SET resp_formacion='%s', id_asociado='%d', pctaje_minimo='%d'",
								 $_POST['resp_formacion'],$_POST['id_asociado'],$_POST['pctaje_minimo']);

				// Ejecutamos el query
				$resultadoQuery = $mysqli -> query($query);


				// Obtenemos el id de user para edición
				$id_resp_formacionOK = $mysqli -> insert_id;

				if($resultadoQuery == true){
					$respuestaOK = true;
					$mensajeError = "Se ha agregado el registro correctamente";
					$contenidoOK = '
						<tr>
							<td>'.$_POST['resp_formacion'].'</td>
							<td style="color:red;font-weight:bold;text-align:center;">'.$_POST['id_asociado'].'</td>
							<td style="font-weight: bold;text-align:center;">'.$_POST['pctaje_minimo'].'</td>
							<td class="centerTXT"><a class="btn btn-small" href="'.$id_resp_formacionOK.'">Editar</a></td>
						<tr>
					';

				}
				else{
					$mensajeError = "No se puede guardar el registro en la base de datos";
				}

			break;
			
			case 'editRespuesta':
				// Armamos el query
				$query = sprintf("UPDATE resp_formacion
								 SET resp_formacion='%s', id_asociado='%d', pctaje_minimo='%d'
								 WHERE id_resp_formacion=%d LIMIT 1",
								 $_POST['resp_formacion'],$_POST['id_asociado'],$_POST['pctaje_minimo'],$_POST['id_resp_formacion']);

				// Ejecutamos el query
				$resultadoQuery = $mysqli -> query($query);

				// Validamos que se haya actualizado el registro
				if($mysqli -> affected_rows == 1){
					$respuestaOK = true;
					$mensajeError = 'Se ha actualizado el registro correctamente';

					$contenidoOK = consultaRespuestas($mysqli);

				}else{
					$mensajeError = 'No se ha actualizado el registro';
				}


			break;

			default:
				$mensajeError = 'Esta acción no se encuentra disponible';
			break;
		}
	}
	else{
		$mensajeError = 'No se puede ejecutar la aplicación';
	}


}
else{
	$mensajeError = 'No se puede establecer conexión con la base de datos';
}

// Armamos array para convertir a JSON
$salidaJson = array("respuesta" => $respuestaOK,
					"mensaje" => $mensajeError,
					"contenido" => $contenidoOK);

echo json_encode($salidaJson);



/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */
?>