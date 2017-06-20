<?php
//Conexion a la Base de Datos
include("conexionsspi.php");

    //Emular Retardo de la Red
    sleep(3);
    
    //Omitir Errores
    ini_set("display_errors", false);
    
    //Consulta de Vacantes cargadas al Sistema
    $sql = "SELECT nombre_puesto,num_vacante,status_puesto FROM puesto_vacantes ORDER BY nombre_puesto ASC";
    
    //Ejecucion de la Consulta
    $vacant = mysql_query($sql) or die (mysql_errno().' - '.mysql_error());
    
    //Numero de Registros encontrados en la Consulta
    $num_vacant = mysql_num_rows($vacant);
    
    //Arreglo para el status de la vacante
    $statusVacante = array("Disponible" => "btn-primary",
                           "No Disponible" => "btn-warning");
    
    //Armando la Tabla de Registros
    if ($num_vacant !=0)
    {
        while ($vacante_trab = mysql_fetch_array($vacant))
        {
            $listavacantes .= '
                <tr>
                    <td>'.$vacante_trab['nombre_puesto'].'</td>
                    <td>'.$vacante_trab['num_vacante'].'</td>
                    <td class="centerTXT"><span class="btn btn '.$statusVacante[$vacante_trab['status_puesto']].'">'.$vacante_trab['status_puesto'].'</span></td>
                </tr>
            ';
        }
    }
    else{
            $listavacantes = '
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