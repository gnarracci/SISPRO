<?php
//Conexion con la Base de Datos
include("conexionsspi.php");

    //Simulacion de Retardo de la Red
    sleep(3);
    
    //Comprobando el envio de la variable
    if (isset($_POST["area_profesional"])){
        $area_prof = $_POST["area_profesional"];
        
    //Si la variable esta cargada procedemos a la insercion de los datos
    $consulta = "INSERT INTO area_profesional (area_profesional) VALUES ('$area_prof')";
    
    mysql_query($consulta) or die (mysql_errno().' - '.mysql_error());
    
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
            <title>Mensaje del Sistema Áreas Profesionales</title>
            <link rel="shortcut icon" href="favicon.ico"/>
            <link rel="stylesheet" href="agregar_area.css"/>
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

                window.chart = new Highcharts.Chart({
                            
                    chart: {
                        renderTo: 'container',
                        polar: true,
                        type: 'line'
                    },
                    
                    title: {
                        text: 'Áreas Profesionales vs. Máx. Solicitudes',
                        x: -80
                    },
                    
                    pane: {
                        size: '80%'
                    },
                    
                    xAxis: {
                        categories: ['Administración', 'Contabilidad y Finanzas', 'Mineria, Petróleo y Gas', 'Legal', 
                                'Tecnología, Sistemas y Telecomunicaciones', 'Recursos Humanos y Capacitación'],
                        tickmarkPlacement: 'on',
                        lineWidth: 0
                    },
                        
                    yAxis: {
                        gridLineInterpolation: 'polygon',
                        lineWidth: 0,
                        min: 0
                    },
                    
                    tooltip: {
                        shared: true,
                        valuePrefix: ''
                    },
                    
                    legend: {
                        align: 'right',
                        verticalAlign: 'top',
                        y: 100,
                        layout: 'vertical'
                    },
                    
                    series: [{
                        name: 'Máx. Solicitudes Permitidas',
                        data: [4, 2, 6, 0, 2, 0],
                        pointPlacement: 'on'
                    }, {
                        name: 'Solicitudes Actuales por Áreas',
                        data: [0, 0, 0, 0, 0, 0],
                        pointPlacement: 'on'
                    }]
                
                });
            });
        </script>

        </head>
        <body>

            <script src="js/highcharts.js"></script>
            <script src="js/modules/exporting.js"></script>
            <script src="js/highcharts-more.js"></script>

            <header>

                <img src="imagenes/mensajesistema.png" width="960px" height="200px" alt="Header Mensaje" title="Mensaje del Sistema" id="cabecera" />

            </header>

            <div id="dialog" title="Notificación">

                    <span id="alert"><?Php echo $message;?></span>

            </div>

            <div id="container"></div>

            <button id="datos" class="btn btn-success">Tabla de Datos</button>

            <a href="profile.php"><button id="back" class="btn btn-primary">Regresar</button></a>

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