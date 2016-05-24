   <section>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" id="constructor">
            <div id="contenido">
              
              <div class="row" id="usresult">

              		<p class="listado2" style="overflow:auto;">

                    <?php
                      
                          echo '<table class="table table-bordered" >';
                          echo '<th colspan="7">Archivos almacenados</th>';
                          echo '<tr> <td>bipseudo</td> <td>autor</td>  <td>fecha</td>  <td>Nombre</td> <td>Descripcion</td> <td>Version</td> <td>Acciones</td></tr>';
                          foreach ($results->result() as $row)
                          {
                            
                            $a   =$row->bipseudo;
                            $b   =$row->autor; 
                            $c   =$row->fecha; 
                            $d   =$row->nombre; 
                            $e   =$row->descripcion;
                            $f   =$row->version;
                            $g   =$row->ruta;
                            echo '<tr><td>'.$a.' </td> <td>'.$b.'</td> <td>'.$c.'</td> <td>'.$d.'</td> <td>'.$e.'</td> <td>'.$f.'</td> <td>
                            <a href="'.$g.'"  class="btn btn-success" download  > 
                            Descargar
                            </a> ';
                            
                            
                              
                          
                          }  
                            

                          echo '</table>';
                      
                    ?>
              		</p>             		
                  
              <!-- fin de carusel -->  
                  
              </div>  
               <div id="mensaje"></div>               
        </div>
      </section> 