<?php
//Conexion a la Base de Datos
include("conexionsspi.php");
//Sesion de Usuario
include("session.php");
//Identificador
include("identity.php");

    //Identificador de Usuario en el Sistema SISPRO
    $id = $_SESSION["$usuario_valido"];
    
    $consulta = mysql_query("SELECT cedula,calif_total,tiempofinal,init,finish FROM usuarios_encuesta WHERE cedula ='$id' AND nombre_puesto = '$nom_puesto'",$conexionsspi);
    
    while ($fila = mysql_fetch_row($consulta)){
        $cedula = $fila[0];
        $calif = $fila[1];
        $time = $fila[2];
        $inicio = $fila[3];
        $final = $fila[4];       
    }
    
    //Seleccion de Pocentaje para Evaluacion
    $consulta_2 = mysql_query("SELECT id_perfil,nombre_puesto,porcentaje FROM perfil_puesto WHERE nombre_puesto = '$nom_puesto'",$conexionsspi);
    
    while ($row = mysql_fetch_row($consulta_2)){
        $id = $row[0];
        $job = $row[1];
        $percent = $row[2]; 
    }
    
    //Diferencia para Aprobar
    $level = (10 * ($percent/100));
      
    //Bonificacion o Castigo por Calificacion (+/-1)
    $nc = $calif >= 7 ? 1 : (-1);
        
    //Tiempo de Ejecucion de la Evaluacion
    $tmp_ejecucion = ($final - $inicio);
    
    //Bonificacion o Castigo por Tiempo de Ejecucion de la Encuesta (+0.5) o (-1)
    $nt = $tmp_ejecucion < 500 ? (0.5) : (-1);
        
    //Calificacion del Agente Evaluador para el Solicitante Logueado en el sistema SISPRO
    $score = ($calif + $nc + $nt);
    
    //Calificacion Final Evaluada por el Agente    
    $final_score = round($score);
    
    //Nivel de la Evaluacion
    $des = $calif >=7 ? "Evaluacion Satisfactoria" : "Evaluacion Deficiente";
    
    //Aprobacion y Elegibilidad
    $apr = $final_score >= $level ? "Elegible para Entrevista" : "No Elegible";
    
    //Actualizacion de la Tabla usuarios_encuesta con los Datos de la Evaluacion
    mysql_query("UPDATE usuarios_encuesta SET calif_final = '$final_score', nivel = '$des', elegible = '$apr'",$conexionsspi);
    
    header("Location:manteniance.php");   
    
    /*echo $tmp_ejecucion."<br>";
    echo $calif."<br>";
    echo $nc."<br>";
    echo $nt."<br>";    
    echo $dif_eval."<br>";
    echo $inicio."<br>";
    echo $final."<br>";
    echo $score."<br>";
    echo $final_score."<br>";
    echo $des."<br>";
    echo $level."<br>";
    echo $apr;
    */
    
    

/**
 * @author Gianni Narracci
 * gnarracci@gmal.com
 * @copyright 2012
 */



?>