<?php
//Incluyo el archivo de sesion 
include("session.php");
//Incluyo verificador de saludo horario
include("schedule.php");
//Conexion a la base de Datos
include("conexionsspi.php");
//Identificador de Id de Evaluacion del Usuario en las Encuestas
include("identity.php");

    //Seleccion de Tipo de vacante
    $id = $_SESSION["$usuario_valido"];

    $sql= "SELECT id_eval,nombre_puesto FROM usuarios_encuesta WHERE cedula = '$id' AND id_eval = '$identificador'";

    $exec = mysql_query($sql) or die (mysql_errno().' - '.mysql_error());

    $vac = mysql_fetch_array($exec);

    

//Conexion a la Base de Datos para extracion de Data de Aspirantes
include("conexion.php");

    //Consulta de la Data del Aspirante
    $sql = "SELECT * FROM nmaspirantes WHERE cedula ='$id'";

    //Ejecucion de la Consulta
    $data = mysql_query($sql) or die (mysql_errno().' - '.mysql_error());

    //Carga de los Datos en los Inputs
    $regvar = mysql_fetch_array($data);

    $name = $regvar['nombres'];



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
                <title>Sistema de Encuestas Pre-Empleo TCV</title>
                <link rel="shortcut icon" href="favicon.ico"/>
                <link rel="stylesheet" href="encuesta.css"/>
                <link rel="stylesheet" href="normalize.css"/>

                <script src="js/jquery-1.7.1.min.js"></script>
                <script src="js/jquery.easing.min.js"></script>
                <script src="js/slides.min.jquery.js"></script>
                <script src="js/modernizr-2.5.3.min.js"></script>
                <script src="js/prefixfree.min.js"></script>

                <script>
                    $(function(){
                        $('#slides').slides({
                        preload: true,
                        preloadImage: 'imagenes/loading.gif',
                        play: 5000,
                        pause: 2500,
                        hoverPause: true
                        });
                    });
                </script>

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
            
            </head>
                <body>

                    <div id="container">

                        <a herf="http://www.transcoal.com.ve"><img src="imagenes/logosurvey.png" width="442px" height="106px" alt="logo" id="logo" title="www.transcoal.com.ve"/></a>

                        <div id="example">

                            <div id="slides">

                                <div class="slides_container">

                                    <img src="imagenes/bgenc1.png" width="960px" height="350px" alt="Slide 1"/>
                                    <img src="imagenes/bgenc2.png" width="960px" height="350px" alt="Slide 2"/>
                                    <img src="imagenes/bgenc3.png" width="960px" height="350px" alt="Slide 3"/>
                                    <img src="imagenes/bgenc4.png" width="960px" height="350px" alt="Slide 4"/>
                                    <img src="imagenes/bgenc5.png" width="960px" height="350px" alt="Slide 5"/>
                                    <img src="imagenes/bgenc6.png" width="960px" height="350px" alt="Slide 6"/>                 

                                </div>

                                <a href="#" class="prev"><img src="imagenes/arrow-prev.png" width="24" height="43" alt="Arrow Prev"/></a>
                                <a href="#" class="next"><img src="imagenes/arrow-next.png" width="24" height="43" alt="Arrow Next"/></a>

                                <img src="imagenes/example-frame.png" width="986px" height="500px" alt="Example Frame" id="frame"/>

                            </div>

                        </div> 

                        <span id="us"><?Php echo $greeting.$name." !!!"." Bienvenido(a)";?></span>
                        <img src="imagenes/iconuser.png" width="36px" height="41px" alt="user" id="iconuser"/>
                        <span id="title">Sistema de Encuestas</span>
                        <span id="pre">Pre-Empleo</span>
                        <span id="tipovacante">Escuesta para el cargo de: <?Php echo $vac['nombre_puesto'];?></span>
                        <img src="imagenes/branding.png" width="921px" height="201px" alt="branding" id="branding"/>

                        <section id="buttons">

                            <article>

                                <a href="examen_rapport.php"><img src="imagenes/rapport.png" width="461px" height="230px" alt="rapport" title="Preguntas de Rapport" id="rapport"/></a>
                                <a href="examen_formacion.php"><img src="imagenes/formacion.png" width="449px" height="230px" alt="formacion" title="Preguntas de Formación" id="formacion"/></a>
                                <a href="examen_condicion.php"><img src="imagenes/condiciones.png" width="461px" height="228px" alt="condiciones" title="Condiciones Personales" id="condicion"/></a>
                                <a href="examen_profesional.php"><img src="imagenes/perfil.png" width="449px" height="228px" alt="perfil" title="Perfil Profesional" id="perfil"/></a>

                            </article>

                        </section>

                    </div>

                    <footer>

                        <div id="footercontainer">

                            <div id="footercon">

                                <hr class="lineafooter"/>

                                <ul id="links">

                                    <li><a href="#">INICIO<span>|</span></a></li>           
                                    <li><a href="#">SOMOS TRANS COAL<span>|</span></a></li>
                                    <li><a href="#">NUESTRO CARBÓN<span>|</span></a></li>
                                    <li><a href="#">CONTACTO</a></li>

                                    <p class="copyright">Derechos Reservados © <?Php echo date("Y"); ?> Trans Coal de Venezuela,C.A. - San Francisco - Venezuela<span> | </span> <span> Diseño y Código:Departamento de Sistemas TCV</span></p>               

                                </ul>

                            </div>

                        </div>

                    </footer>

                </body>
        </html>