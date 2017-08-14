<div class="row">
    <div class="col-md-2">
        <LABEL>Ano.: </LABEL>
    </div>
    <div class="col-md-4">
      <input type="number" min="2012" max="2020" step="0000" name ="ano" value="<?php if(isset($relatorio['ano'])) echo $relatorio['ano']; ?>" class="form-control" title="Número do Contrato...">
    </div>
<!-- </div>
<hr>
<div class="row"> -->
    <div class="col-md-2">
      <label>Periodo.: </label>
    </div>
    <div class="col-md-4">
      <select class="form-control" name="periodo" required="required">
        <option value="<?php if(isset($relatorio['periodo'])) echo $relatorio['periodo']; ?>"><?php if(isset($relatorio['periodo'])) {echo $relatorio['periodo'];}else{ echo "SELECIONE O PERIODO";} ?></option>
        <option value="1-BIMESTRE">1º - BIMESTRE</option>
        <option value="2-BIMESTRE">2º - BIMESTRE</option>
        <option value="3-BIMESTRE">3º - BIMESTRE</option>
        <option value="4-BIMESTRE">4º - BIMESTRE</option>
        <option value="5-BIMESTRE">5º - BIMESTRE</option>
        <option value="6-BIMESTRE">6º - BIMESTRE</option>
      </select>
    </div>
</div>
 <hr>
  <!-- <div class="row">
    <div class="col-md-2">
      <label>Descrição:</label>
    </div>
    <div class="col-md-10">
      <input type="text" name="descricao"  class="form-control" required="required" value="<?php if(isset($relatorio['descricao'])) echo $relatorio['descricao'];?>">
    </div>
  </div>
 <hr> -->

       
      