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

function validarTexto(valor,lon,str){ //FUNCION QUE PROBABLEMENTE SEA ELIMINADA
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
				$.ajax({
					data: parametros,
					url: "crearEvento.php", //Falta Hacer ijij
					type: "POST",	//Defino la forma en que llegarán los parámetros al php
					success: function(response){	
						$(div).append(response);
					}
				});
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
	var idioma= ($("#lang option:selected").text());
	var pais=($("#pais option:selected").text());
	var region=($("#region option:selected").text());
	var ciudad= ($("#ciudad option:selected").text());;
	var nombre=document.getElementById("nombreE").value;
	var motivo=document.getElementById("motivoE").value;
	var des=document.getElementById("desE").value;
	
	if(ciudad == "Seleccione Ciudad"){
		ciudad =($("#region option:selected").text());
	}
	var	fechas = document.getElementsByName("fecha");
	var fec1=fechas[0].value.split("/"); 
	var fec2=fechas[1].value.split("/"); 
	var fec3=fechas[2].value.split("/"); 
		if((pais!="Selecciona País")&&(region!="Selecciona Región")&&(ciudad!="Selecciona Ciudad")&&(nombre!="")&&(motivo!="")&&(des!="")&&(fec1!="")){
			var parametros = {
				"idUser":getIDActual(),
				"nombreE": nombre,
				"motivoE": motivo,
				"desE": des,
				"paisN": pais,
				"regionN": region,
				"ciudadN": ciudad,
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
					
					if(response==1){
						location.href='/FanMusic/listaEventosNueva.php';
					}else{
						if(response==2){
							alert("No existen participantes que residan en el país seleccionado");
							location.href='/FanMusic/listaEventosNueva.php';
						}else{
							if(response==3){
								alert("No existen participantes que residan en la region seleccionada");
								location.href='/FanMusic/listaEventosNueva.php';
							}else{
								if(response==4){
									alert("No existen participantes que residan en la ciudad seleccionada");
									location.href='/FanMusic/listaEventosNueva.php';
								}else{
									if(response==5){
										alert("No existen participantes para invitar a su evento");
										location.href='/FanMusic/listaEventosNueva.php';
									}else{
										alert("No fue posible crear su evento");
										location.href='/FanMusic/listaEventosNueva.php';
									}
								}
							}
						}
					}
				}
			});
		}else{
			alert("Debe responder todos los campos");
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
		'id' :  getIDActual(),
		"nombreG" :  ""
	}
	$.ajax({
		data: parametros,
		url: "queUsuario.php",
		type: "POST",	
		
		success: function(response){
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
//=======================================================================================
//paises
//====================================+
function cargar_paises()
{
	$.get("php/cargar-paises.php", function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$('#pais').append(resultado);			
		}
	});	
}
function dependencia_estado()
{
	var code = $("#pais").val();
	$.get("php/dependencia-estado.php", { code: code },
		function(resultado)
		{
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$("#region").attr("disabled",false);
				document.getElementById("region").options.length=1;
				$('#region').append(resultado);			
			}
		}

	);
}

function dependencia_ciudad()
{
	var code = $("#region").val();
	$.get("php/dependencia-ciudades.php?", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#ciudad").attr("disabled",false);
			document.getElementById("ciudad").options.length=1;
			$('#ciudad').append(resultado);			
		}
	});	
	
}