<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="shortcut icon" href="images/favicon.ico">

<title>Proyectos Espacios</title>
<META NAME="Title" CONTENT="Proyectos Espacios">
<META NAME="Author" CONTENT="Lions">
<META NAME="Subject" CONTENT="Arquitectura">
<META NAME="Description" CONTENT="Descripcion de los servicios ofrecidos ">
<META NAME="Keywords" CONTENT="Arquitectura, arquitectura farmaceutica, construccion, casas, planos, diseño">
<META NAME="Generator" CONTENT="notepad++">
<META NAME="Language" CONTENT="Spanish">
<META NAME="Revisit" CONTENT="1 day">
<META NAME="Distribution" CONTENT="Global">
<META NAME="Robots" CONTENT="All">


<link type="text/css" rel="stylesheet" href="style.css" media="screen">
<!--submenu php -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>


   <script>
	   $(function(){
		   $(".button").click(function(){
			   $('#resultado').html("Cargando...");
			   var valor=$(this).attr("rel");
			   $.ajax({
			   url: 'js/botones.php',
			   data: 'boton='+valor,
			   type: 'POST',
			   success: function(data){
				   $('#contenido').html(data);
				   }
			   });
		   });
	   });
   </script>



<!-- animacion cabecera -->



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.panelgallery-2.0.0.js"></script>
<script type="text/javascript">
$(function(){
	$('#container').panelGallery();
});
</script>


<!-- -->
<!-- -->
<body>
<?php 
	include ("inc/mcab.inc");  
	?> 
<!-- -->

<div id="box">
<!-- header -->
<?php 
include ("inc/header.inc");  
?>

<!-- . -->

<div id="intro">

<div id="intro">
<table border="0" width="100%"   style="position:relative; " align="center" ><tr>

<td width="200" height="180" background="images/slogan.png"    ></td>

<td bgcolor="#819FF7" >
<!-- animacion header -->
<?php 
include ("inc/slider.inc");  
?>  


<!-- Menu principal -->

<?php 
include ("inc/mprin.inc");  
?>  
<!-- . -->

</td></tr></table>
</div>
	
	<div id="left">
<!-- span -->	
	
<?php 
include ("inc/span.inc");  
?>  
<!-- . -->
<br>

<table border="0" style="position:relative; top:20px;">
<tr><td>
<!-- ficheros -->
<?php 
include ("inc/fich.inc");  
?> 
<!-- . -->

</td></tr></table>


<!-- tagr 2 -->
<?php 
	include ("inc/tagr2.inc");  
	?>  

<!-- . -->
	
	</div>

	<div id="content">
		
<!-- Pantalla de archivero -->
	<div id="contenido">

	<?php 
	include ("inc/cont.inc");  
	?>  
	</div>

<!-- . -->

</pre>
</div>
	
	<br clear="all">
</div>

<!-- footer -->
<?php 
	include ("inc/footer.inc");  
	?> 

<!-- . -->

</body>
</html>


