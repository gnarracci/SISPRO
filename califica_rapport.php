<?Php 
//Conexion a la Base de Datos
include("conexionsspi.php");
//Sesión de Usuario
include("session.php");
//Identificador de Id de Evaluacion del Usuario en las Encuestas
include("identity.php");

//Seleccion de usuario logueado
    $id = $_SESSION["$usuario_valido"];

    $sql = "SELECT * FROM usuarios_encuesta WHERE cedula = '$id' AND id_eval = '$identificador'";
    
    $data = mysql_query($sql) or die (mysql_errno().' - '.mysql_error());
    
    $regvar = mysql_fetch_array($data);
    

?>
<!DOCTYPE html>
	<html lang="es">
		<head>
			<meta charset="utf-8"/>
			<meta http-equiv="Expires" content="0" />
            <meta http-equiv="Pragma" content="no-cache" />
			<title>Calificación Preguntas de Rapport</title>
			<link rel="shortcut icon" href="favicon.ico"/>
			<link rel="stylesheet" href="califica_rapport.css"/>
			<link rel="stylesheet" href="normalize.css"/>
			<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
			<link rel="stylesheet" href="css/start/jquery-ui-1.9.1.custom.css"/>

			<script src="js/modernizr-2.5.3.min.js"></script>
			<script scr="js/bootstrap/bootstrap.min.js"></script>
			<script src="js/jquery-1.7.1.min.js"></script>
			<script src="js/jquery-ui/jquery-ui-1.9.1.custom.min.js"></script>
			<script src="js/prefixfree.min.js"></script>

			<script>
				$(function(){
					$('#dialog').dialog({
						autoOpen: true,
						width: 400,
						show: 'clip',
						hide: 'puff',
						buttons: [
						{
							text: "OK",
							click: function(){
								$(location).attr('href','examen_formacion.php');
							}
						},
						{
							text: "Cancelar",
							click: function(){
								$(this).dialog('close');
							}
						}
						]
					});
				});
			</script>

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

			<section>

				<div id="cuerpo">

					<?Php

					$numPregs = 10; //Numero maximo de Preguntas por Item a Evaluar

					    //Condicionales Ternarios de Respuestas Recibidas
					    $preg[0] = (isset($_POST['preg1']) ? $_POST['preg1']  :NULL);
					    $preg[] = (isset($_POST['preg2']) ? $_POST['preg2'] : NULL);
					    $preg[] = (isset($_POST['preg3']) ? $_POST['preg3'] : NULL);
					    $preg[] = (isset($_POST['preg4']) ? $_POST['preg4'] : NULL);
					    $preg[] = (isset($_POST['preg5']) ? $_POST['preg5'] : NULL);
					    $preg[] = (isset($_POST['preg6']) ? $_POST['preg6'] : NULL);
					    $preg[] = (isset($_POST['preg7']) ? $_POST['preg7'] : NULL);
					    $preg[] = (isset($_POST['preg8']) ? $_POST['preg8'] : NULL);
					    $preg[] = (isset($_POST['preg9']) ? $_POST['preg9'] : NULL);
					    $preg[] = (isset($_POST['preg10']) ? $_POST['preg10'] : NULL);
					    
					    $respDada[0] = (isset($_POST['0']) ? $_POST['0'] : NULL);
					    $respDada[] = (isset($_POST['1']) ? $_POST['1'] : NULL);
					    $respDada[] = (isset($_POST['2']) ? $_POST['2'] : NULL);
					    $respDada[] = (isset($_POST['3']) ? $_POST['3'] : NULL);
					    $respDada[] = (isset($_POST['4']) ? $_POST['4'] : NULL);
					    $respDada[] = (isset($_POST['5']) ? $_POST['5'] : NULL);
					    $respDada[] = (isset($_POST['6']) ? $_POST['6'] : NULL);
					    $respDada[] = (isset($_POST['7']) ? $_POST['7'] : NULL);
					    $respDada[] = (isset($_POST['8']) ? $_POST['8'] : NULL);
					    $respDada[] = (isset($_POST['9']) ? $_POST['9'] : NULL);
					    $usuario = (isset($_POST['user']) ? $_POST['user'] : NULL);
					    
					    $consulta = mysql_query("SELECT nombres from usuarios_encuesta WHERE nombres = '$usuario",$conexionsspi);
					    
					    //Ciclo de verificación de Respuestas dadas    
					    for ($cju=0;$cju<count($preg);$cju++){
					        $consulta = mysql_query("SELECT id_resp_rapport FROM corresponde_rapport WHERE id_rapport = '$preg[$cju]' AND sipi = '1'",$conexionsspi);
					        $idres = mysql_result($consulta,0,'id_resp_rapport');
					        $consulta = mysql_query("SELECT resp_rapport FROM resp_rapport WHERE id_resp_rapport = '$idres'",$conexionsspi);
					        $respuestidirijilla = mysql_result($consulta,0,'resp_rapport');
					        if ($respDada[$cju] == $respuestidirijilla) $calif+=1;
					    }

					    //Actualizacion de los Registros de Calificación y Presentación de la Prueba
					    $actu = mysql_query("UPDATE usuarios_encuesta SET calif_rapport = '$calif' WHERE cedula = '$id' AND id_eval = '$identificador'",$conexionsspi);
					    mysql_close($conexionsspi);

					    if ($actu > 0){

					    	 $message = '<div class="ui-widget">
					                        <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
					                        <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
					                        <strong>Calificación Registrada Exitosamente!!!</strong> Presione OK para continuar...</p>
					                        </div>        
					                    </div>        
					        ';

						}else{

						     $message = '<div class="ui-widget">
					                        <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
					                        <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
					                        <strong>Atención!!!:</strong> Calificación "NO" procesada!!! Solicite Soporte llame al 0261-3000171 Dpto. Sistemas.</p>
					                        </div>
					                    </div>
					        ';
					    }
					?>

				</div>

				<a href="examen_formacion.php"><img src="imagenes/continuar.png" width="151px" height="77px" alt="continuar" id="continuar" title="Continuar con las Preguntas de Formación" /></a>

				<div id="dialog" title="Notificación">

					<span id="alert"><?Php echo $message;?></span>

				</div>

			</section>

		</body>

	</html>