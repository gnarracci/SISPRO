<?php
//Conexion a la Base de Datos
include("conexiontcv.php");
//Funcion Lunes
include("lunes.php");

$query = mysql_query("SELECT
nmtrabajador.CEDULA,
nmtrabajador.NOMBRE,
nmtrabajador.APELLIDO,
nmtrabajador.SALARIO,
nmdpto.DEP_DESCRI
FROM
nmtrabajador
Inner Join nmdpto
ON
nmdpto.DEP_CODIGO=nmtrabajador.COD_DPTO
WHERE
nmtrabajador.GRUPO =  '00000000' AND
nmtrabajador.CONDICION =  'A' OR
nmtrabajador.CONDICION =  'V'
ORDER BY
nmdpto.DEP_DESCRI ASC",$conexion);

    

while($row = mysql_fetch_array($query)){
    
    $salmin = 1780.45;
    $tope = 5;
    
    $nSalario = $salmin*$tope;
    
    $salario = $row["SALARIO"];
              
     if ($salario<$nSalario){
        echo $SAL = number_format((((($row["SALARIO"])*12)/52)*0.13)*lunes(), 2,',','.')."<br>";
     }else{
        echo $SALA = number_format((((($nSalario)*12)/52)*0.13)*lunes(), 2,',','.')."<br>";
     }
    
}
/**
 * @author Gianni Narracci
 * @email:gnarracci@gmail.com
 * @copyright 2012
 */



?>