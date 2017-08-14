<?php
function retira_acentos( $texto ){
  $array1 = array(" ", "á", "a", "â", "a", "ã", "é", "e", "e", "ë", "í", "i", "î", "i", "ó", "o", "ô", "o", "õ", "ú", "u", "u", "ü", "ç", "Á", "A", "Â", "A", "Ã", "É", "E", "E", "Ë", "Í", "I", "Î", "I", "Ó", "O", "Ô", "O", "Ö", "Ú", "U", "U", "Ü", "Ç" );
  $array2 = array("", "a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c", "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C" );
  return str_replace( $array1, $array2, $texto );
}
  if (isset($_POST['Salvar'])) {
    // VALIDA TODOS OS CAMPOS PARA NÃO COLOCAREM <TAGS>
    $relatorio['ano']                 = $_POST['ano'];
    $relatorio['periodo']             = $_POST['periodo'];

    // $relatorio['descricao']           = $_POST['descricao'];
    $relatorio['usuario_Create']      = $_SESSION['autUser']['id_Usuario'];
    $relatorio['data_Create']         = date('Y-m-d H:i:s');
    $relatorio['situacao']            = '1';
    $arq                              = $_FILES['arq'];
    $qtde                             = sizeof($arq['tmp_name']);

    $local_arquivo = '../Public/uploads/Relatorios/RREO/'.$relatorio['ano'].'/'.$relatorio['periodo'];
    if (!is_dir($local_arquivo)){
      if(!mkdir($local_arquivo, 0777, true)){
        die("Impossivel criar o diretório: ".$local_arquivo);
      }
    }
    if (!create('rreo',$relatorio)) {
      echo '<script> alert("Erro de cadastro do Relatório de Execução Orçamentária no banco de dados "); </script>';
    }

    $ultimo_RREO = read('rreo',"WHERE situacao = '1' order by id_RREO desc limit 1");
    foreach ($ultimo_RREO as $key);
    $ultimo_id_RREO = $key[id_RREO];

    for ($i=0; $i < $qtde; $i++) { 
      $novo_arquivo = retira_acentos($arq['name'][$i]);
      //echo $local_arquivo.'/'.$novo_arquivo.'<br>';
      $upload = move_uploaded_file($arq['tmp_name'][$i], $local_arquivo.'/'.$novo_arquivo);
      $rel['local_Arquivo'] = $local_arquivo.'/'.$novo_arquivo;
      $rel['descricao'] = $arq['name'][$i];
      if (!$upload){
        echo '<script> alert("Erro de cadastro upload!!!"); </script>';
      }else{
        if (!create('rreo_arquivos',$rel)) {
          echo '<script> alert("Erro de cadastro do Relatório de Execução Orçamentária no banco de dados "); </script>';
        }
      }
    }
    // PASTA DE DESTINO DO ARQUIVO
    // $local_arquivo  = '../Public/uploads/Relatorios/RREO/'.$relatorio['ano'].'/'.$relatorio['periodo'];
    // //include_once 'r_acentoespaco.php';
    // //include_once '../../Models/outSis.php';
    // // $nome_arquivo = retira_acentos($arq['name']);
    // //$relatorio['local_Arquivo'] = $local_arquivo.'/'.strtoupper(removeAcentos($arq['name'],'-')).'.pdf';
      

    // $local_arquivo  = '../Public/uploads/Relatorios/RREO/'.$relatorio['ano'].'/'.$relatorio['periodo'];

    // for ($i=1; $i < $qtde; $i++) { 
    //   $arquivo_rreo = .'/'.retira_acentos($arq['name'][$i]);
    //   $upload = move_uploaded_file($arquivo_rreo, $local_arquivo);
    //   if (!$upload){
    //     echo '<script> alert("Erro de cadastro upload!!!"); </script>';
    //   }
    //   else{
    //     if (!create('rreo_arquivos',$arquivo_rreo)) {
    //       echo '<script> alert("Erro de cadastro do Relatório de Execução Orçamentária no banco de dados "); </script>';
    //     }
    //   }
    //   // echo $arquivo_rreo.'<br>';
    // }
    // print_r($nome_arquivo);
    // echo '<br>';
    // echo $ultimo_id_RREO;
    // echo '<br>';

    // print_r($arq);
    // echo '<br>';
    // echo $qtde.'<br>';
    // echo $local_arquivo.'<br>';
    // print_r($nome_arquivo);
          
     // // NOME DO ARQUIVO SERA MUDADO PARA O PADRÃO 
     //    $arq['name'] = $relatorio['descricao'];
     //    // PASTA DE DESTINO DO ARQUIVO
     //    $local_arquivo  = 'Public/uploads/Relatorios/RREO/'.$relatorio['ano'].'/'.$relatorio['periodo'];
     //    // grava no banco de dados o caminho do arquivo
     //    $relatorio['local_Arquivo'] = $local_arquivo.'/'.strtoupper(removeAcentos($arq['name'],'-')).'.pdf';

     //          if (!is_dir($local_arquivo)) { 
     //            /*se ele nao conseguir criar o diretorio e*/
     //              if (!mkdir($local_arquivo, 0777, true)) {
     //                die("Impossivel criar o diretorio: " . $local_arquivo);
     //              }
     //            }
            
     //          if (file_exists($relatorio['local_Arquivo'])) {
     //            $alerta = 'danger';
     //            $alertamsg = 'Desculpe, mas já existe cadastrado uma lei com esse nome. Favor verificar!';
     //          }else{

     //            $upload = move_uploaded_file($arq['tmp_name'],$relatorio['local_Arquivo']);
            

     //            if (!$upload) {
     //              echo '<script> alert("Erro de cadastro upload!!!"); </script>';
                  
     //            }elseif (!create('rreo',$relatorio)) {
     //              echo '<script> alert("Erro de cadastro no banco de dados "); </script>';
                  
     //            }else{

     //              //echo '<script> alert("Diarias Cadastrada com SUCESSO!!!"); </script>';
     //              header('Location: sistema.php?pg=RREO');
                 
     //            }
     //          }
       

      
  }
?>
    <div class="blank">
        <h2>Cadastro Novo Relatório de Execução Orçamentária...</h2>
        <?php  
          if (isset($alertamsg)) {
            echo msg($alerta,$alertamsg);
          }
        ?>
      <div class="blankpage-main">
        <div class="row mb40">
          <form action="" method="post"  enctype="multipart/form-data">
            <?php include 'formulario.php'; ?>
            <div class="form-group" >
              <div class="btn btn-info col-md-12 btn-file">
                <i class="fa fa-paperclip"> </i> Anexar Documentos do Relatório de Execução Orçamentária
                <input type="file" name="arq[]" required multiple>
              </div>
            </div>
            <br><hr><br>
            <input type="submit" name="Salvar" value="Salvar" class="btn btn-sm btn-success"></input>
            <input type="reset" value="Limpar" class="btn btn-sm btn-info"></input>
            <a href="sistema.php?pg=RREO" type="button" class="btn btn-sm btn-danger">Cancelar</a>    
          </form>
        </div>
      </div>
    </div>
