<?php
session_start();
	session_destroy();

    //si no existe, envio a la p�gina de autentificacion
    header("Location: micuenta.php");
    //ademas salgo de este script
    exit();
  
/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>