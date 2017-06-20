<?php
//Incluyo el archivo de sesion 
include("session.php");
//Conexión a la BD
include("conexionsspi.php");
//Incluyo verificador de saludo horario
include("schedule.php");
//Listado de Vacantes
include("listar_vacantes.php");
//Consulta de Puestos Vacantes
$vacantes = mysql_query("SELECT nombre_puesto FROM puesto_vacantes ORDER BY nombre_puesto ASC");
if (mysql_num_rows($vacantes) == 0){
    $mensaje = "No hay Registros";
    mysql_close($conexionsspi);
    exit();
}

//Verficador de Presentacion de la Encuesta

    $id = $_SESSION["$usuario_valido"];

    $presento = mysql_query("SELECT nombre_puesto,presento FROM usuarios_encuesta WHERE cedula = '$id' AND presento = '1'");

    $pr = mysql_fetch_array($presento);

    $job = $pr['nombre_puesto'];
    
    if (mysql_num_rows($presento) > 0){
        $present = "Usted ya presento una Encuesta de Evaluación para la vacante de: ".$job;
    }

//Conexion a la Base de Datos para extracion de Data de Aspirantes
include("conexion.php");

    //Variable de Sesion
    $id = $_SESSION["$usuario_valido"];

    //Consulta de la Data del Aspirante
    $sql = "SELECT * FROM nmaspirantes WHERE cedula ='$id'";

    //Ejecucion de la Consulta
    $data = mysql_query($sql) or die (mysql_errno().' - '.mysql_error());

    //Carga de los Datos en los Inputs
    $regvar = mysql_fetch_array($data);

    $name = $regvar['nombres'];

//Contador de Tiempo (Hora de Inicio de la Encuesta)
    $tiempoinicial = date("H:i:s");

//Bandera de Identificacion
    $flag = '1';

//Fecha de Presentacion de la Encuesta
    $dia = date("j");
    $mes = date("n");
    $anno = date("Y");

    $fecha = $dia." / ".$mes." / ".$anno;

//Tiempo nicial de la Medicion del Agente
    $ini_time = date("His");

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
                <title>Sistema de Encuestas Pre-Empleo TCV</title>
                <link rel="shortcut icon" href="favicon.ico"/>
                <link rel="stylesheet" href="pre-encuesta.css"/>
                <link rel="stylesheet" href="normalize.css"/>
                <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"/>
                <link rel="stylesheet" href="css/start/jquery-ui-1.9.1.custom.css"/>

                <script src="js/jquery-1.7.1.min.js"></script>
                <script src="js/jquery-ui/jquery-ui-1.9.1.custom.min.js"></script>
                <script scr="js/bootstrap/bootstrap.min.js"></script>
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

                <script>
                    $(function(){
                        //Ventana listado de Vacantes
                        $('#vacantes-disp').dialog({
                            autoOpen: false,
                            width: 640,
                            height: 'auto',
                            show: 'clip',
                            hide: 'puff'            
                        });

                        //Funcionalidad del boton lista de Vacantes
                        $('#ver-vacantes').on('click',function(){
                            $('#vacantes-disp').dialog('open');
                        });
                    });
                </script>

                <script>
                    $(function(){
                        //Ventana Datos de Registro e Inicio de Encuesta
                        $('#datos-registro').dialog({
                            autoOpen: false,
                            modal: true,
                            width: 265,
                            height: 'auto',
                            show: 'clip',
                            hide: 'puff'
                        });

                        //Funcionabilidad del Boton de Inicio de Encuesta
                        $('#inicio').on('click',function(){
                            $('#datos-registro').dialog('open');
                        });
                    });
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

                                <div id="is-1"></div>

                                <div id="is-2"></div>

                                <div id="is-3"></div>

                                <div id="is-4"></div>

                            </div>

                        </div> 

                        <span id="us"><?Php echo $greeting.$name." Bienvenido(a)";?></span>
                        <span id="pres"><?Php echo $present; ?></span>
                        <img src="imagenes/iconuser.png" width="36px" height="41px" alt="user" id="iconuser"/>
                        <a href="surveyus.php"><img src="imagenes/regresarin.png" width="199px" height="116px" alt="regresar" title="Regresar al Menú" id="float"/></a>
                        <span id="title">Sistema de Encuestas</span>
                        <span id="pre">Pre-Empleo</span>
                        <img src="imagenes/branding.png" width="921px" height="201px" alt="branding" id="branding"/>
                        <img src="imagenes/transcoal.png" width="253px" height="33px" alt="logo" id="tcv"/>

                        <div id="is-0"></div>

                        <!-- Vacantes Disponibles -->

                        <span id="view">Vacantes Abiertas:</span>

                        <div id="is-5"></div>

                        <!-- Tabla de Vacantes Disponibles -->

                        <div id="vacantes-disp" title="Vacantes Disponibles a Ofertar">

                            <table id="listarvacantes" class="table table-striped table-bordered table-hover table-condensed">

                                <thead>
                                    <tr>
                                        <th>Puesto</th>
                                        <th>Nro.Vacantes</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?Php echo $listavacantes;?>
                                </tbody>

                            </table>

                        </div>

                        <!-- Visualizar Vacantes -->

                        <button id="ver-vacantes" type="submit" class="btn btn">Listado Vacantes</button>

                        <!-- Seleccionador de Puesto para la Encuesta -->

                            <span id="puesto">Verifique los Datos de su Registro y Seleccione la Vacante de su Interés</span>

                            <div id="is-6"></div>

                            <!-- Tabla de Datos de Registro -->

                            <div class="hide" id="datos-registro" title="Datos de Registro de <?Php echo $regvar['apellidos'];?>, <?Php echo $regvar['nombres'];?>">

                                <form action="inicio.php" id="data" name="data" method="post">

                                    <fieldset id="datosregistro">

                                        <p>Cédula de Identidad</p>
                                        <span></span>
                                        <input type="text" id="cedula" name="cedula" style="text-align:center;" value="<?Php echo $regvar['cedula'];?>" />

                                        <p>Nombres del Solicitante</p>
                                        <span></span>
                                        <input type="text" id="nombres" name="nombres" style="text-align:center;" value="<?Php echo $regvar['nombres'];?>" />

                                        <p>Apellidos del Solicitante</p>
                                        <span></span>
                                        <input type="text" id="apellidos" name="apellidos" style="text-align:center;" value="<?Php echo $regvar['apellidos'];?>" />

                                        <p>Seleccione la Vacante a optar</p>
                                        <span></span>
                                        <select id="nombre_puesto" name="nombre_puesto">
                                            <option>Seleccione Vacante</option>
                                            <?Php
                                                while ($row = mysql_fetch_array($vacantes)){
                                                    echo "<option value='".$row['nombre_puesto']."'>".$row['nombre_puesto']."</option>";
                                                }
                                                mysql_close($conexionsspi);
                                            ?>

                                        </select>

                                        <input type="hidden" id="fecha" name="fecha" value="<?Php echo $fecha;?>" />

                                        <input type="hidden" id="tiempoinicial" name="tiempoinicial" value="<?Php echo $tiempoinicial;?>" />

                                        <input type="hidden" id="init" name="init" value="<?Php echo $ini_time;?>" />

                                        <input type="hidden" id="flag" name="flag" value="<?Php echo $flag;?>" />

                                    </fieldset>

                                    <fieldset id="boton">

                                        <button type="submit" id="iniciar" class="btn btn-primary">Iniciar Encuesta</button>

                                    </fieldset>
                                    
                                </form>

                            </div>                            

                            <!-- Notificación -->

                            <div id="is-7"></div>

                            <span id="info">INFORMACIÓN</span>

                            <p id="notificacion">
                                Está a punto de comenzar la fase de Pre-Empleo de nuestra organización, le recordamos ser lo más
                                 sincero y preciso en la selección de sus respuestas, esta es una encuesta donde haremos una medición
                                  de sus cualidades reflejadas en cuatro ámbitos: Preguntas de Rapport, Preguntas de Formación,
                                   Preguntas de Condiciones Personales y Preguntas de Perfil Profesional, cada uno de estos ámbitos
                                    tiene una calificación dependiendo del puesto al que este calificando. Si cumple con el puntaje
                                     y dependiendo de sus respuestas consideremos que es elegible para la próxima fase nos estaremos
                                      poniendo en contacto con usted para pasar a la siguiente fase que es la Entrevista Presencial,
                                       donde verificaremos las respuestas dadas por usted y la documentación de su Hoja de Vida.
                                        Deseándole la mayor de las Suertes y Mucho Éxito.
                            </p>

                            <span id="sign">Departamento de Recursos Humanos</span>

                            <!-- Iniciar Encuesta -->

                           <button type="submit" id="inicio" class="btn btn-large">Iniciar Proceso</button>

                            <div id="is-8"></div>                      

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