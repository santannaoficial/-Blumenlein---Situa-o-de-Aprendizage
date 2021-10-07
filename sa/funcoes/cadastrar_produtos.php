<?php
 //Oi, eu sirvo para ser o método de cadastrar do arquivo cadastro_produtos.php 
 
    //função de inserção de ID de imagem
    function insercao_imagens($nome_produto,$preco_produto,$descricao_produto,$quantidade_produto,$data_vencimento,$categoria_produto){
        include "conexao.php";
        $resultado = mysqli_query ($conexao, "select id_imagens FROM tb_imagens order by id_imagens desc limit 1") or die(mysqli_error($conexao));

        $id_imagem = mysqli_fetch_assoc($resultado);

        foreach ($id_imagem as $id_imagens){
        }

        $sql = mysqli_query ($conexao, "select id_fornecedores FROM tb_fornecedores order by id_fornecedores desc limit 1") or die(mysqli_error($conexao));

        $id_fornecedor = mysqli_fetch_assoc($sql);

        foreach ($id_fornecedor as $id_fornecedores){
        }

        $slq2 = mysqli_query($conexao, "insert into tb_produtos(nome_produtos, descricao_produtos, preco_produtos, quantidade_produtos, vencimento_produtos, categoria_produtos,tb_imagens_id_imagens,tb_fornecedores_id_fornecedores) values('$nome_produto','$descricao_produto','$preco_produto','$quantidade_produto','$data_vencimento','$categoria_produto','$id_imagens','$id_fornecedores')"); 
    }


    //função de inserção do ID de fornecedores
    function insercao_estrangeira(){
        /*
            Ao contrário de outras inserções, o ID dos produtos deve ser inserido à sua tabela N:N quando se é cadastrado. Logo, ao utilizarmos essa função, podemos selecionar o último ID que foi gerado automaticante por nosso cadastro para que o peguemos e coloquemos o seu ID e coloquemos no campo de identificação de ID de produtos na tb_produtos_has_tb_fornecedores. Acontece que o ID só aparecerá quando um fornecedor também for cadastrado, logo não estranhe esse "erro".
        */

        include "conexao.php";
        $resultado = mysqli_query ($conexao, "select id_produtos FROM tb_produtos order by id_produtos desc limit 1") or die(mysqli_error($conexao));

        $id = mysqli_fetch_assoc($resultado);

        foreach ($id as $id_produtos){
        }

        (mysqli_query($conexao, "insert into tb_produtos_has_tb_fornecedores(tb_produtos_id_produtos) values ('$id_produtos')"));   
    }

    if ($_POST){
        include "conexao.php";

        $mensagem = "";
        $nome_produto = $_POST['nome_produtos'];
        $preco_produto = $_POST['preco_produtos'];
        $descricao_produto = $_POST['descricao_produtos'];
        $quantidade_produto = $_POST['quantidade_produtos'];
        $data_input = $_POST['data_vencimento'];
        $data_vencimento = date("Y-m-d", strtotime($data_input));
        $categoria_produto = $_POST['categoria'];

        if (is_string($nome_produto) && is_numeric($preco_produto) && is_string($descricao_produto)){
            if(strlen($nome_produto) > 45){
                header('location:erro.php?codigo_erro=13&arquivo=cdp'); 
            }
            else{
                if($preco_produto > 999.99){
                    header('location:erro.php?codigo_erro=14&arquivo=cdp'); 
                } 
                else{
                    if(strlen($descricao_produto) < 10){
                        header('location:erro.php?codigo_erro=15&arquivo=cdp'); 
                    }
                    else{
                        insercao_imagens($nome_produto,$preco_produto,$descricao_produto,$quantidade_produto,$data_vencimento,$categoria_produto);
                        insercao_estrangeira();
                        header('location:../cadastro_produtos.php?inclusao=sucesso');  
                    }
                } 
            }
        }                  
    }
?>