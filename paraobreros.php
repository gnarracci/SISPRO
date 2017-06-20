<?php

//Incluyo el archivo de sesion 
include("sesion.php");
//Conexion con la Base de Datos
include("conexiontcv.php");
//Funcion Mes
include("mesparafiscal.php");
//Funcion Lunes
include("lunes.php");

//Consulta de la Base de Datos
$query = mysql_query("SELECT
nmtrabajador.CEDULA,
nmtrabajador.NOMBRE,
nmtrabajador.APELLIDO,
nmtrabajador.SALARIO,
nmdpto.DEP_DESCRI
FROM
nmtrabajador
Inner Join nmdpto
ON
nmdpto.DEP_CODIGO=nmtrabajador.COD_DPTO
WHERE
nmtrabajador.GRUPO =  '00000001' AND
nmtrabajador.CONDICION =  'A' OR
nmtrabajador.CONDICION =  'V'
ORDER BY
nmdpto.DEP_DESCRI ASC",$conexiontcv);

//Registros Encontrados
$numdat = mysql_num_rows($query);

//Confirmacion de Existencia de Registros
if ($numdat==0){
	echo "No se encontraron Datos!!!";
	mysql_close($conexiontcv);
	exit();
}

//Paginacion de los Registros
if (!isset($_GET["pag"])){
//si la variable pag no esta en la url la setea por defecto "Primera Pagina"
	$pag = 1;
}else{
//De lo contrario la variable del sistema $_GET captura la variable pasada por la url 'pag' y la asigna a la variable $pag
	$pag = $_GET["pag"];
}

//Configura la cantidad de registros a ser mostrados por paginacion
$hasta = 14;

//Primera posicion del cursor para recoger los datos de la BD
$desde = (($hasta*$pag) - $hasta);

//Sentencia SQL para llamar a los registros de la BD
$query = mysql_query("SELECT
nmtrabajador.CEDULA,
nmtrabajador.NOMBRE,
nmtrabajador.APELLIDO,
nmtrabajador.SALARIO,
nmdpto.DEP_DESCRI
FROM
nmtrabajador
Inner Join nmdpto
ON
nmdpto.DEP_CODIGO=nmtrabajador.COD_DPTO
WHERE
nmtrabajador.GRUPO =  '00000001' AND
nmtrabajador.CONDICION =  'A' OR
nmtrabajador.CONDICION =  'V'
ORDER BY
nmdpto.DEP_DESCRI ASC LIMIT $desde,$hasta",$conexiontcv);

//Calculando el numero de paginas a mostrar
$paginas = ceil($numdat/$hasta);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/HTML4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Intranet Trans Coal de Venezuela, C.A." />
<title>Parafiscales de Obreros Fijos</title>
<link rel="shortcut icon" href="favicon.ico"/>
<link rel="stylesheet" type="text/css" media="screen" href="paraobreros.css"/>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jslider.js"></script>
<script type="text/javascript" src="js/searchbox.js"></script>
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
    
    	<a href="#"><img src="imagenes/log.png" width="355px" height="64px" alt="logo" class="logo" border="0" title="http://www.transcoal.com.ve" /></a>
    	<div id="buscador">
        	<form id="buscar" method="post" action="">
            	<input type="text" id="s" value="Buscar..." class="entrada" />
                <input type="image" src="imagenes/lupa.png" width="40px" height="34" id="go" alt="buscar" title="buscar" />
            </form>
        </div> <!-- Fin de la Caja de Busqueda -->
        
        <ul id="nav">
        	<li class="inicio"><a href="#">Inicio</a></li>
            <li class="somos trans coal"><a href="#">Somos Trans Coal</a></li>
            <li class="nuestro carbon"><a href="#">Nuestro Carbón</a></li>
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
			
			<a href="parafiscal.php"><img src="imagenes/returnmenu.png" width="112px" height="48px" alt="regresar_menu" title="Regresar al Menú" class="flotantis" /></a>
			<a href="reporteparafisobr.php"><img src="imagenes/print.png" width="111px" height="33px" alt="Imprimir" title="Imprimir Reporte" class="print" /></a>
			
		</div> <!-- Fin del Contenedor de la Galeria de Imagenes --> 
 
		<div id="cuerpo">
								
			<span id="paraobrero">PROVISION PARAFISCAL MES DE <?Php echo mes()." ".date("Y");?> OBREROS TCV</span>
			
				<form id="parafisobrero" name="form1" method="post" action="">
				
					<table width="900" border="0">
					
						  <tr class="cabtab">
							<td width="74" bgcolor="#3535e1">Cédula</td>
							<td width="175" bgcolor="#3535e1">Apellidos</td>
							<td width="165" bgcolor="#3535e1">Nombres</td>
							<td width="100" bgcolor="#3535e1">Salario/Mes</td>
							<td width="100" bgcolor="#3535e1">S.S.O.</td>
							<td width="100" bgcolor="#3535e1">INCES</td>
							<td width="100" bgcolor="#3535e1">L.V.H.</td>
							<td width="150" bgcolor="#3535e1">Departamento</td>
						  </tr>
						    <?Php while($row = mysql_fetch_array($query)){ 

						    	$cedula = $row["CEDULA"];
    							$apellidos = $row["APELLIDO"];
    							$nombres = $row["NOMBRE"];
    							$salario = $row["SALARIO"]*30;
    							$dpto = $row["DEP_DESCRI"];
    							$sso = (($row["SALARIO"]*7)*0.13)*lunes();
    							$inces = (($row["SALARIO"]*7)*0.02);
    							$lph = (($row["SALARIO"]*7)*0.02);
    							$mes = mes();

    							$query2 = "DELETE FROM nmparafiscal WHERE mes='$mes'";
    							mysql_query($query2) or die (mysql_error()." - ".mysql_errno());

    						?>
						  <tr class="dattab">
							<td><div align="right" style="font-weight:Bold"><?php echo $row["CEDULA"];?></div></td>
							<td><?Php echo $row["APELLIDO"];?></td>
							<td><?Php echo $row["NOMBRE"];?></td>
							<td><div align="right" style="font-weight:Bold"><?Php echo number_format($salario, 2, ',','.');?></div></td>
							<td><div align="right" style="font-weight:Bold"><?Php echo number_format($sso, 2,',','.')?></div></td>
							<td><div align="right" style="font-weight:Bold"><?Php echo number_format($inces, 2,',','.')?></div></td>
							<td><div align="right" style="font-weight:Bold"><?Php echo number_format($lph, 2,',','.')?></div></td>
							<td><div align="right" style="font-weight:Bold"><?Php echo $row["DEP_DESCRI"];?></div></td>
						  </tr>
							<?Php } ?>
					</table>
								
					
					<ul class="paging"><?Php 
					
						if ($pag>1)
							echo "<a href='paraobreros.php?pag=". ($pag-1) ."' >Anterior</a> ";
								for ($cont = 1;$cont<=$paginas;$cont++){
								
									if ($cont==$pag)
										echo $cont. " ";
										else
										echo "<a href='paraobreros.php?pag=". $cont ."' >$cont</a> ";
								
								}
						if ($pag<$paginas)
							echo "<a href='paraobreros.php?pag=". ($pag+1) ."' >Siguiente</a> ";
					?></ul>
				
				</form>

							
	  </div> <!-- Fin del Cuerpo del Contenido -->
    
    </div> <!-- Fin del contenedor Principal -->
	
	<div id="footer">
		<div id='enlaces'>
			<div id="carbon">
				<h3>EL CARBÓN MINERAL</h3>
				<ul class="listados">
					<li><a href="#">La Carbonificación</a><img src="imagenes/lineaDiv.png" width="267px" height="2px" alt="" class="footerDiv"/></li>
					<li><a href="#">Formación del Carbón Mineral</a><img src="imagenes/lineaDiv.png" width="267px" height="2px" alt="" class="footerDiv"/></li>
					<li><a href="#">Rango de los Carbones Minerales</a><img src="imagenes/lineaDiv.png" width="267px" height="2px" alt="" class="footerDiv"/></li>
					<li><a href="#">Principales Usos de los Carbones Minerales</a><img src="imagenes/lineaDiv.png" width="267px" height="2px" alt="" class="footerDiv"/></li>
				
				</ul>
			</div> <!-- Fin del Primer Bloque de Rangos de Links -->
			
			<div id="direccion">
				<ul class="sedes">
					<a href="#"><img src="imagenes/tcvsedes.png" width="516px" height="77px" alt="tcvsedes" class="sedes" /></a>
									
				</ul>
							
			</div> <!-- Fin del Bloque de Direcciones -->
		
			<div id="social">
				<ul class="socialweb">
					<a href="#"><img src="imagenes/facebook.png" width="54px" height="58px" alt="facebook" class="facebook" /></a>
					<a href="#"><img src="imagenes/twitter.png" width="56px" height="60px" alt="twitter" class="twitter" /></a>
					<a href="#"><img src="imagenes/youtube.png" width="56px" height="62px" alt="youtube" class="youtube" /></a>
					
				</ul>
							
			</div> <!-- Fin del Bloque de Links de Redes Sociales y Direcciones -->
			
			<div id="cienagas">
			
				<a href="#"><img src="imagenes/cienagas.png" width="298px" height="76px" alt="cienagas" class="cienajuan" /></a>
			
			</div>
			
			
		</div> <!-- Fin del Bloque de Enlaces -->
		
		<div id="pie">
		
			<div id="contenedorfooterPie">
			
				<hr class="lineafooter" />
					<ul id="footerPie">
						<li><a href="#">INICIO<span>|</span></a></li>			
						<li><a href="#">SOMOS TRANS COAL<span>|</span></a></li>
						<li><a href="#">NUESTRO CARBÓN<span>|</span></a></li>
						<li><a href="#">CONTACTO</a></li>
				
						<p class="copyright">Derechos Reservados <?Php echo date("Y"); ?> Trans Coal de Venezuela,C.A. - San Francisco - Venezuela<span>|</span> <span> Diseño y Código:Departamento de Sistemas TCV</span></p>
				
					</ul>		
				
			</div> <!-- Fin del Contenedor Inferior del Footer -->
			
		</div> <!-- Fin del Contenedor del Final del Footer -->
		
	</div> <!-- Fin del Footer	-->



</body>
</html>