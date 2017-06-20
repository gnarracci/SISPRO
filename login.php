<?php
//Conexion a la Base de Datos
include("conexion.php");

//Omitir Errores
ini_set("display_errors", false);

//Preguntamos si se han enviado ya las variables necesarias
if (isset($_POST["usuario"])){
    $usuario = $_POST["usuario"];
    $sha1_pwd = $_POST["clave"];
    $reclave = $_POST["reclave"];
    $cedula = $_POST["cedula"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $direccion = $_POST["direccion"];
    $nacionalidad = $_POST["nacionalidad"];
    $email = $_POST["email"];
    $date = $_POST["date"];

//Comprobando si el nombre de Usuario o la Cuenta de Correo ya existen
$checkuser = mysql_query("SELECT usuario FROM nmaspirantes WHERE usuario='$usuario'");
$username_exits = mysql_num_rows($checkuser);

$checkmail = mysql_query("SELECT email FROM nmaspirantes WHERE email='$email'");
$email_exits = mysql_num_rows($checkmail); 

if ($email_exits>0 | $username_exits>0){
    echo "<center>El Nombre de Usuario o la Cuenta de Correo ya estan en Uso.<a href = 'javascript:history.go(-1)'>Regresar</a>.<center>";
}else{
//Todo Correcto se procede a la Insercion de los Datos
$query = "INSERT INTO nmaspirantes (cedula,nombres,apellidos,nacionalidad,date,direccion,email,usuario,clave) VALUES ('$cedula','$nombres','$apellidos','$nacionalidad','$date','$direccion','$email','$usuario','$clave')";
mysql_query($query) or die (mysql_errno()." - ".mysql_error());
    echo "<center>El Usuario "." <h1>$usuario</h1>"." ha sido registrado de manera Satisfactoria!!!<center>";
    echo "<center>Haz Click en "." <strong>Ingreso al Sistema</strong> "." para entrar</center>"."<br>";
    echo "<center><a href = 'survey.php'>Regresar</a></center>";
}
}


/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>

<!DOCTYPE html>
    <html lang="es">
        <head>

        </head>

        <body>

        </body>
    </html>