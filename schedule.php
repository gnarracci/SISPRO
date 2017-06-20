<?php
$date = date ("G");

if ($date < 12){
    $greeting = "Buenos Dias !!! ";
}else{
    if ($date < 18){
        $greeting = "Buenas Tardes !!! ";
    }else{
        $greeting = "Buenas Noches !!! ";
    }
}

/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>