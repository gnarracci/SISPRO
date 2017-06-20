<?php
//Definimos las constantes de conexion a la base de datos
    define("server", 'localhost');
    define("user", 'root');
    define("pass", '');
    define("mainDataBase", 'sspi');
    
// Variable que indica el status de la conexión a la base de datos
    $errorDbConexion = false;
    
//Funcion para extraer el listado de Preguntas
    function consultaRespuestas($linkDB){
        
        $consulta = $linkDB -> query("SELECT id_resp_condicion,resp_condicion,id_asociado,pctaje_minimo FROM resp_condicion ORDER BY id_resp_condicion ASC"); 
                                     
        if($consulta -> num_rows != 0){
            //Convertimos el objeto
            while($listadoOK = $consulta -> fetch_assoc())
            {
                $salida .= '
                    <tr>
                        <td>'.$listadoOK['resp_condicion'].'</td>
                        <td style="color:red;font-weight:bold;text-align:center;">'.$listadoOK['id_asociado'].'</td>
                        <td style="font-weight: bold;text-align:center;">'.$listadoOK['pctaje_minimo'].'</td>
                        <td id="edit" class="centerTXT"><a class="btn btn-small" href="'.$listadoOK['id_resp_condicion'].'">Editar</a></td>
                    </tr>
                ';   
            }
        }
        else
            {
                $salida = '
                    <tr id="sinDatos">
                        <td colspan="5" class="centerTXT">NO HAY REGISTROS EN LA BASE DE DATOS</td>
                    </tr>
                ';
            }
            
            return $salida;
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