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
nmtrabajador.GRUPO =  '00000002' AND
nmtrabajador.CONDICION =  'A' OR
nmtrabajador.CONDICION =  'V'
ORDER BY
nmdpto.DEP_DESCRI ASC",$conexion);

$query2 = mysql_query("SELECT
nmparafiscal.departamento AS dpto,
Sum(nmparafiscal.sso) AS sso,
Sum(nmparafiscal.inces) AS inces,
Sum(nmparafiscal.lph) AS lph
FROM
nmparafiscal
Inner Join nmdpto ON nmparafiscal.departamento = nmdpto.DEP_DESCRI
WHERE
nmparafiscal.departamento =  'Remolcador Jhon'
GROUP BY
nmparafiscal.mes",$conexion);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/HTML4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Intranet Trans Coal de Venezuela, C.A." />
<title>Parafiscales de Marinos Fijos</title>
<link rel="shortcut icon" href="favicon.ico"/>
<link rel="stylesheet" type="text/css" media="screen" href="paramarfijsum.css"/>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/searchbox.js"></script>

<script language="javascript">
$(document).ready(function() {
     $(".expexcel").click(function(event) {
     $("#senddata").val( $("<div>").append( $("#excelexport").eq(0).clone()).html());
     $("#exporttoexcel").submit();
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
		
		<div id="banner">
			
			<img src="imagenes/parafiscales.png" width="960px" height="197px" alt="banner" title="banner" class="bannerhd" />	
			
		</div> <!-- Fin del Header -->
			
			<a href="cerrar_sesion.php"><img src="imagenes/closesession.png" width="111px" height="31px" alt="cerrar_sesion" title="Cerrar Sesion" class="closesession" /></a>
			
			<span id="session" class="usersession"> <?Php echo "Usuario: ".$_SESSION["$valid_user"];?> </span>
			
			<a href="paramarinos.php"><img src="imagenes/back1.png" width="252px" height="72px" class="regresar" alt="Regresar" title="Regresar a la página Anterior" /></a>
			
			<a href="parafiscal.php"><img src="imagenes/returnmenu.png" width="112px" height="48px" alt="regresar_menu" title="Regresar al Menú" class="flotantis" /></a>
									
		<form id="exporttoexcel" action="exportexcel.php" method="post" target="_blank">
			
			<a href="#"><img src="imagenes/exportexcel.png" type="submit" width="139px" height="72px" alt="exportexcel" title="Exportar a Excel" class="expexcel" /></a>
			
		<input type="hidden" id="senddata" name="senddata" />
		
		</form>
			
			<a target="_blank" href="repparafiscal.php"><img src="imagenes/exportpdf.png" type="submit" width="139px" height="72px" alt="exportpdf" title="Exportar a PDF" class="exportpdf" /></a>
			
		</div> 
				
		<div id="cuerpo">
								
			<span id="paraobrero">PROVISION PARAFISCAL MES <?Php echo mes()." ".date("Y");?> MARINOS TCV</span>
			
				<form id="parafisobrero" name="form1" method="post" action="">
				
					<table id="excelexport" width="900" border="1">
					
						  <tr class="cabtab">
							<td width="74" bgcolor="#3535e1">Cédula</td>
							<td width="175" bgcolor="#3535e1">Apellidos</td>
							<td width="165" bgcolor="#3535e1">Nombres</td>
							<td width="100" bgcolor="#3535e1">Salario/Mes</td>
							<td width="100" bgcolor="#3535e1">S.S.O.</td>
							<td width="100" bgcolor="#3535e1">INCES</td>
							<td width="100" bgcolor="#3535e1">L.V.H.</td>
							<td width="100" bgcolor="#3535e1">Departamento</td>
						  </tr>
						    <?Php while($row = mysql_fetch_array($query)){ 
						      
                            	$cedula = $row["CEDULA"];
    							$apellidos = $row["APELLIDO"];
    							$nombres = $row["NOMBRE"];
    							$salario = $row["SALARIO"]*30;
    							$dpto = $row["DEP_DESCRI"];
    							$sso = (($row["SALARIO"]*7)*0.13)*lunes();
    							$inces = (($row["SALARIO"]*7)*0.02)*lunes();
    							$lph = (($row["SALARIO"]*7)*0.02)*lunes();
    							$mes = mes();
																
                            ?>						  
						  <tr class="dattab">
							<td><div align="right" style="font-weight:Bold"><?php echo $cedula;?></div></td>
							<td><?Php echo $row["APELLIDO"];?></td>
							<td><?Php echo $row["NOMBRE"];?></td>
							<td><div align="right" style="font-weight:Bold"><?Php echo number_format ($salario, 2,',','.');?></div></td>
							<td><div align="right" style="font-weight:Bold"><?Php echo number_format ($sso, 2,',','.');?></div></td>
							<td><div align="right" style="font-weight:Bold"><?Php echo number_format ($inces, 2,',','.');?></div></td>
							<td><div align="right" style="font-weight:Bold"><?Php echo number_format ($lph, 2,',','.');?></div></td>
							<td><div align="right" style="font-weight:Bold"><?Php echo $dpto;?></div></td>
						  </tr>
							<?Php } ?>
					</table>
					
					<table id="sum" width="400" border="1">
					
					<tr class="adding">
						<td width="140" bgcolor="#ebebf5">Departamento</td>
						<td width="120" bgcolor="#ebebf5">Total SSO</td>
						<td width="120" bgcolor="#ebebf5">Total INCES</td>
						<td width="120" bgcolor="#ebebf5">Total LPH</td>
						
					</tr>
					
					<?Php

						if (mysql_num_rows($query2) == 0){
						echo "No se han encontrado filas, Nada para Imprimir";
						}

						$fila = mysql_fetch_array($query2, MYSQL_ASSOC);
	

					?>
						<tr class="tot">
							<td align="right"><?Php echo $fila["dpto"]; ?></td>
							<td align="right"><?Php echo $fila["sso"]; ?></td>
							<td align="right"><?Php echo $fila["inces"]; ?></td>
							<td align="right"><?Php echo $fila["lph"]; ?></td>
						</tr>
											
					</table>
								
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