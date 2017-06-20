<?php
//Incluyo el archivo de sesion 
include("session.php");
?>
<!DOCTYPE html>
        <html lang="es">
            <head>
                <meta charset="utf-8"/>
                <title>Mensaje del Sistema</title>
                <link rel="shortcut icon" href="favicon.ico"/>
				<link rel="stylesheet" href="mensaje.css"/>
            </head>
                <body>

                    <div id="container">

                        <a href="survey.php"><img src="imagenes/encuesta.png" width="135px" height="173px" alt="encuesta" title="Tome su encuesta Pre-Empleo Aquí" id="encuesta" /></a>

                        <div id="cuerpo">

                            <img src="imagenes/checking.png" width="240px" height="224px" alt="succesful" id="checking" />

                            <p id="mensaje">

                                <span id="notice">Su Resumén Curricular fue recibido Satisfactoriamente!!!</span>

                            </p>



                        </div>

                    </div>

                </body>
        </html>