<?php
//Conexion con la Base de Datos
include("conexionsspi.php");

    //Emular Retardo de la Red
    sleep(2);
    
    //Consulta de Solicitantes Evaluados por Puntos en el Sistema
    $query = "SELECT id_eval,cedula,nombres,apellidos,nombre_puesto,calif_rapport,calif_formacion,calif_condicion,calif_profesional,calif_total FROM usuarios_encuesta ORDER BY calif_total DESC";
    
    //Ejecucion de la Consulta
    $consulta = mysql_query($query) or die (mysql_errno().' - '.mysql_error());
    
    //Numero de registros encontrados en la Consulta
    $num_res = mysql_num_rows($consulta);
    
    //Armado de la Tabla de Registros
    if ($num_res !=0)
    {
        while ($res_list = mysql_fetch_array($consulta))
        {
            $listaevalptos .= '
                <tr>
                    <td>'.$res_list['id_eval'].'</td>
                    <td>'.$res_list['cedula'].'</td>
                    <td>'.$res_list['nombres'].'</td>
                    <td>'.$res_list['apellidos'].'</td>
                    <td>'.$res_list['nombre_puesto'].'</td>
                    <td>'.$res_list['calif_rapport'].'</td>
                    <td>'.$res_list['calif_formacion'].'</td>
                    <td>'.$res_list['calif_condicion'].'</td>
                    <td>'.$res_list['calif_profesional'].'</td>
                    <td>'.$res_list['calif_total'].'</td>                        
                </tr>
            ';
        }
    }
    else{
            $listaevalptos = '
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