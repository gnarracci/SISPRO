<?Php
// Omitir errores
ini_set("display_errors", false);

//Conexion a la Base de Datos SSPI
include("conexionsspi.php");

//Incluyo el archivo de sesion 
include("sesion.php");

//Librerias EZ
require_once 'libs/ez_sql_core.php';
require_once 'libs/ez_sql_mysql.php';

//Incluyo Libreria de Paginacion
require_once 'libs/Zebra_Pagination.php';

	//Conexion para extraer listado de Solicitantes
	$conn = new ezSQL_mysql('root', '', 'sspi');

	//Total de registros de la tabla res_curricular
	$total_aplicantes = $conn -> get_var('SELECT count(*) FROM res_curricular');

	//Numero de registros a mostrar
	$resultados = 9;

	$paginacion = new Zebra_Pagination();

	$paginacion -> records($total_aplicantes);

	$paginacion -> records_per_page($resultados);

	//Obtencion de los registros de la Base de Datos
	$aplicantes = $conn -> get_results('SELECT * FROM res_curricular');

//Incluyo Archivo Paginador de Areas Profesionales
include("listar_areas.php");

//Incluyo Archivo Paginador de Jornadas de Trabajo
include("listar_jornadas.php");

//Script para crear la tabla de perfiles de puestos
include("listar_perfiles.php");

//Consulta de Jornadas Laborales
$worktime = mysql_query("SELECT tipo_puestotrab FROM tipo_puesto ORDER BY tipo_puestotrab ASC", $conexionsspi);
if (mysql_num_rows($worktime) == 0){
	$mensaje_1 = "No hay Jornadas de Trabajo Registradas en el Sistema!!!";
	mysql_close($conexionsspi);
	exit();
}
//Consulta de Áreas Profesionales
$skills = mysql_query("SELECT area_profesional FROM area_profesional ORDER BY area_profesional ASC", $conexionsspi);
if (mysql_num_rows($skills) == 0){
	$mensaje_2 = "No hay Áreas Profesionales Registradas en el Sistema!!!";
	mysql_close($conexionsspi);
	exit();
}
//Consulta de Áreas Profesionales para Perfiles
$habil = mysql_query("SELECT area_profesional FROM area_profesional ORDER BY area_profesional ASC", $conexionsspi);
if (mysql_num_rows($habil) == 0){
	$mensaje_3 = "No hay Áreas Profesionales Registradas en el Sistema!!!";
	mysql_close($conexionsspi);
	exit();
}
//Consulta para listar Puestos de Trabajo
$puesto_trabajo = mysql_query("SELECT nombre_puesto FROM puesto_trabajo ORDER BY nombre_puesto ASC", $conexionsspi);
if (mysql_num_rows($puesto_trabajo) == 0){
	$mensaje_6 = "No hay Puestos de Trabajo Registrados en el Sistema!!!";
	mysql_close($conexionsspi);
	exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Creación de Perfiles según Parámetros</title>
	<link rel="shortcut icon" href="favicon.ico"/>
	<link rel="stylesheet" href="profile.css"/>
	<link rel="stylesheet" href="engine1/style.css"/>
	<link rel="stylesheet" href="normalize.css"/>
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/south-street/jquery-ui-1.9.0.custom.css"/>
	
	<script src="js/modernizr-2.5.3.min.js"></script>
	<script src="engine1/jquery.js"></script>
	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/prefixfree.min.js"></script>
	<script scr="js/bootstrap/bootstrap.min.js"></script>
	<script src="js/jquery-ui/jquery-ui-1.9.0.custom.min.js"></script>
	<script src="js/jquery.validationEngine.js"></script>
	<script src="js/jquery.validationEngine-es.js"></script>
	<script src="js/modalwindows/main-view-area.js"></script>
	<script src="js/modalwindows/main-view-jornada.js"></script>
	<script src="js/modalwindows/main-view-solicitantes.js"></script>
	<script src="js/modalwindows/main-view-perfiles.js"></script>

	<script>
			function modaldeploy(_value)	{
			document.getElementById("bgmodal_area").style.visibility=_value;
			}
	</script>

	<script>
			function modaldeploy2(_value)	{
			document.getElementById("bgmodal_jornada").style.visibility=_value;
			}
	</script>

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

		<!-- Agregar Áreas Profesionales (Ventana Modal) -->

			<div id="bgmodal_area">

				<div id="bg_area">

					<a href="javascript:modaldeploy('hidden')"><img src="imagenes/closebutton.png" width="37px" height="37px" alt="btn close" title="Cerrar Ventana" class="close"/></a>
					<img src="imagenes/bgmodal_area.png" width="350px" height="200px" al="bgventanmodal" class="bgmodal" />

						<form id="agr_area" name="agr_area" method="post" action="agregar_area.php">

							<span id="informacion">Añadir Nueva Área Profesional</span>

							<input id="area_profesional" name="area_profesional" type="text" placeholder="Añadir Área" autocomplete="on" class="validate[required,custom[onlyLetterSp]] text-input" />

							<button id="new_area" class="btn btn-success" type="submit">Guardar</button>

							<button id="eraser" class="btn btn-success" type="reset">Borrar</button>

						</form>

				</div>

			</div>

		<!-- Agregar Jornadas Laborales (Ventana Modal) -->

			<div id="bgmodal_jornada">

				<div id="bg_jornada">

					<a href="javascript:modaldeploy2('hidden')"><img src="imagenes/closebutton.png" width="37px" height="37px" alt="btn close" title="Cerrar Ventana" class="close"/></a>
					<img src="imagenes/bgmodal_jornada.png" width="350px" height="200px" al="bgventanmodal" class="bgmodal" />

						<form id="agr_jornada" name="agr_jornada" method="post" action="agregar_jornada.php">

							<span id="information">Añadir Nueva Jornada Laboral</span>

							<input id="tipo_puestotrab" name="tipo_puestotrab" type="text" placeholder="Añadir Jornada" autocomplete="on" class="validate[required,custom[onlyLetterSp]] text-input" />

							<button id="new_area" class="btn btn-success" type="submit">Guardar</button>

							<button id="borrar" class="btn btn-success" type="reset">Borrar</button>

						</form>

				</div>

			</div>

		<hgroup>

			<section class="tabs">

				<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
				<label for="tab-1" class="tab-label-1">Solicitantes</label>

				<input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
				<label for="tab-2" class="tab-label-2">Puestos</label>

				<input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
				<label for="tab-3" class="tab-label-3">Áreas</label>

				<input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" />
				<label for="tab-4" class="tab-label-4">Perfiles</label>

				<div class="clear-shadow"></div>

				<div class="content">

					<div class="content-1"> <!-- SOLICITANTES -->

						<h2>"Solicitantes No Registrados"</h2>

						<p class="list">Listado de Solicitantes sin Evaluar y Perfiles</p>

						<img src="imagenes/tabbg1.png" width="257px" height="310px" alt="bg" id="bg1" />

						<div id="solicitantes-anim" title="Listado de Solicitantes por Evaluar"> 

						<table id="tab" class="table table-striped table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th>Cédula</th>
									<th>Nombres</th>
									<th>Apellidos</th>
									<th>Edad</th>
									<th>Sexo</th>
									<th>Nacionalidad</th>
								</tr>
							</thead>

							<tbody>
								<?Php foreach ($aplicantes as $solicitante): ?>
								<tr>
									<td><?Php echo $solicitante -> cedula; ?></td>
									<td><?Php echo $solicitante -> nombres; ?></td>
									<td><?php echo $solicitante -> apellidos; ?></td>
									<td><?Php echo $solicitante -> edad; ?></td>
									<td><?Php echo $solicitante -> sexo; ?></td>
									<td><?Php echo $solicitante -> paises; ?></td>
								</tr>
								<?Php endforeach ?>
							</tbody>

						</table>

						</div>

						<div id="noeval"></div>

							<button class="a_demo_nine" id="ver-solicitantes" type="submit">Ver Solicitantes</button>

							<span id="notice-2">Lista de Solicitantes no Evaluados</span>											

						<!-- Perfiles Cargados al Sistema -->

						<div id="perfiles-anim" title="Perfiles Cargados en el Sistema">

							<table id="listaperfiles" class="table table-striped table-bordered table-hover table-condensed">

								<thead>
									<tr>
										<th>Id</th>
										<th>Área Profesional</th>
										<th>Puesto</th>
										<th>Descripción</th>
										<th>Porcentaje</th>
									</tr>
								</thead>

								<tbody>
									<?php echo $perfil_puesto; ?>
								</tbody>

							</table>

						</div>

						<div id="profil"></div>
					
							<button class="a_demo_ten" id="ver-perfiles" type="submit">Ver Perfiles</button>

							<span id="notice-3">Lista de Perfiles Registrados por Puesto</span>						

					</div>

					<div class="content-2"> <!-- PUESTOS DE TRABAJO -->

						<h2>Puestos de Trabajo</h2>

						<p class="list">"Configurar Puesto de Trabajo"</p>

						<img src="imagenes/tabbg.png" width="288px" height="300px" alt="bg" id="bg" />

						<form id="formulario" name="form1" method="post" action="puesto.php">

							<span id="puesto">Nombre del Puesto:</span>
							<input tabindex="1" id="job" name="job" type="text" maxlenght="30" size="30" autocomplete="on" />

							<span id="max">Máximo Número de Solicitudes:</span>
							<input tabindex="2" id="apply" name="apply" type="text" maxlenght="3" size="3" autocomplete="on" />

							<span id="notas">Descripción:</span>
							<input tabindex="3" id="note" name="note" type="text" maxlenght="90" size="90" autocomplete="on" />

							<span id="tipopuesto">Tipo de Jornada del Puesto:</span>
							<select tabindex="4" id="jornada" name="jornada">
								<option>Seleccione Jornada</option>
								<?Php 
									while ($fila=mysql_fetch_array($worktime)){
										echo "<option value='".$fila["tipo_puestotrab"]."'>".$fila["tipo_puestotrab"]."</option>";
									}
									mysql_close($conexionsspi);
								?>

							</select>

							<span id="ap">Área Profesional o Técnica:</span>
							<select tabindex="5" id="areaprof" name="areaprof">
								<option>Seleccione Área</option>
								<?Php
									while ($row=mysql_fetch_array($skills)){
										echo "<option value='".$row["area_profesional"]."'>".$row["area_profesional"]."</option>";
									}
									mysql_close($conexionsspi);
								?>
								
							</select>

							<button class="a_demo_one" type="submit">Registrar</button>

							<button class="a_demo_two" type="reset">Borrar</button>

						</form>			

					</div>					

					<div class="content-3"> <!-- AREAS PROFESIONALES Y JORNADAS -->

						<h2>Áreas Profesionales y Jornadas</h2>

						<p class="list">"Gestionar Áreas Profesionales y Jornadas Laborales"</p>

						<img src="imagenes/tabbg1.png" width="257px" height="310px" alt="bg" id="bg1" /> 

							<!--Boton de Llamada a Ventana Modal de Areas-->

							<a href="javascript:modaldeploy('visible');"><button class="a_demo_five" id="nuevaarea" type="submit">Agregar Área</button></a>

							<!-- Ventana Modal de Visualización de Áreas Profesionales -->
							
							<div id="area-anim" title="Áreas Profesionales del Sistema">

							<table id="listaareas" class="table table-striped table-bordered table-hover table-condensed">
								<thead>
									<tr>
										<th>Id</th>
										<th>Área Profesional</th>
									</tr>
								</thead>
								
								<tbody>
									<?Php echo $areas_profesionales;?>
								</tbody>
							
							</table>
							
							</div>

							<span id="notice">Áreas Profesionales Registradas en el Sistema: <?Php echo $num_registros;?></span>

							<button class="a_demo_seven" id="ver-areas" type="submit">Ver Áreas</button>
							

							<!-- Boton de Llamada a Venta Modal de Jornadas -->

							<a href="javascript:modaldeploy2('visible');"><button class="a_demo_six" id="nuevajornada" type="submit">Agregar Jornada</button></a>
							
							<!-- Venta Modal de Visualizacion de Jornadas de Trabajo del Sistema -->

							<div id="jornada-anim" title="Jornadas de Trabajo del Sistema">

								<table id="listajornadas" class="table table-striped table-bordered table-hover table-condensed">
								<thead>
									<tr>
										<th>Id</th>
										<th>Jornadas</th>
									</tr>
								</thead>
								
								<tbody>
									<?Php echo $jornadas_trab;?>
								</tbody>
								
							</table>

							</div>

							<span id="notice-1">Jornadas de Trabajo Registradas en el Sistema: <?Php echo $num_reg;?></span>

							<button class="a_demo_eight" id="ver-jornadas" type="submit">Ver Jornadas</button>


					</div>					

					<div class="content-4"> <!-- PERFILES -->

						<h2>Perfiles</h2>

						<p class="list">"Crear y Administrar Perfiles de Empleo"</p>

						<img src="imagenes/tabbg.png" width="288px" height="300px" alt="bg" id="bg" />

						<form id="formulario4" name="form4" method="post" action="createprofile.php">

							<span id="add">Añadir Área Profesional:</span>
							<select tabindex="" id="adding" name="adding">
								<option>Seleccione Área</option>
								<?Php
									while ($area=mysql_fetch_array($habil)){
										echo "<option value='".$area["area_profesional"]."'>".$area["area_profesional"]."</option>";
									}
									mysql_close($conexionsspi);
								?>

							</select>

							<span id="descri">Descripción de Habilidad:</span>
							<input tabindex="" id="description" name="description" type="text" maxlenght="100" size="100" autocomplete="on" />

							<span id="areasol">Nombre del Puesto:</span>
							<select tabindex="" id="puest" name="puest">
								<option>Seleccione Puesto</option>
								<?Php
								    while ($placework=mysql_fetch_array($puesto_trabajo)){
								    	echo "<option value='".$placework["nombre_puesto"]."'>".$placework["nombre_puesto"]."</option>";
								    }
                                    mysql_close($conexionsspi);
								?>

							</select>

							<span id="percent">Porcentaje:</span>
							<input tabindex="" id="ammount" name="ammount" type="text" maxlenght="5" size="5" autocomplete="on" />
							<span id="ext">%</span>

							<button class="a_demo_three" type="submit">Agregar</button>

							<button class="a_demo_four" type="reset">Borrar</button>

						</form>					

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