<?php
//Conexion con la Base de Datos
include("conexionsspi.php");

//Incluyo el archivo de sesion 
include("sesion.php");

    //Simulacion de Retardo de la Red
    sleep(3);
    
    //Comprobando el envio de la variable
    if (isset($_POST["tipo_puestotrab"])){
        $jornada = $_POST["tipo_puestotrab"];
        
    //Si la variable esta caragado procedemos a la insercion de los datos
    $consult = "INSERT INTO tipo_puesto (tipo_puestotrab) VALUES ('$jornada')";
    
    mysql_query($consult) or die (mysql_errno().' - '.mysql_error());
    
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
            <title>Mensaje del Sistema Jornadas Laborales</title>
            <link rel="shortcut icon" href="favicon.ico"/>
            <link rel="stylesheet" href="agregar_jornada.css"/>
            <link rel="stylesheet" href="normalize.css"/>
            <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
            <link rel="stylesheet" href="css/south-street/jquery-ui-1.9.0.custom.css"/>

            <script src="js/modernizr-2.5.3.min.js"></script>
            <script src="js/jquery-1.7.1.min.js"></script>
            <script src="js/jquery-ui.js"></script>
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
                    $(document).ready(function() {
                        chart = new Highcharts.Chart({
                            chart: {
                                renderTo: 'container',
                                type: 'areaspline'
                            },
                            title: {
                                text: 'Hrs. Trabajadas vs. Hrs Extras'
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'left',
                                verticalAlign: 'top',
                                x: 150,
                                y: 100,
                                floating: true,
                                borderWidth: 1,
                                backgroundColor: '#FFFFFF'
                            },
                            xAxis: {
                                categories: [
                                    'Lunes',
                                    'Martes',
                                    'Miércoles',
                                    'Jueves',
                                    'Viernes',
                                    'Sábado',
                                    'Domingo'
                                ],
                                plotBands: [{ // visualize the weekend
                                    from: 4.5,
                                    to: 6.5,
                                    color: 'rgba(68, 170, 213, .2)'
                                }]
                            },
                            yAxis: {
                                title: {
                                    text: 'Horas'
                                }
                            },
                            tooltip: {
                                formatter: function() {
                                    return ''+
                                    this.x +': '+ this.y +' Horas';
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            plotOptions: {
                                areaspline: {
                                    fillOpacity: 0.5
                                }
                            },
                            series: [{
                                name: 'Horas Extras',
                                data: [3, 4, 3, 5, 4, 10, 12]
                            }, {
                                name: 'Horas Trabajadas',
                                data: [8, 6, 4, 3, 8, 5, 4]
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

                <button id="data" class="btn btn-success">Tabla de Datos</button>

                <a href="profile.php"><button id="regresar" class="btn btn-primary">Regresar</button></a>

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