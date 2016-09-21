<div class="form-horizontal" role="form">
      <div class="form-group">
        <label for="alcanceProspecto" class="col-lg-5 control-label">Alcance Prospecto</label>
        <div class="col-lg-4">
         <input type="hidden" class="form-control"  name="idEmpresa"  id="idEmpresa" value="<?php echo $idEmpresa; ?>">
         <input type="hidden" class="form-control"  name="idEsquema"  id="idEsquema" value="<?php if(isset($idEsquemaHitRate)){echo $idEsquemaHitRate;} ?>">
          <input type="number" step="any"  required="true" class="form-control" id="alcanceProspecto" name="alcanceProspecto" value="<?php if(isset($alcanceProspecto)){echo $alcanceProspecto;} ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="hitRate" class="col-lg-5 control-label">Hit Rate</label>
        <div class="col-lg-4">
          <input type="number"   step="any" required="true" class="form-control" id="hitRate" name="hitRate" value="<?php  if(isset($hitRate)){ echo $hitRate; } ?>" >
        </div>
      </div>
      <div class="form-group">
        <label for="comisionFija" class="col-lg-5 control-label">Comisión Fija</label>
        <div class="col-lg-4">
          <input type="number" step="any" required="true" class="form-control" id="comisionFija" name="comisionFija" value="<?php if(isset($comisionFija)){  echo $comisionFija; } ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="comisionAdicional" class="col-lg-5 control-label">Comisión Adicional</label>
        <div class="col-lg-4">
          <input type="number" step="any" required="true" class="form-control" id="comisionAdicional" text="comisionAdicional" value="<?php if(isset($comisionFija)){ echo $comisionAdicional; } ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="comisionTotal" class="col-lg-5 control-label">Comisión Total</label>
        <div class="col-lg-4">
          <input type="number" step="any" required="true" class="form-control" id="comisionTotal" name="comisionTotal" value="<?php if(isset($comisionTotal)){echo $comisionTotal;} ?>">
        </div>
      </div>
</div>



