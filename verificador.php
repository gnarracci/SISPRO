<?php
//Conexion a la Base de Datos
include("conexionsspi.php");
//Sesion de Usuario
include("session.php");

$id = $_SESSION["$usuario_valido"];

$query = "SELECT * FROM res_curricular WHERE cedula = '$id'";

$results = mysql_query($query) or die (mysql_errno().' - '.mysql_error());

if (mysql_num_rows($results) > 0){
    $mens = " su Resumen Curricular ya esta registrado en nuestra base de datos. Continue con el Proceso de Encuesta";
}else{
    $mens = " su Resumen Curricular no se encuentra registrado en nuestra base de datos!!!. Cargue sus Datos Curriculares para continuar...";
}
			






/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>