<?php

//Incluyo el archivo de sesion 
include("sesion.php");

?>
<!DOCTYPE html>
	<html lang="es">
	<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Intranet Trans Coal de Venezuela, C.A." />
	<title>Gananciales de Nomina</title>
	<link rel="shortcut icon" href="favicon.ico"/>
	<link rel="stylesheet" media="screen" href="gananciales.css"/>
	<script src="js/modernizr-2.5.3.min.js"></script>
	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/jslider.js"></script>
	<script src="js/searchbox.js"></script>
<!-- Controladores del Slider de Imagenes -->
<script type="text/javascript">
$(function()	{
	$('.slider').jslider({
		btnNext: ".next",
		btnPrev: ".prev"
	});
});
</script>

<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
</head>

<body>

	<div id="contenedor">
	
	   	<a href="#"><img src="imagenes/logo.jpg" width="358px" height="63px" alt="logo" class="logo" border="0" title="http://www.transcoal.com.ve" /></a>
		<div id="buscador">
        	<form id="buscar" method="post" action="">
            	<input type="text" id="s" value="Buscar..." class="entrada" />
                <input type="image" src="imagenes/lupa.png" width="40px" height="34" id="go" alt="buscar" title="buscar" />
            </form>
        </div> <!-- Fin de la Caja de Busqueda -->
        
        <ul id="nav">
        	<li class="inicio"><a href="index.html">Inicio</a></li>
            <li class="somos trans coal"><a href="#">Somos Trans Coal</a></li>
            <li class="nuestro carbon"><a href="#">Nuestro Carbon</a></li>
            <li class="contacto"><a href="#">Contacto</a></li>        
        </ul>
		
		<div id="galeria">
			<div class="slider">
				<ul class="imagenesSlider" border="1">
					<li><img src="imagenes/img1.jpg" width="960px" height="310px" alt="Operaciones Muelle Palmarejo" title="Operaciones Muelle Palmarejo" class="sliderimg" /></li>
					<li><img src="imagenes/img2.jpg" width="960px" height="310px" alt="Operaciones Muelle Palmarejo" title="Operaciones Muelle Palmarejo" class="sliderimg" /></li>
					<li><img src="imagenes/img3.jpg" width="960px" height="310px" alt="Operaciones Muelle Palmarejo" title="Operaciones Muelle Palmarejo" class="sliderimg" /></li>
					<li><img src="imagenes/img4.jpg" width="960px" height="310px" alt="Operaciones Muelle Palmarejo" title="Operaciones Muelle Palmarejo" class="sliderimg" /></li>
					<li><img src="imagenes/img5.jpg" width="960px" height="310px" alt="Operaciones Muelle Palmarejo" title="Operaciones Muelle Palmarejo" class="sliderimg" /></li>
					<li><img src="imagenes/img6.jpg" width="960px" height="310px" alt="Operaciones Muelle Palmarejo" title="Operaciones Muelle Palmarejo" class="sliderimg" /></li>
					<li><img src="imagenes/img7.jpg" width="960px" height="310px" alt="Operaciones Muelle Palmarejo" title="Operaciones Muelle Palmarejo" class="sliderimg" /></li>
					<li><img src="imagenes/img8.jpg" width="960px" height="310px" alt="Operaciones Muelle Palmarejo" title="Operaciones Muelle Palmarejo" class="sliderimg" /></li>
					<li><img src="imagenes/img9.jpg" width="960px" height="310px" alt="Operaciones Muelle Palmarejo" title="Operaciones Muelle Palmarejo" class="sliderimg" /></li>
					<li><img src="imagenes/img010.jpg" width="960px" height="310px" alt="Operaciones de Embarque" title="Operaciones de Embarque" class="sliderimg" /></li>
					<li><img src="imagenes/img011.jpg" width="960px" height="310px" alt="Operaciones de Embarque" title="Operaciones de Embarque" class="sliderimg" /></li>
					<li><img src="imagenes/img012.jpg" width="960px" height="310px" alt="Operaciones de Embarque" title="Operaciones de Embarque" class="sliderimg" /></li>
					<li><img src="imagenes/img013.jpg" width="960px" height="310px" alt="Operaciones de Embarque" title="Operaciones de Embarque" class="sliderimg" /></li>
					<li><img src="imagenes/img014.jpg" width="960px" height="310px" alt="Operaciones de Cribado" title="Operaciones de Cribado" class="sliderimg" /></li>
					<li><img src="imagenes/img015.jpg" width="960px" height="310px" alt="Operaciones de Cribado" title="Operaciones de Cribado" class="sliderimg" /></li>
					<li><img src="imagenes/img016.jpg" width="960px" height="310px" alt="Operaciones de Cribado" title="Operaciones de Cribado" class="sliderimg" /></li>
					<li><img src="imagenes/img017.jpg" width="960px" height="310px" alt="Entrada Muelle TCV El Bajo" title="Entrada Muelle TCV El Bajo" class="sliderimg" /></li>
					<li><img src="imagenes/img018.jpg" width="960px" height="310px" alt="Operaciones Muelle Palmarejo" title="Operaciones Muelle Palmarejo" class="sliderimg" /></li>
					<li><img src="imagenes/img019.jpg" width="960px" height="310px" alt="T9 Apilando" title="T9 Apilando" class="sliderimg" /></li>
					<li><img src="imagenes/img020.jpg" width="960px" height="310px" alt="Buque Carbonero Krania" title="Buque Carbonero Krania" class="sliderimg" /></li>
					<li><img src="imagenes/img021.jpg" width="960px" height="310px" alt="Remolcador Cap. Jack" title="Remolcador Cap. Jack" class="sliderimg" /></li>
					<li><img src="imagenes/img022.jpg" width="960px" height="310px" alt="Operaciones de Apilamiento" title="Operaciones de Apilamiento" class="sliderimg" /></li>
					<li><img src="imagenes/img023.jpg" width="960px" height="310px" alt="T9 en Operaciones" title="T9 en Operaciones" class="sliderimg" /></li>
					
				</ul>
				<img src="imagenes/btnizq.png" width="37px" height="37px" alt="boton izq" title="Anterior" id="prev" class="prev" />
				<img src="imagenes/btnder.png" width="37px" height="37px" alt="boton der" title="Siguiente" id="next" class="next" />
			
			</div> <!-- Fin del Slider -->
			
			<a href="cerrar_sesion.php"><img src="imagenes/closesession.png" width="111px" height="31px" alt="cerrar_sesion" title="Cerrar Sesion" class="closesession" /></a>
			
			<span id="session" class="usersession"> <?Php echo "Usuario: ".$_SESSION["$valid_user"];?> </span>
			
			<a href="micuenta.php"><img src="imagenes/returnmenu.png" width="112px" height="48px" alt="regresar_menu" title="Regresar al Menú" class="flotantis" /></a>
			
						
		</div> <!-- Fin del Contenedor de la Galeria de Imagenes --> 

		<div id="cuerpo">
		
		<span id="ganancial">GANANCIALES DE NOMINA</span>
		
		<nav>
		
			
		</nav>
					
		</div> <!-- Fin del Cuerpo del Contenido -->
    
    </div> <!-- Fin del contenedor Principal -->
	
	<div id="footer">
		<div id='enlaces'>
			<div id="carbon">
				<h3>EL CARBON MINERAL</h3>
				<ul class="listados">
					<li><a href="#">La Carbonificacion</a><img src="imagenes/lineaDiv.png" width="267px" height="2px" alt="" class="footerDiv"/></li>
					<li><a href="#">Formacion del Carbon Mineral</a><img src="imagenes/lineaDiv.png" width="267px" height="2px" alt="" class="footerDiv"/></li>
					<li><a href="#">Rango de los Carbones Minerales</a><img src="imagenes/lineaDiv.png" width="267px" height="2px" alt="" class="footerDiv"/></li>
					<li><a href="#">Principales Usos de los Carbones Minerales</a><img src="imagenes/lineaDiv.png" width="267px" height="2px" alt="" class="footerDiv"/></li>
				
				</ul>
			</div> <!-- Fin del Primer Bloque de Rangos de Links -->
			
			<div id="direccion">
				<ul class="sedes">
					<a href="#"><img src="imagenes/tcvsedes.png" width="516px" height="77px" alt="tcvsedes" class="sedes" /></a>
									
				</ul>
							
			</div> <!-- Fin del Bloque de Direcciones -->
			
			<div id="cienagas">
			
				<a href="#"><img src="imagenes/cienagas.png" width="298px" height="76px" alt="cienagas" class="cienajuan" /></a>
			
			</div>
		
			<div id="social">
				<ul class="socialweb">
					<a href="#"><img src="imagenes/facebook.png" width="54px" height="58px" alt="facebook" class="facebook" /></a>
					<a href="#"><img src="imagenes/twitter.png" width="56px" height="60px" alt="twitter" class="twitter" /></a>
					<a href="#"><img src="imagenes/youtube.png" width="56px" height="62px" alt="youtube" class="youtube" /></a>
					
				</ul>
							
			</div> <!-- Fin del Bloque de Links de Redes Sociales y Direcciones -->
			
			
		</div> <!-- Fin del Bloque de Enlaces -->
		
		<div id="pie">
		
			<div id="contenedorfooterPie">
			
				<hr class="lineafooter" />
					<ul id="footerPie">
						<li><a href="index.html">INICIO<span>|</span></a></li>			
						<li><a href="#">SOMOS TRANS COAL<span>|</span></a></li>
						<li><a href="#">NUESTRO CARBON<span>|</span></a></li>
						<li><a href="#">CONTACTO</a></li>
				
						<p class="copyright">Derechos Reservados <?Php echo date("Y"); ?> Trans Coal de Venezuela,C.A. - San Francisco - Venezuela<span>|</span> <span> Webdesign & Code: Departamento de Sistemas TCV</span></p>
				
					</ul>		
				
			</div> <!-- Fin del Contenedor Inferior del Footer -->
			
		</div> <!-- Fin del Contenedor del Final del Footer -->
		
	</div> <!-- Fin del Footer	-->

</body>
</html>