<?php
//Tela da função para editar clientes (CLIENTE)

    include 'conexao.php';
    mysqli_query($conexao,"SET NAMES 'utf8'");
    session_start();

    $login =  $_SESSION['user_clientes'];
    $senha =  $_SESSION['senha_clientes'];
    
    $SQL = "select id_clientes from tb_clientes where user_clientes='$login' AND senha_clientes='$senha'";
    $result_id = mysqli_query($conexao, $SQL) or die("Erro no banco de dados.");
    
    $dados = mysqli_fetch_array($result_id);

   
    $id =  $dados["id_clientes"];
    $nome_clientes = $_POST['nome_clientes'];
    $user_clientes = $_POST['user_clientes'];
    $email_clientes = $_POST['email_clientes'];
    $senha_clientes = $_POST['senha_clientes'];
    $telefone_clientes = $_POST['telefone_clientes'];

if (is_string($nome_clientes) && is_string($user_clientes) && is_string($email_clientes) && is_string($senha_clientes) && is_string($telefone_clientes)) {
    if(strlen($nome_clientes) > 161){
        header('location:erro.php?codigo_erro=3&arquivo=ata'); 
       }else{
        if(strlen($user_clientes) > 32){
            header('location:erro.php?codigo_erro=1&arquivo=ata');
          }else{
            if(strlen($email_clientes) > 345){
                header('location:erro.php?codigo_erro=4&arquivo=ata');
             }else{
                if(strlen($senha_clientes) > 14){
                    header('location:erro.php?codigo_erro=5&arquivo=ata');
                 }else{
                    if(strlen($telefone_clientes) > 16){
                        header('location:erro.php?codigo_erro=6&arquivo=ata');
                      }else{
       
                 if(mysqli_query($conexao,"UPDATE tb_clientes SET nome_clientes = '$nome_clientes',user_clientes = '$user_clientes', email_clientes = '$email_clientes', senha_clientes = '$senha_clientes', telefone_clientes = '$telefone_clientes' WHERE id_clientes='$id'")){	
                                 $_SESSION['user_clientes'] =  $user_clientes;
                                 $_SESSION['senha_clientes'] =  $senha_clientes;
                                 header('location:../minha_conta.php?inclusao=sucesso');       

                                 }else{
                                  $_SESSION['user_clientes'] =  $user_clientes;
                                  $_SESSION['senha_clientes'] =  $senha_clientes;
                                  header('location:../minha_conta.php?inclusao=erro');
                            }
                       }
                    }
                 }
             }
          }
       }
   
?>