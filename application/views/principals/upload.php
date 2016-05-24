   <section>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" id="constructor">
            <div id="contenido">
              <h2 class="title">Carga de archivos:</h2><br>  
              <div class="row">

              		<form  id="formulario_imgs"  enctype="multipart/form-data" class="formulario">
  <div class="form-group">
    <label for="titulover">Título de versión</label>
    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="EJ:plano_indutrial_ver1">
  </div>

  <div class="form-group">
    <label for="File">Archivo</label>
    <input type="file" id="imagen" name="archivo">
    <p class="help-block">Archivos permitidos: .rar, .zip, .png, .jpg, dwg .</p>
  </div>

<div class="form-group">
    
    <input type="hidden"  class="form-control" id="ext" name="ext">
  </div>

  <div class="form-group">
    
    <?php
      date_default_timezone_set('America/Mexico_City');
      $fecha=date("Y/m/d");
      echo'<input type="hidden"   class="form-control" name="fecha" id="fecha" placeholder="EJ: Plano Indutrial ver1" value="'.$fecha.'">';
    ?>
    
    
  </div>

  <div class="form-group">
    <label for="Desc">Descripción de versión</label>
    <textarea id="desc" name="desc" class="form-control" style="width:80%;" rows="3" placeholder="EJ: Cambios 1 planta baja"></textarea>    
  </div>

<div id="mensaje"></div>
  <button type="button" class="btn btn-primary" disabled="true" id="uploader">Subir Archivo</button>
</form>
                  
                  <br>
              <!-- fin de carusel -->  
                  
              </div>                  
        </div>
      </section>    