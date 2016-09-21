<div class="form-horizontal" role="form">
      <div class="form-group">
        <label for="club" class="col-lg-5 control-label">Club</label>
        <div class="col-lg-4">
      
         <input type="hidden" class="form-control"  name="idComisionReglaDetalle"  id="idComisionReglaDetalle" value="<?php if(isset($idComisionReglaDetalle)){echo $idComisionReglaDetalle;} ?>">
          <input type="text" readonly="readonly" required="true" class="form-control" id="club" name="club" value="<?php if(isset($nombre)){echo $nombre;} ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="metaclub" class="col-lg-5 control-label">Monto Mensual de Club</label>
        <div class="col-lg-4">
          <input type="number" step="any" required="true" class="form-control" id="mensualClub" value="<?php if(isset($monto)){  echo $monto; } ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="metaclub" class="col-lg-5 control-label">Meta de Ventas</label>
        <div class="col-lg-4">
          <input type="number" required="true" class="form-control" id="numeroMes" value="<?php if(isset($numero)){  echo $numero; } ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="factor" class="col-lg-5 control-label">Factor</label>
        <div class="col-lg-4">
          <input type="number" step="any" required="true" class="form-control" id="factor" text="factor" value="<?php if(isset($factor)){ echo $factor; } ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="q1" class="col-lg-5 control-label">Ejecutivos Quincena 1</label>
        <div class="col-lg-4">
          <input type="number" step="any" required="true" class="form-control" id="q1" name="q1" value="<?php if(isset($q1)){echo $q1;} ?>">
        </div>
      </div>
       <div class="form-group">
        <label for="q2" class="col-lg-5 control-label">Ejecutivos Quincena 2</label>
        <div class="col-lg-4">
          <input type="number" step="any" required="true" class="form-control" id="q2" name="q2" value="<?php if(isset($q2)){echo $q2;} ?>">
        </div>
      </div>
</div>



