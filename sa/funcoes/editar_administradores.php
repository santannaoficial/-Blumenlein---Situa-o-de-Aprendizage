<?php
//Tela da função para editar clientes (ADMINISTRADOR)

    include 'conexao.php';
    mysqli_query($conexao,"set names 'utf8'"); 
    session_start();

    $login_admin =  $_SESSION['cpf_administradores'];
    $senha_admin =  $_SESSION['senha_administradores'];

    
    $SQL = "select id_administradores from tb_administradores where cpf_administradores='$login_admin' AND senha_administradores='$senha_admin'";
    $result_id = mysqli_query($conexao, $SQL) or die("Erro no banco de dados.");
    
    $dados = mysqli_fetch_array($result_id);

   
    $id =  $dados["id_administradores"];
    $nome_administradores = $_POST['nome_administradores'];
    $email_administradores = $_POST['email_administradores'];
    $senha_administradores = $_POST['senha_administradores'];
    $telefone_administradores = $_POST['telefone_administradores'];

    if (is_string($nome_administradores) && is_string($email_administradores) && is_string($senha_administradores) && is_string($telefone_administradores)) {
        if(strlen($nome_administradores) > 161){
            header('location:erro.php?codigo_erro=3&arquivo=atb'); 
           }else{
            if(strlen($email_administradores) > 345){
                header('location:erro.php?codigo_erro=1&arquivo=atb');
              }else{
                if(strlen($senha_administradores) > 14){
                    header('location:erro.php?codigo_erro=4&arquivo=atb');
                 }else{
                    if(strlen($telefone_administradores) > 16){
                        header('location:erro.php?codigo_erro=5&arquivo=atb');
                              }else{
                                    if(mysqli_query($conexao,"UPDATE tb_administradores SET nome_administradores='$nome_administradores', email_administradores='$email_administradores', senha_administradores='$senha_administradores', telefone_administradores='$telefone_administradores' WHERE id_administradores='$id'") > 0){	
                                    $_SESSION['nome_administradores'] = $nome_administradores;
                                    $_SESSION['senha_administradores'] =  $senha_administradores;
                                    header('location:../minha_conta_administradores.php?inclusao=sucesso');       
                                }else{
                                    $_SESSION['nome_administradores'] = $nome_administradores;
                                    $_SESSION['senha_administradores'] =  $senha_administradores;
                                    header('location:../minha_conta_administradores.php?inclusao=erro');
                                }
                            }
                         }
                      }
                  }
                }     
?>