<?php
//Conexion a la Base de Datos
include("conexionsspi.php");

    //Simulacion de Retardo de Red
    sleep(3);
    
    //Comprobando el envio de las variables
    if (isset($_POST["select_puesto"])){
        $nom_puesto = $_POST["select_puesto"];
        $num_vacantes = $_POST["num_vacante"];
        $stat_vacante = $_POST["select_status"];
                
    //Si las variables estan cargadas se procede a la insercion de los datos
    $query = "INSERT INTO puesto_vacantes (nombre_puesto,num_vacante,status_puesto) VALUES ('$nom_puesto','$num_vacantes','$stat_vacante')";
    
    //Ejecucion de la Consulta
    mysql_query($query) or die (mysql_errno().' - '.mysql_error());
    
        $message .= '<div class="ui-widget">
                        <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
                        <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
                        <strong>Datos Guardados Exitosamente!!!</strong></p>
                        </div>        
                    </div>        
        ';
        
    }else{
        
        $message = '<div class="ui-widget">
                        <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
                        <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
                        <strong>Atención!!!:</strong> Datos NO Guardados!!! Solicite Soporte llame a la ext. 171 Dpto. Sistemas.</p>
                        </div>
                    </div>
        ';
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
                <title>Mensaje del Sistema Vacantes de Empleo</title>
                <link rel="shortcut icon" href="favicon.ico"/>
                <link rel="stylesheet" href="agregar_vacante.css"/>
                <link rel="stylesheet" href="normalize.css"/>
                <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
                <link rel="stylesheet" href="css/start/jquery-ui-1.9.1.custom.css"/>

                <script src="js/modernizr-2.5.3.min.js"></script>
                <script src="js/jquery-1.7.1.min.js"></script>
                <script src="js/jquery-ui/jquery-ui-1.9.1.custom.min.js"></script>
                <script src="js/prefixfree.min.js"></script>
                
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
                        
                        $(document).ready(function () {
                            
                            // Build the chart
                            chart = new Highcharts.Chart({
                                chart: {
                                    renderTo: 'container',
                                    plotBackgroundColor: null,
                                    plotBorderWidth: null,
                                    plotShadow: false
                                },
                                title: {
                                    text: 'Porcentajes de Puestos Solicitados'
                                },
                                tooltip: {
                                    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
                                    percentageDecimals: 1
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
                                    name: '% Solicitudes',
                                    data: [
                                        ['Analista de Contabilidad',   45.0],
                                        ['Analista de Nomina',       26.8],
                                        {
                                            name: 'Analista de Sistemas',
                                            y: 12.8,
                                            sliced: true,
                                            selected: true
                                        },
                                        ['Recepcionista',    8.5],
                                        ['Analista de Impuestos',     6.2],
                                        ['Coordinador SIAHO',   0.7]
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

            <a href="loadsurvey.php"><button id="regresar" class="btn btn-primary">Regresar</button></a>

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