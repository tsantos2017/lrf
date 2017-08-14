<?php

$id_Documento = $_GET['id_Documento'];



    if (isset($_POST['Excluir'])) {
        
       
        $Doc['situacao'] = '0';
        $Doc['usuario_Delete'] = $_SESSION['autUser']['id_Usuario'];
        $Doc['data_Delete'] = date('d-m-Y H:m:s');
      

      if (!update('documento_licitacao',$Doc,"id_Documento = '$id_Documento'")) {

        echo '<script> alert("Erro!, Não conseguimos Excluir o Documento! "); </script>';

      }else{
    
        header('Location: sistema.php?pg=Licitacao');
      }
         

    }



  
  
$readLicitacao = read('documento_licitacao',"WHERE id_Documento = '$id_Documento'");
     foreach ($readLicitacao as $Doc); 
     
    

    ?>
    <div class="blank">
        <h2>Excluir Documento: <?php echo $Doc['descricao']; ?></h2>
      <div class="blankpage-main">
       <div class="row mb40">
       <form action="" method="POST">

       <p>Tem Certeza que deseja EXCLUIR PERMANENTIMENTE o documento: <?php echo $Doc['descricao']; ?> .?   
       </p>

       
      <hr>
        
        <a href="sistema.php?pg=Licitacao"  class="btn btn-sm btn-danger">Não</a>

        <button type="submit" name="Excluir" class="btn btn-sm btn-success">Sim</button>
            
        </form>
        </div>
      </div>
    </div>
