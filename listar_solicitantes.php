<?php
//Conexion a la Base de Datos SSPI
include("conexionsspi.php");

//Omitir Errores
ini_set("display_errors", false);

    //Consulta de Solicitantes
    $query = "SELECT cedula,nombres,apellidos,edad,sexo,paises FROM res_curricular ORDER BY cedula ASC";
    
    $listed = mysql_query($query);
    
    //Numero de Registros de la Consulta    
    $reg_numbers = mysql_num_rows($listed);
        
    //Paginador
    if (!isset($_GET["pagina"])){
        //Si la variable pagina no se encuentra en la url la setea por defecto "Primera Pagina"
        $pagina = 1;
    }else{
        //De lo contrario la variable del sistema $_GET captura la variable pasada por la url 'pagina' y se la asigna a la variable $pagina
        sleep(1);
        $pagina = $_GET["pagina"];
    }
    
    //Cantidad de registros a ser mostrados por la paginacion
    $last = 5;
    
    //Primera posicion del cursor para recoger los Datos de la BD
    $since = (($last*$pagina) - $pagina);
    
    //Sentencia para llamar los registros de la BD
    $sql = "SELECT cedula,nombres,apellidos,edad,sexo,paises FROM res_curricular ORDER BY cedula ASC LIMIT $since,$last";
    
    $list = mysql_query($sql);
    
    //Calculando el numero de paginas a mostrar
    $pages = ceil($reg_numbers/$last);
    
    //Armado de la Tabla de Registros
    if ($reg_numbers != 0){
    
    while ($listadoOK = mysql_fetch_array($listed))
        {            
            $salida .= '
                <tr>
                    <td>'.$listadoOK['cedula'].'</td>
                    <td>'.$listadoOK['nombres'].'</td>
                    <td>'.$listadoOK['apellidos'].'</td>
                    <td>'.$listadoOK['edad'].'</td>
                    <td>'.$listadoOK['sexo'].'</td>
                    <td>'.$listadoOK['paises'].'</td>
                    <td class="centerTXT"><a class="btn btn-small" href="">Editar</a></td>
                </tr>
            ';    
        }
        }
        else
        {
            $salida = '
                <tr id="sinDatos">
                    <td colspan="10" class="centerTXT">NO HAY SOLICITANTES REGISTRADOS EN EL SISTEMA</td>
                </tr>
            ';    
        }
        
        
       
/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>