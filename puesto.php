<?php
//Conexion con la Base de Datos SSPI
include("conexionsspi.php");

//Incluyo el archivo de sesion 
include("sesion.php");

//Comprobando el envio de las variables
if (isset($_POST["job"])){
    $nombre_puesto = $_POST["job"];
    $max_solicitudes = $_POST["apply"];
    $descripcion = $_POST["note"];
    $tipo_puestotrab = $_POST["jornada"];
    $area_profesional = $_POST["areaprof"];
    
    //Si las variables fueron enviadas se procede a la insercion de los Datos
    
    $query = "INSERT INTO puesto_trabajo (nombre_puesto,max_solicitudes,descripcion,tipo_puestotrab,area_profesional) 
    VALUES ('$nombre_puesto','$max_solicitudes','$descripcion','$tipo_puestotrab','$area_profesional')";
    
    mysql_query($query) or die (mysql_errno()." - ".mysql_error());

    $message = "<center> Datos Guardados Exitosamente!!! <center>";

	}else{

	$message = "<center> Error al guardar los Datos!!! <br> Solicite Soporte llame a la ext. 171 Dpto. de Sistemas <center>";

	}

/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>

<!DOCTYPE html>
	<html lang="es">
		<head>
			<meta charset="utf-8"/>
			<title>Mensaje del Sistema Puestos de Trabajo</title>
			<link rel="shortcut icon" href="favicon.ico"/>
			<link rel="stylesheet" href="puesto.css"/>
			<link rel="stylesheet" href="normalize.css"/>
			<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
			<link rel="stylesheet" href="css/south-street/jquery-ui-1.9.0.custom.css"/>

			<script src="js/modernizr-2.5.3.min.js"></script>
			<script src="js/jquery-1.7.1.min.js"></script>
			<script src="js/jquery-ui.js"></script>
			<script src="js/prefixfree.min.js"></script>
			<script src="js/modalwindows/main-view-solxarea.js"></script>

			<script>
				$(function(){
					$("#dialog").dialog({
						autoOpen: true,
						width: 400,
						show: 'clip',
						hide: 'clip',
						buttons: [
						{
							text: "Ok",
							click: function(){
								$(this).dialog('close');
							}
						},
						{
							text: "Cancelar",
							click: function(){
								$(this).dialog('close');
							}
						}
						]
					});
				});
			</script>

			<script>
			$(function () {
			    var chart;
			    $(document).ready(function() {
			        chart = new Highcharts.Chart({
			            chart: {
			                renderTo: 'container',
			                plotBackgroundColor: null,
			                plotBorderWidth: null,
			                plotShadow: false
			            },
			            title: {
			                text: 'Máxima Cantidad de Solicitudes disponibles por Área Profesional'
			            },
			            tooltip: {
			                formatter: function() {
			                    return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
			                }
			            },
			            plotOptions: {
			                pie: {
			                    allowPointSelect: true,
			                    cursor: 'pointer',
			                    dataLabels: {
			                        enabled: true,
			                        color: '#000000',
			                        connectorColor: '#000000',
			                        formatter: function() {
			                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
			                        }
			                    }
			                }
			            },
			            series: [{
			                type: 'pie',
			                name: 'Puestos por Área Profesional',
			                data: [
			                    ['Administración',   45.0],
			                    ['Tecnologia, Sistemas y Telecomunicaciones',       26.8],
			                    {
			                        name: 'Mineria, Petroleo y Gas',
			                        y: 12.8,
			                        sliced: true,
			                        selected: true
			                    },
			                    ['Recursos Humanos y Capacitación',    8.5],
			                    ['Contabilidad y Finanzas',     6.2],
			                    ['Legal',   0.7]
			                ]
			            }]
			        });
			    });
			    
			});
		</script>

		</head>

		<body>

			<script src="js/highcharts.js"></script>
			<script src="js/modules/exporting.js"></script>

			<header>

				<img src="imagenes/mensajesistema.png" width="960px" height="200px" alt="Header Mensaje" title="Mensaje del Sistema" id="cabecera" />

			</header>

			<div id="dialog" title="Notificación">

				<span id="alert"><?Php echo $message;?></span>

			</div>

			<div id="container"></div>
			
			<button id="boton" class="btn btn-success">Tabla de Datos</button>

			<a href="profile.php"><button id="boton_2" class="btn btn-primary">Regresar</button></a>

			<footer>

				<div id="footercontainer">

					<div id="footercon">

						<hr chass="lineafooter" />

						<ul id="links">

							<li><a href="#">INICIO<span>|</span></a></li>			
							<li><a href="#">SOMOS TRANS COAL<span>|</span></a></li>
							<li><a href="#">NUESTRO CARBÓN<span>|</span></a></li>
							<li><a href="#">CONTACTO</a></li>

							<p class="copyright">Derechos Reservados © <?Php echo date("Y"); ?> Trans Coal de Venezuela,C.A. - San Francisco - Venezuela <span>|</span> <span> Diseño y Código:Departamento de Sistemas TCV</span></p>

						</ul>

					</div>

				</div>

			</footer>

		</body>
	</html>