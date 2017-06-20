<?php
//Conexion a la Base de Datos
include("conexionsspi.php");
//Sesion del Usuario en el Ssitema
include("session.php");

    //Identificador del Usuario en el Sistema SISPRO
    $id = $_SESSION["$usuario_valido"];

    //Consulta de seleccion del Id de la Encuesta del Usuario
    $identificador = "SELECT id_eval,cedula,nombres,apellidos,nombre_puesto FROM usuarios_encuesta WHERE cedula = '$id' AND flag = '1'";
    
    $consulta = mysql_query($identificador) or die (mysql_errno().' - '.mysql_error());
    
    $identity = mysql_fetch_array($consulta);
    
    //Variables para Inclusion    
    $identificador = $identity['id_eval'];
    
    $nom_puesto = $identity['nombre_puesto'];
    
        
  
/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>