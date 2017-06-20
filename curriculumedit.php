<?php
//Conexion a la Base de Datos SISPROCNF
include("conexion.php");
//Incluyo el archivo de sesion 
include("session.php");
//Incluyo verificador de saludo horario
include("schedule.php");


?>
<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Bienvenido al Sistema de Encuestas de Pre-Empleo</title>
		<link rel="shortcut icon" href="favicon.ico"/>
		<link rel="stylesheet" href="curriculumedit.css"/>
		<link rel="stylesheet" href="engine2/style.css"/>
		<link rel="stylesheet" href="normalize.css"/>
		<link rel="stylesheet" href="css/overcast/jquery-ui-1.8.23.custom.css"/>
	
		<script src="js/modernizr-2.5.3.min.js"></script>
		<script src="engine2/jquery.js"></script>
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/jquery.scrollTo.js"></script>
		<script src="js/jquery.nav.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/prefixfree.min.js"></script>
		<script src="js/runonload.js"></script>
		<script src="js/form1.js"></script>
		
	</head>

	<body>
	
		<header>

			<div id="contenedor">

				<a href="#"><img src="imagenes/logosurvey.png" width="442px" height="106px" alt="logo" title="www.transcoal.com.ve" class="logo"/></a>
				<a href="#"><img src="imagenes/sisprosurvey.png" width="88px" height="94px" alt="logo sispro" title="SISPRO" class="logo2"/></a>

				<div id="img">

					<img src="imagenes/resumencur.png" width="960px" height="300px" alt="logo resumen" title="Resumen Curricular" class="resumen"/>

				</div>

				<p id="nombre">

					<?Php echo $greeting.$_SESSION["$usuario_valido"];?>

				</p>

			</div>


		</header>
		
		<div id="cuerpo">

			<hgroup>
			
				<div id="container">

					<form id="formulario" name="formulario" method="post" action="curriculum_save.php?ced= <?Php echo $_REQUEST["ced"];?>">

						<p id="titulo">RESUMEN CURRICULAR</p>

						<table id="tabla" align="center" width="700px" border="1">

							<tr>

								<td><div align="left">Nombres</div></td>

								<td><label>

									

								</label></td>

							</tr>

						</table>

					</form>						

				</div>

			</hgroup>			

		</div>

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

							<p class="copyright">Derechos Reservados © 2012 Trans Coal de Venezuela,C.A. - San Francisco - Venezuela<span>|</span> <span> Diseño y Código:Departamento de Sistemas TCV</span></p>				

						</ul>

				</div>

			</div>

		</footer>

	</body>
</html>
