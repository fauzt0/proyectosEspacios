function newUser(){
	/*verificamos todos los campos minimos*/
	var nombre 		= $("#nombre").val();
	var usuario 	= $("#usuario").val();
	var contraseña  = $("#contraseña").val();
	var tipo 		= $("#typo").val();
	//campos extra
	var correo 		= $("#correo").val();
	var pregunta	= $("#pregunta").val();
	var respuesta	= $("#respuesta").val();
	
	if(nombre=="" || usuario=="" || contraseña=="" || tipo=="0") {
		$("#mensaje").empty();
		$("#mensaje").append('<div class="alert alert-danger" role="alert">No dejar espacios requeridos en blanco</div>');		
	}else{
		$.post('http://localhost/proyectos/proyectosEspacios/index.php/system/newUser',
			{	
				'nombre' 		: nombre,
				'usuario'		: usuario,
				'contraseña'	: contraseña,
				'tipo'			: tipo,
				'correo'		: correo,
				'pregunta'		: pregunta,
				'respuesta'		:respuesta
			},
			function(result){
				switch (result){				
					case '-1': 
						$("#user").val("");
						$("#mensaje").empty();
					 	$("#mensaje").append('<div class="alert alert-danger" role="alert">¡Usuario existente!</div>');		

					break;

					case '0':
						$("#mensaje").empty();
					 	$("#mensaje").append('<div class="alert alert-warning" role="alert">¡Error de registro!Intente Nuevamente</div>');		
					break;

					case '1':
						$("#mensaje").empty();
					 	$("#mensaje").append('<div class="alert alert-success" role="alert">¡Usuario registrado correctamente!</div>');		
					 	$("#nuser")[0].reset();
					break;

					default:
						$("#mensaje").empty();
					 	$("#mensaje").append('<div class="alert alert-danger" role="alert">¡Error desconocido. Contacte al administrador! Error:'+result+'</div>');							 
					break;
				}
			});		
	}
}


function deluser(usuario){//elimina un usuario
	var del;	
	 del = confirm("Deseas eliminar al usuario: ");
	 if(del==true){//se elimina al usuario de la base de datos
	 	$.get('http://localhost/proyectos/proyectosEspacios/index.php/system/deluser',
	 		{	
	 			'usuario':usuario
	 		},
	 		function(result){
	 			switch(result){
	 				case '0':
	 					$("#mensaje").empty();
	 					$("#mensaje").append('<div class="alert alert-danger" role="alert">¡No se elimino al usuario. Contacte al administrador! Error:'+result+'</div>');							 
	 				break;

	 				case '1':
	 					$("#mensaje").empty();
	 					$("#mensaje").append('<div class="alert alert-success" role="alert">Eliminado</div>');							 
	 					location.reload(true);
	 				break;

	 				default:
	 					$("#mensaje").empty();
	 					$("#mensaje").append('<div class="alert alert-danger" role="alert">¡No se elimino al usuario. Contacte al administrador! Error:'+result+'</div>');							 
	 				break;
	 			}
	 		}
	 		);
	 }else{alert("No se elimino al usuario");}
}

function msg(usuario){
	$("#mensaje2").empty();
	$("#recipient-name").val("");//eliminamos cualquier valor
	$("#recipient-name").val(usuario);
}

function sendmsg(){

	var usuario = $("#recipient-name").val();//mensaje destino
	var	mensaje = $("#message-text").val();
	if(usuario==""){
			$("#mensaje2").empty();
			$("#mensaje2").append('<div class="alert alert-warning" role="alert">No dejar espacios en blanco</div>');							 
	}else{		
		$.get('http://localhost/proyectos/proyectosEspacios/index.php/system/sendmsg',
			{
				'usuario':usuario,
				'mensaje':mensaje
			},
			function(result){
				switch(result){
					case '-1':
						$("#mensaje2").empty();
						$("#mensaje2").append('<div class="alert alert-warning" role="alert">No dejar espacios en blanco</div>');							 
					break;
	
					case '0':
						$("#mensaje2").empty();
						$("#mensaje2").append('<div class="alert alert-danger" role="alert">No se pudo entregar el mensaje. Intente nuevamente más tarde</div>');							 
					break;
	
					case '1':
						$("#mensaje2").empty();
						$("#mensaje2").append('<div class="alert alert-success" role="alert">Mensaje entregado exitosamente</div>');							 
						$("#msgarea")[0].reset();
					break;
	
					default:
					$("#mensaje2").empty();
					$("#mensaje2").append('<div class="alert alert-danger" role="alert">¡Error:'+result+'. Contacte al administrador</div>');							 
					break;
				}
			});
	}
}

function loadMessages(){
	/*carga mensajes*/
	$.post('http://localhost/proyectos/proyectosEspacios/index.php/system/loadMessages',
		{},
		function(result){
				
			
			var aray1 = JSON.parse(result);
			if(aray1[0]==1){//desplegamos mensajes
				var cant = aray1.length -1;
				var i=0;
				for(i=1; i<=cant;i++){
					$("#inbox").append(aray1[i]);
					$("#inbox").append("<br>________<br>");
				}
				$("#inbox").append('<br><input type="button" value="Vaciar" class="btn btn-warning" onclick="clinbox()" style="float:right;"> ');

			}else{//notificaciones vacias
				$("#inbox").html("<p>Sin Mensajes</p>");
			}

		});
}

function clinbox(){
	$.post('http://localhost/proyectos/proyectosEspacios/index.php/system/clinbox',
		{
		},
		function(result){
			if(result==1){
				$("#inbox").empty();	
			}else{
				alert("No se pudieron eliminar los mensajes");
			}
			
		});
}