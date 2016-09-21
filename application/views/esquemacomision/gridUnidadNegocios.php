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
                            <th class="text-center">Club</th>
                            <th class="text-center">Mes</th>
                            <th class="text-center">Presupuesto Mensual Club</th>
                            <th class="text-center">Factor</th>
                            <th class="text-center">Ejecutivos q1</th>
                            <th class="text-center">Ejecutivos q2</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                     <tbody>
                     <?php foreach ($tabladetallecomision as $key){ ?>
                    <tr>
                        <td class="text-center"><?php echo $key['nombre']; ?></td>
                        <td class="text-center"><?php echo $key['mes'];?></td>
                        <td class="text-center"><?php echo $key['monto']; ?></td>
                        <td class="text-center"><?php echo $key['factor']; ?></td>
                        <td class="text-center"><?php echo $key['q1']; ?></td>
                        <td class="text-center"><?php echo $key['q2']; ?></td>
                        <td class="text-center"><a href="#" id="updateVariable" data-idUn=<?php echo $key["idUn"];?>><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                        <a href="#" id="InfoMes" data-idUn=<?php echo $key["idUn"];?>><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                        &nbsp;&nbsp;
                        <a href="../../unidadNegocioHitRate/<?php echo $key["idUn"];?>/<?echo $idEsquema;?>"><i class="fa fa-line-chart" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                     <?php } ?>
                </table>
        </div><!--/.col-xs-12.col-sm-9-->
      </div><!--/row-->
        <!-- Modal formulario variables de alcance mensual -->
           <form id="updateDetalleComision" name="updateDetalleComision" method="post" action="">   
          <div class="modal fade bs-example-modal-lg" id="modalVariables" tabindex="-1" role="dialog" >
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Configuración de variables para  ventas mensuales</h4>
                  </div>
                  <div class="modal-body" id="variablesAlcance">

                      

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                     <button type="submit"  class="btn btn-primary">Guardar</button>
                  </div>
                </div>
              </div>
          </div>
          </form>
          <!--fin de modal-->
          <!-- Modal formulario variables de alcance mensual -->
          <div class="modal fade bs-example-modal-lg" id="modalInfoMes" tabindex="-1" role="dialog" >
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Prospección Mensual</h4>
                  </div>
                  <div class="modal-body" id="infoAlcance">

                      

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                     <button type="submit"  class="btn btn-primary">Guardar</button>
                  </div>
                </div>
              </div>
          </div>
          <!--fin de modal-->
      <hr>
      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>

    </div><!--/.container-->
      <?php $this->load->view("footers/footer.php")?>
  </body>
</html>

 
