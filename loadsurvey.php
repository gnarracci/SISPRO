<?Php
//Incluyo el archivo de sesion 
include("sesion.php");

//Conexion a la BD
include("conexionsspi.php");

//Script para Armar la Tabla de Puestos de Trabajo
include("listar_puestos.php");

//Listado de Vacantes Disponibles
include("listar_vacantes.php");

//Listado de Perfiles
include("listar_perfiles.php");

//Consulta de Puestos de Trabajo
$vacantes = mysql_query("SELECT nombre_puesto,max_solicitudes FROM puesto_trabajo ORDER BY nombre_puesto ASC",$conexionsspi);
if (mysql_num_rows($vacantes) == 0){
	$mensaje = "No hay Registros";
	mysql_close($conexionsspi);
	exit;
}

$assigment = mysql_query("SELECT nombre_puesto FROM puesto_trabajo ORDER BY nombre_puesto ASC",$conexionsspi);
if (mysql_num_rows($assigment) == 0){
	$mensaje_2 = "No hay Registros";
	mysql_close($conexionsspi);
	exit;
}

$puestos_trab = mysql_query("SELECT nombre_puesto FROM puesto_trabajo ORDER BY nombre_puesto ASC",$conexionsspi);
if (mysql_num_rows($puestos_trab) == 0){
	$mensaje_1 = "No hay Registros";
	mysql_close($conexionsspi);
	exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Configuración de Encuesta Web</title>
	<link rel="shortcut icon" href="favicon.ico"/>
	<link rel="stylesheet" href="loadsurvey.css"/>
	<link rel="stylesheet" href="engine1/style.css"/>
	<link rel="stylesheet" href="normalize.css"/>
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/start/jquery-ui-1.9.1.custom.css"/>
	
	<script src="js/modernizr-2.5.3.min.js"></script>
	<script src="engine1/jquery.js"></script>
	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/jquery-ui/jquery-ui-1.9.1.custom.min.js"></script>
	<script src="js/prefixfree.min.js"></script>
	<script scr="js/bootstrap/bootstrap.min.js"></script>
	<script src="js/modalwindows/main-view-puestos.js"></script>
	<script src="js/modalwindows/main-view-vacantes.js"></script>
	<script src="js/modalwindows/main-view-vacantes-2.js"></script>
	<script src="js/modalwindows/main-view-perfil.js"></script>	
	
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
		        <label for="tab-1" class="tab-label-1">Puestos</label>
		
	            <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
		        <label for="tab-2" class="tab-label-2">Requerimientos</label>
		
	            <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
		        <label for="tab-3" class="tab-label-3">Asignación</label>
			
	            <input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" />
		        <label for="tab-4" class="tab-label-4">Cuestionarios</label>

		        <div class="clear-shadow"></div>

		        <div class="content">

		        	<!-- Listar Puestos de Trabajo y Agregar Vacantes -->

		        	<div class="content-1">
		        		<h2>Puestos de Trabajo</h2>

		        		<p id="notice">Visualizar Puestos de Trabajo y Vacantes</p>

		        		<img src="imagenes/tabbg1.png" width="257px" height="310px" alt="bg" id="bg1" />

		        		<div id="puestos-anim" title="Puestos de Trabajo Cargados">

			        		<table id="tab" class="table table-striped table-bordered table-hover table-condensed">

			        			<thead>
			        				<tr>
			        					<th>Nombre Puesto</th>
			        					<th>Descripción</th>
			        					<th>Máx. Sol. Permitidas</th>
			        				</tr>
			        			</thead>

			        			<tbody>
			        				<?Php echo $disponibles; ?>
			        			</tbody>

			        		</table>

		        		</div>

		        		<div id="is"></div>

		        		<button id="ver-puestos" class="a_demo_one" type="submit">Ver Puestos</button>

		        		<span id="aviso">Puestos Cargados al Sistema</span>

		        		<!-- Visualizacion de Vacantes -->

		        		<div id="vacantes-anim" title="Vacantes Disponibles en el Sistema">

		        			<table id="listavacantes" class="table table-striped table-bordered table-hover table-condensed">
		        				<thead>
		        					<tr>
		        						<th>Puesto</th>
		        						<th>Puestos Requeridos</th>
		        						<th>Status</th>
		        					</tr>
		        				</thead>

		        				<tbody>
		        					<?Php echo $listavacantes; ?>
		        				</tbody>
		        			</table>

		        		</div>

		        		<!-- Visualizar Vacantes Disponibles en el Sistema -->

		        		<span id="aviso-2">Vacantes Disponibles</span>

		        		<button id="ver-vacantes" class="a_demo_two">Ver Vacantes</button>		        		

		        		<!-- Ingreso de Vacantes de Trabajo en el Sistema -->

		        		<div id="is-2"></div>

		        		<p id="notice-2">Ingresar Vacantes Disponibles para Encuestas</p>

		        		<form id="formulario_vacantes" name="formulario_vacantes" method="post" action="agregar_vacante.php">

		        		<span id="selpuesto">Seleccione el Puesto</span>
		        			<select tabindex="1" id="select_puesto" name="select_puesto">
		        				<option>Seleccione Puesto</option>
		        				<?Php
		        					while ($row = mysql_fetch_array($vacantes)){
		        						echo "<option value='".$row["nombre_puesto"]."','".$row["max_solicitudes"]."'>".$row["nombre_puesto"].",".$row["max_solicitudes"]."</option>";
		        					}
		        					mysql_close($conexionsspi);
		        				?>
		        			</select>

		        		<span id="vacantes">Vacantes</span>

		        			<input tabindex="2" id="num_vacante" name="num_vacante" type="text" maxlenght="5" size="5" autocomplete="on" />

		        		<span id="selstatus">Status Vacante</span>
		        			<select tabindex="3" id="select_status" name="select_status">
		        				<option selected disabled></option>
		        				<option value="Disponible">Disponible</option>
		        				<option value="No Disponible">No Disponible</option>
		        			</select>

		        			<button id="agr-vacante" class="a_demo_two" type="submit">Agregar Vacante</button>

		        			<button id="rst-vacante" class="a_demo_two" type="reset">Borrar</button> 

		        		</form>

		        	</div>

		        	<div class="content-2">
		        		<h2>Asignación Requerimientos</h2>

		        		<p id="notice-3">Configuración de Porcentajes por Área a Evaluar</p>

		        		<img src="imagenes/bg2.png" width="483px" height="368px" alt="bg2" id="bg2" />

		        		<form id="formrequerimientos" name="formrequerimientos" method="post" action="requerimientos.php">

		        			<!-- Selector de Puesto de Trabajo -->

			        		<span id="selpuest">Seleccione el Puesto</span>
			        			<select tabindex="1" id="sele_puesto" name="sele_puesto">
			        				<option value="">Seleccione Puesto</option>
			        				<?Php
			        					while ($fila = mysql_fetch_array($puestos_trab)){
			        						echo "<option value='".$fila["nombre_puesto"]."'>".$fila["nombre_puesto"]."</option>";
			        					}
			        					mysql_close($conexionsspi);
			        				?>

			        			</select>

			        			<div id="bgd"></div>

			        			<div id="quarter"></div>

			        			<!-- Selectores de Porcentaje de Requerimientos por Area a Evaluar -->

			        			<!-- Rapport -->

			        			<div id="is-rapp"></div>

			        			<span id="rapp">Rapport</span>		        			

			        			<div id="is-box"></div>

			        			<input tabindex="1" id="rapport-req" name="rapport-req" type="text" autocomplete="on" placeholder="Porcentaje" />

			        			<span id="porcent">%</span>

			        			<!-- Formacion -->

			        			<div id="is-form"></div>

			        			<span id="form">Formación</span>

			        			<div id="is-box-2"></div>

			        			<input tabindex="2" id="formacion-req" name="formacion-req" type="text" autocomplete="on" placeholder="Porcentaje" />

			        			<span id="porcent-2">%</span>

			        			<!-- Condiciones Personales -->

			        			<div id="is-cond"></div>

			        			<span id="cond">Cond. Personales</span>

			        			<div id="is-box-3"></div>

			        			<input tabindex="3" id="condiciones-req" name="condiciones-req" type="text" autocomplete="on" placeholder="Porcentaje" />

			        			<span id="porcent-3">%</span>

			        			<!-- Perfil Profesional -->

			        			<div id="is-perfil"></div>

			        			<span id="perfilprof">Perfil Profesional</span>

			        			<div id="is-box-4"></div>

			        			<input tabindex="4" id="perfil-req" name="perfil-req" type="text" autocomplete="on" placeholder="Porcentaje" />

			        			<span id="porcent-4">%</span>

			        			<button id="registrar" class="a_demo_one" type="submit">Registrar</button>

			        			<button id="clear" class="a_demo_one" type="reset">Borrar</button>

		        		</form>

		        	</div>

		        	<div class="content-3">
		        		<h2>Asignación de Cuestionario</h2>

		        		<p id="notice-4">Asignación de Perfiles según Puesto</p>

		        		<!-- Tabla de Vacantes Disponibles en el Sistema -->

		        		<div id="vacantes-anim-1" title="Vacantes Disponibles en el Sistema">

		        			<table id="listavacantes-1" class="table table-striped table-bordered table-hover table-condensed">
		        				<thead>
		        					<tr>
		        						<th>Puesto</th>
		        						<th>Puestos Requeridos</th>
		        						<th>Status</th>
		        					</tr>
		        				</thead>

		        				<tbody>
		        					<?Php echo $listavacantes; ?>
		        				</tbody>
		        			</table>

		        		</div>

		        		<!-- Visualizar Vacantes Disponibles -->

		        		<button id="ver-vacantes-1" class="a_demo_three">Visualizar Vacantes</button>

		        		<!-- Tabla de Visualizacion de Perfiles cargados al Sistema -->

		        		<div id="perfil-anim" title="Perfiles cargados en el Sistema">

		        			<table id="listaperfiles" class="table table-striped table-bordered table-hover table-condensed">
		        				<thead>
		        					<tr>
		        						<th>Id.</th>
		        						<th>Área Profesional</th>
		        						<th>Puesto</th>
		        						<th>Descripción</th>
		        						<th>(%)</th>
		        					</tr>
		        				</thead>

		        				<tbody>
		        					<?Php echo $perfil_puesto; ?>
		        				</tbody>

		        			</table>

		        		</div>

		        		<!-- Visualizar Perfiles cargados al Sistema -->

		        		<button id="ver-profile" class="a_demo_three">Visualizar Perfiles</button>

		        		<div id="is-4"></div>

		        		<!-- Crear un Cuestionario de Evaluación -->

		        		<p id="notice-6">Crear un Cuestionario</p>

		        		<div id="is-6" title="Cree un cuestionario de Evaluación aquí"></div>

		        		<span id="crear">Configurar Cuestionario</span>

		        		<a href="corresponde.php"><button id="correspondencia" class="a_demo_three">Tabla de Correspondencia</button></a>

		        		<img src="imagenes/brand.png" width="311px" height="333px" alt="marca" title="Sistema de Información basado en Agentes Inteligentes para los
		        		Procesos Operativos del Departamento de Recursos Humanos de Trans Coal de Venezuela, C.A." id="brand" />		        	

		        	</div>

		        	<div class="content-4">
		        		<h2>Cuestionarios</h2>

		        		<p id="notice-5">Áreas de Evaluación</p>

		        		<img src="imagenes/bg4.png" width="479px" height="360px" alt="bg4" id="bg4" />

		        		<!-- Configuracion de Preguntas de Rapport, Formacion, Condiciones Personales y Perfil Profesional -->

		        		<div id="is-3"></div>

		        		<a href="cuestionario_set_rapport.php"><img src="imagenes/btn-rapport.png" width="185px" height="107px" alt="rapport" title="Preguntas de Rapport" id="rapport" /></a>

		        		<a href="cuestionario_set_formacion.php"><img src="imagenes/btn-formacion.png" width="185px" height="107px" alt="formacion" title="Preguntas de Formación" id="formacion" /></a>

		        		<a href="cuestionario_set_condiciones.php"><img src="imagenes/btn-condpers.png" width="185px" height="107px" alt="condiciones" title="Preguntas de Condiciones Personales" id="condicion" /></a>

		        		<a href="cuestionario_set_profesional.php"><img src="imagenes/btn-perfilprof.png" width="185px" height="107px" alt="perfil" title="Preguntas de Perfil Profesional" id="perfil" /></a>

		        		<img src="imagenes/setup.png" width="135px" height="155px" alt="setup" id="setup" />

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