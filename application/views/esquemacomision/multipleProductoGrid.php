<link href="<?=base_url('../assets/dist/css/bootstrap3/bootstrap-switch.css')?>" rel="stylesheet">
<link href="http://getbootstrap.com/assets/css/docs.min.css" rel="stylesheet">
<table  id="example3" class=" table table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th  class="text-center">Nombre</th>
                    <th  class="text-center">Fin de Vigencía</th>
                    <th  class="text-center">Opción</th>

                </tr>	
            </thead>
             <tbody class="text-center">
             <?php foreach ($tablaproducto as $key3){ ?>
            <tr>
                <td><?php echo $key3['nombre']; ?></td>
                <td><?php echo $key3['finVigencia']; ?></td>
                <td><input type="checkbox"  name="productos[]" data-size="mini" value="<?php echo $key3['idProducto'];?>"></td>
            </tr>
             <?php } ?>
</table>

<script>
	$(document).ready(function() {
			var rows3 = $("#example3").dataTable().fnGetNodes();
			var checkboxValuesProductos="";
		       	$("input:checked",rows3).each(function(){
				checkboxValuesProductos += $(this).val() + ",";
				});
	});

</script>

 <script src="<?=base_url('../assets/docs/js/main.js') ?>"></script>