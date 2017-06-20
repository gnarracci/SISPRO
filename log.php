<?php
//Se definen las variables
$log = "log.dat";
@$ipaddress = getenv(REMOTE_ADDR);
$browser = $_SERVER["HTTP_USER_AGENT"];

$content = date("U")."|".date("Y"."|"."m"."|"."d"."|"."H"."|"."i"."|"."s")."|".$browser."|".$ipaddress."\n";

$handler = fopen($log,'a+');

fwrite($handler,$content);

/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>