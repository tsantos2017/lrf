<h3 class="text-center">Documentos anexados </h3>

       <div class="blankpage-main">
        <table class="table table-hover"> 
          <thead> 
            <tr> 
              <th>Descrição</th>
              <th>Categoria</th> 
              <th>Data Publicação</th> 
              <th>Visualizar</th>
              <th>Excluir</th>
            </tr> 
          </thead> 
          <tbody> 
            <?php foreach ($this->view->Documentos as $doc) 
              {
                echo '<tr>';
                    echo '<td>'.$doc['descricao'].'</td>';
                    echo '<td>'.$doc['categoria'].'</td>';
                    echo '<td>'.date('d/m/Y', strtotime($doc['data_Publicacao'])).'</td>';
                    echo '<td>
                            <a class="btn btn-info btn-xs" href="'.$doc['local_Arquivo'].'" role="button" target="blank"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true" ></span> Visualizar</a>
                          </td>';
                    echo '<td>
                            <a class="btn btn-danger btn-xs"  role="button" > <span class="glyphicon glyphicon-eye-open" aria-hidden="true" ></span> Excluir</a>
                          </td>';
                echo '</tr>';
              } 
            ?>
                <!-- <button type="button" class="btn btn-danger btn-xs">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir
                </button> -->
              
          </tbody> 

        </table>
      </div>
      <hr>
      <form action="" method="post"  enctype="multipart/form-data">
        <div class="form-group">
            <div class="btn btn-info col-md-12 btn-file">
                <i class="fa fa-paperclip"> </i> Anexar novo Documento para essa Licitação!
                <input type="file" name="arq">
            </div>
        </div>
        <hr><br><br>

       

        
           <a type="button" href="Admin-Licitacao" class="btn btn-sm btn-danger">Voltar</a>
          <button type="submit" name="novoDocumento" value="<?php echo $this->view->id_Licitacao; ?>" class="btn btn-sm btn-success">Atualizar</button>

        </form>