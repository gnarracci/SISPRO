<?php
	//Conexion con el Motor de Base de Datos
$conexioncnf = mysql_connect("127.0.0.1","root","") 
or die ('No se pudo efectuar la conexion '.mysql_errno()." - ". mysql_error());
//echo "Conexion Establecida!!!";

  //Seleccion de la Base de Datos
mysql_select_db("sisprocnf",$conexioncnf) 
or die ('No se pudo seleccionar la Base de Datos '.mysql_errno()." - ". mysql_error());


/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>