<?php
//Conexion a la Base de Datos
include("conexionsspi.php");

session_start();
	session_destroy();

    //Consulta de Mantenimiento
    mysql_query("UPDATE usuarios_encuesta SET flag = '0' WHERE presento = '1'",$conexionsspi);    
    
    header("Location:survey.php"); //Redirecciona al Inicio de la Encuesta
    
    exit(); //Sale del Script


/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>