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
	$("#recipient-name").val("");//eliminamos cualquier valor
	$("#recipient-name").val(usuario);
}

function sendmsg(){
	var usuario = $("#recipient-name").val();//mensaje destino
	$.get('http://localhost/proyectos/proyectosEspacios/index.php/system/deluser',
		{

		},
		function(result){

		});
}