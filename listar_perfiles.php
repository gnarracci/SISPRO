<?php
//Conexion con la Base de Datos
include("conexionsspi.php");

//Omitir Errores
ini_set("display_errors", false);

    //Consultas de los Perfiles
    $query = "SELECT id_perfil,area_profesional,nombre_puesto,descripcion,porcentaje FROM perfil_puesto ORDER BY id_perfil ASC";
    
    $liste = mysql_query($query);
    
    //Numero de Registros encontrados en la consulta
    $num_register = mysql_num_rows($liste);
    
    //Armando la tabla de Registros
    
    if ($num_register != 0)
    {
        while ($perfiles = mysql_fetch_array($liste))
        {
            $perfil_puesto .='
                <tr>
                    <td>'.$perfiles['id_perfil'].'</td>
                    <td>'.$perfiles['area_profesional'].'</td>
                    <td>'.$perfiles['nombre_puesto'].'</td>
                    <td>'.$perfiles['descripcion'].'</td>
                    <td>'.$perfiles['porcentaje'].'</td>
                </tr>
            ';
        }
    }
    else
        {
            $perfil_puesto = '
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