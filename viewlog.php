<?php

$log = "log.dat";
$handler = fopen ($log, "r");

echo '<table width=100% border="1">';

while($datos = fgetcsv($handler, 1000000, "|")){
    
    $timestamp = $datos[0];
    $year = $datos[1];
    $month = $datos[2];
    $day = $datos[3];
    $hour = $datos[4];
    $minute = $datos[5];
    $seconds = $datos[6];
    $browser = $datos[7];
    $ip = $datos[8];
    
    
echo '
    <tr>
        <td border="1">'.$timestamp.'</td>
        <td border="1">'.$year.'</td>
        <td border="1">'.$month.'</td>
        <td border="1">'.$day.'</td>
        <td border="1">'.$hour.'</td>
        <td border="1">'.$minute.'</td>
        <td border="1">'.$seconds.'</td>
        <td border="1">'.$browser.'</td>
        <td border="1">'.$ip.'</td>
    </tr>
';    

    
}

echo '</table>';

fclose($handler);



/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>