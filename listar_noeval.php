<?php
//Conexion con la Base de Datos
include("conexionsspi.php");

    //Emular Retardo de la Red
    sleep(2);
    
    //Consulta de Solicitantes sin Evaluar por el Sistema
    $query = "SELECT nombres,apellidos,edad,sexo,estado_civil,cedula,telloc,telmov,titulo FROM res_curricular ORDER BY cedula ASC";
    
    //Ejecucion de la Consulta
    $consulta = mysql_query($query) or die (mysql_errno().' - '.mysql_error());
    
    //Numero de registros encontrados en la Consulta
    $num_res = mysql_num_rows($consulta);
    
    //Armado de la Tabla de Registros
    if ($num_res !=0)
    {
        while ($res_list = mysql_fetch_array($consulta))
        {
            $listanoeval .= '
                <tr>
                    <td>'.$res_list['nombres'].'</td>
                    <td>'.$res_list['apellidos'].'</td>
                    <td>'.$res_list['edad'].'</td>
                    <td>'.$res_list['sexo'].'</td>
                    <td>'.$res_list['estado_civil'].'</td>
                    <td>'.$res_list['cedula'].'</td>
                    <td>'.$res_list['telloc'].'</td>
                    <td>'.$res_list['telmov'].'</td>
                    <td>'.$res_list['titulo'].'</td>                        
                </tr>
            ';
        }
    }
    else{
            $listanoeval = '
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