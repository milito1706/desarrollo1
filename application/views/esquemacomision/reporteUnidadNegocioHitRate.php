<!DOCTYPE html>
<html lang="en">
  <head>
      <? $this->load->view("heders/heder"); ?>
      <style type="text/css">
        div.dataTables_wrapper {
        margin-bottom: 3em;
    }
      </style>
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
                 <div class="page-header"> <h1><small><?php foreach ($empleadosVentas as $key){ $titulo[] = $key['club'];}echo implode(array_unique($titulo));?></small></h1></div><br>
                 <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Resumen de comisiones</a></li>
                      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Veta Piso</a></li>
                      <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Venta Convenios</a></li>
                      <!--<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>-->
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="home">
                          <br>
                              
                              <div class="row">

                                <div class="col-md-6">
                                   <table  class="table table-bordered"  >
                                      <thead>
                                          <tr>
                                              <th width="70%" class="text-center">Nombre</th>
                                              <th width="30%" class="text-center">Total Ventas Piso</th>
                                          </tr>
                                      </thead>
                                       <tbody>
                                       <?php foreach ($tablaVentasPiso as $key){ ?>
                                      <tr>
                                          <td class="text-center"><?php echo $key['nombre_ejecutivo']; ?></td>
                                          <td class="text-center"><?php echo $key['suma']; ?></td>
                                      </tr>
                                      </tbody>
                                      <?php } ?>
                                  </table>
                                  <table  class="table table-bordered"  width="50%">
                                      <thead>
                                          <tr>
                                              <th width="60%" class="text-center">Nombre</th>
                                              <th width="20%" class="text-center">Prospectos</th>
                                              <th width="20%" class="text-center">Alcance prospectos</th>
                                          </tr>
                                      </thead>
                                       <tbody>
                                       <?php foreach ($tablaProspectos as $key){ ?>

                                      <tr>
                                          <td width="60%" class="text-center"><?php echo $key['nombre']; ?></td>
                                          <td width="20%" class="text-center"><?php echo $key['sumaprospectos']; ?></td>
                                          <td width="20%" class="text-center"><?php echo $key['alcanceprospectos']; ?></td>
                                      </tr>
                                      </tbody>
                                      <?php } ?>
                                  </table>
                                </div>
                                <div class="col-md-6">

                                  <table  class="table table-bordered"  width="100%">
                                      <thead>
                                          <tr>
                                              <th class="text-center">Nombre</th>
                                              <th class="text-center">Total Ventas Convenios</th>
                                          </tr>
                                      </thead>
                                       <tbody>
                                       <?php foreach ($tablaVentasConvenio as $key){ ?>

                                      <tr>
                                          <td class="text-center"><?php echo $key['nombre_ejecutivo']; ?></td>
                                          <td class="text-center"><?php echo $key['suma']; ?></td>
                                      </tr>
                                      </tbody>
                                      <?php }   ?>
                                  </table>
                                   <table  class="table table-bordered"  width="100%">
                                      <thead>
                                          <tr>
                                              <th class="text-center">Nombre</th>
                                              <th class="text-center">Total Ventas</th>
                                              <th  class="text-center">Hit Rate</th>
                                          </tr>
                                      </thead>
                                       <tbody>
                                       <?php foreach ($tablaVentaTotal as $key){ ?>

                                      <tr>
                                          <td class="text-center"><?php echo $key['nombre']; ?></td>
                                          <td class="text-center"><?php echo $key['venta']; ?></td>
                                          <td class="text-center"><?php echo $key['hitrate']; ?></td>
                                      </tr>
                                      </tbody>
                                      <?php }   ?>
                                  </table>
                                </div>
                            </div>

                        </div>
                      <div role="tabpanel" class="tab-pane" id="profile">
                      <br><br>
                           <?php 
                             foreach ($tablaVentasPisoResumen as $key3){ $idEmpleado[] = $key3['idEmpleado'];}
                            $arrayNoEjecutivo  = implode(",",array_unique($idEmpleado));
                            $ejecutivosExplode = explode(",", $arrayNoEjecutivo);
                            $totalEjecutivos   =count($ejecutivosExplode);
                            $i=0;
                            for($i=0; $i < $totalEjecutivos; $i++) { 
                            ?>
                           <table   id="" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center"><h6>Id</h6></th>
                                        <th class="text-center"><h6>Descripción</h6></th>
                                        <th class="text-center"><h6>Regla Cat</h6></th>
                                        <th class="text-center"><h6>Imoorte</h6></th>
                                        <th class="text-center"><h6>Porcentaje hitRate</h6></th>
                                        <th class="text-center"><h6>Porcentaje Prospectos</h6></th>
                                        <th class="text-center"><h6>Comisión</h6></th>
                                        <th class="text-center"><h6>Fec Aplica</h6></th>
                            
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $j=1; foreach ($tablaVentasPisoResumen as $key){ if($key['idEmpleado']==$ejecutivosExplode[$i]){ ?>
                                <tr>
                                    <td width="9"><h6><?php  echo $j++; ?></h6></td>
                                    <td width="9"><h6><?php   echo $key['idComision'];?></h6></td>
                                    <td width="25%"><h6><?php echo $key['descripcionMovimiento'];?></h6></td>
                                    <td width="25%"><h6><?php echo $key['nombre_ejecutivo']; ?></h6></td>
                                    <td width="9%"><h6><?php  echo $key['regla']; ?></h6></td>
                                    <td width="9%"><h6></h6></td>
                                    <td width="9%"><h6></h6></td>
                                    <td width="9%"><h6></h6></h6></td>
                                    <td width="9%"><h6><h6><?php echo $key['fechaAplica']; ?></h6></td>
                                </tr>
                                <?php } } ?>
                                </tbody>
                            </table>
                            <br><br>
                           <?php } ?>
                      </div>
                      <div role="tabpanel" class="tab-pane" id="messages">
                          <br><br> <?php 
                             foreach ($tablaVentaConvenioResumen as $key4){ $idEmpleadoC[] = $key4['idEmpleado']; }
                            $arrayNoEjecutivoC  = implode(",",array_unique($idEmpleadoC));
                            $ejecutivosExplodeC = explode(",", $arrayNoEjecutivoC);
                            $totalEjecutivosC   =count($ejecutivosExplodeC);
                            $i=0;
                            for($i=0; $i < $totalEjecutivosC; $i++) { 
                            ?>
                         
                        <table  class="table table-bordered"  width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center"><h6>Id</h6></th>
                                        <th class="text-center"><h6>Descripción</h6></th>
                                        <th class="text-center"><h6>Regla Cat</h6></th>
                                        <th class="text-center"><h6>Imoorte</h6></th>
                                        <th class="text-center"><h6>Porcentaje hitRate</h6></th>
                                        <th class="text-center"><h6>Porcentaje Prospectos</h6></th>
                                        <th class="text-center"><h6>Comisión</h6></th>
                                        <th class="text-center"><h6>Fec Aplica</h6></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $j=1; foreach ($tablaVentaConvenioResumen as $key){  if($key['idEmpleado']==$ejecutivosExplodeC[$i]){?> 
                                <tr>
                                    <td width="9"><h6><?php  echo $j++; ?></h6></td>
                                    <td width="9"><h6><?php   echo $key['idComision'];?></h6></td>
                                    <td width="25%"><h6><?php echo $key['descripcionMovimiento'];?></h6></td>
                                    <td width="25%"><h6><?php echo $key['nombre_ejecutivo']; ?></h6></td>
                                    <td width="9%"><h6><?php  echo $key['regla']; ?></h6></td>
                                    <td width="9%"><h6></h6></td>
                                    <td width="9%"><h6></h6></td>
                                    <td width="9%"><h6></h6></h6></td>
                                    <td width="9%"><h6><h6><?php echo $key['fechaAplica']; ?></h6></td>
                                   <?php } } ?>
                                </tr>
                                </tbody>
                            </table>
                            <br><br>
                            <?php } ?>
                        
                      </div>
                      <div role="tabpanel" class="tab-pane" id="settings">
                        ttttt

                      </div>
                    </div>

                  </div>
                      

        </div><!--/.col-xs-12.col-sm-9-->
      </div><!--/row-->
              
          <!-- Modal formulario de comisiones -->
        
          <div class="modal fade bs-example-modal-lg" id="ejecutivo" tabindex="-1" role="dialog" >
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Reporte de Comisión</h4>
                  </div>
                  <div class="modal-body" id="esquema_ejecutivo">
                 
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

 
