<?php
//Conexion a la Base de Datos
include("conexionsspi.php");

    //Emular retardo de Red
    sleep(3);
    
    //Omitir Errores
    ini_set("display_errors", false);
    
    //Consultas de Puestos Cargados en el Sistema
    $query = "SELECT nombre_puesto,descripcion,max_solicitudes FROM puesto_trabajo ORDER BY nombre_puesto ASC";
    
    //Ejecucion de la consulta
    $puestos = mysql_query($query) or die (mysql_errno().' - '.mysql_error());
    
    //Numero de Registros encontrados en la consulta
    $num_puestos = mysql_num_rows($puestos);
        
    //Armando la Tabla de Registros
    if ($num_puestos !=0)
    {
        while ($puesto_trab = mysql_fetch_array($puestos))
        {
            $disponibles .= '
                <tr>
                    <td>'.$puesto_trab['nombre_puesto'].'</td>
                    <td>'.$puesto_trab['descripcion'].'</td>
                    <td>'.$puesto_trab['max_solicitudes'].'</td>
                </tr>
            ';    
        }    
    }
    else{
            $disponibles = '
                <tr id="sinDatos">
                    <td colspan="10" class="centerTXT">NO HAY REGISTROS</td>
                </tr>
            ';
    }
    

/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>