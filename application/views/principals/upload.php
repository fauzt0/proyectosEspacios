   <section>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" id="constructor">
            <div id="contenido">
              <h2 class="title">Carga de archivos:</h2><br>  
              <div class="row">

              		<form>
  <div class="form-group">
    <label for="titulover">Título de versión</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="EJ: Plano Indutrial ver1">
  </div>

  <div class="form-group">
    <label for="File">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Archivos permitidos: .rar, .zip, .png, .jpg, dwg .</p>
  </div>

<div class="form-group">
    <label for="Autor">Autor:</label>
    <input type="text" disabled="true" class="form-control" id="autor" >
  </div>

  <div class="form-group">
    <label for="date">Fecha:</label>
    <?php
      date_default_timezone_set('America/Mexico_City');
      $fecha=date("Y/m/d");
      echo'<input type="text" disabled="true" class="form-control" id="fecha" placeholder="EJ: Plano Indutrial ver1" value="'.$fecha.'">';
    ?>
    
    
  </div>

  <div class="form-group">
    <label for="Desc">Descripción de versión</label>
    <textarea class="form-control" style="width:80%;" rows="3" placeholder="EJ: Cambios 1 planta baja"></textarea>    
  </div>


  <button type="submit" class="btn btn-primary" disabled="true">Subir Archivo</button>
</form>
                  
                  <br>
              <!-- fin de carusel -->  
                  
              </div>                  
        </div>
      </section>    