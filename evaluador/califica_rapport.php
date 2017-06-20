<?php
//Conexion a la Base de Datos
include("conexionsspi.php");

//Variables de Sesion del Usuario
//include("session.php");

$numPregs = 10; //Numero maximo de Preguntas por Item a Evaluar

    $preg[0] = (isset($_POST['preg1'])?$_POST['preg1']:NULL);
    $preg[] = (isset($_POST['preg2'])?$_POST['preg2']:NULL);
    $preg[] = (isset($_POST['preg3'])?$_POST['preg3']:NULL);
    $preg[] = (isset($_POST['preg4'])?$_POST['preg4']:NULL);
    $preg[] = (isset($_POST['preg5'])?$_POST['preg5']:NULL);
    $preg[] = (isset($_POST['preg6'])?$_POST['preg6']:NULL);
    $preg[] = (isset($_POST['preg7'])?$_POST['preg7']:NULL);
    $preg[] = (isset($_POST['preg8'])?$_POST['preg8']:NULL);
    $preg[] = (isset($_POST['preg9'])?$_POST['preg9']:NULL);
    $preg[] = (isset($_POST['preg10'])?$_POST['preg10']:NULL);
    
    $respDada[0] = (isset($_POST['0'])?$_POST['0']:NULL);
    $respDada[] = (isset($_POST['1'])?$_POST['1']:NULL);
    $respDada[] = (isset($_POST['2'])?$_POST['2']:NULL);
    $respDada[] = (isset($_POST['3'])?$_POST['3']:NULL);
    $respDada[] = (isset($_POST['4'])?$_POST['4']:NULL);
    $respDada[] = (isset($_POST['5'])?$_POST['5']:NULL);
    $respDada[] = (isset($_POST['6'])?$_POST['6']:NULL);
    $respDada[] = (isset($_POST['7'])?$_POST['7']:NULL);
    $respDada[] = (isset($_POST['8'])?$_POST['8']:NULL);
    $respDada[] = (isset($_POST['9'])?$_POST['9']:NULL);
    $respDada[] = (isset($_POST['10'])?$_POST['10']:NULL);
    $cedula = (isset($_POST['ced'])?$_POST['ced']:NULL);
    
    if(!$preg || !$respDada || !$cedula ){
        $mensaje = "Acceso Invalido";
    }
    else{
        $calif = 0;
        $consulta = mysql_query("SELECT nombres FROM usuarios_encuesta WHERE nombres = '$user'",$conexionsspi);
        
        //Calificación
        
        //Ejecucion de Consulta de Comparación y Verificación de Respuestas
        for($cju=0;$cju<sizeof($preg);$cju++){
            
          $consulta = mysql_query("SELECT id_resp_rapport from corresponde_rapport where id_rapport='$preg[$cju] and sipi=1'",$conexionsspi);
          
          $idres = mysql_result($consulta,0,'id_resp_rapport');
          
          $consulta = mysql_query("SELECT resp_rapport from resp_rapport where id_resp_rapport='$idres'",$conexionsspi);
          
          $respuestidirijilla = mysql_result($consulta,0,'resp_rapport');
          
          if($respDada[$cju]==$respuestidirijilla) $calif+=1;
        }
        
        //Ejecución de la Consulta de Actualización
        mysql_query("UPDATE usuarios_encuesta SET calif_rapport = '$calif' WHERE nombres = '$user'",$conexionsspi);
        
        mysql_close($conexionsspi);
        
        echo $calif;
    }
    
    








/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2013
 */



?>