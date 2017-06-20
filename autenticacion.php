<?php

require('conexion.php');

//Omitir Errores
ini_set("display_errors", false);

//Inicio la sesión
session_start();

//Todos son usuarios no validos hasta que se relice la captura de las variables y su verificacion
$_SESSION["usuario"]="anonimo";
$_SESSION["valido"]=0;

//Verificacion del envio de las variables del formulario
if(isset($_POST["username"])){
    $username = $_POST["username"];
    $sha1_pwd = $_POST["password1"];
    
    if ($sha1_pwd==null){
        echo "<center>La Contraseña no fue enviada</center>";
    }else{
        $query = mysql_query("SELECT username,password FROM nmusuarios WHERE username = '$username'") or die (mysql_errno()." - ".mysql_error());
        $data = mysql_fetch_array($query);
        
            if($data['password'] != $sha1_pwd){
                echo "<center>Ingreso Incorrecto</center>";
				echo "<center><a href='registro.html'>Volver</a></center>";
            }else{
                $query = mysql_query("SELECT username,password FROM nmusuarios WHERE username = '$username'") or die (mysql_errno()." - ".mysql_error());
                $row = mysql_fetch_array($query);
                
                    if($_SESSION["s_username"] = $row['username']){
                        $_SESSION["valido"]=1;
                    }
               }
        }
}
        header("Location:selection.php");
		
		//Si estan en la base de datos registra la id del usuario
		if ($_SESSION["valido"]=1){
		   $_SESSION["$valid_user"] = $username;
		}
           
		
        exit();

/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */
 ?>