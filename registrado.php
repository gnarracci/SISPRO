<link rel="shortcut icon" href="favicon.ico"/>
<?php
//Conexion a la Base de Datos
include("conexion.php");

//Preguntamos si se han enviado ya las variables necesarias
if (isset($_POST["username"])){
    $username = $_POST["username"];
    $sha1_pwd = $_POST["password"];
    $repassword = $_POST["repassword"];
    $email = $_POST["email"];
    $date = $_POST["date"];

//Comprobando si el nombre de Usuario o la Cuenta de Correo ya existen
$checkuser = mysql_query("SELECT username FROM nmusuarios WHERE username='$username'");
$username_exits = mysql_num_rows($checkuser);

$checkmail = mysql_query("SELECT email FROM nmusuarios WHERE email='$email'");
$email_exits = mysql_num_rows($checkmail); 

if ($email_exits>0 | $username_exits>0){
    echo "<center>El Nombre de Usuario o la Cuenta de Correo ya estan en Uso.<a href = 'javascript:history.go(-1)'>Regresar</a>.<center>";
}else{
//Todo Correcto se procede a la Insercion de los Datos
$query = "INSERT INTO nmusuarios (username,password,email,date) VALUES ('$username','$sha1_pwd','$email','$date')";
mysql_query($query) or die (mysql_errno()." - ".mysql_error());
    echo "<center>El Usuario "." <h1>$username</h1>"." ha sido registrado de manera Satisfactoria!!!<center>";
    echo "<center>Haz Click en "." <strong>Ingreso al Sistema</strong> "." para entrar</center>"."<br>";
    echo "<center><a href = 'registro.html'>Regresar</a></center>";
}
}


/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2011
 */



?>