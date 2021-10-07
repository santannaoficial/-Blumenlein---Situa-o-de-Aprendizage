<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style-default.css">
    <title>Meus pedidos</title>
</head>
<body>
    <form action="" type="submit">
        <!--Section - Cabeçalho/Barra superior-->
        <?php include "header.php";?>

        <!--Titulo-->
        <div class="titulo">
            <label>Meus Pedidos</label>
        </div>

        <section class="pedidos">
            <!--pedido-->
            <?php 
                include 'funcoes/conexao.php';

                $login =  $_SESSION['user_clientes'];
                $senha =  $_SESSION['senha_clientes'];

                // Caso o cadastro de pagamento e a inserção do pedido ocorra normalmente, nós fazemos a mesma lógica de contagem que o carrinho de compras, só que dessa vez com os pedidos, e feito! Aqui estão registrados os pedidos feitos pelos clientes :> 

                $sql_id = "select id_clientes from tb_clientes where user_clientes='$login' AND senha_clientes='$senha'";
                $result_id = mysqli_query($conexao, $sql_id) or die("Erro no banco de dados.");   
                $dados = mysqli_fetch_array($result_id);
                $id_clientes =  $dados["id_clientes"];
               
                    $length = mysqli_query($conexao, "select count(*) length from tb_pedidos");
                    $length = mysqli_fetch_array($length); 

                    $sql = mysqli_query($conexao, "select * from tb_pedidos where tb_clientes_id_clientes='$id_clientes'");
                    $i = 0;

                    while($inf_pedidos = mysqli_fetch_array($sql)){
                        $id_pedidos=$inf_pedidos['id_pedidos'];
                        $nome_produtos = $inf_pedidos['nome_dos_produtos'];
                        $preco_produtos = $inf_pedidos['preco_produtos'];
                        $quantidade_produtos = $inf_pedidos['quantidade_produtos'];

                        $query_carrinho = mysqli_query($conexao, "select id_produtos from tb_produtos where nome_produtos='$nome_produtos'");

                        while($id_carrinho = mysqli_fetch_array($query_carrinho)){
                            $id_produto = $id_carrinho['id_produtos'];

                            $query_imagem = mysqli_query($conexao, "select tb_imagens_id_imagens from tb_produtos where id_produtos='$id_produto'");
                            
                            while($arquivo_imagem = mysqli_fetch_array($query_imagem)){
                                $imagem = $arquivo_imagem['tb_imagens_id_imagens'];

                                $query_seleciona_imagem = mysqli_query($conexao, "select arquivo_imagens from tb_imagens where id_imagens='$imagem'");

                                while($foto=mysqli_fetch_array($query_seleciona_imagem)){
                                    $arquivo = $foto['arquivo_imagens'];
                                }
                            }
                        }

                    $i++;

                    if($i <= $length['length']){
                        echo "<!--DIV de pedidos-->

                        <article class='pedido'>
                            <img class='img_pedido' src='".$arquivo."' height = 75px>
                            <ul class='pedido_inf'>
                                <li>Nome do Produto: <input type='text' value='".$nome_produtos."' disabled></li><br>
                                <li>Preço: R$ <input type='text' value='".$preco_produtos."' disabled></li><br>
                                <li>Quantidade: <input type='number' value='".$quantidade_produtos."' disabled></li><br>
                            </ul>"?>
                            <input type='button' class='button'  onclick="window.location.href = 'funcoes/deletar_pedido.php?id_pedidos=<?php echo $inf_pedidos['id_pedidos'] ?>';" value='Cancelar Pedido'></input>
                        </article><?php
                    }
                }
            ?>
        </section>

        <!--Footer - Canto inferior-->
        <?php include "footer.php";
            //Abraços, Math
            //vlw bro, jean
        ?>
    </form>

    <!-- o gente malz ae mas a unica forma que eu consegui trazer as imagem foi assi JKKKK - jean -->
    <style>
        .img_pedido{
            float: left;
            width: 90px;
        }
    </style>
</body>
</html>