
 <link href="<?=base_url('../assets/dist/css/bootstrap3/bootstrap-switch.css')?>" rel="stylesheet">
    <link href="http://getbootstrap.com/assets/css/docs.min.css" rel="stylesheet">
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<section id="wizard">
			  
				<div id="pills">
					<ul>
					  	<li><a href="#pills-tab1" data-toggle="tab">Esquema</a></li>
						<li><a href="#pills-tab2" data-toggle="tab">Puestos</a></li>
						<li><a href="#pills-tab3" data-toggle="tab">Categoría Productos</a></li>
						<li><a href="#pills-tab4" data-toggle="tab">Productos</a></li>
						<li><a href="#pills-tab5" data-toggle="tab">Convenios</a></li>
						<li><a href="#pills-tab6" data-toggle="tab">Promociones</a></li>
						<!--<li><a href="#pills-tab7" data-toggle="tab">Seventh</a></li>-->
					</ul>
                    <div id="bar" class="progress progress-danger progress-striped active">
                      <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                    </div>
					<div class="tab-content">
					    <div class="tab-pane" id="pills-tab1">
							      	<div class="form-horizontal" role="form">
									      <div class="form-group">
									        <label for="nombreEsquema" class="col-lg-5 control-label">Esquema de comisiones</label>
									        <div class="col-lg-4">
									         <input type="hidden" class="form-control"  name="idEmpresa"  id="idEmpresa" value="<?php //echo $idEmpresa; ?>">
									          <input type="text" required="true" class="form-control" id="nombreReporte" name="nombreReporte">
									        </div>
									      </div>
									      <div class="form-group">
									        <label for="hitRate" class="col-lg-5 control-label">Esquema</label>
									        <div class="col-lg-4">
									          <select class="form-control" name="nombreEsquema" id="nombreEsquema" >
									          <option>Selecciona Opción</option>
									          <option value="HIT RATE">HIT RATE</option>
									          <option value="COMISIÓN FIJA">COMISION FIJA</option>
									          </select>
									        </div>
									      </div>
									      <div class="form-group">
									        <label for="nombreEsquema" class="col-lg-5 control-label">Fecha Vigencia</label>
									        <div class="col-lg-4">
									          <input type="date" required="true" class="form-control" id="fechaVigencia" name="fechaVigencia">
									        </div>
									      </div>
									</div>
					    </div>
					    <div class="tab-pane" id="pills-tab2">

							    	<table id="example" class="table table-bordered" cellspacing="0" width="100%">
					                    <thead>
					                        <tr>
					                            <th  class="text-center">Codigo</th>
					                            <th  class="text-center">Descripción</th>
					                            <th  class="text-center">Opción</th>
					                        </tr>	
					                    </thead>
					                     <tbody class="text-center">
					                     <?php foreach ($tablapuesto as $key){ ?>
					                    <tr>
					                        <td><?php echo $key['codigo']; ?></td>
					                        <td><?php echo $key['descripcion']; ?></td>
					                        <td><input type="checkbox" name="codigoPusesto[]" value="<?php echo $key['idPuesto'];?>" data-size="mini"></td>
					                    </tr>
					                     <?php } ?>
					                </table>
					      
					    </div>
						<div class="tab-pane" id="pills-tab3">
							<table id="example2" class=" table table-bordered" cellspacing="0" width="100%">
					                    <thead>
					                        <tr>
					                            <th  class="text-center">Nombre</th>
					                            <th  class="text-center">Descripción</th>
					                            <th  class="text-center">Opción</th>
					                        </tr>	
					                    </thead>
					                     <tbody class="text-center">
					                     <?php foreach ($tablacategoria as $key2){ ?>
					                    <tr>
					                        <td><?php echo $key2['nombre']; ?></td>
					                        <td><?php echo  $key2['descripcion']; ?></td>
					                        <td><input type="checkbox"  name="categoriaProductos[]" value="<?php echo $key2["idCategoria"];?>"   data-size="mini"></td>
					                    </tr>
					                     <?php } ?>
					        </table>
					    </div>
						<div class="tab-pane" id="pills-tab4">
							<div id="tableProductos">
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
						    </div>    
					    </div>
						<div class="tab-pane" id="pills-tab5">
							
							<table  id="example4" class=" table table-bordered" cellspacing="0" width="100%">
					                    <thead>
					                        <tr>
					                            <th  class="text-center">Nombre</th>
					                            <th  class="text-center">Fecha Vigencía</th>
					                            <th  class="text-center">id Convenio detalle</th>
					                            <th  class="text-center">Opción</th>
					                        </tr>	
					                    </thead>
					                     <tbody class="text-center">
					                     <?php foreach ($tablaconvenio as $key4){ ?>
					                    <tr>
					                        <td><?php echo $key4['nombre']; ?></td>
					                        <td><?php echo $key4['fechaFin']; ?></td>
					                        <td><?php echo $key4['idConvenioDetalle']; ?></td>
					                        <td><input type="checkbox" name="convenios[]" data-size="mini" value="<?php echo $key4['idConvenioDetalle'];?>" ></td>
					                    </tr>
					                     <?php } ?>
					        </table>
					    </div>
						<div class="tab-pane" id="pills-tab6">
							<table  id="example5" class=" table table-bordered" cellspacing="0" width="100%">
					                    <thead>
					                        <tr>
					                            <th  class="text-center">Nombre</th>
					                            <th  class="text-center">Fecha Vigencía</th>
					                            <th  class="text-center">Opción</th>
					                        </tr>	
					                    </thead>
					                     <tbody class="text-center">
					                     <?php foreach ($tablapromocion as $key5){ ?>
					                    <tr>
					                        <td><?php echo $key5['nombre']; ?></td>
					                        <td><?php echo $key5['finVigencia']; ?></td>
					                        <td><input type="checkbox"  name="paquetes[]" id="maria" data-size="mini" value="<?php echo $key5['idPaquete'];?>" ></td>
					                    </tr>
					                     <?php } ?>
					        </table>
					    </div>
						<div class="tab-pane" id="pills-tab7">
							7
					    </div>
						<ul class="pager wizard">
							<li class="previous first" style="display:none;"><a href="#">First</a></li>
							<li class="previous"><a href="#">Previous</a></li>
							<li class="next last" style="display:none;"><a href="#">Last</a></li>
						  	<li class="next"><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</section>
		</div>
	<div class="col-md-1"></div>	
</div>
	<script src="<?=base_url('../assets/jquery.bootstrap.wizard.js')?>"></script>
	<script src="<?=base_url('../assets/prettify.js')?>"></script>
	<script src="<?=base_url('../assets/docs/js/highlight.js') ?>"></script>
    <script src="<?=base_url('../assets/dist/js/bootstrap-switch.js') ?>"></script>
    <script src="<?=base_url('../assets/docs/js/main.js') ?>"></script>
<script>
    $(document).ready(function() {
		
		$('table.display1').DataTable( {
	        "language": {
	            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
	        }
	    } );
	    var rows =  $("#example").dataTable().fnGetNodes();
	    var rows2 = $("#example2").dataTable().fnGetNodes();
	    var rows3 = $("#example3").dataTable().fnGetNodes();
	    var rows4 = $("#example4").dataTable().fnGetNodes();
	    var rows5 = $("#example5").dataTable().fnGetNodes();

			$('#pills').bootstrapWizard({'tabClass': 'nav nav-pills', 'debug': false, onShow: function(tab, navigation, index) {
					console.log('onShow');
				}, onNext: function(tab, navigation, index) {
					//console.log('onNext');
					var categoria =3;
					if (index==categoria) {
						var checkboxValuesCategorias="";
				       	$("input:checked",rows2).each(function(){
						checkboxValuesCategorias += $(this).val() + ",";
						});
						params={};
						params.listProductos = checkboxValuesCategorias.substring(0,checkboxValuesCategorias.length-1);
						$("#tableProductos").load("formularioGridReporteProductos",params);
					}
				}, onPrevious: function(tab, navigation, index) {
					console.log('onPrevious');
				}, onLast: function(tab, navigation, index) {
					console.log('onLast');
				}, onTabClick: function(tab, navigation, index) {
					console.log('onTabClick');
					alert('on tab click disabled');
				}, onTabShow: function(tab, navigation, index) {
					console.log('onTabShow');
					var $total = navigation.find('li').length;
					var $current = index+1;
					var $percent = ($current/$total) * 100;
                    $('#pills .progress-bar').css({width:$percent+'%'});
				}});	

			$(document).on('submit','#reprote',function(){      
		       	var checkboxValuesPuestos = "";
		       	$("input:checked",rows).each(function(){
				checkboxValuesPuestos += $(this).val() + ",";
				});
		       	var checkboxValuesCategorias="";
		       	$("input:checked",rows2).each(function(){
				checkboxValuesCategorias += $(this).val() + ",";
				});
		       	var checkboxValuesProductos="";
		       	$("input:checked",rows3).each(function(){
				checkboxValuesProductos += $(this).val() + ",";
				});
		        var checkboxValuesConvenios="";
		       	$("input:checked",rows4).each(function(){
				checkboxValuesConvenios += $(this).val() + ",";
				});
		       	var checkboxValuesPaquetes="";
		       	$("input:checked",rows5).each(function(){
				checkboxValuesPaquetes += $(this).val() + ",";
				});

		        params={};
		        params.nombreReporte 		= $("#nombreReporte").val();
				params.nombreEsquema 		= $("#nombreEsquema").val();
				params.fechaVigencia 		= $("#fechaVigencia").val();
		        params.codigoPusesto		= checkboxValuesPuestos.substring(0,checkboxValuesPuestos.length-1);
		        params.categoriaProductos	= checkboxValuesCategorias.substring(0,checkboxValuesCategorias.length-1);
		        params.productos	  		= checkboxValuesProductos.substring(0,checkboxValuesProductos.length-1);
		        params.convenios	  		= checkboxValuesConvenios.substring(0,checkboxValuesConvenios.length-1);
		        params.paquetes		  		= checkboxValuesPaquetes.substring(0,checkboxValuesPaquetes.length-1);
		        $.post('setInsertMultiple',params);


		        
		    });
    } );
</script>
