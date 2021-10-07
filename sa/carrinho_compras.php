<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style-default.css">
    <title><?php 
            if(isset($_GET['categoria'])){
                echo $_GET["categoria"];
            }
            else{
                if(isset($_GET['busca'])){
                    header('location: home.php?busca='.$_GET['busca']);
                }
                else{
                    echo 'Carrinho.';
                }
            }
        ?></title>
</head>

<style>
    main{
        width: 100%
    }

    .cabecalho{
        min-width: 100%;
    }
</style>

<body>
    <form action="" type="submit">
        <!--Section - Cabeçalho/Barra superior-->
        <?php include "header.php";?>

        <!--Titulo-->
        <div class="titulo">
            <label>Bem vindo(a) ao seu carrinho de compras!</label>
        </div>

        <main>
            <div class="produtos">
                <div>
                    <?php 
                        include 'funcoes/conexao.php';

                        $login =  $_SESSION['user_clientes'];
                        $senha =  $_SESSION['senha_clientes'];

                        $sql_id = "select id_clientes from tb_clientes where user_clientes='$login' AND senha_clientes='$senha'";
                        $result_id = mysqli_query($conexao, $sql_id) or die("Erro no banco de dados.");   
                        $dados = mysqli_fetch_array($result_id);
                        $id_clientes =  $dados["id_clientes"];
                    
                        // Basicamente, ao ele conta o tamanho do tb_carrinhos como forma de contagem para a demonstração de registros. Uma vez que a variável de contagem for maior que o tamanho da tabela de info do carrinho, a demonstração deixa de acontecer.
                        $length = mysqli_query($conexao, "select count(*) length from tb_carrinhos");
                        $length = mysqli_fetch_array($length); 


                        $sql = mysqli_query($conexao, "select * from tb_carrinhos where tb_clientes_id_clientes='$id_clientes'");
                        $i = 0;

                        while($inf_produtos = mysqli_fetch_array($sql)){
                            $id_carrinho = $inf_produtos['id_carrinhos'];
                            $nome_produtos = $inf_produtos['nome_dos_produtos'];
                            $tb_produtos_id_produtos = $inf_produtos['tb_produtos_id_produtos'];

                            $query_produto = mysqli_query($conexao, "select tb_imagens_id_imagens from tb_produtos where id_produtos='$tb_produtos_id_produtos'");


                            while($id = mysqli_fetch_array($query_produto)){
                                $id_imagem = $id['tb_imagens_id_imagens'];

                                $query_imagem = mysqli_query($conexao, "select arquivo_imagens from tb_imagens where id_imagens = '$id_imagem'");

                                while($foto=mysqli_fetch_array($query_imagem)){
                                    $arquivo = $foto['arquivo_imagens'];    
                                }
                            }

                        $i++;
                            if($i <= $length['length']){
                                echo"<!--Carrinho de Compras-->
                                    <article class='carrinho'>
                                        <div class='carrinho_img'>
                                            <img class='carrinho_img' src='".$arquivo."' height=100px>
                                        </div>
                                        <div class='carrinho_info'>
                                            <h1>". $inf_produtos['nome_dos_produtos'] ."</h1>
                                            <label><span class='title'>Quantidade:</span>". $inf_produtos['quantidade'] ."<p></p></label>
                                            <label><span class='title'>Preço Individual: R$ </span>". $inf_produtos['preço_individual'] ."<p></p></label>
                                        </div>";?>
                                        <div class='deletar'>
                                            <button type='button' onclick="window.location.href ='funcoes/deletar_carrinho.php?id_carrinhos=<?php echo $inf_produtos['id_carrinhos'] ?>';" >Remover do Carrinho</button>
                                        </div>
                                        <?php echo "
                                    </article>";
                            }
                        }
                    
                        // Aqui o preço total do futuro pedido é calculado ao multiplicarmos a quantidade de produtos totais e o preço de produto de todas as colunas existentes no carrinho.    
                        $result = mysqli_query($conexao, "SELECT SUM(preço_individual*quantidade) AS total FROM tb_carrinhos WHERE tb_clientes_id_clientes='$id_clientes'"); 
                        $row = mysqli_fetch_array($result);
                        $preco_total = $row['total'];
                    ?>
                </div>
            </div>
        </main>

        <!--Limpa float-->
        <div id="clear"></div>

        <!--Finalizar Compra-->
        <div class="inferior">
            <div class="inferior_components">
                <div class="valor_total">
                    <label for="valor_total">Valor Total: </label>
                    <input class="valor_total_input" name="valor_total" placeholder="00.00" disabled value=<?php echo $preco_total ?>>
                </div>
                
                <select id="endereco" name="endereco">
                    <option value = "0">-- Selecione seu endereço --</option>
                        <?php
                            $sql = 'select * from tb_enderecos order by id_enderecos desc';
                            $query = mysqli_query($conexao,$sql);
                            while($exibir = mysqli_fetch_array($query)){
                        ?>
                    <option value = "<?php echo $exibir["id_enderecos"];?>"><?php echo $exibir["estado_enderecos"];?>, <?php echo $exibir["cidade_enderecos"];?>, <?php echo $exibir["bairro_enderecos"];?>, <?php echo $exibir["rua_enderecos"];?>, <?php echo $exibir["numero_enderecos"];?></option>
                        <?php
                            }
                        ?>
                    <!-- Aqui vem a escolha do local de entrega -->
                </select>
            </div>

            <div class="buttons">
                    <button class="voltar" type="button" onclick="window.location.href = 'finalizar_compra.php';">Finalizar Pedido</button>
            </div>
        </div>
    </form>
</body>
</html>