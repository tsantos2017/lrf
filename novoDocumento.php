<?php 

  $id_Licitacao = $_GET['id_licitacao'];
  $readLicitacao = read('licitacao',"WHERE id_Licitacao = '$id_Licitacao'");
    foreach ($readLicitacao as $licitacao);

  if (isset($_POST['SalvarDocumento'])) 
  {
    
    // PEGA AS INFORMAÇÕES DO FORMULARIO
    $documento['id_Licitacao']    = $id_Licitacao ;
    $documento['descricao']       = $_POST['descricao'];
    $documento['data_Publicacao'] = $_POST['data_Publicacao'];
    $documento['categoria']       = $_POST['categoria'];

    // DOCUMENTO FILE
    $arq = $_FILES['arq'];

    $documento['usuario_Create']  = $_SESSION['AutUser']['id_Usuario'];
    $documento['data_Create']     = date('Y-m-d H:i:s');
    $documento['situacao']        = '1';

   
          $timestamp = explode("-",$licitacao['data_Publicacao']);
          $ano = $timestamp[0];
          $mes = $timestamp[1];
          $dia = $timestamp[2];

           
          
          
          // NOME DO ARQUIVO SERA MUDADO PARA O PADRÃO ORGÃO - NUMERO
          $arq['name'] = $licitacao['numero'].' - '.$documento['descricao'];
          // PASTA DE DESTINO DO ARQUIVO
          $local_Arquivo  = '../Public/uploads/Licitacao/'.$ano.'/'.$mes.'/'.$licitacao['numero'];

          if (!is_dir($local_Arquivo)) 
          { 
              /*se ele nao conseguir criar o diretorio e*/
                if (!mkdir($local_Arquivo, 0777, true))
                {
                  die("Impossivel criar o diretorio: " . $local_Arquivo);
                }
          }

        $documento['local_Arquivo'] = $local_Arquivo.'/'.strtoupper(removeAcentos($arq['name'],'-')).'.pdf';;             
      
         if (!is_file($documento['local_Arquivo'])) {
            // UPLOAD DO ARQUIVO
          $upload = move_uploaded_file($arq['tmp_name'],$documento['local_Arquivo']);
                 
          

          if (!$upload) {
            echo '<script> alert("Erro de cadastro upload!!!"); </script>';
          }elseif (!create('documento_licitacao', $documento)) {
            echo '<script> alert("Erro de cadastro no banco de dados "); </script>';
          }else{
            header('Location: sistema.php?pg=Licitacao');
            echo '<script> alert("Contrato Cadastrado com SUCESSO!!!"); </script>';
            
          }
         }else{
          echo '<script> alert("O Documento já está cadastrado favor verificar!"); </script>';
         }


  }
?>
<div class="blank">
  <h2>Cadastrar novo documento...</h2>
  <div class="blankpage-main">
   <div class="row mb40">
     <form action="" method="post"  enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-2"><label>Descrição:</label></div>
    <div class="col-md-10"><input type="text" name="descricao"  class="form-control" required="required" value="<?php if(isset($_POST['descricao'])) echo $_POST['descricao'];?>"></div>
  </div>
<hr>

       <div class="row">
           <div class="col-md-2">
                <LABEL>Data Publicação.:</LABEL>
            </div>
            <div class="col-md-3">
                <input type="date" name ="data_Publicacao" class="form-control" required="required" value="<?php if(isset($_POST['data_Publicacao'])) echo $_POST['data_Publicacao'];?>">
            </div>
           <div class="col-md-2">
               <label>Categoria: </label>
           </div>
           <div class="col-md-5">
            <select class="form-control" name="categoria" required="required">
              <option value="" required="required">SELECIONE A CATEGORIA</option>
              <option value="EDITAL">EDITAL</option>
              <option value="ANEXO">ANEXO</option>
              <option value="PUBLICAÇÃO">PUBLICAÇÃO</option>
              <option value="ATA">ATA</option>
              <option value="HOMOLOGAÇÃO">HOMOLOGAÇÃO</option>
              <option value="ADJUDIÇÃO">ADJUDIÇÃO</option>  
              <option value="ORDEM DE SERVIÇO">ORDEM DE SERVIÇO</option>
              <option value="EXTRATO DE CONTRATO">EXTRATO DE CONTRATO</option>
              <option value="CONTRATO">CONTRATO</option>
              <option value="OUTROS">OUTROS</option>
            </select>
           </div>
       </div>
      
       
       <hr>
       <div class="form-group" >
            <div class="btn btn-info col-md-12 btn-file">
                <i class="fa fa-paperclip"> </i> Anexar Documento
                <input type="file" name="arq" required="required">
            </div>
        </div>
        <br>
        <hr>
      
        <input type="submit" name="SalvarDocumento" value="Salvar" class="btn btn-sm btn-success">
        <input type="reset" name="SalvarContrato" value="Limpar" class="btn btn-sm btn-info"></input>
          <a href="sistema.php?pg=Licitacao" type="button" class="btn btn-sm btn-danger">Cancelar</a>    
      </form>
    </div>
  </div>
</div>
