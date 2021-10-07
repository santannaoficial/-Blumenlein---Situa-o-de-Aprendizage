<?php

    function insercao_imagens($nome_clientes,$user_clientes,$email_clientes,$cpf_clientes,$senha_clientes,$telefone_clientes,$nascimento_clientes){
        include "conexao.php";
        $resultado = mysqli_query ($conexao, "select id_imagens FROM tb_imagens order by id_imagens desc limit 1") or die(mysqli_error($conexao));

        $id = mysqli_fetch_assoc($resultado);

        foreach ($id as $id_imagens){
        }

        $resultado = mysqli_query($conexao, "insert into tb_clientes(nome_clientes, user_clientes, email_clientes, cpf_clientes, senha_clientes, telefone_clientes,nascimento_clientes,tb_imagens_id_imagens) values('$nome_clientes','$user_clientes','$email_clientes','$cpf_clientes','$senha_clientes','$telefone_clientes','$nascimento_clientes','$id_imagens')"); 

        return $resultado;
    }

    /*function checar($nome_clientes) {
        $mensagem_erro = "";
        if(is_numeric($nome_clientes)) {
            header('location:erro.php?codigo_erro=8');
            throw new Exception($mensagem_erro);
        }
        return true;
    }*/

if ($_POST) {
    include "conexao.php";
    include "removeChar.php";

    $nome_clientes = $_POST['nome_clientes'];
    $user_clientes = $_POST['user_clientes'];
    $email_clientes = $_POST['email_clientes'];
    $cpf_clientes = strval($_POST['cpf_clientes']);
        $cpf_clientes = RemoveSpecialChar($cpf_clientes);
    $senha_clientes = $_POST['senha_clientes'];
    $telefone_clientes = strval($_POST['telefone_clientes']);
        $telefone_clientes = RemoveSpecialChar($telefone_clientes);
    $data_input = $_POST['nascimento_clientes'];
    $nascimento_clientes = date("Y-m-d", strtotime($data_input));
    //data_input é um valor que capta a data do input para que o nascimento_clientes possa convertê-la e salvá-la no banco de dados.

    if (is_string($nome_clientes) && is_string($user_clientes) && is_string($email_clientes) && is_string($senha_clientes) && is_string($telefone_clientes)){
        /*if(is_numeric($nome_clientes)){   
            try{
                checar($nome_clientes);
            }
            catch(Exception $mensagem_erro){
                $mensagem = $mensagem_erro->getMessage();
            }
        }
            else{*/
                if(strlen($nome_clientes) > 161){
                    header('location:erro.php?codigo_erro=3&arquivo=cdu'); 
                }
                else{
                    if(strlen($user_clientes) > 32){
                        header('location:erro.php?codigo_erro=1&arquivo=cdu');
                    }
                    else{
                        if(strlen($email_clientes) > 345){
                            header('location:erro.php?codigo_erro=4&arquivo=cdu');
                        }
                        else{
                            if(strlen($senha_clientes) > 14){
                                header('location:erro.php?codigo_erro=5&arquivo=cdu');
                            }
                            else{
                                if(strlen($telefone_clientes) > 11){
                                    header('location:erro.php?codigo_erro=6&arquivo=cdu');
                                }
                                else{
                                    if($telefone_clientes <=0){
                                        header('location:erro.php?codigo_erro=7&arquivo=cdu');
                                    }
                                    if(insercao_imagens($nome_clientes,$user_clientes,$email_clientes,$cpf_clientes,$senha_clientes,$telefone_clientes,$nascimento_clientes)){
                                            header('location:../cadastro_clientes.php?inclusao=sucesso'); 
                                        }
                                    else{
                                        header('location:../cadastro_clientes.php?inclusao=erro');
                                    }
                                } 
                            }                          
                        }
                    }
                }
            } 
        }
    
?>