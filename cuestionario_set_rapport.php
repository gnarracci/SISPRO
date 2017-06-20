<?Php
//Incluye archivo de sesion
include('sesion.php');

//Conexion a la Base de Datos
include("conexionsspi.php");

//Incluye Conexion a BD OOP y Funcion de Armado de Tabla
include("include/mainFunction.inc.php");


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

//Consulta para Listar Puestos de Trabajo
$puesto_trab = mysql_query("SELECT nombre_puesto FROM puesto_trabajo ORDER BY nombre_puesto ASC",$conexionsspi);
if (mysql_num_rows($puesto_trab) == 0){
	$mensaje = "No hay Registros";
	mysql_close($conexionsspi);
	exit();
}

?>

<!DOCTYPE html>
	<html lang="es">
		<head>
			<meta charset="utf-8"/>
			<title>Configuración de Preguntas de Rapport</title>
			<link rel="shortcut icon" href="favicon.ico"/>
            <link rel="stylesheet" href="cuestionario_set_rapport.css"/>
            <link rel="stylesheet" href="normalize.css"/>
            <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
            <link rel="stylesheet" href="css/start/jquery-ui-1.9.1.custom.css"/>

            <script src="js/modernizr-2.5.3.min.js"></script>
			<script src="engine1/jquery.js"></script>
			<script src="js/jquery-1.7.1.min.js"></script>
			<script src="js/jquery-ui/jquery-ui-1.9.1.custom.min.js"></script>
			<script src="js/prefixfree.min.js"></script>
			<script scr="js/bootstrap/bootstrap.min.js"></script>
			<script src="js/modalwindows/mainFormRapport.js"></script>

			<script src="js/jquery-validation/dist/jquery.validate.min.js"></script>
			<script src="js/jquery-validation/lib/jquery.metadata.js"></script>
			<script src="js/jquery-validation/localization/messages_es.js"></script>			

		</head>

		<body>

			<a href="loadsurvey.php"><img src="imagenes/regresar-cues.png" height="68px" width="175px" id="float" title="Regresar"/></a>

			<header>

				<img src="imagenes/cuestionarios.png" width="960px" height="200px" alt="cuestionariobg" id="cuestionariohd" />

			</header>

			<div id="is"></div>

			<span id="marq">Configuración de la Encuesta de Evaluación</span>

			<div id="is-1"></div>

			<!-- Configuracion del Cuestionario segun Habilidades -->

			<div id="is-2"></div>

			<span id="rapport">Preguntas de Rapport</span>

			<div id="is-3"></div>

			<div id="is-4"></div>

			<!-- Formulario de Carga de Preguntas de Rapport-->

			<div class="hide" id="agregarPerfil" title="Agregar Pregunta de Rapport">

				<form action="" method="post" id="formProfesional" name="formProfesional">

					<fieldset id="ocultos">

						<input type="hidden" id="accion" name="accion" class="{required:true}"/>

						<input type="hidden" id="id_rapport" name="id_rapport" class="{required:true}" />

					</fieldset>

					<fieldset id="datosProfesionales">

						<p>Puesto de Trabajo a Aplicar</p>
						<span></span>
						<select tabindex="1" id="puesto_trabajo" name="puesto_trabajo" class="{required:true} span3">
					        <option value="">Seleccione Puesto</option>
					        	<?Php
					        		while ($row = mysql_fetch_array($puesto_trab)){
					        			echo "<option value='".$row["nombre_puesto"]."'>".$row["nombre_puesto"]."</option>";
					        			}
					        			mysql_close($conexionsspi);
					        	?>

					    </select>

					    <p>Pregunta de Rapport</p>
					    <span></span>
					    <input type="text" tabindex="2" id="pregunta_rapport" name="pregunta_rapport" placeholder="Ingrese Pregunta" class="{required:true} span3"/>

					    <p>Tipo Respuesta</p>
					    <span></span>
					    <select tabindex="3" id="respuesta_rapport" name="respuesta_rapport" class="{required:true} span3">
					    	<option value="">Seleccione Tipo</option>
					    	<option value="1">Respuesta de Selección Multiple</option>
					    	<option value="2">Respuesta de Texto Abierta</option>

					    </select>

					    <p>Valor Pregunta (Porcentaje)</p>
					    <span></span>
					    <input type="text" tabindex="4" id="pregunta_pctaje" name="pregunta_pctaje" placeholder="%" style="text-align:center;width:25px;" class="{required:true} span3"/>

					    <fieldset id="botonera" style="text-align:center;">

					    	<input type="submit" id="agregar" class="btn btn-primary" value="Agregar Pregunta"/>

					    </fieldset>

					    <fieldset id="ajaxLoader" class="ajaxLoader">

					    	<img src="imagenes/default-loader.gif"/>
					    	<span>Espere un Momento...</span>

					    </fieldset>			    

			    </form>

			</div>

			<button id="save" class="a_demo_one" type="submit">Añadir Preguntas al Perfil</button>

			<a href="respuestas_rapport.php"><button id="answers" class="a_demo_one" type="submit">Configurar Respuestas</button></a>

			    <!-- Wrapper de Preguntas Almacenadas en el Sistema -->

				<div id="wrapper">

					<section id="content">

						<div id="rapportQuestions">

							<table id="listQuestions" class="table table-striped table-bordered table-hover table-condensed">

								<thead>
									<tr>
										<th>Puesto a Aplicar</th>
										<th>Pregunta de Rapport</th>
										<th>Tipo Respuesta</th>
										<th>(%)</th>
										<th>Editar</th>
									</tr>
								</thead>

								<tbody id="listaPreguntasOK">
									<?Php echo $consultaQuestions; ?>
								</tbody>

							</table>

						</div>

					</section>

				</div>		   

			<footer>

            </footer>

		</body>
	</html>