<h2>Contacto:</h2>

<p>PROYECTOS ESPACIOS + DISEÑO Y PLANEACIÓN S.A DE C.V.</p>
<p>Ubicada en calle 37 No 63 Col. Valentín Gómez Farías  Del. Venustiano Carranza  en México D.F. </p>
<p>Representada  por  Arq. Miguel Ángel Ramírez Bautista.</p>
<br>
<p><b><font size="22" >|</font></b> Tel: 62943109</p></blockquote>
<br>
<p><b><font size="22">|</font></b> Cel: 04455 45053637  </p>
<br>
<p><b><font size="22">|</font></b> ID: 92*755821*2</p>
<br>
<p><a href="mailto:proyectosespacios@telmexmail.com" style="text-decoration:underline; color:#0000FF;" >
<font size:="14"|</font> Correo electrónico: proyectosespacios@telmexmail.com </a></p>
<br></br>



<fieldset>

<br/>	<legend>Envíanos un mensaje</legend>
					
	<p>Tus datos seran usados solo como referencia y de forma confidencial</p>
				</fieldset><br/>


<?php
if (!isset($_POST['email'])) {
?>
  <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    
  <p> 
    <label> Nombre: 
    <input name="nombre" type="text" />
    </label>
    <label> </label>
  </p>
<p>
  <label>
      Teléfono:
      <input name="telefono" type="text" />
    </label>
      <label> </label>
</p>

  <p> 
    <label> Email:</label>
   
    <input name="email" type="text" />
    </label>
  </p>


  <p> 
    <label>Mensaje:</label>
  </p>
  <p> 
    <label> 
    <textarea name="mensaje" rows="6" cols="50"></textarea>
    </label>
  </p>
  <p>
    <input type="reset" value="Borrar" />
    <input type="submit" value="Enviar" />
  </p>
  </form>
<?php
}else{
  $mensaje="Resultado de la encuesta, la casilla seleccionada contiene un mensaje de on";
  $mensaje.= "\nNombre: ". $_POST['nombre'];
  $mensaje.= "\nEmail: ".$_POST['email'];
  $mensaje.= "\nTelefono: ". $_POST['telefono'];
  $mensaje.= "\nMensaje: \n".$_POST['mensaje'];
  $destino= "proyectosespacios@telmexmail.com";


  $remitente = $_POST['email'];
  $asunto = "Mensaje enviado por: ".$_POST['nombre'];
  mail($destino,$asunto,$mensaje,"FROM: $remitente");
?>
  <p><strong>Mensaje enviado.</strong></p><p><a href=contacto.php>Regresa...</a>
<?php
}
?>


<br></br>
<br></br>
<br></br>


