<?php
// Script para ejecutar AJAX

// Insertar y actualizar tabla de usuarios
sleep(3);

// Inicializamos variables de mensajes y JSON
$respuestaOK = false;
$mensajeError = "No se puede ejecutar la aplicación";
$contenidoOK = "";

// Incluimos el archivo de funciones y conexión a la base de datos
include('mainFunctionCon.inc.php');

// Validar conexión con la base de datos
if($errorDbConexion == false){
	// Validamos qe existan las variables post
	if(isset($_POST) && !empty($_POST)){
		// Verificamos las variables de acción
		switch ($_POST['accion']) {
			case 'addPregunta':
				// Armamos el query
				$query = sprintf("INSERT INTO cuestionario_condicion
								 SET puesto_trabajo='%s', pregunta_condicion='%s', respuesta_condicion='%s', pregunta_pctaje='%d'",
								 $_POST['puesto_trabajo'],$_POST['pregunta_condicion'],$_POST['respuesta_condicion'],$_POST['pregunta_pctaje']);

				// Ejecutamos el query
				$resultadoQuery = $mysqli -> query($query);


				// Obtenemos el id de user para edición
				$id_condicionOK = $mysqli -> insert_id;

				if($resultadoQuery == true){
					$respuestaOK = true;
					$mensajeError = "Se ha agregado el registro correctamente";
                    $contenidoOK .= '
                        <tr>
                            <td>'.$_POST['puesto_trabajo'].'</td>
                            <td>'.$_POST['pregunta_condicion'].'</td>
                            <td>'.$_POST['respuesta_condicion'].'</td>
                            <td style="font-weight: bold;text-align:center;">'.$_POST['pregunta_pctaje'].'</td>
                            <td id="edit" class="centerTXT"><a class="btn btn-small" href="'.$id_condicionOK.'">Editar</a></td>
                        </tr>
                    ';  
                }
                else{
                    $mensajeError = 'No se puede guardar el registro en la base de datos'; 
                }
            
            break;
            
            case 'editPregunta':
                // Armamos el query
				$query = sprintf("UPDATE cuestionario_condicion
								 SET puesto_trabajo='%s', pregunta_condicion='%s', respuesta_condicion='%s', pregunta_pctaje='%d'
								 WHERE id_condicion=%d LIMIT 1",
								 $_POST['puesto_trabajo'],$_POST['pregunta_condicion'],$_POST['respuesta_condicion'],$_POST['pregunta_pctaje'],$_POST['id_condicion']);

				// Ejecutamos el query
				$resultadoQuery = $mysqli -> query($query);
                
                // Validando que se haya actualizado el registro
                if ($mysqli -> affected_rows == 1){
                    $respuestaOK = true;
                    $mensajeError = 'Se ha actualizado el registro correctamente';
                    
                    $contenidoOK = consultaPreguntas($mysqli);
                }
                else{
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
   
    // Armamos Array para convertir a JSON
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