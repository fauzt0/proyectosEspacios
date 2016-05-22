  <div class="container" id="espejo">
    <div class="row">
      
      <aside>
        <div class=" col-xs-12 col-sm-3 col-md-3 col-lg-3" id="asider">
          <h4>
            Inicia Sesión:
          </h4>          
          <form action="../../index.php/system/checkin" method="post">
            <div class="form-group">
              
              <input type="text" class="form-control" id="exampleInputEmail1" name="usuario" placeholder="Usuario">
            </div>
            <div class="form-group">
              
              <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Contraseña">
            </div>  
            <div class="checkbox">
              <label>
                <input type="checkbox"> Recordarme
              </label>
            </div>
            <button type="submit" class="btn btn-info">Ingresar</button>
            <div id="mensaje">
              <?php              
                if(isset($erro)){
                  switch ($erro) {
                    case '-1':
                        echo'<div class="alert alert-danger" role="alert">Contraseña Incorrecta</div>';
                      break;

                      case '0':
                        echo'<div class="alert alert-danger" role="alert">¡Usuario <b>Inexistente</b>!</div>';
                      break;

                    case '1':
                        echo'<div class="alert alert-success" role="alert">Bienvenido</div>';
                      break;

                      case '2':
                        echo'<div class="alert alert-warning" role="alert">No dejar campos vacios</div>';
                      break;
                    
                    default:
                        echo '<div class="alert alert-warning" role="alert">
                          Error desconocido. Contacta al administrador
                        </div>';
                      break;
                  }

                }
              ?>
            </div>

          </form>          

          <hr>
          
        </div>
      </aside>