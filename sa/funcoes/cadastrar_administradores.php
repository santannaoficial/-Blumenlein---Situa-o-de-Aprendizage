<?php

function insercao_imagens($nome_administradores,$email_administradores,$cpf_administradores,$senha_administradores,$telefone_administradores){
    include "conexao.php";
    $resultado = mysqli_query ($conexao, "select id_imagens FROM tb_imagens order by id_imagens desc limit 1") or die(mysqli_error($conexao));

    $id = mysqli_fetch_assoc($resultado);

    foreach ($id as $id_imagens){
    }

    $resultado = mysqli_query($conexao, "insert into tb_administradores(nome_administradores, email_administradores, cpf_administradores, senha_administradores, telefone_administradores, tb_imagens_id_imagens) values('$nome_administradores','$email_administradores','$cpf_administradores','$senha_administradores','$telefone_administradores','$id_imagens')"); 

    return $resultado;
}

if($_POST){
    include "conexao.php";
    include "removeChar.php";

    $nome_administradores = $_POST['nome_administradores'];
    $email_administradores = $_POST['email_administradores'];
    $cpf_administradores = strval($_POST['cpf_administradores']);
        $cpf_administradores = RemoveSpecialChar($cpf_administradores);
    $senha_administradores = $_POST['senha_administradores'];
    $telefone_administradores = strval($_POST['telefone_administradores']);
        $telefone_administradores = RemoveSpecialChar($telefone_administradores);

    if (is_string($nome_administradores) && is_string($email_administradores) && is_string($senha_administradores) && is_string($telefone_administradores)){
        if(is_numeric($nome_administradores)){   
                try{
                    checar($nome_administradores);
                }
                catch(Exception $mensagem_erro){
                    $mensagem = $mensagem_erro->getMessage();
                }
        }
        else{
            if(strlen($nome_administradores) > 161){
                header('location:erro.php?codigo_erro=3&arquivo=cdu'); 
            }
            else{
                if(strlen($email_administradores) > 345){
                    header('location:erro.php?codigo_erro=4&arquivo=cdu');
                }
                else{
                    if(strlen($senha_administradores) > 14){
                        header('location:erro.php?codigo_erro=5&arquivo=cdu');
                    }
                    else{
                        if(strlen($telefone_administradores) > 11){
                            header('location:erro.php?codigo_erro=6&arquivo=cdu');
                        }
                        else{
                            if($telefone_administradores <=0){
                                header('location:erro.php?codigo_erro=7&arquivo=cdu');
                            }
                            else{
                                //Aqui ele cadastra as info no banco de dados, caso o processo ocorra normalmente.
                                if(mysqli_query($conexao, "insert into tb_administradores(nome_administradores, cpf_administradores, email_administradores, senha_administradores, telefone_administradores) values('$nome_administradores', '$cpf_administradores','$email_administradores',  '$senha_administradores','$telefone_administradores')")){
                                    header('location:../cadastro_administradores.php?inclusao=sucesso');       
                                }else{
                                    header('location:../cadastro_administradores.php?inclusao=erro'); 
                                }
                            } 
                        }                          
                    }
                }
            }
        } 
    }
}
?>