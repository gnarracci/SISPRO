<?php
//Retraso de ejecucion en segundos
sleep(2);

//Conexion a la Base de Datos
include("conexionsspi.php");

//Comprobando el envio de las variables
if (isset($_POST["nombres"])){
    $nombres = $_POST["nombres"];
    $apellidos  = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $sexo = $_POST["sexo"];
    $estado_civil = $_POST["estado_civil"];
    $cedula = $_POST["cedula"];
    $direccion = $_POST["direccion"];
    $ciudad = $_POST["ciudad"];
    $estado = $_POST["estado"];
    $paises = $_POST["paises"];
    $email = $_POST["email"];
    $telefono = $_POST["telloc"];
    $movil = $_POST["telmov"];
    $present = $_POST["presentacion"];
    $salario = $_POST["salario"];
    $empresa = $_POST["empresa"];
    $date = $_POST["date"];
    $datef = $_POST["date1"];
    $grado = $_POST["grado"];
    $titulo = $_POST["titulo"];
    $cursa = $_POST["cursa"];
    $uni = $_POST["uni"];
    $desde = $_POST["desde"];
    $hasta = $_POST["ha"];
    $situacion = $_POST["situ"];
    $promedio = $_POST["promedio"];
    $idioma = $_POST["idioma"];
    $nivel = $_POST["nivel"];
    $infor = $_POST["infor"];
    $adicional = $_POST["adicional"];
    $descri = $_POST["descripcion"];
    $referencias = $_POST["referencias"];
    $telefono = $_POST["tel"];
    $correo = $_POST["correo"];


//Si las variables estan cargadas se procede a la insercion de los datos
$query = "INSERT INTO res_curricular (nombres,apellidos,edad,sexo,estado_civil,cedula,direccion,ciudad,estado,paises,email,telloc,telmov,presentacion,salario,empresa,
date,date1,grado,titulo,cursa,uni,desde,ha,situ,promedio,idioma,nivel,infor,adicional,descripcion,referencias,tel,correo) VALUES 
('$nombres','$apellidos','$edad','$sexo','$estado_civil','$cedula','$direccion','$ciudad','$estado','$paises','$email','$telloc','$telmov','$present','$salario',
'$empresa','$date','$datef','$grado','$titulo','$cursa','$uni','$desde','$hasta','$situacion','$promedio','$idioma','$nivel','$infor','$adicional','$descri',
'$referencias','$telefono','$correo')";
mysql_query($query) or die (mysql_errno()." - ".mysql_error());

header("Location:mensaje.php");

}

?>
