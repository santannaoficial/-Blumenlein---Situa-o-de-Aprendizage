<?php
    session_start();
    

    if ($_POST) {
    include "conexao.php";

    //Aqui ele coleta informações do usuário
    $user =  $_SESSION['user_clientes'];
    $senha =  $_SESSION['senha_clientes'];
    
    //Aqui ele coleta info dos campos do cadastro de pagamento
    $escolha = $_POST['escolha'];
    $nome_titular = $_POST['nome_titular'];
    $cpf_titular = $_POST['cpf_titular'];
    $numero_cartao = $_POST['numero_cartao'];
    $cvv_cartao = $_POST['cvv_cartao'];
    $data_input = $_POST['data_vencimento'];
    $data_vencimento = date("Y-m-d", strtotime($data_input));

    //Aqui id do usuário logado no momento

	$SQL = "select id_clientes from tb_clientes where user_clientes='$user' AND senha_clientes='$senha'";
	$result_id = mysqli_query($conexao, $SQL) or die("Erro no banco de dados.");
	$total = mysqli_num_rows($result_id);	 
	$dados = mysqli_fetch_array($result_id);
	$id_clientes =  $dados["id_clientes"];
    

 
    if (is_string($nome_titular) && is_string($numero_cartao) && is_string($cvv_cartao)){


     // Erros de inserção no campo.
        
    
          if(strlen($nome_titular) > 161){
                    header('location:erro.php?codigo_erro=3&arquivo=fnc'); 
                }
                else{
                    if(strlen($numero_cartao) > 32){
                        header('location:erro.php?codigo_erro=33&arquivo=fnc');
                    }
                    else{
                        if(strlen($cvv_cartao) != 3){
                            header('location:erro.php?codigo_erro=34&arquivo=fnc');
                        }
                        else{  
                            //Primeiro insere informações na tabela de "pagamento"
                                  if(mysqli_query($conexao, "INSERT INTO tb_cartoes(escolha,nome_titular,cpf_titular,numero_cartoes,cvv_cartao,data_vencimento,tb_clientes_id_clientes) VALUES('$escolha','$nome_titular','$cpf_titular','$numero_cartao','$cvv_cartao','$data_vencimento','$id_clientes')")){
                                        //Se o pagamento for confirmado, gera pedido que, através do carrinho, conta quantas linhas foram cadastradas para que ele dê o while e vá cadastrando até que a variável de contagem seja maior que a de medida da tabela, parando a inserção e, então, redirecionando a página para a tela de pedidos.
                                            $i = 0;
                                            $length = mysqli_query($conexao, "select count(*) length from tb_carrinhos");
                                            $length = mysqli_fetch_array($length); 

                                            $SQL = "select * from tb_carrinhos where tb_clientes_id_clientes ='$id_clientes'";
	                                        $result_id = mysqli_query($conexao, $SQL) or die("Erro no banco de dados.");
	                                        $total = mysqli_num_rows($result_id);	 

	                                        while($dados = mysqli_fetch_array($result_id)){
	                                              $id_carrinhos =  $dados["id_carrinhos"];
                                                  $nome_produtos = $dados["nome_dos_produtos"];
                                                  $preco_total = $dados["preço_individual"];
                                                  $quantidade_total =$dados["quantidade"];
                                              

                                             $i++;

                                        if($i <= $length['length']){
                                            
                                            mysqli_query($conexao,"INSERT INTO tb_pedidos(nome_dos_produtos, preco_produtos, quantidade_produtos, tb_clientes_id_clientes) VALUES ('$nome_produtos', '$preco_total', '$quantidade_total', '$id_clientes')"); 

                                            mysqli_query($conexao,"DELETE FROM tb_carrinhos WHERE id_carrinhos='$id_carrinhos'"); 
                                         
                                            }
                                        }
                                           header('location:../pedidos.php?inclusao=sucesso');

                                        } 
                                    else{
                                        //Redireciona caso aja erro.
                                        header('location:../finalizar_compra.php?inclusao=erro');
                                    }
                            }                          
                        }
                    }
                }
            }
                        
?>