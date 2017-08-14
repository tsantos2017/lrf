    <div class="blank">
      <div class="blankpage-main">
      <div class="row">
        <div class="col-md-3">
           <a href="sistema.php?pg=RREO&exe=novo">
            <button type="button" class="btn btn-xs btn-success">Novo Documento</button>
          </a>
        </div>
        <div class="col-md-5">
          <h2 class="text-center">Relatório de Execução Orçamentária</h2>
        </div>
        <div class="col-md-4">
            <div class="form-group">
              <input class="form-control" id="system-search" name="q" placeholder="Busca por qualquer campo..." required>
            </div>
        </div>
      </div>
      <hr>
      <table class="table table-list-search"> 
        <thead> 
          <tr> 
            <th>Ano</th> 
            <th>Periodo</th> 
            <th>Descrição</th> 
            <th colspan="2">Opções</th> 
          </tr> 
        </thead> 
        <tbody> 
          <?php 
            $dadosRREO = read('rreo',"WHERE situacao = '1' order by ano, periodo desc");
              if (!$dadosRREO) {
                  echo msg('info',"Desculpe mas não encontramos nenhum cadastro!");
              }else{
                foreach ($dadosRREO as $relatorio) {
                      echo '<tr>';
                        echo '<td>'.$relatorio['ano'].'</td>';
                        echo '<td>'.$relatorio['periodo'].'</td>';
                        echo '<td title="'.$relatorio['descricao'].'">'.lmWord($relatorio['descricao'],80).'</td>';
                        echo '<td>';

                          $id_RREO = $relatorio['id_RREO'];
                          echo '<a title="Editar rreo" href="sistema.php?pg=RREO&exe=atualiza&id_RREO='.$id_RREO.'" class="btn btn-primary btn-xs">';
                              echo '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> ';
                          echo '</a>';
                        echo '</td>';
                        echo '<td>';
                          echo '<a title="Excluir rreo" href="sistema.php?pg=RREO&exe=excluir&id_RREO='.$id_RREO.'" class="btn btn-danger btn-xs">';
                           echo '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ';
                          echo '</a>';

                        echo '</td>';
                      echo '</tr>';                    
                } 
              }
          ?> 
            </tbody> 
        </table>
      </div>
    </div>
