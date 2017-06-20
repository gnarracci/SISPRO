<?php
//Conexion a la Base de Datos
include("conexionsspi.php");
//Incluyo el archivo de sesion 
include("session.php");
//Incluyo verificador de saludo horario
include("schedule.php");
//Usuario en nmaspirantes
include("inter_usuario.php")
?>
<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Bienvenido al Sistema de Encuestas de Pre-Empleo</title>
		<link rel="shortcut icon" href="favicon.ico"/>
		<link rel="stylesheet" href="curriculum.css"/>
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
				
		<!-- Scroll by Div -->
		
		<script>
			$(document).ready(function() {
				$('#nav').onePageNav({
				begin: function() {
				console.log('start')
				},
				end: function() {
				console.log('stop')
				}
			});
  		</script>

  		<!-- Datepicker -->

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
				showMonthAfterYear: false,
				yearSuffix: ''};
			$.datepicker.setDefaults($.datepicker.regional['es']);
			});    

        $(document).ready(function() {
           $("#datepicker").datepicker();
        });

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
				showMonthAfterYear: false,
				yearSuffix: ''};
			$.datepicker.setDefaults($.datepicker.regional['es']);
			});    

        $(document).ready(function() {
           $("#datepicker1").datepicker();
        });

       	</script>

       <!-- Initial focus tab -->

       <script>
       		runOnLoad(function(){
  				$("input#nombres").select().focus();
			});
       </script>

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

					<?Php echo $greeting.$name;?>

				</p>

			</div>


		</header>
		
		<div id="cuerpo">

			<hgroup>
			
				<ul id="nav">

					
					<li class="current"><a href="#">Menú / Inicio</a></li>
					<li><a href="#section-1">Datos Personales</a></li>
					<li><a href="#section-2">Presentación</a></li>
					<li><a href="#section-3">Preferencias Salariales</a></li>
					<li><a href="#section-4">Experiencias Laborales</a></li>
					<li><a href="#section-5">Estudios</a></li>
					<li><a href="#section-6">Idiomas</a></li>
					<li><a href="#section-7">Informática</a></li>
					<li><a href="#section-8">Conocimientos Adicionales</a></li>
					<li><a href="#section-9">Referencias</a></li>
					<li><a href="surveyus.php">Regresar</a></li>
					<li><a href="close_session.php">Salir</a></li>

				</ul>

				<div id="container">

					<img src="imagenes/datos.png" width="113px" height="178px" alt="datos" id="personal" />

					<img src="imagenes/money.png" width="102px" height="72px" alt="money" id="money" />

					<img src="imagenes/trabajadores.png" width="158px" height="131px" alt="trabajadores" id="workers" />

					<img src="imagenes/estudiantes.png" width="171px" height="132px" alt="estudiantes" id="students" />
					
					<form id="formulario" name="form1" method="post" action="datos.php">

						<div class="section" id="section-1">
																	
							<div id="formulario1">

								<fieldset>
								
								<legend>DATOS PERSONALES</legend>

								<p>

									<label for="nombres">Nombres</label>
									<input tabindex="1" id="nombres" name="nombres" type="text" maxlenght="20" size="25" class="validate[required,custom[onlyLetterSp]] text-input" placeholder="Nombres" autocomplete="on" value="<?Php echo $name;?>"/>

								</p>

								<p>

									<label for="apellidos">Apellidos</label>
									<input tabindex="2" id="apellidos" name="apellidos" type="text" maxlenght="20" size="25" class="validate[required,custom[onlyLetterSp]] text-input" placeholder="Apellidos" autocomplete="on" value="<?Php echo $surname;?>" /> 

								</p>

								<p>

									<label for="edad">Edad</label>
									<input tabindex="3" id="edad" name="edad" type="text" maxlenght="3" size="3" class="validate[required,custom[onlyNumberSp]] text-input" placeholder="Edad" autocomplete="on" />

								</p>
								
								<p>
								
									<label for="sexo">Sexo</label>
									<select tabindex="4" id="sexo" name="sexo" >
										<option value=" --- "> --- </option>
										<option value="Masculino">Masculino</option>
										<option value="Femenino">Femenino
									</select>
								
								</p>
								
								<p>
								
									<label for="estado_civi">Estado Civil</label>
									<select tabindex="5" id="estado_civil" name="estado_civil">
										<option value=" --- "> --- </option>
										<option value="Soltero">Soltero(a)</option>
										<option value="Casado">Casado(a)</option>
										<option value="Concubinato">Concubinato</option>
										<option value="Otro">Otro</option>								
									</select>
								
								</p>
								
								<p>

									<label for="cedula">Cédula de Identidad</label>
									<input tabindex="6" id="cedula" name="cedula" type="text" minlenght="7" maxlenght="12" size="12" class="validate[required,minSize[7],custom[onlyNumberSp]] text-input" placeholder="Cédula" autocomplete="on" value="<?Php echo $id;?>" />

								</p>
								
								<p>

									<label for="direccion">Dirección</label>
									<textarea tabindex="7" id="direccion" name="direccion" type="text" maxlenght="60" style="width:400px;height:35px;" class="validate[required] text-input" placeholder="Dirección de Residencia" autocomplete="on" ></textarea>

								</p>
								
								<p>
								
									<label for="ciudad">Ciudad</label>
									<select tabindex="8" id="ciudad" name="ciudad">
										<option value=" --- "> --- </option>
										<option value="Barcelona">Barcelona</option>
										<option value="Barinas">Barinas</option>
										<option value="Barquisimeto">Barquisimeto</option>
										<option value="Cabimas">Cabimas</option>
										<option value="Caracas">Caracas</option>
										<option value="Carora">Carora</option>
										<option value="Ciudad Bolivar">Ciudad Bolivar</option>
										<option value="Ciudad Ojeda">Ciudad Ojeda</option>
										<option value="Coro">Coro</option>
										<option value="La Fria">La Fria</option>
										<option value="Los Teques">Los Teques</option>
										<option value="Machiques">Machiques</option>
										<option value="Maracaibo">Maracaibo</option>
										<option value="Maracay">Maracay</option>
										<option value="Maturin">Maturin</option>
										<option value="Merida">Merida</option>
										<option value="Orope">Orope</option>
										<option value="Puerto La Cruz">Puerto La Cruz</option>
										<option value="San Cristobal">San Cristobal</option>
										<option value="Santa Barbara del Zulia">Santa Barbara del Zulia</option>
										<option value="Trujillo">Trujillo</option>
										<option value="Valencia">Valencia</option>
										<option value="Villa del Rosario">Villa del Rosario</option>
									</select>
								
								</p>
								
								<p>
								
									<label for="estado">Estado</label>
									<select tabindex="9" id="estado" name="estado">
										<option value=" --- "> --- </option>
										<option value="Amazonas">Amazonas</option>
										<option value="Anzoategui">Anzoategui</option>
										<option value="Apure">Apure</option>
										<option value="Aragua">Aragua</option>
										<option value="Barinas">Barinas</option>
										<option value="Bolivar">Bolivar</option>
										<option value="Carabobo">Carabobo</option>
										<option value="Cojedes">Cojedes</option>
										<option value="Distrito Capital">Distrito Capital</option>
										<option value="Delta Amacuro">Delta Amacuro</option>
										<option value="Falcon">Falcon</option>
										<option value="Guarico">Guarico</option>
										<option value="Lara">Lara</option>
										<option value="Merida">Merida</option>
										<option value="Miranda">Miranda</option>
										<option value="Monagas">Monagas</option>
										<option value="Nueva Esparta">Nueva Esparta</option>
										<option value="Portuguesa">Portuguesa</option>
										<option value="Sucre">Sucre</option>
										<option value="Tachira">Tachira</option>
										<option value="Trujillo">Trujillo</option>
										<option value="Yaracuy">Yaracuy</option>
										<option value="Vargas">Vargas</option>
										<option value="Zulia">Zulia</option>
									</select>
								
								</p>
								
								<p>
								
									<label for="paises">País</label>
									<select tabindex="10" id="paises" name="paises">
										<option value=" --- "> --- </option>
										<option value="Argentina">Argentina</option>
										<option value="Bolivia">Bolivia</option>
										<option value="Brasil">Brasil</option>
										<option value="Chile">Chile</option>
										<option value="Colombia">Colombia</option>
										<option value="Costa Rica">Costa Rica</option>
										<option value="Ecuador">Ecuador</option>
										<option value="Panama">Panama</option>
										<option value="Paraguay">Paraguay</option>
										<option value="Peru">Peru</option>
										<option value="Uruguay">Uruguay</option>
										<option value="Venezuela">Venezuela</option>
									</select>
								
								</p>
								
								<p>
								
									<label for="email">Correo Electrónico</label>
									<input tabindex="11" id="email" name="email" type="text" minlenght="11" maxlenght="30" size="25" class="validate[custom[email]]" placeholder="Email" autocomplete="on" value="<?Php echo $correo;?>" />

								</p>

								<p>

									<label for="telloc">Teléfono Local</label>
									<input tabindex="12" id="telloc" name="telloc" type="text" maxlenght="11" size="12" class="validate[required] text-input" placeholder="Habitación" autocomplete="on" />

								</p>

								<p>

									<label for="telmov">Teléfono Móvil</label>
									<input tabindex="13" id="telmov" name="telmov" type="text" maxlenght="11" size="12" class="validate[required] text-input" placeholder="Celular" autocomplete="on" />

								</p>

								</fieldset>

							</div>

						</div>
						
						<div class="section" id="section-2">
						
							<div id="formulario2">
							
								<fieldset>
								
									<legend>PRESENTACIÓN</legend>
									
									<p>
									
										<label for="presentacion">De una pequeña Introducción de si mismo, esta es la primera parte que vera el reclutador</label>
										<textarea tabindex="14" id="presentacion" name="presentacion" type="text" maxlenght="300" style="width:600px;height:200px;" class="validate[required] text-input" placeholder="Presentación/Bio" autocomplete="on"></textarea>
									
									</p>
									
								</fieldset>
							
							</div>

						</div>
						
						<div class="section" id="section-3">
						
							<div id="formulario3">
							
								<fieldset>
								
									<legend>EXPECTATIVA SALARIAL</legend>
									
									<p>
									
										<label for="salario">Expectativa Salarial</label>
										<select tabindex="15" id="salario" name="salario">
											<option value="0 -> 1500">0 -> 1500</option>
											<option value="1500 -> 2000">1500 -> 2000</option>
											<option value="2000 -> 2500">2000 -> 2500</option>
											<option value="2500 -> 3000">2500 -> 3000</option>
											<option value="3000 -> 3500">3000 -> 3500</option>
											<option value="3500 -> 4000">3500 -> 4000</option>
											<option value="4000 -> 4500">4000 -> 4500</option>
											<option value="4500 -> 5000">4500 -> 5000</option>
											<option value="5000 -> 5500">5000 -> 5500</option>
											<option value="5500 -> 6000">5500 -> 6000</option>
											<option value="6000 -> 6500">6000 -> 6500</option>
											<option value="6500 -> 7000">6500 -> 7000</option>
											<option value="7000 -> 7500">7000 -> 7500</option>
											<option value="7500 -> 8000">7500 -> 8000</option>
											<option value="8000 -> 8500">8000 -> 8500</option>
											<option value="8500 -> 9000">8500 -> 9000</option>
											<option value="9000 -> 9500">9000 -> 9500</option>
											<option value="9500 -> 10000">9500 -> 10000</option>
											<option value="Más de 10000">Más de 10000</option>
										</select>

										<span id="bs">Bs.</span>
									
									</p>

								</fieldset>
							
							</div>
							
						</div>
						
						<div class="section" id="section-4">
						
							<div id="formulario4">
							
								<fieldset>
								
									<legend>EXPERIENCIAS LABORALES</legend>

									<span id="ult">Favor Indique Último lugar de trabajo</span>
									
									<p>
									
										<label for="empresa">Empresa</label>
										<input tabindex="16" id="empresa" name="empresa" type="text" maxlenght="25" size="55" class="validate[required] text-input" placeholder="Empresa" autocomplete="on" />
									
									</p>
									
									<p id="inicio">
									
										<label for="servicio">Tiempo de Servicio</label><span id="start">Fecha de Inicio</span>
										<input tabindex="17" id="datepicker" name="date" type="text" maxlenght="10" size="12" class="validate[required,custom[date]]" placeholder="AAAA/MM/DD" autocomplete="off" />
									
									</p>
									
									<p id="final">
									
										<span id="finish">Fecha de Retiro</sapn>
										<input tabindex="18" id="datepicker1" name="date1" type="text" maxlenght="10" size="12" class="validate[required,custom[date]]" placeholder="AAAA/MM/DD" autocomplete="off" />
									
									</p>
									
								</fieldset>
														
							</div>
						
						</div>
						
						<div class="section" id="section-5">
						
							<div id="formulario5">
							
								<fieldset>
								
									<legend>ESTUDIOS</legend>
									
									<p>
									
										<label for="grado">Grado de Instrucción</label>
										<select tabindex="19" id="grado" name="grado">
											<option value=" --- "> --- </option>
											<option value="Doctorado">Doctorado</option>
											<option value="Post-Grado">Post-Grado</option>
											<option value="Ingenieria">Ingenieria</option>
											<option value="Licenciatura">Licenciatura</option>
											<option value="Tecnico Superior">Tecnico Superior</option>
											<option value="Tecnico Medio">Tecnico Medio</option>
											<option value="Bachillerato">Bachillerato</option>
											<option value="Primaria">Primaria</option>
										</select>
									
									</p>
									
									<p>
									
										<label for="titulo">Que Titulación tiene?</label>
										<input tabindex="20" id="titulo" name="titulo" type="text" maxlenght="25" class="validate[required] text-input" placeholder="Titulo" autocomplete="on" />
																		
									</p>
									
									<p>
									
										<label for="cursa">Cursa Estudios actualmente?</label>
										<input tabindex="21" id="cursa" name="cursa" type="radio" value="Si" checked><span id="si">Si</span>
										<input tabindex="22" id="cursa" name="cursa" type="radio" value="No" ><span id="no">No</span>
										
									</p>
									
									<p>
									
										<label for="uni">Universidad donde cursa estudios o se Titulo</label>
										<select tabindex="23" id="uni" name="uni">
											<option value=" --- "> --- </option>
											<option value="Universidad del Zulia">Universidad del Zulia</option>
											<option value="Universidad Rafael Belloso Chacin">Univeridad Rafael Belloso Chacin</option>
											<option value="Universidad Jose Gregorio Hernandez">Universidad Jose Gregorio Hernandez</option>
											<option value="Universidad Nacional Experimental Rafael Maria Baralt">Universidad Nacional Experimental Rafael Maria Baralt</option>
											<option value="Universidad Nacional Experimental Politecnica de las Fuerzas Armadas">Universidad Nacional Experimental Politecnica de las Fuerzas Armadas</option>
											<option value="Universidad Nacional Abierta">Universidad Nacional Abierta</option>
											<option value="Universidad Central de Venezuela">Universidad Central de Venezuela</option>
											<option value="Universidad Simon Bolivar">Universidad Simon Bolivar</option>
											<option value="Universidad de Carabobo">Universidad de Carabobo</option>
											<option value="Universidad Bicentenaria de Aragua">Universidad Bicentenaria de Aragua</option>
											<option value="Universidad Yacambu">Universidad Yacambu</option>
											<option value="Universidad de Oriente">Universidad de Oriente</option>
											<option value="Universidad de Los Andes">Universidad de Los Andes</option>
											<option value="Instituto Universitario Politecnico Santiago Mariño">Instituto Universitario Politecnico Santiago Mariño</option>
											<option value="Instituto Universitario de Tecnologia Antonio Jose de Sucre">Instituto Universitario de Tecnologia Antonio Jose de Sucre</option>
											<option value="Instituto Universitario de Tecnologia readic">Instituto Universitario de tecnologia Readic</option>
											<option value="Instituto Universitario de Educacion Especializada">Instituto Universitario de Educacion Especializada</option>
											<option value="Instituto Universitario de Tecnologia Industrial">Instituto Universitario de Tecnologia Industrial</option>
											<option value="Instituto Universitario de tecnologia Rodolfo Loero Arismendi">Instituto Universitario de Tecnologia Rodolfo Loero Arismendi</option>
											<option value="Colegio Universitario Rafael Belloso Chacin">Colegio Universitario Rafael Belloso Chacin</option>
											<option value="Colegio Universitario Monseñor de Talavera">Colegio Universitario Monseñor de Talavera</option>
											<option value="Otra">Otra</option>
										</select>
									
									</p>
									
									<p>
									
										<label for="periodo">Periodo de Estudios</label>
										<span id="de">desde</span>
										<select tabindex="24" id="desde" name="desde">
											<option value=" --- "> --- </option>
											<option value="1985">1985</option>
											<option value="1986">1986</option>
											<option value="1987">1987</option>
											<option value="1988">1988</option>
											<option value="1989">1989</option>
											<option value="1990">1990</option>
											<option value="1991">1991</option>
											<option value="1992">1992</option>
											<option value="1993">1993</option>
											<option value="1994">1994</option>
											<option value="1995">1995</option>
											<option value="1996">1996</option>
											<option value="1997">1997</option>
											<option value="1998">1998</option>
											<option value="1999">1999</option>
											<option value="2000">2000</option>
											<option value="2001">2001</option>
											<option value="2002">2002</option>
											<option value="2003">2003</option>
											<option value="2004">2004</option>
											<option value="2005">2005</option>
											<option value="2006">2006</option>
											<option value="2007">2007</option>
											<option value="2008">2008</option>
											<option value="2009">2009</option>
											<option value="2010">2010</option>
											<option value="2011">2011</option>
											<option value="2012">2012</option>
										</select>
										
										<span id="hast">hasta</span>
										<select tabindex="25" id="ha" name="ha">
											<option value=" --- "> --- </option>
											<option value="1987">1987</option>
											<option value="1988">1988</option>
											<option value="1989">1989</option>
											<option value="1990">1990</option>
											<option value="1991">1991</option>
											<option value="1992">1992</option>
											<option value="1993">1993</option>
											<option value="1994">1994</option>
											<option value="1995">1995</option>
											<option value="1996">1996</option>
											<option value="1997">1997</option>
											<option value="1998">1998</option>
											<option value="1999">1999</option>
											<option value="2000">2000</option>
											<option value="2001">2001</option>
											<option value="2002">2002</option>
											<option value="2003">2003</option>
											<option value="2004">2004</option>
											<option value="2005">2005</option>
											<option value="2006">2006</option>
											<option value="2007">2007</option>
											<option value="2008">2008</option>
											<option value="2009">2009</option>
											<option value="2010">2010</option>
											<option value="2011">2011</option>
											<option value="2012">2012</option>
											<option value="2013">2013</option>
											<option value="2014">2014</option>
											<option value="2015">2015</option>
											<option value="2016">2016</option>
										</select>
									
									</p>
										
									<p>
										
										<label for="situacion">Situación Laboral Actual</label>
										<select tabindex="26" id="situ" name="situ">
											<option value=" --- "> --- </option>
											<option value="Sin Trabajo">Sin Trabajo</option>
											<option value="Buscando el Primer Empleo">Buscando el Primer Empleo</option>
											<option value="Con trabajo Permanente">Con trabajo Permanente</option>
											<option value="Con Trabajo Temporal">Con Trabajo Temporal</option>
											<option value="Estudiante">Estudiante</option>
											<option value="Haciendo Practicas">Haciendo Practicas</option>
											<option value="Autoempleado">Autoempleado</option>
										</select>
										
									</p>
									
									<p>
									
										<label for="promedio">Promedio</label>
										<select tabindex="27" id="promedio" name="promedio">
											<option value=" --- "> --- <option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
										</select>
										<span id="pts">Puntos</span>
									
									</p>
									
								</fieldset>
							
							</div>
						
						</div>
						
						<div class="section" id="section-6">
						
							<div id="formulario6">
							
								<fieldset>
								
									<legend>IDIOMAS</legend>
									
									<p>
									
										<label for="idiomas">Nivel de Idiomas:</label>
										<span id="lan">Idioma</span>
										<select tabindex="28" id="idioma" name="idioma">
											<option value=" --- "> --- </option>
											<option value="Ingles">Ingles</option>
											<option value="Frances">Frances</option>
											<option value="Italiano">Italiano</option>
											<option value="Aleman">Aleman</option>
											<option value="Mandarin">Mandarin</option>
										</select>
										
																	
										<span id="niv">Nivel</span>
										<select tabindex="29" id="nivel" name="nivel">
											<option value=" --- "> --- </option>
											<option value="Basico">Basico</option>
											<option value="Intermedio">Intermedio</option>
											<option value="Avanzado">Avanzado</option>
										</select>
										
									</p>
																	
								</fieldset>
							
							</div>
											
						</div>
						
						<div class="section" id="section-7">
						
							<div id="formulario7">
							
								<fieldset>
								
									<legend>INFORMÁTICA</legend>

									<p>

										<label for="informatica">Conocimientos en Informática</label>
										<br>
										<br>
										Windows Xp,7 <input tabindex="30" type="checkbox" name="infor" value="Windows Xp,7" id="windows" />

										MS Offce 2007,2010 <input tabindex="31" type="checkbox" name="infor" value="MS Office 2007,2010" id="office"/>

										Herramientas Gráficas <input tabindex="32" type="checkbox" name="infor" value="Herramientas Graficas" id="grafica"/>

										Software de Gestión <input tabindex="33" type="checkbox" name="infor" value="Software de Gestion" id="gestion"/>

										Bases de Datos <input tabindex="34" type="checkbox" name="infor" value="Bases de Datos" id="base"/> 

									</p>

								</fieldset>
							
							</div>
						
						</div>

						<div class="section" id="section-8">

							<div id="formulario8">

								<fieldset>

									<legend>CONOCIMIENTOS ADICIONALES</legend>

									<p>

										<label for="adicional">Conocimiento en:</label>
										<input tabindex="35" id="adicional" type="text" name="adicional" maxlenght="30" size="55" class="validate[required] text-input" placeholder="Conocimiento General" autocomplete="on" />

									</p>

									<p>

										<label for="descripcion">Añada una breve descripción</label>
										<textarea tabindex="36" id="descripcion" name="descripcion" type="text" maxlenght="60" style="width:400px;height:35px;" class="validate[required] text-input" placeholder="Breve Descripción" autocomplete="on"></textarea>

									</p>

								</fieldset>

							</div>

						</div>

						<div class="section" id="section-9">

							<div id="formulario9">

								<fieldset>

									<legend>REFERENCIAS PERSONALES</legend>

									<p>

										<label for="referencias">Nombres y Apellidos</label>
										<input tabindex="37" id="referencias" name="referencias" type="text" maxlenght="30" size="30" class="validate[required] text-input" placeholder="Nombres Completos" autocomplete="on" />
										<span id="refer">Teléfonos</span>
										<input tabindex="38" id="tel" name="tel" type="text" maxlenght="16" size="16" class="validate[required] text-input" placeholder="Teléfonos" autocomplete="on" />

									</p>

									<p>

										<label for="correo">Correo Electrónico</label>
										<input tabindex="39" id="correo" name="correo" type="text" maxlenght="25" size="25" class="validate[custom[email]]" placeholder="E-mail" autocomplete="on" />

									</p>

								</fieldset>

							</div>

						</div>

						<div id="fixed">
																			
							<p id="save">

								<button class="savebutton" type="submit">Guardar</button>

							</p>

							<p id="edit">

								<button class="editbutton" type="submit">Editar</button>

							</p>

							<p id="erase">

								<button class="resetbutton" type="reset">Restablecer</button>

							</p>

						</div>
					
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

							<p class="copyright">Derechos Reservados © <?Php echo date("Y"); ?> Trans Coal de Venezuela,C.A. - San Francisco - Venezuela<span>|</span> <span> Diseño y Código:Departamento de Sistemas TCV</span></p>				

						</ul>

				</div>

			</div>

		</footer>

	</body>
</html>
