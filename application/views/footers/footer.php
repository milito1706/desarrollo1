 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  
      <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap4.min.js"></script>


  <script>
    $(document).ready(function() {
    $('#example').DataTable( {
        "language": {
            "lengthMenu": "numero _MENU_ numero de filas",
            "zeroRecords": "Nothing found - sorry",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    } );
    $('table.display').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        }
    } );

    $(document).on('click','#new',function(){
                var idEmpresa= $(this).attr('data-idEmpresa');
                var nombreEmpresa= $(this).attr('data-nombreEmpresa');
                params={};
                  params.idEmpresa=idEmpresa;
                  params.nombreEmpresa=nombreEmpresa;
                $('#nueva').modal('show');
                $('#esquema_nuevo').load('formularioCom',params);

    });
    $(document).on('click','#exep',function(){
                $('#exepcion').modal('show');
                $('#esquema_exep').load('formularioExep');

    });
    $(document).on('submit','#mike',function(){
                params={};
                params.idEsquema = $("#idEsquema").val();
                params.idEmpresa= $("#idEmpresa").val();
                params.alcanceProspecto= $("#alcanceProspecto").val();
                params.hitRate= $("#hitRate").val();
                params.comisionFija= $("#comisionFija").val();
                params.comisionAdicional= $("#comisionAdicional").val();
                params.comisionTotal= $("#comisionTotal").val();
                $('#variable').load('setFormularioCom',params);
                $('#esquema').modal('hide');
                if(params.idEsquema > 1){
                  alert("elemento actualizado con exito");  
                }
                else{
                  alert("elemento guardado con exito");
                }
                $('#esquema_nuevo').load('formularioCom',params);
                $('#nueva').modal('show');
                return false;
    });
    $(document).on('click','#confReport',function(){
                $('#nuevoConfigurar').modal('show');
                $('#nuevoConf').load('formularioConfiguracionReporte');

    });
    //////////configuracion cariables de alcance//////
    $(document).on('click','#updateVariable',function(){
             var idUn = $(this).attr('data-idUn'); 
             params={};
             params.idUn =idUn;
             $('#modalVariables').modal('show');
             $('#variablesAlcance').load("/desarrollo/index.php/esquemacomisones/comisonesnew/formularioConfiguracionAlcance",params);
          

    });
    $(document).on('submit','#updateDetalleComision',function(){
                
                params={};
                params.idComisionReglaDetalle = $("#idComisionReglaDetalle").val();
                params.club                   = $("#club").val();
                params.metaClub               = $("#mensualClub").val();
                params.numeroMes              = $("#numeroMes").val();
                params.factor                 = $("#factor").val();
                params.q1                     = $("#q1").val();
                params.q2                     = $("#q2").val();
                alert(params.idComisionReglaDetalle+params.club+params.metaClub);
                $('#variablesAlcance').load('/desarrollo/index.php/esquemacomisones/comisonesnew/setFormularioConfiguraAlcace',params);
                $('#modalVariables').modal('hide');
                return true;
    });
    $(document).on('click','#InfoMes',function(){
             var idUn = $(this).attr('data-idUn'); 
             params={};
             params.idUn =idUn;
             $('#modalInfoMes').modal('show');
             $('#infoAlcance').load("/desarrollo/index.php/esquemacomisones/comisonesnew/infoModalMesEsquemaHitRate",params);
          

    });

    
 
     /*$('display1 tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
 
    $('#crm').click( function () {
        alert( table.rows('.selected').data().length +' row(s) selected' );
    } );*/


    
    

    //////////configuracion variables de alcance//////
} );
</script>