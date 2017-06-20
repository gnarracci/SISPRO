<?php
//INSERTAR Y ACTUALIZAR TABLA DE AREAS PROFESIONALES

//Conexion a la Base de Datos SSPI
//include("conexionsspi.php");

//Emular retardo de la red
sleep(3);

//Omitir Errores
ini_set("display_errors", false);

    //Consulta de Areas Profesionales
    $consulta = "SELECT id_profesional,area_profesional FROM area_profesional ORDER BY area_profesional ASC";
    
    $listar = mysql_query($consulta);
    
    //Numero de registros encontrados en la consulta
    $num_registros = mysql_num_rows($listar);
         
    //Armando la Tabla de Registros
    if ($num_registros != 0)
    {
        while ($areas = mysql_fetch_array($listar))
        {
            $areas_profesionales .= '
                <tr>
                    <td>'.$areas['id_profesional'].'</td>
                    <td>'.$areas['area_profesional'].'</td>
                </tr>
            ';    
        }
    }
    else
        {
            $areas_profesionales = '
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