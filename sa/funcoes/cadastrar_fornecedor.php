<?php
   function insercao_imagens($nome_fornecedor,$email_fornecedor,$telefone_fornecedor){
      include "conexao.php";
      $resultado = mysqli_query ($conexao, "select id_imagens FROM tb_imagens order by id_imagens desc limit 1") or die(mysqli_error($conexao));

      $id = mysqli_fetch_assoc($resultado);

      foreach ($id as $id_imagens){
      }

      $resultado = mysqli_query($conexao, "insert into tb_fornecedores(nome_fornecedores,  email_fornecedores, telefone_fornecedores,tb_imagens_id_imagens) values('$nome_fornecedor','$email_fornecedor','$telefone_fornecedor',$id_imagens)"); 

      return $resultado;
  }

if ($_POST) {
    include "conexao.php";

    
    $nome_fornecedor = $_POST['nome_fornecedor'];
    $email_fornecedor = $_POST['email_fornecedor'];
    $telefone_fornecedor = $_POST['telefone_fornecedor'];

         if (is_string($nome_fornecedor) && is_string($email_fornecedor) && is_string($telefone_fornecedor)) {
            if(strlen($nome_fornecedor) > 45){
               //Exemplo de header que mostra o caminho para o arquivo de erro.
               header('location:erro.php?codigo_erro=3&arquivo=cdf');
            }else{
                 if(strlen($email_fornecedor) > 345){
                    header('location:erro.php?codigo_erro=4&arquivo=cdf');
                 }else{
                     if(strlen($telefone_fornecedor) > 16){
                         header('location:erro.php?codigo_erro=6&arquivo=cdf');             
                     }else{
                        if(insercao_imagens($nome_fornecedor,$email_fornecedor,$telefone_fornecedor)){
                           header('Location:../cadastro_endere_fornecedor.php');
                         }else{
                                    header('location:../cadastro_fornecedor.php?inclusao=erro'); 
                                  }
                                }                           
                             }   
                        }
                    }
                }
            
?>

