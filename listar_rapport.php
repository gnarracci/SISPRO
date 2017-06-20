<?php
//Definicion de Constantes de Conexion a la Base de Datos
    define("server", 'localhost');
    define("user", 'root');
    define("pass", '');
    define("mainDataBase", 'sspi');
    
    //Variable de Verficacion de Status de la Conexion a la Base de Datos
    $errorDbConexion = false;
    
    //Funcion para extraer el listado de Preguntas
    function consultaPreg($linkDB){
        
        $consulta = $linkDB -> query("SELECT id_rapport,pregunta_rapport,puesto_trabajo,pregunta_pctaje FROM cuestionario_rapport ORDER BY id_rapport ASC");
    
    //Armado de la Tabla con los registros disponibles
    if ($consulta -> num_rows != 0)
    {
        while ($questions = $consulta -> fetch_assoc())
        {
            $listaOK .= '
                <tr>
                    <td>'.$questions['id_rapport'].'</td>
                    <td>'.$questions['pregunta_rapport'].'</td>
                    <td>'.$questions['puesto_trabajo'].'</td>
                    <td>'.$questions['pregunta_pctaje'].'</td>
                </tr>
            ';
        }
        
    }
    else{
            $listaOK = '
                <tr id="sinDatos">
                    <td colspan="10" class="centerTXT">NO HAY REGISTROS</td>
                </tr>
            ';
    }
    return $listaOK;
    }
    
    //Verficar constantes para conexion con el servidor
    if(defined('server') && defined('user') && defined('pass') && defined('mainDataBase'))
    {
        //Conexion con la Base de Datos
        
        $mysqli = new mysqli(server, user, pass, mainDataBase);
        
        //Verficamos si hay error al conectar
        if (mysqli_connect_error()) {
	    $errorDbConexion = true;
        }
        
        // Evitando problemas con acentos
        $mysqli -> query('SET NAMES "utf8"');
        
    }  
    

/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>