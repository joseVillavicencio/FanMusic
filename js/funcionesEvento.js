function notLogged(){
	if(localStorage.getItem("id_M")==""){
		return true;
	}
	return false;
}
function logOut(){
	localStorage.setItem("nombre","");
	localStorage.setItem("apellido","");
	localStorage.setItem("id_M","");
	localStorage.setItem("edad","");
	localStorage.setItem("apodo","");
	localStorage.setItem("correo","");
	localStorage.setItem("gustos","");
	localStorage.setItem("ctaFB","");
	localStorage.setItem("ctaTW","");
	localStorage.setItem("ctaYT","");
	localStorage.setItem("ctaIG","");
	localStorage.setItem("ctaTM","");
	location.href='indexNuevo.php';

}
function getNomActual(){
	return localStorage.getItem("nombre");
}
function getApeActual(){
	return localStorage.getItem("apellido");
}
function getApoActual(){
	return localStorage.getItem("apodo");
}
function getCorrActual(){
	return localStorage.getItem("correo");
}
function getIDActual(){
	return localStorage.getItem("id_M");
}


function tiene_mayus(valor){
	var may="ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
	var cont=0;
	for(i=0;i<valor.length;i++){
		if(may.indexOf(valor.charAt(i),0)!=-1){
			cont++;
		}
	}
	return cont;	
}

function tiene_num(valor){
	var num="0123456789";
	var cont=0;
	for(i=0;i<valor.length;i++){
		if(num.indexOf(valor.charAt(i),0)!=-1){
			cont++;
		}
	}
	return cont;	
}

function tiene_signos(valor){
	var sig=" abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789";
	var cont=0;
	for(i=0;i<valor.length;i++){
		if(sig.indexOf(valor.charAt(i),0)==-1){
			cont++;
		}
	}
	return cont;	
}

function soloNumeros(valor){
	var num="0123456789";
	var cont=0;
	for(i=0;i<valor.length;i++){
		if(num.indexOf(valor.charAt(i),0)==-1){
			cont++;
		}
	}
	return cont;
}

function validarTexto(valor,lon,str){
	var tam=valor.length;
	if(tam<lon){
		if(tiene_num(valor)==0){
			if(tiene_signos(valor)==0){
				return 1;
			}else{
				alert(""+str+" debe contener solo Texto, no signos.");
			}
		}else{
			alert(""+str+" debe contener solo Texto, no numeros.");
		}
	}else{
		alert(""+str+" tiene un tamaño maximo de "+lon+" caracteres.");
	}
	return 0;
}

function soloNumeros(valor){
	var num="0123456789";
	var cont=0;
	for(i=0;i<valor.length;i++){
		if(num.indexOf(valor.charAt(i),0)==-1){
			cont++;
		}
	}
	return cont;
}

//=============================================================

function saludo(div){
	$(div).append("<h1><center>Bienvenido a tus eventos "+getApoActual()+"<center></h1>");
}

function presentacion(div){
	$(div).append('<div id="calendario" style="margin-left:3%;margin-right:3%;" ><iframe src="https://calendar.google.com/calendar/embed?src=a0aqpp5472g13a7921k5rk6t44%40group.calendar.google.com&ctz=America/Santiago" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe></div>');
} 

function editarEventos(div){ //POR EL MOMENTO, AL PARECER NADIE ESTÁ LLAMANDO A ESTA FUNCIÓN
	$(div).append('<div id="hacerEdicion"> <a href="https://calendar.google.com/calendar/render?pli=1" class="btn btn-info btn-md" role="button" align="right">Agregar Evento al Calendario</a></div>');
}

function mostrarLideresCorreo(div){
	
	var parametros = {
		
	}
	$.ajax({
		data: parametros,
		url: "php/mostrarLideresCorreo.php",
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){			
			$(div).append(response);
		}
	});
}
function tablaAdmin(div){
	var parametros = {
		"id" :  getIDActual(),//Nombre que llego desde el formulario	
		"tipoUs" : getTipoActual(),
	}
	$.ajax({
		data: parametros,
		url: "php/listaAdmin.php",
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){			
			$(div).append(response);	
		}
	});
}

function tablaMod(div){
	var parametros = {
		"id" :  getIDActual()//Nombre que llego desde el formulario	
	}
	$.ajax({
		data: parametros,
		url: "php/listagrupo.php",
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){			
			$(div).append(response);	
		}
	});
}
function tablaEventos(div){
	var parametros = {
		"id" :  getIDActual()//Nombre que llego desde el formulario	
	}
	$.ajax({
		data: parametros,
		url: "php/listaevent.php",
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){			
			$(div).append(response);	
		}
	});
}
function eliminarEventos(idi){
	var parametros = {
		"id" :  idi	
	}
	$.ajax({
		data: parametros,
		url: "php/eliminarEvento.php", //Falta Hacer ijij
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){			
			location.href='/FanMusic/listaEventosNueva.php';
		}
	});
}
function crearEventos(div){
	var parametros = {
		"id" :  getIDActual(),//Nombre que llego desde el formulario
		"nombreG" :  ""
	}
	$.ajax({
		data: parametros,
		url: "queUsuario.php", //Falta Hacer ijij
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){	
			if(response==1 || response ==2){
				$(div).append('<a  onclick ="actualizar('+"'"+'#evento2'+"'"+','+"'"+'crearEvento.php'+"'"+')"   class="btn btn-primary" role="button" align="right">Crear Eventos</a>');
			}
		}
	});
}
function botonesEvento(div){
	var parametros = {
		"id" :  getIDActual(),//Nombre que llego desde el formulario	
		"nombreG" :  ""
	}
	$.ajax({
		data: parametros,
		url: "queUsuario.php", 
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){			
			if(response==2 || response==1){ // va a mostrar para el moderador del grupo o el admi
				$(div).append('<div id="panelE" class="panel panel-default" style="margin-right:5%;margin-left:5%;"><div class="panel-heading" >Eventos </div><div class="panel-body" ><a href='+"'"+'listaEventosNueva.php'+"'"+'  class="btn btn-primary" role="button" align="right">Gestionar Eventos </a><br><br><a href='+"'"+'miseventosEXITO.php'+"'"+'  class="btn btn-info" role="button" align="right">Ver resultados</a></div></div></div>');
			}	
		}
	});
}

function obtenerOpcionLugar(name){
	var elementos = document.getElementsByName(name);
	for(var i=0; i< elementos.length; i++){
		if(elementos[i].checked){
			return elementos[i].value;
		}
	}
	
}
function crearEvento2(){
	var seleccion=obtenerOpcionLugar("invitar");
	var pais=document.getElementById("paE").value;
	var region=document.getElementById("regE").value;
	var ciudad= document.getElementById("ciE").value;
	var	fechas = document.getElementsByName("fecha");
	var fec1=fechas[0].value.split("/"); //datos de la fecha 1
	var fec2=fechas[1].value.split("/"); //datos de la fecha 2
	var fec3=fechas[2].value.split("/"); //datos de la fecha 3
	if((validarTexto(pais,20,"Pais")==1)&&(validarTexto(region,20,"Region")==1)&&(validarTexto(ciudad,20,"Ciudad")==1)){

		var parametros = {
			"idUser":getIDActual(),
			"nombreE": document.getElementById("nombreE").value,
			"motivoE": document.getElementById("motivoE").value,
			"paE": document.getElementById("paE").value,
			"desE": document.getElementById("desE").value,
			"regE": document.getElementById("regE").value,
			"ciE": document.getElementById("ciE").value,
			"anio1" : fec1[0], "mes1" : fec1[1], "dia1" : fec1[2], 
			"anio2" : fec2[0], "mes2" : fec2[1], "dia2" : fec2[2], 
			"anio3" : fec3[0], "mes3" : fec3[1], "dia3" : fec3[2], 
			"invitar": seleccion,
		}
		$.ajax({
			data: parametros,
			url: "php/crearEv.php", //Falta Hacer ijij
			type: "POST",	//Defino la forma en que llegarán los parámetros al php
			
			success: function(response){
				alert(response);
				location.href='/FanMusic/listaEventosNueva.php';
			}
		});
	}
}

//=============================================================
// ESTA ES LA PARTE NUEVA
//=============================================================
function fechaFinal(idEv,fUno,fDos,fTres,cUno,cDos,cTres){
	var parametros = {
		"idEvento" :  idEv,//Nombre que llego desde el formulario
		"fechaUno" :  fUno,
		"fechaDos" :  fDos,
		"fechaTres" :  fTres,
		"cantUno" :  cUno,
		"cantDos" :  cDos,
		"cantTres" :  cTres,	
	}
	$.ajax({
		data: parametros,
		url: "php/fechaFinalEvento.php",
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){
			alert(response);
			location.href='miseventosEXITONUEVO.php';
		}
	});
}

function asistenciaEvento(div){
	var parametros = {
		'idM' :  getIDActual()//Nombre que llego desde el formulario	
	}
	$.ajax({
		data: parametros,
		url: "php/asistenciaEvento.php",
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){
			if(response==0){
				alert("Actualmente no tienes eventos pendientes :)");
			}else{
				$(div).append(response);	
			}
		}
	});
}

function obtenerOpcionFechas(name){
	var elementos = document.getElementsByName(name);
	for(var i=0; i< elementos.length; i++){
		if(elementos[i].checked){
			return elementos[i].value;
		}
	}
	
}

function informarAsistencia(id, nombreEvento,name){
	var seleccion=obtenerOpcionFechas(name);

	var parametros = {
		"id" :  id,//Nombre que llego desde el formulario	
		"nombreEvento" : nombreEvento,
		"fechaEscogida": seleccion,
	}
	$.ajax({
		data: parametros,
		url: "php/informarAsistenciaEvento.php",
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){	
			alert(response);
			if(response=="Listo!"){
				location.href='FanMusic/miseventosEXITONUEVO.php';
			}
		}
	});
}

function resultadosClub(div){
	var parametros = {
		"idM" :  getIDActual()
	}
	$.ajax({
		data: parametros,
		url: "php/resultadosFechasClub.php",
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){
			//alert(response);
			$(div).append(response);
			datosGrafico();
		}
	});
}
function resultadosGrupo(div){
	var parametros = {
		"idM" :  getIDActual()
	}
	$.ajax({
		data: parametros,
		url: "php/resultadosFechasGrupo.php",
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){
			$(div).append(response);
			datosGraficoGrupo();
		}
	});
}

function actualizar(div,dir){
	$(div).load(dir);
}
function ventanaPopEventos(){
	window.open('/FanMusic/ventanaPopEventos.php',"Eventos","width=420,height=340,toolbar=no");
}
function datosGraficoGrupo(){
	
	var parametros = {
		"idM" :  getIDActual()
	}
	$.ajax({
		data: parametros,
		url:	"php/CantidadFechasGrupo.php",
		type:	"POST",
		dataType: "JSON",
		cache:	false,
		
		success:	function(response){
			
			if(response.status=="success"){
				var resp = (response.message).split(";");
				localStorage.setItem("cant1",resp[0]);
				localStorage.setItem("cant2",resp[1]);
				localStorage.setItem("cant3",resp[2]);
				var time = resp[3].split(" ");
				var opc ="Fecha: "+time[0]+"<br>Hora: "+time[1]+"<br>";
				localStorage.setItem("fecha1",opc);
				var time2 = resp[4].split(" ");
				var opc2 ="Fecha: "+time2[0]+"<br>Hora: "+time2[1]+"<br>";
				localStorage.setItem("fecha2",opc2);
				var time3 = resp[5].split(" ");
				var opc3 ="Fecha: "+time3[0]+"<br>Hora: "+time3[1]+"<br>";
				localStorage.setItem("fecha3",opc3);
			}else{
				if(response.status=="error"){
					alert(response.message);
				}
			}	
		}
	});
}
function datosGrafico(){
	
	var parametros = {
		"idM" :  getIDActual()
	}
	$.ajax({
		data: parametros,
		url:	"php/CantidadFechas.php",
		type:	"POST",
		dataType: "JSON",
		cache:	false,
		
		success:	function(response){
			
			if(response.status=="success"){
				var resp = (response.message).split(";");
				localStorage.setItem("cant1",resp[0]);
				localStorage.setItem("cant2",resp[1]);
				localStorage.setItem("cant3",resp[2]);
				var time = resp[3].split(" ");
				var opc ="Fecha: "+time[0]+"<br>Hora: "+time[1]+"<br>";
				localStorage.setItem("fecha1",opc);
				
				var time2 = resp[4].split(" ");
				var opc2 ="Fecha: "+time2[0]+"<br>Hora: "+time2[1]+"<br>";
				localStorage.setItem("fecha2",opc2);
				var time3 = resp[5].split(" ");
				var opc3 ="Fecha: "+time3[0]+"<br>Hora: "+time3[1]+"<br>";
				localStorage.setItem("fecha3",opc3);
			}else{
				if(response.status=="error"){
					alert(response.message);
				}
			}	
		}
	});
}

function contarFechaUno(){
	return localStorage.getItem("cant1");
}
function contarFechaDos(){
	return localStorage.getItem("cant2");
}
function contarFechaTres(){
	return localStorage.getItem("cant3");
}
function FechaTres(){
	return localStorage.getItem("fecha3");
}
function FechaDos(){
	return localStorage.getItem("fecha2");
}
function FechaUno(){
	return localStorage.getItem("fecha1");
}
function mostrarResultados(div){
	var parametros = {
		'id' :  getIDActual(),//Nombre que llego desde el formulario	
		"nombreG" :  ""
	}
	$.ajax({
		data: parametros,
		url: "queUsuario.php",
		type: "POST",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){
			//alert(response);
			if(response==1){ //Es un Administrador	
				resultadosClub(div);
			}else{
				if(response==2){ //Es un Moderador
					resultadosGrupo(div);
				}
			}
		}
	});
}
