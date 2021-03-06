<?php
// Script para ejecutar AJAX

// Insertar y actualizar tabla de usuarios
sleep(3);

// Inicializamos variables de mensajes y JSON
$respuestaOK = false;
$mensajeError = "No se puede ejecutar la aplicaci�n";
$contenidoOK = "";

// Incluimos el archivo de funciones y conexi�n a la base de datos
include('mainFuncRespRapp.inc.php');

// Validar conexi�n con la base de datos
if($errorDbConexion == false){
	// Validamos qe existan las variables post
	if(isset($_POST) && !empty($_POST)){
		// Verificamos las variables de acci�n
		switch ($_POST['accion']) {
			case 'addRespuesta':
				// Armamos el query
				$query = sprintf("INSERT INTO resp_rapport
								 SET resp_rapport='%s', id_asociado='%d', pctaje_minimo='%d'",
								 $_POST['resp_rapport'],$_POST['id_asociado'],$_POST['pctaje_minimo']);

				// Ejecutamos el query
				$resultadoQuery = $mysqli -> query($query);


				// Obtenemos el id de user para edici�n
				$id_resp_rapportOK = $mysqli -> insert_id;

				if($resultadoQuery == true){
					$respuestaOK = true;
					$mensajeError = "Se ha agregado el registro correctamente";
					$contenidoOK = '
						<tr>
							<td>'.$_POST['resp_rapport'].'</td>
							<td style="color:red;font-weight:bold;text-align:center;">'.$_POST['id_asociado'].'</td>
							<td style="font-weight: bold;text-align:center;">'.$_POST['pctaje_minimo'].'</td>
							<td class="centerTXT"><a class="btn btn-small" href="'.$id_resp_rapportOK.'">Editar</a></td>
						<tr>
					';

				}
				else{
					$mensajeError = "No se puede guardar el registro en la base de datos";
				}

			break;
			
			case 'editRespuesta':
				// Armamos el query
				$query = sprintf("UPDATE resp_rapport
								 SET resp_rapport='%s', id_asociado='%d', pctaje_minimo='%d'
								 WHERE id_resp_rapport=%d LIMIT 1",
								 $_POST['resp_rapport'],$_POST['id_asociado'],$_POST['pctaje_minimo'],$_POST['id_resp_rapport']);

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
				$mensajeError = 'Esta acci�n no se encuentra disponible';
			break;
		}
	}
	else{
		$mensajeError = 'No se puede ejecutar la aplicaci�n';
	}


}
else{
	$mensajeError = 'No se puede establecer conexi�n con la base de datos';
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