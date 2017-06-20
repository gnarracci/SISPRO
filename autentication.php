<?php

require('conexion.php');

//Omitir Errores
ini_set("display_errors", false);

//Inicio la sesión
session_start();

//Todos son usuarios no validos hasta que se relice la captura de las variables y su verificacion
$_SESSION["usuario"]="anonimo";
$_SESSION["valid1"]=0;

//Verificacion del envio de las variables del formulario
if(isset($_POST["usuario1"])){
    $usuario = $_POST["usuario1"];
    $sha1_pwd = $_POST["clave1"];
        
    if ($sha1_pwd==null){
        echo "<center>La Contraseña no fue enviada</center>";
    }else{
        $query = mysql_query("SELECT usuario,clave FROM nmaspirantes WHERE usuario = '$usuario'") or die (mysql_errno()." - ".mysql_error());
        $data = mysql_fetch_array($query);
        
            if($data['clave'] != $sha1_pwd){
                echo "<center>Clave Incorrecta</center>";
				echo "<center><a href='survey.php'>Volver</a></center>";
            }else{
                $query = mysql_query("SELECT usuario,clave FROM nmaspirantes WHERE usuario = '$usuario'") or die (mysql_errno()." - ".mysql_error());
                $row = mysql_fetch_array($query);
                
                    if($_SESSION["s_usuario"] = $row['usuario']){
                        $_SESSION["valid1"]=1;
                    }
               }
        }
}
        header("Location:surveyus.php");
		
		//Si estan en la base de datos registra la id del usuario
		if ($_SESSION["valid1"]=1){
		   $_SESSION["$usuario_valido"] = $usuario;
		}
        //Obteniendo nombre del usuario de la base de datos
        $query2 = mysql_query("SELECT cedula,nombres,apellidos FROM nmaspirantes WHERE usuario = '$usuario'") or die (mysql_errno() . " - " .mysql_error());
        $fila = mysql_fetch_array($query2);
        
            if ($_SESSION["valid1"]=1){
                $_SESSION["$identity"] = $fila['cedula'];
            }
           
		
        exit();

/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */
 ?>