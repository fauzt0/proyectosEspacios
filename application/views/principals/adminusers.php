   <section>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" id="constructor">
            <div id="contenido">
              <h2 class="title">Agregar usuarios:</h2><br>  
              <div class="row">
                <form class="form-horizontal" id="nuser">
                  <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre*</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nombre" placeholder="Nombre Completo">
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Usuario*</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="usuario" placeholder="Usuario">
                    </div>
                  </div>
                
                
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"> Contraseña*</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="contraseña" placeholder="Password">
                    </div>
                  </div>
                
                   <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Correo</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="correo" placeholder="Email">
                    </div>
                  </div>
                
                   <div class="form-group">
                    <label for="question" class="col-sm-2 control-label">Pregunta</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="pregunta" placeholder="Secreta">
                    </div>
                  </div>
                
                <div class="form-group">
                    <label for="question" class="col-sm-2 control-label">Respuesta</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="respuesta" placeholder="Secreta">
                    </div>
                  </div>

                <div class="form-group">
                  <label for="question" class="col-sm-2 control-label">Tipo*</label>
                  <div class="col-sm-10">             
                    <select class="form-control" id="typo">
                      <option value="0">Selecciona tipo de usuario:</option>
                      <option value="1">Administrador</option>
                      <option value="2">Usuario</option>                      
                    </select>                
                  </div>
                </div>

                
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="button" class="btn btn-default" onclick="newUser();">Registrar Usuario</button>
                    </div>                    
                  </div>
                  <div id="mensaje">
                    </div>
                </form>
              		
                  
                  <br>
              <!-- fin de carusel -->  
                  
              </div>                  
        </div>
      </section>    