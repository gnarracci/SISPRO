<?Php 
//Año 2012
	function lunes(){
	
		switch (date("m")){
		
			case "01":
			$lunes = 4;  //Diciembre 2011
			break;
			
			case "02":
			$lunes = 5;  //Enero 2012
			break;
			
			case "03":
			$lunes = 4;  //Febrero 2012
			break;
			
			case "04":
			$lunes = 4;  //Marzo 2012
			break;
			
			case "05":
			$lunes = 5;  //Abril 2012
			break;
			
			case "06":
			$lunes = 4;  //Mayo 2012
			break;
			
			case "07":
			$lunes = 4;  //Junio 2012
			break;
			
			case "08":
			$lunes = 5;  //Julio 2012
			break;
			
			case "09":
			$lunes = 4;  //Agosto 2012
			break;
			
			case "10":
			$lunes = 4;  //Septiembre 2012
			break;
			
			case "11":
			$lunes = 5;  //Octubre 2012
			break;
			
			case "12":
			$lunes = 4;  //Noviembre 2012
			break;
		
		}
		
		return $lunes;
	
	}
	
lunes();

/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */		


?>