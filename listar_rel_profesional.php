<?php
//Conexion con la Base de Datos
include("conexionsspi.php");

    //Consulta de Relaciones Preguntas y Respuestas cargadas
    $query = "SELECT * FROM corresponde_profesional";
    
    //Ejecucion de la Consulta
    $consult = mysql_query($query) or die (mysql_errno().' - '.mysql_error());
    
    //Numero de Registros encontrados en la Consulta
    $num_rel = mysql_num_rows($consult);
    
    //Armado de la Tabla de Registros
    if ($num_rel != 0)
    {
        while ($rel = mysql_fetch_array($consult))
        {
            $listarelacion .= '
                <tr>
                    <td style="text-align:center;">'.$rel['sipi'].'</td>
                    <td style="text-align:center;">'.$rel['id_profesional'].'</td>
                    <td style="font-weight:bold;text-align:center;">'.$rel['id_resp_profesional'].'</td>
                </tr>
            ';
        }    
    }
    else{
            $listarelacion = '
                <tr id="sinDatos">
                    <td style="text-align:center;" colspan="10" class="centerTXT">NO HAY REGISTROS</td>
                </tr>
            ';
    }





/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>