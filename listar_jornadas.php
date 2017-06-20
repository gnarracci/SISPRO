<?php
//Conexion a la Base de Datos SSPI
include("conexionsspi.php");

//Omitir Errores
ini_set("display_errors", false);

    //Consultas de Jornadas de Trabajo
    $consult = "SELECT id_tipopuesto,tipo_puestotrab FROM tipo_puesto ORDER BY id_tipopuesto ASC";
    
    $listin = mysql_query($consult);
    
    //Numero de Registros encontrados en la consulta
    $num_reg = mysql_num_rows($listin);
        
    //Armando la Tabla de Registros
    if ($num_reg != 0)
    {
        while ($jornadas = mysql_fetch_array($listin))
        {
            $jornadas_trab .= '
                <tr>
                    <td>'.$jornadas['id_tipopuesto'].'</td>
                    <td>'.$jornadas['tipo_puestotrab'].'</td>
                </tr>
            ';
        }
    }
    else{
            $jornadas_trab = '
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