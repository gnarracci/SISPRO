<?Php
//Incluyo el archivo de sesion 
include("sesion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Consultas de Perfiles según Parámetros</title>
	<link rel="shortcut icon" href="favicon.ico"/>
	<link rel="stylesheet" href="recruitlist.css"/>
	<link rel="stylesheet" href="engine1/style.css"/>
	<link rel="stylesheet" href="normalize.css"/>
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
	
	<script src="js/modernizr-2.5.3.min.js"></script>
	<script src="engine1/jquery.js"></script>
	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/prefixfree.min.js"></script>
	<script scr="js/bootstrap/bootstrap.min.js"></script>
	<script src="js/jquery-validation/dist/jquery.validate.min.js"></script>
	<script src="js/jquery-validation/lib/jquery.metadata.js"></script>
	<script src="js/jquery-validation/localization/messages_es.js"></script>
		
</head>
<body>

<header>

	<div id="contenedor">

		<a href="#"><img src="imagenes/logo.png" width="355px" height="73px" alt="logo" class="logo" title="http://www.transcoal.com.ve" /></a>
		<a href="#"><img src="imagenes/logo2.png" width="157px" height="54px" alt="logo2" class="logo2" title="SISPRO" /></a>
	</div>
	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
	<li><img src="data1/images/img024.jpg" alt="Operaciones TCV" title="Operaciones TCV" id="wows0"/></li>
	<li><img src="data1/images/img1.jpg" alt="Operaciones Palmarejo" title="Operaciones Palmarejo" id="wows1"/></li>
	<li><img src="data1/images/img2.jpg" alt="Operaciones Palmarejo" title="Operaciones Palmarejo" id="wows2"/></li>
	<li><img src="data1/images/img3.jpg" alt="Operaciones Palmarejo" title="Operaciones Palmarejo" id="wows3"/></li>
	<li><img src="data1/images/img4.jpg" alt="Operaciones Palmarejo" title="Operaciones Palmarejo" id="wows4"/></li>
	<li><img src="data1/images/img5.jpg" alt="Operaciones Palmarejo" title="Operaciones Palmarejo" id="wows5"/></li>
	<li><img src="data1/images/img6.jpg" alt="Operaciones Palmarejo" title="Operaciones Palmarejo" id="wows6"/></li>
	<li><img src="data1/images/img7.jpg" alt="Operaciones Palmarejo" title="Operaciones Palmarejo" id="wows7"/></li>
	<li><img src="data1/images/img8.jpg" alt="Operaciones Palmarejo" title="Operaciones Palmarejo" id="wows8"/></li>
	<li><img src="data1/images/img9.jpg" alt="Operaciones Palmarejo" title="Operaciones Palmarejo" id="wows9"/></li>
	<li><img src="data1/images/img010.jpg" alt="Operaciones Palmarejo" title="Operaciones Palmarejo" id="wows10"/></li>
	<li><img src="data1/images/img011.jpg" alt="Operaciones Palmarejo" title="Operaciones Palmarejo" id="wows11"/></li>
	<li><img src="data1/images/img012.jpg" alt="Operaciones de Embarque de Carbón Lago de Maracaibo" title="Operaciones de Embarque de Carbón Lago de Maracaibo" id="wows12"/></li>
	<li><img src="data1/images/img013.jpg" alt="Operaciones de Embarque Lago de Maracaibo" title="Operaciones de Embarque Lago de Maracaibo" id="wows13"/></li>
	<li><img src="data1/images/img014.jpg" alt="Operaciones Palmarejo Cribado" title="Operaciones Palmarejo Cribado" id="wows14"/></li>
	<li><img src="data1/images/img015.jpg" alt="Operaciones Palmarejo Cribado" title="Operaciones Palmarejo Cribado" id="wows15"/></li>
	<li><img src="data1/images/img016.jpg" alt="Operaciones Palmarejo Cribado" title="Operaciones Palmarejo Cribado" id="wows16"/></li>
	<li><img src="data1/images/img017.jpg" alt="Entrada Muelle Carbonero El Bajo San Francisco Edo. Zulia" title="Entrada Muelle Carbonero El Bajo San Francisco Edo. Zulia" id="wows17"/></li>
	<li><img src="data1/images/img018.jpg" alt="Criba Palmarejo" title="Criba Palmarejo" id="wows18"/></li>
	<li><img src="data1/images/img019.jpg" alt="D9 en Operaciones" title="D9 en Operaciones" id="wows19"/></li>
	<li><img src="data1/images/img020.jpg" alt="Vista Buque Carbonero Krania en el Lago de Maracaibo" title="Vista Buque Carbonero Krania en el Lago de Maracaibo" id="wows20"/></li>
	<li><img src="data1/images/img021.jpg" alt="Remolcador Cap. Jack" title="Remolcador Cap. Jack" id="wows21"/></li>
	<li><img src="data1/images/img022.jpg" alt="Operaciones" title="Operaciones" id="wows22"/></li>
	<li><img src="data1/images/img023.jpg" alt="D9 en Operaciones en Muelle Carbonero El Bajo" title="D9 en Operaciones en Muelle Carbonero El Bajo" id="wows23"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
	<a href="#" title="Operaciones TCV"><img src="data1/tooltips/img024.jpg" alt="Operaciones TCV"/>1</a>
	<a href="#" title="Operaciones Palmarejo"><img src="data1/tooltips/img1.jpg" alt="Operaciones Palmarejo"/>2</a>
	<a href="#" title="Operaciones Palmarejo"><img src="data1/tooltips/img2.jpg" alt="Operaciones Palmarejo"/>3</a>
	<a href="#" title="Operaciones Palmarejo"><img src="data1/tooltips/img3.jpg" alt="Operaciones Palmarejo"/>4</a>
	<a href="#" title="Operaciones Palmarejo"><img src="data1/tooltips/img4.jpg" alt="Operaciones Palmarejo"/>5</a>
	<a href="#" title="Operaciones Palmarejo"><img src="data1/tooltips/img5.jpg" alt="Operaciones Palmarejo"/>6</a>
	<a href="#" title="Operaciones Palmarejo"><img src="data1/tooltips/img6.jpg" alt="Operaciones Palmarejo"/>7</a>
	<a href="#" title="Operaciones Palmarejo"><img src="data1/tooltips/img7.jpg" alt="Operaciones Palmarejo"/>8</a>
	<a href="#" title="Operaciones Palmarejo"><img src="data1/tooltips/img8.jpg" alt="Operaciones Palmarejo"/>9</a>
	<a href="#" title="Operaciones Palmarejo"><img src="data1/tooltips/img9.jpg" alt="Operaciones Palmarejo"/>10</a>
	<a href="#" title="Operaciones Palmarejo"><img src="data1/tooltips/img010.jpg" alt="Operaciones Palmarejo"/>11</a>
	<a href="#" title="Operaciones Palmarejo"><img src="data1/tooltips/img011.jpg" alt="Operaciones Palmarejo"/>12</a>
	<a href="#" title="Operaciones de Embarque de Carbón Lago de Maracaibo"><img src="data1/tooltips/img012.jpg" alt="Operaciones de Embarque de Carbón Lago de Maracaibo"/>13</a>
	<a href="#" title="Operaciones de Embarque Lago de Maracaibo"><img src="data1/tooltips/img013.jpg" alt="Operaciones de Embarque Lago de Maracaibo"/>14</a>
	<a href="#" title="Operaciones Palmarejo Cribado"><img src="data1/tooltips/img014.jpg" alt="Operaciones Palmarejo Cribado"/>15</a>
	<a href="#" title="Operaciones Palmarejo Cribado"><img src="data1/tooltips/img015.jpg" alt="Operaciones Palmarejo Cribado"/>16</a>
	<a href="#" title="Operaciones Palmarejo Cribado"><img src="data1/tooltips/img016.jpg" alt="Operaciones Palmarejo Cribado"/>17</a>
	<a href="#" title="Entrada Muelle Carbonero El Bajo San Francisco Edo. Zulia"><img src="data1/tooltips/img017.jpg" alt="Entrada Muelle Carbonero El Bajo San Francisco Edo. Zulia"/>18</a>
	<a href="#" title="Criba Palmarejo"><img src="data1/tooltips/img018.jpg" alt="Criba Palmarejo"/>19</a>
	<a href="#" title="D9 en Operaciones"><img src="data1/tooltips/img019.jpg" alt="D9 en Operaciones"/>20</a>
	<a href="#" title="Vista Buque Carbonero Krania en el Lago de Maracaibo"><img src="data1/tooltips/img020.jpg" alt="Vista Buque Carbonero Krania en el Lago de Maracaibo"/>21</a>
	<a href="#" title="Remolcador Cap. Jack"><img src="data1/tooltips/img021.jpg" alt="Remolcador Cap. Jack"/>22</a>
	<a href="#" title="Operaciones"><img src="data1/tooltips/img022.jpg" alt="Operaciones"/>23</a>
	<a href="#" title="D9 en Operaciones en Muelle Carbonero El Bajo"><img src="data1/tooltips/img023.jpg" alt="D9 en Operaciones en Muelle Carbonero El Bajo"/>24</a>
	</div></div>
	<a class="wsl" href="http://wowslider.com">Javascript Photo Gallery Download by WOWSlider.com v2.1</a>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->

</header>

	<span id="session" class="usersession"> <?Php echo "Usuario: ".$_SESSION["$valid_user"];?> </span>

	<a href="recruit.php"><img src="imagenes/retorno.png" height="61px" width="159px" id="float" /></a>

	<a href="cerrar_sesion.php"><img src="imagenes/cerrar.png" height="64px" weight="158px" id="cerrar" /></a>

	<div id="cuerpo">

		<hgroup>

			<section class="tabs">

				<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
		        <label for="tab-1" class="tab-label-1">Agentes</label>

		        <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
		        <label for="tab-2" class="tab-label-2">Parámetros</label>

		        <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
		        <label for="tab-3" class="tab-label-3">Puestos</label>

		        <input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" />
		        <label for="tab-4" class="tab-label-4">Otros</label>

		        <div class="clear-shadow"></div>

		        <div class="content">

		        	<div class="content-1">

		        		<h2>Reportes del Agente Evaluador</h2>

		        	</div>

		        	<div class="content-2">

		        		<h2>Reportes de Configuraciones</h2>

		        	</div>

		        	<div class="content-3">

		        		<h2>Reportes de Puestos y Vacantes</h2>

		        	</div>

		        	<div class="content-4">

		        		<h2>Otros Reportes</h2>

		        	</div>

		        </div>

			</section>
		
		</hgroup>

	</div>

	<footer>
		<div id="enlaces">
			<div id="LOT">
				<h3>Ley del Trabajo y Contrato Colectivo TCV</h3>
					<ul class="leyes">
						<li><a href="#">Ley Organica del Trabajo</a><img src="imagenes/lineaDiv.png" width="267px" height="2px" alt="" class="footerDiv"/></li>
						<li><a href="#">Contrato Colectivo TCV</a><img src="imagenes/lineaDiv.png" width="267px" height="2px" alt="" class="footerDiv"/></li>
					</ul>
			</div>
			<div id="direccion">
				<ul class="sedes">
					<a href="#"><img src="imagenes/tcvsedes.png" width="516px" height="77px" alt="tcvsedes" class="sedes" /></a>
				</ul>
		</div>

		<div id="pie">

			<div id="footerpie">

				<hr class="lineafooter" />

					<ul id="underfooter">

						<li><a href="#">INICIO<span>|</span></a></li>			
						<li><a href="#">SOMOS TRANS COAL<span>|</span></a></li>
						<li><a href="#">NUESTRO CARBÓN<span>|</span></a></li>
						<li><a href="#">CONTACTO</a></li>
										
					</ul>

			</div>

		</div>		
	</footer>
</body>
</html>