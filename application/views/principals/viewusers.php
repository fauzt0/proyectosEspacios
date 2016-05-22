   <section>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" id="constructor">
            <div id="contenido">
              
              <div class="row" id="usresult">

              		<p class="listado2" style="overflow:auto;">

                    <?php
                      if($dataUsuarios[0] ==1){
                          $result = $dataUsuarios[1];//reasignamos el array
                          //creamos la tabla
                          echo '<table class="table table-bordered" >';
                          echo '<th colspan="5">Usuarios Registrados</th>';
                          foreach ($result->result() as $row)
                          {
                            $nombre   =$row->nombre;
                            $user     =$row->usuario; 
                            $correo   =$row->correo; 
                            $permiso  =$row->permiso; 
                            if($permiso==1){$pems="Admin";}else{$pems="usuario";}
                            echo '<tr><td>'.$nombre.' </td>
                            <td>'.$user.'</td><td>'.$correo.'</td><td>'.$pems.'</td><td>
                            <button onclick="msg(\''.$user.'\')" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> 
                            MSG
                            </button> 
                            <a  onclick="alert(\'Construcción\')" class="btn btn-default">Editar</a>
                             <input type="button" value="X" class="btn btn-danger" onclick="deluser(\''.$user.'\')"> </td></tr>';
                          }

                          echo '</table>';
                      }else{
                        echo "No se encontro la tabla de Usuarios. Intenta nuevamante más tarde";
                      }
                    ?>
              		</p>             		
                  
              <!-- fin de carusel -->  
                  
              </div>  
               <div id="mensaje"></div>               
        </div>
      </section>    
      

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Nuevo Mensaje</h4>
      </div>
      <div class="modal-body">
        <form id="msgarea">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Destinatario:</label>
            <input type="text" class="form-control" id="recipient-name" disabled="true">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Mensaje:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
          <div id="mensaje2"></div>
        </form>
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
        <button type="button" class="btn btn-primary" onclick="sendmsg();" >Enviar</button>
      </div>
    </div>
  </div>
</div>