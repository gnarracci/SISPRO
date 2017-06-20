<?php

//Inicio la sesión
session_start();

//Verifico si es un usuario autenticado
if ($_SESSION["valid1"]!=1) 
{//quiere decir que tiene prohibida la entrada a cualquier lugar privado

    //si no existe, envio a la página de autentificacion
    header("Location: survey.php");
    //ademas salgo de este script
    exit();
}

/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */
?>