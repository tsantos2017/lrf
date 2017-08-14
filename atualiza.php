<?php
$id_RREO = $_GET['id_RREO'];

    if (isset($_POST['Altera'])) 
    {
      $relatorio['ano']                 = $_POST['ano'];
      $relatorio['periodo']             = $_POST['periodo'];
      $relatorio['descricao']           = $_POST['descricao'];

      $relatorio['usuario_Update'] = $_SESSION['autUser']['id_Usuario'];
      $relatorio['data_Update'] = date('Y-m-d H:i:s');
      
      if (!update('reeo',$relatorio,"id_RREO = '$id_RREO'")) {
        echo '<script> alert("Erro de cadastro no banco de dados "); </script>';
      }else{

        echo '<script> alert("RREO Atualizado com SUCESSO!!!"); </script>';

        header('Location: sistema.php?pg=RREO');
      }
         

    }



  
  $busca = read('rreo',"WHERE id_RREO = '$id_RREO'");

     foreach ($busca as $relatorio); 
    ?>
    <div class="blank">
        <h2>Atualizar Documento: Nº <?php echo $relatorio['descricao']; ?>.</h2>
      <div class="blankpage-main">
       <div class="row mb40">
       <form action="" method="POST">

<!-- ###################### FORMULARIO ######################## -->
       <?php include 'formulario.php'; ?>
<!-- ###################### FORMULARIO ######################## -->

      </div>
     
        <button type="submit" name="Altera" class="btn btn-sm btn-success">Alterar</button>
        <a href="sistema.php?pg=RREO" type="button" class="btn btn-sm btn-danger">Cancelar</a>    
        </form>
        </div>
      </div>
    </div>
