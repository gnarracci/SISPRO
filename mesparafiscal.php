<?Php 
		
			function mes(){
			
				switch (date("F")){
					case "January":
					$mes = "Diciembre";
					break;
					case "February":
					$mes = "Enero";
					break;
					case "March":
					$mes = "Febrero";
					break;
					case "April":
					$mes = "Marzo";
					break;
					case "May":
					$mes = "Abril";
					break;
					case "June":
					$mes = "Mayo";
					break;
					case "July":
					$mes = "Junio";
					break;
					case "August":
					$mes = "Julio";
					break;
					case "September":
					$mes = "Agosto";
					break;
					case "October":
					$mes = "Septiembre";
					break;
					case "November":
					$mes = "Octubre";
					break;
					case "December":
					$mes = "Noviembre";
					break;	
	
					}
				return $mes;	
			}
					
mes();		
			
/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */		
		
		
?>