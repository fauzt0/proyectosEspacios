$(document).ready(function()
 { 
 	
 	var fileExtension = "";
 	//función que observa los cambios del campo file y obtiene información
    $(':file').change(function()
    {
    	
        //obtenemos un array con los datos del archivo
        var file = $("#imagen")[0].files[0];
        //obtenemos el nombre del archivo
        var fileName = file.name;
		var last_img = fileName;
        //obtenemos la extensión del archivo
        var fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        //obtenemos el tamaño del archivo
        var fileSize = file.size;
        //obtenemos el tipo de archivo image/png ejemplo
        var fileType = file.type;
        //mensaje con la información del archivo	
	if(fileExtension== "jpg" || fileExtension== "png" || fileExtension== "gif" || fileExtension== "JPG" || fileExtension== "PNG" || fileExtension== "GIF" || fileExtension== "rar" || fileExtension== "zip" || fileExtension== "dwg"   )  
	{	
	
	   $("#uploader").attr("disabled",false);	   
	   $("#mensaje").empty();
	   $("#mensaje").append('<div class="alert alert-success" role="alert">Archivo valido</div>');		
	   $("#ext").val(fileExtension);             	  	  	  
	}
	 else{ 
	   
	  $("#mensaje").empty();
	  $("#mensaje").append('<div class="alert alert-danger" role="alert">Archivo no valido: .'+fileExtension+'</div>');		
	  
	  $("#uploader").attr("disabled",true);
	  
	 }
    });
    /**/

    $('#uploader').click(function(){
        //información del formulario
        var formData = new FormData($(".formulario")[0]);
        var message = "";
	
        //hacemos la petición ajax  
	  $.ajax({
	      url: 'http://localhost/proyectos/proyectosEspacios/index.php/system/getupload',    
	      type: 'POST',
	      // Form data
	      //datos del formulario
	      data: formData,
	      //necesario para subir archivos via ajax
	      cache: false,
	      contentType: false,
	      processData: false,
	      //mientras enviamos el archivo
	      beforeSend: function()
	      {
		  $("mensaje").empty();
		  message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
		  $("#mensaje").append(message);
	      },
	      //una vez finalizado correctamente
	      success: function(data)
	      {
		 		
		 	if(data==1)
		 	{

			 		location.reload(true);

		  	}else
		  	{
		  		$("#mensaje").empty();
		  		message = $("<span class='success'>No se pudo agregar la imagen. Error:</span>");	   		  
		  		$("#mensaje").append(message+data);		  
		  	}    
		    
	      },
            //si ha ocurrido un error
	      error: function()
	      {
                message = $("<span class='error'>Ha ocurrido un error.</span>");
           		$("#mensaje").empty();
           		$("#mensaje").append(message);		  
	      }
        });
    });


 

//end of listener
 });





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