<!DOCTYPE html>
<html lang="en">
  <head>
      <? $this->load->view("heders/heder"); ?>
  </head>

  <body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        
          <!--vista de menu de desarrollo-->

          <?php $data['active']= "Active"; $this->load->view("heders/menu",$data);?>

      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    
    <div class="container" id='pixes'>

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-md-12">
          <br><br><br>
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
                    <div>
                      <!--<button type="button" class="btn btn-primary"  id="new">Nuevo Esquema Hit Rate</button>-->
                      <button type="button" class="btn btn-primary" id="confReport">Configuracion Reporte</button>
                    </div>
                    <br><br>
                    <table id="" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">Reporte</th>
                            <th class="text-center">Esquema</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                     <tbody>
                     <?php foreach ($tablaesquemas as $key){ ?>
                    <tr>
                        <td class="text-center"><?php echo $key['nombreReporte']; ?></td>
                        <td class="text-center"><?php echo $key['nombreEsquema']; ?></td>
                        <td class="text-center"><a href="#" id="new" data-idEmpresa="<?php //echo $key['idEmpresa'];?>" data-nombreEmpresa="<?php //echo $key["razonSocial"];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp; <a href="reporteHitRate/<?php echo $key['IdReporteComision']; ?>"><i class="fa fa-cogs"  aria-hidden="true"></i></a> </td>
                    </tr>
                     <?php } ?>
                </table>
        </div><!--/.col-xs-12.col-sm-9-->
      </div><!--/row-->
              
          <!-- Modal formulario de comisiones -->
         <form  id="reprote" method="post">
          <div class="modal fade bs-example-modal-lg" id="nuevoConfigurar" tabindex="-1" role="dialog" >
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Configuración de Reporte de Comisiones</h4>
                  </div>
                  <div class="modal-body" id="nuevoConf">
                      

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit"   class="btn btn-primary">Guardar</button>
                  </div>
                </div>
              </div>
          </div>
          <!--</form>-->
       
          <!-- fin Modal de formulario Comisiones -->
      <hr>
      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>

    </div><!--/.container-->
      <?php $this->load->view("footers/footer.php")?>
  </body>
</html>

 
