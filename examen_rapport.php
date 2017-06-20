<?Php
//Conexion con la Base de Datos 
include("conexionsspi.php");
//Script de Sesion de Usuario
include("session.php");
//Incluyo verificador de saludo horario
include("schedule.php");
//Fecha del Sistema
include("date.php");
//Identificador de Id de Evaluacion del Usuario en las Encuestas
include("identity.php");

//Seleccion del Puesto al que se le esta aplicando el Test
    $id = $_SESSION["$usuario_valido"];

    $sql= "SELECT cedula,nombres,nombre_puesto FROM usuarios_encuesta WHERE cedula = '$id' AND id_eval = '$identificador'";

    $exec = mysql_query($sql) or die (mysql_errno().' - '.mysql_error());

    $vac = mysql_fetch_array($exec);

    $name = $vac['nombres'];
    
//Numero de Preguntas por Modulo
$numPregs = 10; //Asegurarse que la BD tenga >= 10 preguntas
$user = $_SESSION["$usuario_valido"];

//Seleccionar las Preguntas Aleatoriamente

	//Preguntas cargadas en la Base de Datos
	$pregsInDB = mysql_query("SELECT count(id_rapport) as 'num' FROM cuestionario_rapport",$conexionsspi);

	//Preguntas Existentes
	$pregsExistentes = mysql_result($pregsInDB,0,'num');

	for ($r=0;$r<$numPregs;$r++) $vector[$r]=0;

	for ($r=0;$r<$numPregs;$r++){
		$alea = rand(1,$pregsExistentes);
		$bandera = true;

		for ($f=0;$f<$r;$f++)
			if ($vector[$f]==$alea){
				$bandera = false;
				break;
			}

			if (!$bandera){ $r--; continue;}

			$vector[$r] = $alea;

	}	

?>
<!DOCTYPE html>
	<html lang="es">
		<head>
			<meta charset="utf-8"/>
			<meta http-equiv="Expires" content="0" />
            <meta http-equiv="Pragma" content="no-cache" />
			<title>Encuesta de Evaluación para Rapport</title>
			<link rel="shortcut icon" href="favicon.ico"/>
			<link rel="stylesheet" href="examen_rapport.css"/>
			<link rel="stylesheet" href="normalize.css"/>
			<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
			<link rel="stylesheet" href="css/start/jquery-ui-1.9.1.custom.css"/>

			<script src="js/modernizr-2.5.3.min.js"></script>
			<script scr="js/bootstrap/bootstrap.min.js"></script>
			<script src="js/jquery-1.7.1.min.js"></script>
			<script src="js/jquery-ui/jquery-ui-1.9.1.custom.min.js"></script>
			<script src="js/prefixfree.min.js"></script>

			<!-- Inhabilitando F5 (Actualizar) -->

            <script>
                //este codigo maneja the F5/Ctrl+F5/Ctrl+R
                document.onkeydown = checkKeycode
                function checkKeycode(e) {
                    var keycode;
                    if (window.event)
                        keycode = window.event.keyCode;
                    else if (e)
                        keycode = e.which;

                    // Mozilla firefox
                    if ($.browser.mozilla) {
                        if (keycode == 116 ||(e.ctrlKey && keycode == 82)) {
                            if (e.preventDefault)
                            {
                                e.preventDefault();
                                e.stopPropagation();
                            }
                        }
                    } 
                    // IE
                    else if ($.browser.msie) {
                        if (keycode == 116 || (window.event.ctrlKey && keycode == 82)) {
                            window.event.returnValue = false;
                            window.event.keyCode = 0;
                            window.status = "Actualizar esta Desabilitado";
                        }
                    }
                }
            </script>

            <!-- Inhabilitando el Boton Atras del Navegador -->

            <script>
                {
                if(history.forward(1))
                location.replace(history.forward(1))
                }
            </script>

		</head>

		<body>

			<header>

				<img src="imagenes/eval_rapport.png" width="960px" height="204px" alt="membrete" id="eval_header" />

			</header>

			<div id="div_session_timeout">

				<script>
					var dateStamp = new Date("<?Php echo date('D M j Y H:i:s');?>"); // Obtiene fecha y hora del Servidor
					var intStamp = Number(dateStamp); //Convierte a timestamp la fecha y hora actual del Servidor
					var url = 'examen_formacion.php';

					function getTime(){
						now = new Date(intStamp); //Usando formato timestamp, obtener la fecha y la hora en la que debera terminar la sesion
						//Sesion establecida en 120 segundos
						y2k = new Date("<?Php echo date('M j Y H:i:s', time() + 120); ?>");
						days = (y2k - now) / 1000 / 60 / 60 / 24;
						daysRound = Math.floor(days);
						hours = (y2k - now) / 1000 / 60 / 60 - (24 * daysRound);
						hoursRound = Math.floor(hours);
						minutes = (y2k - now) / 1000 / 60 - (24 * 60 * daysRound) - (60 * hoursRound);
						minutesRound = Math.floor(minutes);
						seconds = (y2k - now) / 1000 - (24 * 60 * 60 * daysRound) - (60 * 60 * hoursRound) - (60 * minutesRound);
						secondsRound = Math.round(seconds);

						sec = (secondsRound == 1) ? "segundo" : "segundos";
						min = (minutesRound == 1) ? "minuto," : "minutos,";
						hr = (hoursRound == 1) ? "hora," : "horas,";
						dy = (daysRound == 1) ? "d\355a," : "d\355as,";

						if (daysRound+hoursRound+minutesRound+secondsRound == '0000'){
							document.getElementById("session_timeout").innerHTML = '<span style="color: red;font-weight:bold;">La sesi\363n ha expirado!!! </span>' +
							minutesRound + min + secondsRound + sec;
						} else {
							document.getElementById("session_timeout").innerHTML = "Tiempo Restante de esta sesi\363n: " + minutesRound + min 
							+ secondsRound + sec;
							newtime = window.setTimeout("getTime();", 1000);
							intStamp = intStamp + 1000; // Para avanzar un segundo en cada iteracion a partir de la fecha y hora actual obtenida
							// desde el Servidor
						} // endif

						if (minutesRound == 0  && secondsRound == 0){
							window.location = url;
						}

					} // end function
					window.onload=getTime;

				</script>

				<span id="session_timeout"></span>

			</div>

			<div id="is-2"></div>

			<section id="identificador">

				<span id="id">Encuesta de Evaluación de Preguntas de Rapport</span>

				<div id="is"></div>

				<span id="user"><?Php echo $greeting.$name." !!! Bienvenido(a)";?></span>

				<img src="imagenes/user.png" width="44px" height="50px" alt="usuario" id="userimg" />

			</section>

			<section id="test">

				<div id="is-1"></div>

				<span id="puesto">Evaluación para la Vacante de: </span>

				<p id="vac"><?Php echo $vac['nombre_puesto'];?></p>

				<span id="ident">Cédula de Identidad: </span>

				<p id="identidad"><?Php echo $vac['cedula'];?></p>

				<span id="fecha"><?Php echo dameTiempo();?></span>

				<p id="notice">Las siguientes preguntas que se le mostrarán mediran sus conocimientos acerca de nuestra organización</p>

				<!-- Carga de las Preguntas y Respuestas de Rapport -->

				<div id="cuerpo">

					<?Php
					//Carga de las Preguntas
					echo '<form action="califica_rapport.php" method="post">'."\n";
					for ($r=0;$r<$numPregs;$r++){
						$pregActu = mysql_query("SELECT pregunta_rapport FROM cuestionario_rapport WHERE id_rapport = '$vector[$r]'",$conexionsspi);

						$txtPregActu = mysql_result($pregActu,0,'pregunta_rapport');

						$tpPreg = mysql_query("SELECT respuesta_rapport FROM cuestionario_rapport WHERE id_rapport = '$vector[$r]'",$conexionsspi);

						$tipoPreg = mysql_result($tpPreg,0,'respuesta_rapport');

						echo "<p>\n";?>

						<span id="txtpregActu"><?Php echo "".($r+1).") ".$txtPregActu;?></span>

						<?Php						
						if ($tipoPreg == 2) { //Abierta
							echo ' <input type="text" name="'.$r.'">'."\n";
							echo ' <input type="hidden" name="preg'.($r+1).'" value="'.$vector[$r].'">'."\n";
						}
						else{ // Multiopción
							$consOps = mysql_query("SELECT id_resp_rapport FROM corresponde_rapport WHERE id_rapport = '$vector[$r]'",$conexionsspi);

							$numResp = mysql_num_rows($consOps);

							echo "\n<br>";

							echo ' <input type="hidden" name="preg'.($r+1).'" value="'.$vector[$r].'">'."\n";

							for ($hui=0;$hui<$numResp;$hui++){

								$consResp = mysql_query("SELECT resp_rapport from resp_rapport where id_resp_rapport='".mysql_result($consOps,$hui,'id_resp_rapport')."'",$conexionsspi);

								$valor = mysql_result($consResp,0,'resp_rapport');

								echo '<input type="radio" name="'.$r.'" value="'.$valor.'">'.$valor."<br>\n"; 
							} 
						}

						echo "</p>\n";

					}

					echo '<input type="hidden" name="user" value="'.$user.'">'."\n";

					echo '<input type="submit" class="btn btn-primary" id="boton" value="Calificar Rapport">'."\n";

					echo '</form>'."\n";

					mysql_close($conexionsspi);
					?>					

				</div>

				<p id="notice-1">NOTA:</p>

				<p id="notice-2">Recuerde verficar sus respuestas antes de presionar el botón de "Calificar Rapport"</p>

			</section>

		</body>

		<footer>

			<img src="imagenes/quizpub.png" width="962px" height="144px" alt="Talento Humano" id="talento" title="Talente Humano Trans Coal de Venezuela, C.A." />

		</footer>

	</html>