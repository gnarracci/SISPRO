<?php

//Inicio la sesi�n
session_start();

//Verifico si es un usuario autenticado
if ($_SESSION["valido"]!=1) 
{//quiere decir que tiene prohibida la entrada a cualquier lugar privado

    //si no existe, envio a la p�gina de autentificacion
    header("Location: registro.html");
    //ademas salgo de este script
    exit();
}

/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */
?>