<?php
$id_RREO = $_GET['id_RREO'];

    if (isset($_POST['Excluir'])) {
        
       
        $relatorio['situacao'] = '0';
      

      if (!update('rreo',$relatorio,"id_RREO = '$id_RREO'")) {

        echo '<script> alert("Erro de cadastro no banco de dados "); </script>';

      }else{
    
        header('Location: sistema.php?pg=RREO');
      }
         

    }



  
  $dados = read('rreo',"WHERE id_RREO = '$id_RREO'");

     foreach ($dados as $relatorio); 
     


    ?>
    <div class="blank">
        <h2>Excluir RREO : <?php echo $relatorio['descricao']; ?></h2>
      <div class="blankpage-main">
       <div class="row mb40">
       <form action="" method="POST">

       <p>Tem Certeza que deseja EXCLUIR PERMANENTIMENTE o Documento: <?php echo $relatorio['descricao']; ?> .?   
       </p>

       
      <hr>
        
        <a href="sistema.php?pg=RREO"  class="btn btn-sm btn-danger">Não</a>

        <button type="submit" name="Excluir" class="btn btn-sm btn-success">Sim</button>
            
        </form>
        </div>
      </div>
    </div>
