<?php
//Obtencion de la direccion remota que se conecta a la aplicacion
@$ipaddress = getenv(REMOTE_ADDR);

echo "Tu conexi�n ha sido identificada en el sistema bajo la IP de red nro: ".$ipaddress;
echo "<br>";

$browser = $_SERVER["HTTP_USER_AGENT"];

echo "Tu Conexi�n se realiza mediante el Navegador: ".$browser;


/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>