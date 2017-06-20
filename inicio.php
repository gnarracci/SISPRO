<?php
//Conexion a la Base de Datos
include("conexionsspi.php");

//Sesion de Usuario
include("session.php");
    
    //Variables enviadas mediante POST        
    if (isset($_POST['cedula'])){
        $cedula = $_POST['cedula'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $vacante = $_POST['nombre_puesto'];
        $date = $_POST['fecha'];
        $time = $_POST['tiempoinicial'];
        $init = $_POST['init'];
        $flag = $_POST['flag'];
        
        $query = "INSERT INTO usuarios_encuesta (cedula,nombres,apellidos,nombre_puesto,fecha,tiempoinicial,init,flag) VALUES ('$cedula','$nombres','$apellidos','$vacante','$date','$time','$init','$flag')";
        
        
        mysql_query($query) or die (mysql_errno().' - '.mysql_error());
            
        
        header("Location:encuesta.php");        
        
    }
    
    
        

/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>