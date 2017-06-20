<?Php 
//Conexion a la Base de Datos DPNMWIN
include("conexioncnf.php");

$nacion = mysql_query("SELECT * FROM pai_pais ORDER BY PAI_NOMBRE ASC",$conexioncnf);
if(mysql_num_rows($nacion)==0)
	$mensaje = "No se han definido Paises en el Sistema!!!";

?>

<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Bienvenido al Sistema de Encuestas de Pre-Empleo</title>
		<link rel="shortcut icon" href="favicon.ico"/>
		<link rel="stylesheet" href="survey.css"/>
		<link rel="stylesheet" href="engine2/style.css"/>
		<link rel="stylesheet" href="normalize.css"/>
		<link rel="stylesheet" href="css/validationEngine.jquery.css"/>
		<link rel="stylesheet" href="css/redmond/jquery-ui-1.8.20.custom.css"/>
	
		<script src="js/modernizr-2.5.3.min.js"></script>
		<script src="engine2/jquery.js"></script>
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/jquery.validationEngine.js"></script>
		<script src="js/jquery.validationEngine-es.js"></script>
		<script src="js/prefixfree.min.js"></script>
		<script src="js/runonload.js"></script>
		<script language="JavaScript1.2" src="js/sha1.js"></script>
		
		<script>
			function modaldeploy(_value)	{
			document.getElementById("bgmodalsurvey").style.visibility=_value;
			}
		</script>

		<script language="Javascript">
			function ec()
				{

					if(document.getElementById('clave').value == document.getElementById('reclave').value)
					{
				  		document.getElementById('clave').value = hex_sha1(document.getElementById('clave').value);
						document.getElementById('reclave').value = "";
						return true;
					}
					else
					{
						alert('Las claves no coinciden');
						return false;
					}
				}

		</script>

		<script language="JavaScript">
			function eq()
				{
				  	document.getElementById('clave1').value = hex_sha1(document.getElementById('clave1').value);
				}
		</script>

		<script>
			jQuery(function($){
			$.datepicker.regional['es'] = {
				closeText: 'Cerrar',
				prevText: '&#x3c;Ant',
				nextText: 'Sig&#x3e;',
				currentText: 'Hoy',
				monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
				'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
				'Jul','Ago','Sep','Oct','Nov','Dic'],
				dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
				dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
				dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
				weekHeader: 'Sm',
				dateFormat: 'yy/mm/dd',
				firstDay: 1,
				isRTL: false,
				changeMonth: true,
				changeYear: true,
				showMonthAfterYear: true,
				yearSuffix: ''};
			$.datepicker.setDefaults($.datepicker.regional['es']);
			});    

        $(document).ready(function() {
           $("#datepicker").datepicker();
        });

       </script>

       <script>
       		jQuery(document).ready(function(){
				jQuery("#formulario,formulario2").validationEngine();
			});
       </script>

       <script>
       		runOnLoad(function(){
  				$("input#usuario1").select().focus();
			});
       </script>
       
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

		<div id="bgmodalsurvey">

			<div id="bgsurvey">

				<a href="javascript:modaldeploy('hidden')"><img src="imagenes/closebutton.png" width="37px" height="37px" alt="btn close" title="Cerrar Ventana" class="close"/></a>
				<img src="imagenes/registrosurvey.png" width="800px" height="550px" alt="backgroundmodal" class="bgmodal" />

				<form id="formulario" name="form" method="post" action="login.php">

					<p>

						<label for="cedula">Cédula de Identidad</label>
						<input tabindex="1" id="cedula" name="cedula" type="text" minlenght="7" maxlenght="12" size="12" class="validate[required,minSize[7],custom[onlyNumberSp]] text-input" placeholder="Cédula" autocomplete="on" />

					</p>

					<p>

						<label for="nombres">Nombres</label>
						<input tabindex="2" id="nombres" name="nombres" type="text" minlenght="10" maxlenght="30" size="30" class="validate[required,custom[onlyLetterSp]] text-input" placeholder="Nombres" autocomplete="on" />

					</p>

					<p>

						<label for="apellidos">Apellidos</label>
						<input tabindex="3" id="apellidos" name="apellidos" type="text" minlenght="10" maxlenght="30" size="30" class="validate[required,custom[onlyLetterSp]] text-input" placeholder="Apellidos" autocomplete="on" />

					</p>

					<p>

						<label for="nacionalidad">Nacionalidad</label>
						<select tabindex="4" name="nacionalidad" id="nacionalidad" class="validate[required,custom[onlyLetterSp]] text-input">
            				<option> --- </option>
            					<?Php
           							 while ($rows=mysql_fetch_array($nacion))
									{
									echo "<option value='". $rows["PAI_NOMBRE"] ."'>". $rows["PAI_NOMBRE"] ."</option>";
									}
									mysql_close($conexion);
            					?>
          				</select>
          				<span id="mensaje1"><?Php echo $mensaje; ?></span>

					</p>

					<p>

						<label for="fchnac">Fecha de Nacimiento</label>
						<input tabindex="5" id="datepicker" name="date" type="text" maxlenght="10" size="12" class="validate[required,custom[date]]" placeholder="AAAA/MM/DD" autocomplete="off" />

					</p>

					<p>

						<label for="direccion">Dirección</label>
						<textarea tabindex="6" id="direccion" name="direccion" type="text" maxlenght="60" style="width:400px;height:35px;" class="validate[required] text-input" placeholder="Dirección de Residencia" autocomplete="on" ></textarea>

					</p>

					<p>
						<label for="email">Correo Electrónico</label>
						<input tabindex="7" id="email" name="email" type="text" minlenght="11" maxlenght="30" size="25" class="validate[custom[email]]" placeholder="Email" autocomplete="on" />

					</p>

					<p>

						<label for="usuario">Usuario</label>
						<input tabindex="8" id="usuario" name="usuario" type="text" minlenght="6" maxlenght="12" size="10" class="validate[custom[user]]" placeholder="Usuario" autocomplete="on" />

					</p>

					<p>

						<label for="clave">Contraseña</label>
						<input tabindex="9" id="clave" name="clave" type="password" minlenght="4" maxlenght="8" size="20" class="validate[required] text-input" placeholder="Contraseña" autocomplete="off" />

					</p>

					<p>

						<label for="reclave">Repita Contraseña</label>
						<input tabindex="10" id="reclave" name="reclave" type="password" minlenght="4" maxlenght="8" size="20" placeholder="Repita Contraseña" autocomplete="off" />

					</p>

					<p id="submit">

						<button class="reguser" type="submit" onclick="return ec();">Registre su Usuario</button>

					</p>

					<p id="reset">

						<button class="resetbutton" type="reset">Borrar Campos</button>

					</p>

				</form>

			</div>

		</div>

		<hgroup>

			<img src="imagenes/marquesina.png" width="925px" height="46px" alt="marquesina" class="marq" />
			<span id="welc">Bienvenido al Sistema de Encuestas Laborales</span>

			<img src="imagenes/marquesina2.png" width="927px" height="42px" alt="marquesina2" class="marq2" />
			<span class="enter">Inicie Sesión:</span>

			<img src="imagenes/loginbuttons.png" width="927px" height="47px" alt="Botones de Logueo" class="marq3" />

			<p id="desc">
				"Ingrese su Resumén Curricular y complete nuestra encuesta laboral, nuestro sistema junto a nuestro
				personal de Talento Humano determinara si reúne los requisitos para las vacantes disponibles, luego
				será contactado para una entrevista presencial". Suerte!!!
			</p>

			<form id="formulario2" name="form2" method="post" action="autentication.php" onsubmit="eq()" >

					<p>

						<input tabindex="1" id="usuario1" name="usuario1" type="text" maxlenght="20" minlenght="4" size="25" class="validate[required,custom[user]]" placeholder="Usuario" autocomplete="on" />

					</p>

					<p>

						<input tabindex="2" id="clave1" name="clave1" type="password" maxlenght="12" minlenght="6" size="14" class="validate[required] text-input" placeholder="Contraseña" autocomplete="off" />

					</p>


					<p id="submit1">
							
						<button class="loginbutton" type="submit">Ingrese Aquí!!!</button>
							
					</p>
							
					<p id="reset1">
							
						<button class="resetbutton1" type="reset">Borrar Campos</button>
														
					</p>

					<p>
							
						<span class="forget"><a href="#">Olvido su Contraseña?</a></span>

					</p>

			</form>

			<img src="imagenes/trans.png" width="253px" height="33" id="rem" alt="logo" />

			<a href="javascript:modaldeploy('visible');"><img src="imagenes/register.png" width="277px" height="385px" alt="Registro" id="registro" title="Registro de Usuario (ACTIVO)" /></a>

			<a href="#"><img src="imagenes/curriculumdes.png" width="281px" height="385px" alt="Curriculum" id="curriculum" title="Resumén Curricular (DESABILITADO)" /></a>

			<a href="#"><img src="imagenes/encuestalabdes.png" width="282px" height="385px" alt="Encuesta Laboral" id="encuesta" title="Encuesta Laboral (DESABILITADA)" /></a>

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
