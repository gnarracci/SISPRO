//CRONOMETRO
//Autor: Iván Nieto Pérez
//Este script y otros muchos pueden
//descarse on-line de forma gratuita
//en El Código: www.elcodigo.net
var CronoID = null
var CronoEjecutandose = false
var decimas, segundos, minutos

function DetenerCrono (){
   	if(CronoEjecutandose)
   		clearTimeout(CronoID)
   	CronoEjecutandose = false
}

function InicializarCrono () {
	//inicializa contadores globales
	decimas = 0
	segundos = 0
	minutos = 0
	
	//pone a cero los marcadores
	document.crono.display.value = '00:00:0'
	document.crono.parcial.value = '00:00:0'
}

function MostrarCrono () {
	       
   	//incrementa el crono
   	decimas++
	if ( decimas > 9 ) {
		decimas = 0
		segundos++
		if ( segundos > 59 ) {
			segundos = 0
			minutos++
			if ( minutos > 99 ) {
				alert('Fin de la cuenta')
				DetenerCrono()
				return true
			}
		}
	}

	//configura la salida
	var ValorCrono = ""
	ValorCrono = (minutos < 10) ? "0" + minutos : minutos
	ValorCrono += (segundos < 10) ? ":0" + segundos : ":" + segundos
	ValorCrono += ":" + decimas	
			
  	document.crono.display.value = ValorCrono

  	CronoID = setTimeout("MostrarCrono()", 100)
	CronoEjecutandose = true
	return true
}

function IniciarCrono () {
 	DetenerCrono()
 	InicializarCrono()
	MostrarCrono()
}

function ObtenerParcial() {
	//obtiene cuenta parcial
	document.crono.parcial.value = document.crono.display.value
}

//UTILIZACION
//<!-- Para visualizar el cronómetro -->
//<form name="crono">
//<div align="center"><center>
//<p><input type="text" size="8" name="display" value="00:00:0"><input type="button" name="Iniciar" value=" Iniciar " onClick="IniciarCrono()"></p>
//<p><input type="text" size="8" name="parcial" value="00:00:0 "> <input type="button" name="Parcial" value="Parcial" onClick="ObtenerParcial()"></p>
//<p><input type="button" name="Parar" value=" Parar " onClick="DetenerCrono()"> <input type="button" name="Cero" value="  Cero  " onClick="DetenerCrono(); InicializarCrono()"></p>
//</center></div>
//</form>