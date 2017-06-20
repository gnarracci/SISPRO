<?php
//Conexion a la Base de Datos
include("conexionsspi.php");

    //Consulta de Solicitudes por Area Profesional
	$consulta = "SELECT area_profesional,max_solicitudes FROM puesto_trabajo ORDER BY area_profesional ASC";

	//Ejecucion de Consulta
	$exec = mysql_query($consulta) or die (mysql_errno().' - '.mysql_error());
    
        while ($row = mysql_fetch_array($exec)){
            
           echo $areap = $row["area_profesional"];
          echo  $solicitud = $row["max_solicitudes"];
       
        
        
    
    //Insercion de la Consulta en la Tabla solicitudes_areas para su procesamiento
    //$solic = "INSERT INTO solicitudes_areas (area_profesional,max_solicitudes) VALUES ('$areap','$solicitud')";
    
    //Ejecucion de la Consulta de Insercion
    //$exec_2 = mysql_query($solic) or die (mysql_errno().' - '.mysql_error());
    
    }
    

/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>