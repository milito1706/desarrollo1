<!DOCTYPE html>
<html lang="en">
  <head>
      <? $this->load->view("heders/heder"); ?>
  </head>

  <body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        
          <!--vista de menu de desarrollo-->
          <?php $this->load->view("heders/menu");?>

      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    
    <div class="container" id='pixes'>

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-md-12">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
                    <div>
                      <!--<button type="button" class="btn btn-primary"  id="new">Nuevo Esquema Hit Rate</button>-->
                      <!--<button type="button" class="btn btn-primary" id="exep">Execpción de Esquema Hit Rate</button>-->
                    </div>
                    <br><br>
                    <table id="" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">Empresa</th>
                            <th class="text-center">Fecha de Alta</th>
                            <th class="text-center">Fecha de Actualización</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                     <tbody>
                     <?php foreach ($tablun as $key){ ?>
                    <tr>
                        <td class="text-center"><?php echo $key['nombre']; ?></td>
                        <td class="text-center"><?php echo $key['clave']; ?></td>
                        <td class="text-center"><?php echo $key['fechaActualizacion']; ?></td>
                        <td class="text-center"><a href="#" id="new" data-idEmpresa="<?php echo $key['idUn'];?>" data-nombreEmpresa="<?php echo $key["nombre"];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp; 

                        <!--<a href="gridUnidadNegocio/<?php echo $key['idEmpresa'];?>"  <!--<i class="fa fa-universal-access" aria-hidden="true"></i></a>--></td>
                    </tr>
                     <?php } ?>
                </table>
        </div><!--/.col-xs-12.col-sm-9-->
      </div><!--/row-->
              
          <!-- Modal formulario de comisiones -->
        
          <div class="modal fade bs-example-modal-lg" id="nueva" tabindex="-1" role="dialog" >
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Configuración de Esquema Hit Rate</h4>
                  </div>
                  <div class="modal-body" id="esquema_nuevo">

                      

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
          </div>
       
          <!-- fin Modal de formulario Comisiones -->

          <!-- Modal de Exepcion de comisiones -->
          <div class="modal fade bs-example-modal-lg" id="exepcion" tabindex="-1" role="dialog" >
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Nuevo Esquema de Exepcion</h4>
                  </div>
                  <div class="modal-body" id="esquema_exep">
                      

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                  </div>
                </div>
              </div>
          </div>
           <!-- fin Modal de Exepcion de comisiones -->
           <!-- Modal de esquema -->
          <form  id="mike" action="" method="post"> 
          <div class="modal fade bs-example-modal-lg" id="esquema" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Nueva Variable.</h4>
                  </div>
                  <div class="modal-body" id="variable">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button  type="submit" id="GuradrEsquema" class="btn btn-primary" >Guardar</button>
                  </div>
                </div>
              </div>
          </div>
          </form>
    

      <hr>
      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>

    </div><!--/.container-->
      <?php $this->load->view("footers/footer.php")?>
  </body>
</html>

 
