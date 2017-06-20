<?php
//Incluyo el archivo de sesion 
include("session.php");
//Incluyo verificador de saludo horario
include("schedule.php");
//Usuario en nmaspirantes
include("inter_usuario.php");
//Script verificador de CV
include("verificador.php");

?>

<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Bienvenido al Sistema de Encuestas de Pre-Empleo</title>
		<link rel="shortcut icon" href="favicon.ico"/>
		<link rel="stylesheet" href="surveyus.css"/>
		<link rel="stylesheet" href="engine2/style.css"/>
		<link rel="stylesheet" href="normalize.css"/>
			
		<script src="js/modernizr-2.5.3.min.js"></script>
		<script src="engine2/jquery.js"></script>
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/prefixfree.min.js"></script>
		<script src="js/runonload.js"></script>
		
	</head>

	<body>

		<header>

			<div id="contenedor">

				<a href="#"><img src="imagenes/logosurvey.png" width="442px" height="106px" alt="logo" title="www.transcoal.com.ve" class="logo"/></a>
				<a href="#"><img src="imagenes/sisprosurvey.png" width="88px" height="94px" alt="logo sispro" title="SISPRO" class="logo2"/></a>

			</div>

			<!-- Start WOWSlider.com BODY section -->
			<div id="wowslider-container1">
			<div class="ws_images"><ul>
					<li><img src="data1/images/cuadro4.jpg" alt="Apilamiento de Carbón" title="Apilamiento de Carbón" id="wows0"/></li>
					<li><img src="data1/images/cuadro1.jpg" alt="Operaciones de Embarque" title="Operaciones de Embarque" id="wows1"/></li>
					<li><img src="data1/images/cuadro2.jpg" alt="Operaciones de Embarque" title="Operaciones de Embarque" id="wows2"/></li>
					<li><img src="data1/images/cuadro3.jpg" alt="Operaciones de Apilamiento" title="Operaciones de Apilamiento" id="wows3"/></li>
					</ul></div>
					<div class="ws_bullets"><div>
					<a href="#" title="Apilamiento de Carbón"><img src="data1/tooltips/cuadro4.jpg" alt="Apilamiento de Carbón"/>1</a>
					<a href="#" title="Operaciones de Embarque"><img src="data1/tooltips/cuadro1.jpg" alt="Operaciones de Embarque"/>2</a>
					<a href="#" title="Operaciones de Embarque"><img src="data1/tooltips/cuadro2.jpg" alt="Operaciones de Embarque"/>3</a>
					<a href="#" title="Operaciones de Apilamiento"><img src="data1/tooltips/cuadro3.jpg" alt="Operaciones de Apilamiento"/>4</a>
					</div></div>
					<a class="wsl" href="http://wowslider.com">Javascript Photo Gallery Download by WOWSlider.com v2.1</a>
			</div>
			<script type="text/javascript" src="engine1/wowslider.js"></script>
			<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->	

		</header>

		<hgroup>

			<img src="imagenes/marquesina.png" width="925px" height="46px" alt="marquesina" class="marq" />
			<span id="welc">Bienvenido al Sistema de Encuestas Laborales</span>

			<img src="imagenes/marquesina2.png" width="927px" height="42px" alt="marquesina2" class="marq2" />
			<span id="us"><?Php echo $greeting.$name ." !!!";?></span>

			<p id="cerrar">

				<a href="close_session.php"><button class="close_session" type="submit">Cerrar Sesion</button></a>

			<p>

			<img src="imagenes/loginbuttons.png" width="927px" height="47px" alt="Botones de Logueo" class="marq3" />

			<p id="desc">
				"Ingrese su Resumén Curricular y complete nuestra encuesta laboral, nuestro sistema junto a nuestro
				personal de Talento Humano determinara si reúne los requisitos para las vacantes disponibles, luego
				será contactado para una entrevista presencial". Suerte!!!
			</p>

			<!-- Mensaje del Verificador -->

			<span id="mens"><?Php echo $name." ".$mens; ?></span>			

			<a href="#"><img src="imagenes/registerdes.png" width="277px" height="385px" alt="Registro" id="registro" title="Registro de Usuario (DESABILITADO)" /></a>

			<a href="curriculum.php"><img src="imagenes/curriculum.png" width="281px" height="385px" alt="Curriculum" id="curriculum" title="Resumén Curricular (ACTIVO) Editar" /></a>

			<a href="pre-encuesta.php"><img src="imagenes/encuestalab.png" width="282px" height="385px" alt="Encuesta Laboral" id="encuesta" title="Encuesta Laboral (ACTIVA)" /></a>

			<img src="imagenes/links.png" width="927px" height="124px" alt="links" id="enlaces" />

		</hgroup>

		<footer>

			<div id="footerconteiner">

				<a href="http://www.minpptrass.gob.ve"><img src="imagenes/mintra.png" width="165px" height="75px" alt="Ministerio del Trabajo" id="mintra" title="Ministerio del Trabajo" /></a>

				<a href="http://www.inpsasel.gob.ve"><img src="imagenes/inpsasel.png" width="99px" height="98px" alt="Inpsasel" id="inpsasel" title="Instituto Nacional de Prevención, Salud y Seguridad Laborales" /></a>

				<a href="http://www.ivss.gob.ve"><img src="imagenes/ivss.png" width="88px" height="88px" alt="IVSS" id="ivss" title="Instituto Venezolano de los Seguros Sociales" /></a>

				<a href="http://www.banavih.gob.ve"><img src="imagenes/banavih.png" width="121px" height="88px" alt="Banavih" id="bana" title="Banco Nacional de la Vivienda y Habitat" /></a>

				<a href="http://www.inces.gob.ve"><img src="imagenes/inces.png" width="100px" height="88px" alt="INCES" id="inces" title="Instituto Nacional de Capacitacion Educativa Socialista" /></a>

				<div id="footercon">

					<hr class="lineafooter" />

						<ul id="links">

							<li><a href="#">INICIO<span>|</span></a></li>			
							<li><a href="#">SOMOS TRANS COAL<span>|</span></a></li>
							<li><a href="#">NUESTRO CARBÓN<span>|</span></a></li>
							<li><a href="#">CONTACTO</a></li>

							<p class="copyright">Derechos Reservados © <?Php echo date("Y"); ?> Trans Coal de Venezuela,C.A. - San Francisco - Venezuela<span>|</span> <span> Diseño y Código:Departamento de Sistemas TCV</span></p>				

						</ul>

				</div>

			</div>

		</footer>

	</body>
</html>
