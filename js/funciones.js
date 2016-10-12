function getPassLog(){
	return document.getElementById("passLog").value;
}
function getMailLog(){
	return document.getElementById("mailLog").value;
}
function getNomSign(){
	return document.getElementById("nomSign").value;
}
function getApeSign(){
	return document.getElementById("apeSign").value;
}
function getMailSign(){
	return document.getElementById("mailSign").value;
}
function getApodSign(){
	return document.getElementById("apodSign").value;
}
function getPassSign(){
	return document.getElementById("passSign").value;
}
function getMailSign2(){
	return document.getElementById("mailSign2").value;
}
function getPassSign2(){
	return document.getElementById("passSign2").value;
}
function getAge(){
	return document.getElementById("age").value;
}
function getGustos(){
	return document.getElementById("gustos").value;
}
function getDescrip(){
	return document.getElementById("descrip").value;
}
function getPais(){
	return $("#pais option:selected").text();
}
function getRegion(){
	return $("#region option:selected").text();
}
function getCiudad(){
	return $("#ciudad option:selected").text();
}
function getFacebook(){
	return document.getElementById("facebook").value;
}
function getTwitter(){
	return document.getElementById("twitter2").value;
}
function getInstagram(){
	return document.getElementById("instagram").value;
}
function getYoutube(){
	return document.getElementById("youtube").value;
}
function getTumblr(){
	return document.getElementById("tumblr").value;
}


function tiene_mayus(valor){
	var may="ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
	var cont=0,flag=0;
	if(may.indexOf(valor.charAt(0),0)!=-1){
		cont++;
	}
	for(i=1;i<valor.length;i++){
		if(may.indexOf(valor.charAt(i),0)!=-1){
			cont++;
			flag=1;
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
	var sig="abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789 ";
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

function validarNombre(valor){
	var tam=valor.length;
	if(tam<25){
		if(tiene_num(valor)==0){
			if(tiene_signos(valor)==0){
				if(tiene_mayus(valor)==1){
					return 1;
				}else{
					alert("El nombre debe tener una Mayúscula en la primera posición.");
				}
			}else{
				alert("El nombre debe contener solo Texto, no signos.");
			}
		}else{
			alert("El nombre debe contener solo Texto, no números.");
		}
	}else{
		alert("El nombre tiene un tamaño máximo de 25 carácteres.");
	}
	return 0;
}

function validarTexto(valor,lon,str){
	var tam=valor.length;
	if(tam<25){
		if(tiene_num(valor)==0){
			if(tiene_signos(valor)==0){
				return 1;
			}else{
				alert("El "+str+" debe contener solo Texto, no signos.");
			}
		}else{
			alert("El "+str+" debe contener solo Texto, no números.");
		}
	}else{
		alert("El "+str+" tiene un tamaño máximo de "+lon+" carácteres.");
	}
	return 0;
}

function validarApellido(valor){
	var tam=valor.length;
	if(tam<25){
		if(tiene_num(valor)==0){
			if(tiene_signos(valor)==0){
				if(tiene_mayus(valor)==1){
					return 1;
				}else{
					alert("El apellido debe tener una Mayúscula en la primera posición.");
				}
			}else{
				alert("El apellido debe contener solo Texto, no signos.");
			}
		}else{
			alert("El apellido debe contener solo Texto, no números.");
		}
	}else{
		alert("El apellido tiene un tamaño máximo de 25 carácteres.");
	}
	return 0;
}
function validarApodo(valor){
	var tam=valor.length;
	if(tam<15){
		if(tiene_num(valor)==0){
			if(tiene_mayus(valor)==0){
				return 1;
			}else{
				alert("El apodo debe ser completamente escrito en minúscula.");
			}
		}else{
			alert("El apodo debe contener solo Texto, no números.");
		}
	}else{
		alert("El apodo tiene un tamaño máximo de 15 carácteres.");
	}
	return 0;
}

function validarEmail(valor){
	if(/^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(valor)){
		return 1;
	}else{
		alert("La dirección de email es incorrecta.");
	}
	return 0;
}
function validarPass(valor){ 
	var tam=valor.length;
	if((tam>=6)&&(tam<=12)){
		if(tiene_mayus(valor)>=1){
			if(tiene_num(valor)>=3){
				if(tiene_signos(valor)<=0){
					return 1;
				}else{
					alert("La Contraseña tiene signos.");
				}
			}else{
				alert("La contraseña no tiene al menos 3 números.");
			}
		}else{
			alert("La Contraseña no tiene Mayúsculas.");
		}
	}else{
		alert("La Contraseña debe tener entre 6 a 12 carácteres.");	
	}
	return 0;
}



function verify(){
	if((validarEmail(getMailLog())==1)&&(validarPass(getPassLog())==1)){
		logIn(getMailLog(),getPassLog(),'/FanMusic/bienvenidaNuevo.php');
	}
}



function logIn(mail,pass,dire){
	var parametros = {
		"passUser":pass,
		"mailUser":mail
	}
	$.ajax({
		data: parametros,
		url:	"php/logIn.php",
		type:	"POST",
		dataType: "JSON",
		cache:	false,
		
		success:	function(response){
			if(response.status=="success"){
				var resp = (response.message).split(";");
				localStorage.setItem("nombre",resp[0]);
				localStorage.setItem("apellido",resp[1]);
				localStorage.setItem("id_M",resp[2]);
				localStorage.setItem("edad",resp[3]);
				localStorage.setItem("apodo",resp[5]);
				localStorage.setItem("correo",resp[4]);
				localStorage.setItem("gustos",resp[6]);
				localStorage.setItem("ctaFB",resp[7]);
				localStorage.setItem("ctaTW",resp[8]);
				localStorage.setItem("ctaIG",resp[9]);
				localStorage.setItem("ctaYT",resp[10]);
				localStorage.setItem("ctaTM",resp[11]);
				location.href=dire;
			}else{
				if(response.status=="error"){
					alert(response.message);
				}
			}	
		}
	});
}

function notLogged(){
	if((localStorage.getItem("id_M")=="")){
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


function logged(){
	if((localStorage.getItem("id_M")!="")){
		if(localStorage.getItem("id_M")!=null){
			return true;
		}
	}
	return false;
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
function getEdadActual(){
	return localStorage.getItem("edad");
}
function getGustosActual(){
	return localStorage.getItem("gustos");
}
function getFBActual(){
	return localStorage.getItem("ctaFB");
}
function getTWActual(){
	return localStorage.getItem("ctaTW");
}
function getYTActual(){
	return localStorage.getItem("ctaYT");
}
function getTMActual(){
	return localStorage.getItem("ctaTM");
}
function getIGActual(){
	return localStorage.getItem("ctaIG");
}
/*
function listClubs(div){
	var parametros={"idUser":getIDActual()}
	$.ajax({
		data: parametros,
		url:	"php/obtClub.php",
		type:	"POST",
		cache:	false,
		success:	function(response){
					$(div).append(response);
		}
	});
}

function listGrups(div){
	var parametros={"idUser":getIDActual()}
	$.ajax({
		data: parametros,
		url:	"php/obtGrup.php",
		type:	"POST",
		cache:	false,
		success:	function(response){
					$(div).append(response);
		}
	});
}*/

function listPublClu(div){
	var parametros={"idUser":getIDActual()}
	$.ajax({
		data: parametros,
		url:	"php/obtPublClu.php",
		type:	"POST",
		cache:	false,
		success:	function(response){
					$(div).append(response);
		}
	});
}
function listPublGru(div){
	var parametros={"idUser":getIDActual()}
	$.ajax({
		data: parametros,
		url:	"php/obtPublGru.php",
		type:	"POST",
		cache:	false,
		success:	function(response){
					$(div).append(response);
		}
	});
}


function comentar(idPublic){
	var content=document.getElementById(idPublic).value;
	if(content!=""){
		if(getIDActual()!=""){
			var parametros={
				"idPubl":idPublic,
				"contenido":content,
				"idUser":getIDActual(),
				"apodo":getApoActual()
			}
			$.ajax({
				data: parametros,
				url:	"php/coment.php",
				type:	"POST",
				cache:	false,
				success:	function(response){
							if(response=="success"){
								location.href="/FanMusic/bienvenida.php";
							}else {
								alert("Favor de intentarlo mas tarde, existen problemas de conexión al servidor");
							}
				}
			});
		}
	}else{
		alert("Debe ingresar algún comentario");
	}
}

function passTemporal(mail){
	var parametros={
		"mail":mail
	}
	$.ajax({
		data:parametros,
		url:"php/recuperacion.php",
		type:"POST",
		dataType:"JSON",
		cache:false,
		success: function(response){
			if(response.status=="success"){
				var resp = (response.message).split(",");
				enviarMailRec(resp[0],resp[1],resp[2]);
			}else{
				alert("Ha ocurrido un error, no se encuentra en nuestra base de datos");					
			}
		}
	});
}

function recuperarContraseña(){
	var mail= prompt("Favor ingrese su correo electronico para enviar la contraseña temporal");
	if(mail!=null){
			passTemporal(mail);
	}else{
		alert("No haz ingresado nada");
	}
}

function terms(){
	window.open("mantencion.html","Oops!","height:400,width:600");
	/*var estado=confirm("Terminos y condiciones\n 1.-Esto es una prueba\n2.-Que dificil explicar las cosas\n 3.- It's no my family, under bombs under gones\4.-in your head, inyour heaaaad , zoooooombie,zoooombie,zooooombieeeee ohhhh oh");
	if(estado){
		alert("aceptoo");
	}else{
		alert("no acepto");
	}*/
}


function registrar(){
	if((validarEmail(getMailSign())==1)&&(validarPass(getPassSign())==1)&&(validarNombre(getNomSign())==1)&&(validarApellido(getApeSign())==1)&&(validarApodo(getApodSign())==1)){
		localStorage.setItem("nombreSign",getNomSign());
		localStorage.setItem("apellidoSign",getApeSign());
		localStorage.setItem("apodoSign",getApodSign());
		localStorage.setItem("correoSign",getMailSign());
		localStorage.setItem("contraSign",getPassSign());
		location.href='/FanMusic/registro.php';
		//window.open('/FanMusic/registro.php',"Sign In","width=320,height=240,toolbar=no")
	}
}
function enviarRegistro(div){
	
	var face="";getFacebook();
	if(getFacebook()!="https://www.facebook.com/"){
		face=getFacebook();
	}
	var twit="";getTwitter();
	if(getTwitter()!="https://twitter.com/"){
		twit=getTwitter();
	}
	var	inst="";getInstagram();
	if(getInstagram()!="https://www.instagram.com/"){
		inst=getInstagram();
	}
	var	yout="";getYoutube();
	if(getYoutube()!="https://www.youtube.com/"){
		yout=getYoutube();
	}
	var	tumb="";getTumblr();
	if(getTumblr()!="https://www.tumblr.com/"){
		tumb=getTumblr();
	}

	if((validarEmail(getMailSign2())==1)&&(validarPass(getPassSign2())==1)&&(soloNumeros(getAge())==0)){
		if(localStorage.getItem("correoSign")==getMailSign2()){
			if(localStorage.getItem("contraSign")==getPassSign2()){
				if(getCiudad() != "Selecciona Ciudad"){
					var parametros={
						"nombre":localStorage.getItem("nombreSign"),
						"apellido":localStorage.getItem("apellidoSign"),
						"apodo":localStorage.getItem("apodoSign"),
						"correo":localStorage.getItem("correoSign"),
						"contra":localStorage.getItem("contraSign"),
						"edad":getAge(),
						"gustos":getGustos(),
						"descripcion":getDescrip(),
						"pais":getPais(),
						"region":getRegion(),
						"ciudad":getCiudad(),
						"face":face,
						"twit":twit,
						"inst":inst,
						"yout":yout,
						"tumb":tumb
					}
					$.ajax({
						data: parametros,
						url:	"php/signIn.php",
						type:	"POST",
						dataType: "JSON",
						cache:	false,
						
						success:	function(response){
							if(response.status=="success"){
								var resp = (response.message).split(",");
								var id=resp[0];
								enviarMailSign(resp[1],resp[2],resp[3]);
								alert("Se ha Creado Correctamente, favor revisar el correo electrónico anteriormente ingresado para confirmar el registro");
								//$(div).append('<form enctype="multipart/form-data" action="php/foto.php" method="POST"><div class= "form-group"><label class="fg-label">Foto de Perfil</label><div class="input-group"><div><input type="hidden" id="idUser" name="idUser" value="'+id+'"><input name="uploadedfile" id="uploadedfile" type="file"/></div></div></div><button class="btn btn-primary" class="btn bgm-blue"> Subir Foto </button></form>');
								location.href="indexNuevo.php";
							}else{
								alert(response.message);
							}
						}
					});
				}else{
					alert("Debe escoger Ciudad");
				}
			}else{
				alert("Las contraseñas no coinciden");
			}
		}else{
			alert("Los Correos Electrónicos no coinciden.");
		}
	}
}

function enviarMailSign(nombre,correo,cod){
	var parametros={
		"nombre":nombre,
		"correo":correo,
		"cod":cod,
	}
	$.ajax({
		data: parametros,
		url:	"php/enviarMail.php",
		type:	"POST",
		cache:	false,
		success:	function(response){
			if(response==1){
				alert("Se ha enviado correo de confirmación");
			}else{
				alert("Ha ocurrido un error al enviar correo de confirmación");
			}
		}
	});
}

function enviarMailRec(nombre,correo,cod){
	var parametros={
		"nombre":nombre,
		"correo":correo,
		"cod":cod,
	}
	$.ajax({
		data: parametros,
		url:	"php/enviarMailRec.php",
		type:	"POST",
		cache:	false,
		success:	function(response){
			if(response==1){
				alert("Se ha enviado correo de Recuperación");
			}else{
				alert("Ha ocurrido un error al enviar correo de Recuperación");
			}
		}
	});
}

function recuContra(){
	var nue=document.getElementById("pass1").value;
	var conf=document.getElementById("pass2").value;
	var corr=document.getElementById("correo").value;
	var cod=document.getElementById("cod").value;
	if(validarPass(nue)==1){
		if(nue=conf){
			var parametros={
				"mail":corr,
				"cod":cod,
				"contra":nue,
			}
			$.ajax({
				data: parametros,
				url:	"php/cambiarContraRec.php",
				type:	"POST",
				cache:	false,
				success:	function(response){
					if(response=="success"){
						alert("Se ha cambiado correctamente");
						location.href="indexNuevo.php";
						//location.href="http://158.251.97.0:80/FanMusic/indexNuevo.php";
					}else{
						alert("Se ha Agotado el tiempo disponible para cambiar su contraseña");
						
					}
				}
			});
		}else{
			alert("Las contraseñas no coinciden");
		}
	}
}


/*=================================================================================
FUNCIONES PARA BÚSQUEDA
=================================================================================*/
function buscare(div){
	localStorage.setItem("aBuscar",document.getElementById("buscando").value);
	$(div).load('/FanMusic/php/resultBusqe.php');
}

function buscar(div){
	var parametros ={
		"palabraBusqueda" : localStorage.getItem("aBuscar")
	}
	$.ajax({
		data: parametros,
		url: "php/buscar.php",
		type: "post",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){			
			//alert(response);	//Response rescata EL PRIMER ECHO que encuentre en el php
			$(div).append(response);
			localStorage.setItem("aBuscar","");
		}
	});
}

function carrusel1(div){
	$.ajax({
		url:'php/contCarrou.php',
		type:'post',
		success:function(response){
			$(div).append(response);
		}
	});
}

function carrusel2(div){
	$.ajax({
		url:'php/imagCarrou.php',
		type:'post',
		success:function(response){
			$(div).append(response);
		}
	});
}

function unirseClub(idC){
	var parametros ={
		"idClub" : idC,
		"idMiembro" : getIDActual(),
	}
	$.ajax({
		data: parametros,
		url: "php/unirseClub.php",
		type: "post",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){			
			alert(response);//Response rescata EL PRIMER ECHO que encuentre en el php
			location.href='bienvenidaNuevo.php';		
		}
	});
}
function unirseGrupo(idC,idG){
	var parametros ={
		"idClub" : idC,
		"idGrupo" : idG,
		"idMiembro" : getIDActual(),
	}
	$.ajax({
		data: parametros,
		url: "php/unirseGrupo.php",
		type: "post",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){			
			alert(response);//Response rescata EL PRIMER ECHO que encuentre en el php
			location.href='bienvenidaNuevo.php';
		}
	});
}
//=================================================================================
function revisarApodo(){
	var parametros={
		"apodo":getApodSign(),
	}
	$.ajax({
		data: parametros,
		url: "php/validarApodo.php",
		type: "post",	//Defino la forma en que llegarán los parámetros al php
		
		success: function(response){			
			if(response==1){
				registrar();
			}else{
				alert("Este apodo ya esta siendo usado por otro usuario, favor de ingresar otro.")
			}
		}
	});
	
}
//=================================================================================
function actualizar(div,dir){
	$(div).load(dir);
}


//=================================================================================Este deberia ir en los js donde se realicen cambios
function confirmarProceso(){
	var pass = prompt("Ingrese su contraseña para comfirmar la operación");
	if(pass!=null){
		var parametros={
			"id":getIDActual(),
			"pass":pass
			};
		$.ajax({
			data:parametros,
			url:"php/validarContraseña.php",
			type:"POST",
			success: function(response){
				return response;
			}
		});
	}else{
		alert("No se podrá llevar a cabo la petición");
	}
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
	//======================Apoyar===========================
function apoyarGrupo(idi){ 
	var parametros={
		'idP':idi,
		'idM': getIDActual(),
	}
	$.ajax({
		data:parametros,
		url: "php/darApoyo.php",
		type: "post",
		cache:	false,
		success: function(response){			
			if(response==1){
				location.href='/FanMusic/bienvenida.php';
			}else{
				if(response==0){
					location.href="/FanMusic/bienvenida.php";
				}
			}
		}
	});
}
function apoyar(idi){ 
	var parametros={
		'idP':idi,
		'idM': getIDActual(),
	}
	$.ajax({
		data:parametros,
		url: "php/darApoyo.php",
		type: "post",
		cache:	false,
		success: function(response){			
			if(response==1){
				location.href='/FanMusic/bienvenida.php';
			}else{
				if(response==0){
					location.href='/FanMusic/bienvenida.php';
				}
			}

		}
	});
}