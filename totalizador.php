<?php
//Conexion con la Base de Datos
include("conexionsspi.php");
//Sesion de Usuario
include("session.php");
//Identificador de Id de Evaluacion del Usuario en las Encuestas
include("identity.php");

    //Seleccion de usuario logueado
    $id = $_SESSION["$usuario_valido"];

    //Seleccion de Nombre de Usuario
    $usuarios = mysql_query("SELECT nombres,apellidos FROM usuarios_encuesta WHERE cedula = '$id' AND flag = '1'",$conexionsspi);

    $userar = mysql_fetch_array($usuarios) or die (mysql_errno().' - '.mysql_error());

    $name = $userar['nombres'];

    $surname = $userar['apellidos'];

    //Consulta de seleccion de los campos para suma
    $consulta = mysql_query("SELECT cedula,calif_rapport,calif_formacion,calif_condicion,calif_profesional FROM usuarios_encuesta WHERE cedula ='$id' AND flag = '1'",$conexionsspi);
    
    while ($fila = mysql_fetch_row($consulta)){
        $cedula = $fila[0];
        $calif_rapport = $fila[1];
        $calif_formacion = $fila[2];
        $calif_condicion = $fila[3];
        $calif_profesional = $fila[4];        
    }
    
    //Consulta de seleccion de Puesto
    $consulta2 = mysql_query("SELECT nombre_puesto,fecha FROM usuarios_encuesta WHERE cedula = '$id' AND flag = '1'");
    
    $vac = mysql_fetch_array($consulta2);
    
    $vacante = $vac['nombre_puesto'];

    $date = $vac['fecha'];
    
    //Consulta de Requerimientos Encuesta
    $consulta3 = mysql_query("SELECT rapport,formacion,condiciones,profesional FROM requerimientos_encuesta WHERE puesto_trabajo = '$vacante'");
    
    while ($req = mysql_fetch_array($consulta3)){
        $rapport = $req['rapport'];
        $formacion = $req['formacion'];
        $condicion = $req['condiciones'];
        $profesional = $req['profesional'];
    }
    
    //Realizando Calculos
    $a = $calif_rapport*($rapport/100);
    $b = $calif_formacion*($formacion/100);
    $c = $calif_condicion*($condicion/100);
    $d = $calif_profesional*($profesional/100);
    
    $total = $a+$b+$c+$d;

    //Contador de Tiempo (Hora de Culminacion de la Encuesta)    
    $tiempofinal = date("H:i:s");

    //Calculo del Tiempo transcurrido en la Encuesta de Empleo
    $sql = "SELECT tiempoinicial,init FROM usuarios_encuesta WHERE cedula = '$id' AND flag = '1'";

    $exe = mysql_query($sql) or die (mysql_errno().' - '.mysql_error());

    $start = mysql_fetch_array($exe);

    $tiempoinicial = $start['tiempoinicial'];

    $start_time = $start['init'];

    function resta($inicio,$fin){
        $dif = date("H:i:s", strtotime("00:00:00") + strtotime($fin) - strtotime($inicio));
        return $dif;
    }

    $diferencia = resta($tiempoinicial,$tiempofinal);

    //Calculo del Tiempo para Evalaucion
    $finish_time = date("His");
    
    //Actualizacion de la Tabla
    $upd = mysql_query("UPDATE usuarios_encuesta SET calif_total = '$total', presento = '1', tiempofinal = '$tiempofinal', tiempototal = '$diferencia', finish = '$finish_time' WHERE cedula = '$id' AND flag = '1' ");

    
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
            <meta http-equiv="Expires" content="0" />
            <meta http-equiv="Pragma" content="no-cache" />
			<title>Resultados de la Encuesta Web</title>
			<link rel="shortcut icon" href="favicon.ico"/>
			<link rel="stylesheet" href="totalizador.css"/>
			<link rel="stylesheet" href="normalize.css"/>
			<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>

			<script src="js/modernizr-2.5.3.min.js"></script>
			<script scr="js/bootstrap/bootstrap.min.js"></script>
			<script src="js/jquery-1.7.1.min.js"></script>
			<script src="js/prefixfree.min.js"></script>

            <!-- Inhabilitando F5 (Actualizar) -->

            <script>
                //este codigo maneja the F5/Ctrl+F5/Ctrl+R
                document.onkeydown = checkKeycode
                function checkKeycode(e) {
                    var keycode;
                    if (window.event)
                        keycode = window.event.keyCode;
                    else if (e)
                        keycode = e.which;

                    // Mozilla firefox
                    if ($.browser.mozilla) {
                        if (keycode == 116 ||(e.ctrlKey && keycode == 82)) {
                            if (e.preventDefault)
                            {
                                e.preventDefault();
                                e.stopPropagation();
                            }
                        }
                    } 
                    // IE
                    else if ($.browser.msie) {
                        if (keycode == 116 || (window.event.ctrlKey && keycode == 82)) {
                            window.event.returnValue = false;
                            window.event.keyCode = 0;
                            window.status = "Actualizar esta Desabilitado";
                        }
                    }
                }
            </script>

            <!-- Inhabilitando el Boton Atras del Navegador -->

            <script>
                {
                if(history.forward(1))
                location.replace(history.forward(1))
                }
            </script>

            <!-- Redireccionando al Agente para Evaluar al Solicitante -->

           <!-- <script>
                $(document).ready(function(){
                    var number = 60;
                    var url = 'agt_eval.php';

                    function countdown() {
                            setTimeout(countdown, 1000);
                            $('#box').html("Redirigiendo al inicio en " + number + " segundos.");
                            number--;

                            if (number<0) {
                                window.location = url;
                                number = 0;
                            }
                    }

                    countdown();
                });                    
            </script> -->

            <!-- Grafico de Pastel -->

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
                                text: 'Porcentajes de la Encuesta'
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
                                        enabled: false
                                    },
                                    showInLegend: true
                                }
                            },
                            series: [{
                                type: 'pie',
                                name: 'Aspectos Evaluados',
                                data: [
                                    ['Rapport',   45.0],
                                    ['Formación',       26.8],
                                    {
                                        name: 'Condición',
                                        y: 12.8,
                                        sliced: true,
                                        selected: true
                                    },
                                    ['Profesional',    8.5],
                                    ['Opera',     6.2],
                                    ['Others',   0.7]
                                ]
                            }]
                        });
                    });
                    
                });
            </script>

		</head>

		<body>

			<header>

				<img src="imagenes/resultados.png" width="960px" height="200px" alt="cabecera" id="tot_cabecera" />

			</header>

            <div id="is"></div>

            <span id="user"><?Php echo "Estimado(a) ".$name." estos son los resultados que hemos obtenido de usted:";?></span>

            <div id="is-1">

                <span id="cedula">Cédula:</span>
                <span id="id"><?Php echo $id;?></span>

                <span id="name">Nombres y Apellidos:</span>
                <span id="nombre"><?Php echo $name." ".$surname;?></span>

                <span id="job">Puesto al que Concursa:</span>
                <span id="trabajo"><?Php echo $vacante;?></span>

                <span id="date">Fecha de Presentación:</span>
                <span id="fecha"><?Php echo $date;?></span>

                <span id="time">Tiempo de Ejecución de la Encuesta:</span> 
                <span id="tiempo"><?Php echo $diferencia;?></span>

                <span id="rapport">Calificación de Rapport obtenida:</span>
                <span id="intercambio"><?Php echo $calif_rapport." ptos, (".$a.") %";?></span>

                <span id="formation">Calificación de Formación obtenida:</span>
                <span id="formacion"><?Php echo $calif_formacion." ptos, (".$b.") %";?></span>

                <span id="condition">Calificación de Condición obtenida:</span>
                <span id="condicion"><?Php echo $calif_condicion." ptos, (".$c.") %";?></span>

                <span id="professional">Calificación Profesional obtenida:</span>
                <span id="profesional"><?Php echo $calif_profesional." ptos, (".$d.") %";?></span>

                <span id="total">Calificación Total:</span>
                <span id="totales"><?Php echo $total." %";?></span>

            </div>

            <script src="js/highcharts.js"></script>
            <script src="js/modules/exporting.js"></script>

            <div id="container"></div>

            <div id="is-2">

                <p id="mensaje">
                    “Muchas Gracias <strong><?Php echo $name;?></strong> por presentar nuestra Encuesta Pre-Empleo, los resultados obtenidos por usted serán
                     revisados por nuestro Departamento de Recursos Humanos y si cumple con las cualidades para la vacante, nuestro equipo se pondrá en 
                     contacto con usted para una entrevista presencial, donde se verificaran su documentación y sus respuestas dadas en el test asi como
                     otros aspectos de interés. Saludos y Éxitos!!!”
                </p>

            </div>

            <div id="box"></div>

            <footer>

                <img src="imagenes/quizpub.png" width="962px" height="144px" alt="pie" id="tot_pie" />

            </footer>

		</body>
	</html>