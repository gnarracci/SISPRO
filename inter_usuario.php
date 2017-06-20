<?php
//Conexion a la Base de Datos
include("conexioncnf.php");
//Sesion de Usuario Logueado
include("session.php");
    
    $id = $_SESSION["$usuario_valido"];
    
    //Consulta de Nombre de Usuario en nmaspirantes
    $user = "SELECT * FROM nmaspirantes WHERE cedula = '$id'";
    
    $usuario = mysql_query($user) or die (mysql_errno().' - '.mysql_error());
    
    $nom = mysql_fetch_array($usuario);
    
    $name = $nom['nombres'];
    
    $surname = $nom['apellidos'];
    
    $sex = $nom['sexo'];
    
    $addr = $nom['direccion'];
    
    $correo = $nom['email'];
    
/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>