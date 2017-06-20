<?Php 
//Incluye archivo de sesion
include('sesion.php');

//Incluye archivo de Lista de Preguntas
include('include/mainListProfesional.php');

if($errorDbConexion == false){
	//Manda a llamar la función para mostrar la lista de Preguntas
		$consultaQuestions = consultaPreguntas($mysqli);
	}
	else
	{
	//Regresa Error en la Base de Datos
		$consultaQuestions = '
		<tr id="sinDatos">
			<td colspan="5" class="centerTXT">ERROR AL CONECTAR CON LA BASE DE DATOS</td>
	   	</tr>
		';
	}

//Armado de la Tabla de Respuestas
include('include/mainFuncRespProf.inc.php');

if($errorDbConexion == false){
	//Manda a llamar la función para mostrar la lista de Preguntas
		$consultaAnswers = consultaRespuestas($mysqli);
	}
	else
	{
	//Regresa Error en la Base de Datos
		$consultaRespuestas = '
		<tr id="sinDatos">
			<td colspan="5" class="centerTXT">ERROR AL CONECTAR CON LA BASE DE DATOS</td>
	   	</tr>
		';
	}



?>

<!DOCTYPE html>
	<html lang="es">
		<head>
			<meta charset="utf-8"/>
			<title>Configuración de Respuestas Profesionales</title>
			<link rel="shortcut icon" href="favicon.ico"/>
            <link rel="stylesheet" href="respuestas_profesional.css"/>
            <link rel="stylesheet" href="normalize.css"/>
            <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
            <link rel="stylesheet" href="css/south-street/jquery-ui-1.9.0.custom.css"/>

            <script src="js/modernizr-2.5.3.min.js"></script>
			<script src="engine1/jquery.js"></script>
			<script src="js/jquery-1.7.1.min.js"></script>
			<script src="js/jquery-ui/jquery-ui-1.9.1.custom.min.js"></script>
			<script src="js/prefixfree.min.js"></script>
			<script scr="js/bootstrap/bootstrap.min.js"></script>
			<script src="js/modalwindows/main-view-questions.js"></script>
			<script src="js/modalwindows/main-view-profesional.js"></script>

			<script src="js/jquery-validation/dist/jquery.validate.min.js"></script>
			<script src="js/jquery-validation/lib/jquery.metadata.js"></script>
			<script src="js/jquery-validation/localization/messages_es.js"></script>			        	

		</head>

		<body>			

			<header>

				<a href="cuestionario_set_profesional.php"><img src="imagenes/returnprofesional.png" width="129px" height="43px" id="float" alt="regresar" title="Regresar"/></a>

				<img src="imagenes/respuestascuestionario.png" width="960px" height="200px" alt="cuestionariobg" id="cuestionariohd" />

			</header>

			<div id="is"></div>

			<span id="marq">Carga de Respuestas Profesionales</span>

			<!-- Ventana para visualizar las Preguntas -->

			<div id="lista-anim" title="Preguntas Profesionales cargadas en el Sistema">

				<table id="listarapport" class="table table-striped table-bordered table-hover table-condensed">
					<thead>
						<tr>
							<th>Id</th>
							<th>Pregunta Profesional</th>
							<th>Tipo Respuesta</th>
							<th>Puesto</th>
							<th>Max.(%)</th>							
						</tr>
					</thead>

					<tbody>
						<?Php echo $consultaQuestions; ?>
					</tbody>

				</table>

			</div>

			<!-- Boton de apertura de Ventana de Lista de Preguntas -->

			<button type="submit" id="ver-preguntas" class="a_demo_one">Ver Preguntas</button>

			<!-- Carga de Respuestas de Rapport -->

			<div id="is-2"></div>

			<span id="questions">Respuestas Profesionales</span>

			<div id="is-3"></div>

			<div id="agregarRespuesta" class="hide" title="Agregar Respuesta Profesionales">

				<form action="" method="post" id="formResp" name="formResp">

					<fieldset id="ocultos">

						<input type="hidden" id="accion" name="accion" class="{required:true}"/>

						<input type="hidden" id="id_resp_profesional" name="id_resp_profesional" class="{required:true}" />

					</fieldset>

					<fieldset id="respuesta" style="text-align:center;">

						<p>Respuesta Pregunta de Perfil Profesional</p>
						<span></span>
						<input type="text" tabindex="1" id="resp_profesional" name="resp_profesional" placeholder="Ingrese Respuesta" class="{required:true} span3"/>

						<p>Id. Pregunta de Perfil Profesional a asociar</p>
						<span></span>
						<input type="text" tabindex="2" id="id_asociado" name="id_asociado" placeholder="Id?" class="{required:true} span3"/>

						<p>Porcentaje Mínimo</p>
						<span></span>
						<input type="text" tabindex="3" id="pctaje_minimo" name="pctaje_minimo" placeholder="%" class="{required:true} span3"/>

					<fieldset id="botonera" style="text-align:center;">

						<input type="submit" id="agregar" class="btn btn-success" value="Ingrese Respuesta"/>

					</fieldset>

					<fieldset id="ajaxLoader" class="ajaxLoader hide">

					    <img src="imagenes/default-loader.gif"/>
					    <span>Espere un Momento...</span>

					</fieldset>		

				</form>

			</div>

			<!-- Boton de Ingreso de Respuestas -->

			<button type="submit" id="save" class="a_demo_one">Añadir Respuesta</button>

			<!-- Wrapper de Respuestas almacenadas en el Sistema -->

			<div id="wrapper">

				<section id="content">

					<div id="answerstab">

						<table id="listAnswers" class="table table-striped table-bordered table-hover table-condensed">

							<thead>
								<tr>
									<th>Respuesta Profesional</th>
									<th>Id.Asociado</th>
									<th>Min.(%)</th>
									<th>Editar</th>
								</tr>
							</thead>

							<tbody id="listaRespuestasOK">
								<?Php echo $consultaAnswers; ?>
							</tbody>

						</table>

					</div>

				</section>

			</div>

			<footer>

            </footer>

		</body>
	</html>