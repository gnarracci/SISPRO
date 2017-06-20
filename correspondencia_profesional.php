<?Php 
//Sesión de Usuario
include("sesion.php");

//Lista de Relacion Preguntas y Respuestas
include("listar_rel_profesional.php");

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
include('include/mainListAnswersProfesional.php');

if($errorDbConexion == false){
	//Manda a llamar la función para mostrar la lista de Preguntas
		$consultaAnswers = consultaResponse($mysqli);
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
		<title>Tabla de Correspondecia Preguntas/Respuestas de Perfil Profesional</title>
		<link rel="shortcut icon" href="favicon.ico"/>
		<link rel="stylesheet" href="correspondencia_profesional.css"/>
		<link rel="stylesheet" href="normalize.css"/>
		<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/south-street/jquery-ui-1.9.0.custom.css"/>

		<script src="js/modernizr-2.5.3.min.js"></script>
		<script scr="js/bootstrap/bootstrap.min.js"></script>
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/jquery-ui/jquery-ui-1.9.1.custom.min.js"></script>
		<script src="js/prefixfree.min.js"></script>
		<script src="js/modalwindows/main-view-questions.js"></script>
		<script src="js/modalwindows/main-view-listanswers.js"></script>
		<script src="js/modalwindows/main-view-relationship.js"></script>

	</head>

	<body>

		<header>

			<a href="corresponde.php"><img src="imagenes/ritorno-3.png" width="169px" height="89px" id="float" alt="regresar" title="Regresar"/></a>

			<img src="imagenes/correspondencia.png" width="960px" height="200px" alt="correspondenciahd" id="correspondenciahd" />

		</header>

		<span id="titulo">Correspondecia Preguntas y Respuestas de Perfil Profesional</span>

		<!-- Link de Ayuda del Modulo -->

		<img src="imagenes/help.png" width="42px" height="42px" id="ayuda" title="Ingrese la Respuesta correcta relacionada con una de las tres
		respuestas posibles cargadas en formato (1) correcto (0) incorrecto, junto con la Id. de la Pregunta con las Id de la Respuesta. Para 
		mayor información consulte el manual de referencia SISPRO V1.0 2012 "/>

		<!-- Link de Documentacion del Modulo -->

		<a href="#"><img src="imagenes/documentation-3.png" width="42px" height="42px" id="doc" /></a>

		<!-- Flechas de Dirección de Relación -->

		<img src="imagenes/arrow.png" width="51px" height="51px" id="flecha" />

		<img src="imagenes/arrow.png" width="51px" height="51px" id="flecha2" />
		
		<div id="is"></div>

		<div id="is-2"></div>

		<!-- Ventana para Visualizar Preguntas -->

		<div id="lista-anim" title="Lista de Preguntas de Perfil Profesional">

			<table id="listarapport" class="table table-striped table-bordered table-hover table-condensed">
				<thead>
					<tr>
						<th>Id</th>
						<th>Pregunta Condición</th>
						<th>Tipo Respuesta</th>
						<th>Puesto</th>
						<th>Máx.(%)</th>
					</tr>
				</thead>

				<tbody>
					<?Php echo $consultaQuestions;?>
				</tbody>				

			</table>

		</div>

		<!-- Boton de Visualización de Preguntas -->

		<button type="submit" id="ver-preguntas" class="a_demo_one">Ver Preguntas</button>

		<!-- Ventana para Visualizar Respuestas -->

		<div id="listaresp" title="Lista de Respuestas de Perfil Profesional">

			<table id="listarapport" class="table table-striped table-bordered table-hover table-condensed">
				<thead>
					<tr>
						<th>Id</th>
						<th>Respuesta Condición</th>
						<th>Id. Asociado</th>
						<th>Min.(%)</th>
					</tr>
				</thead>

				<tbody>
					<?Php echo $consultaAnswers; ?>
				</tbody>

			</table>

		</div>

		<!-- Boton para Visualizar Respuestas -->

		<button type="submit" id="ver-respuestas" class="a_demo_one">Ver Respuestas</button>

		<!-- Visualizar Relaciones de Preguntas y Respuestas -->

            <div id="corresponde-anim" title="Relación de Preguntas y Respuestas de Perfil Profesional">

                <table id="listacorresponde" class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>Correcta</th>
                            <th>Id.Pregunta</th>
                            <th>Id.Respuesta</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?Php echo $listarelacion; ?>
                    </tbody>

                </table>

            </div>

            <!--Boton Visualizador -->

        	<button type="submit" id="relacion" class="a_demo_one">Ver Relaciones</button>   

		<!-- Grilla de Enlace de Preguntas y Respuestas -->

		<span id="anun">Carga de Correspondencia</span>

		<div id="is-3"></div>

		<form action="corresponde_profesional.php" id="corres_profesional" name="corres_profesional" method="post">

			<span id="sipi">Respuesta Correcta</span>

			<input type="text" id="r-1" name="r-1" tabindex="1" autocomplete="on" />

			<div id="is-4"></div>

			<span id="idp">Identificador Pregunta</span>

			<input type="text" id="r-2" name="r-2" tabindex="2" autocomplete="on" />

			<div id="is-5"></div>

			<span id="idr">Identificador Respuesta</span>

			<input type="text" id="r-3" name="r-3" tabindex="3" autocomplete="on" />

			<div id="is-6"></div>
			
			<button type="submit" id="corresponde" class="a_demo_one">Cargar Correspondencias</button>

			<button type="reset" id="reset" class="a_demo_one">Restablecer</button>

			<div id="is-7"></div>

		</form>		

		<!-- Fondo Pagina -->

		<img src="imagenes/seleccion.png" width="474px" height="273px" alt="seleccion" id="seleccion" />

		<span id="recl">Selección y Reclutamiento</span>

		<span id="dept">Departamento de Recursos Humanos</span>

		<span id="ver">SISPRO V1.0</span>

		<img src="imagenes/tcv.png" width="286px" height="39px" alt="logo" id="logo" />

	</body>

</html>