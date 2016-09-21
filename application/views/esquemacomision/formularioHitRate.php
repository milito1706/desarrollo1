<h3><p><?php echo $nombreEmpresa;?></p></h3>
<br>
<button type="button" class="btn btn-primary btn-sm" data-idEmpresa=<?php echo $idEmpresa;?> id="new_esqema"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nueva Variable</button>
<br>
<br>
<table id="" class="display table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">Alcance Prospectos</th>
                            <th class="text-center">Hit Rate </th>
                            <th class="text-center">Comisión Fija</th>
                            <th class="text-center">Comisión Adicional</th>
                            <th class="text-center">Comisión Total</th>
                            <th class="text-center">Editar</th>
                        </tr>
                    </thead>
                     <tbody class="text-center">
                     <?php foreach ($hitRate as $key){ ?>
                    <tr>
                        <td><?php echo $key['alcanceProspectos']; ?></td>
                        <td><?php echo $key['hitRate']; ?></td>
                        <td><?php echo $key['comisionFija']; ?></td>
                        <td><?php echo $key['comisionAdicional']; ?></td>
                        <td><?php echo $key['comisonTotal']; ?></td>
                        <td><a href="#" id="update_esqema"  data-idEsquema=<?php echo $key["idEsquemaHitRate"];?> data-idEmpresa=<?php echo $idEmpresa;?>><i class="fa fa-pencil-square fa-lg text-primary" aria-hidden="true"></i></a></td>
                    </tr>
                     <?php } ?>
                </table>



<script>
    $(document).ready(function() {
   
     $(document).on('click','#new_esqema',function(){

                var idEmpresa=$(this).attr("data-idEmpresa");
                 params={};
                 params.idEmpresa=idEmpresa;
                $('#esquema').modal('show');
                $('#variable').load('formularioVariable',params);

      });
      $(document).on('click','#update_esqema',function(){
                var idEsquema=$(this).attr("data-idEsquema");
                var idEmpresa=$(this).attr("data-idEmpresa");
                 params={};
                 params.idEsquema=idEsquema;
                 params.idEmpresa=idEmpresa;
                $('#esquema').modal('show');
                $('#variable').load('formularioVariableUpdate',params);

      });



    } );
</script>