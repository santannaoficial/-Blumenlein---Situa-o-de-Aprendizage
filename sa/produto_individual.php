<?php
    session_start();
    require_once 'funcoes/conexao.php';
    mysqli_query($conexao,"set names 'utf8'"); 

    // Aqui o arquivo coleta o nome do produto que o usuário deseja ver mais para analisar e coletar os dados necessários para a manipulação e visualização de informações.
    // A lógica segue a mesma que a do minha_conta.php, então, se necessário, leia os comentários de explicação de lá 
    $nome_produtos = $_GET["nome_produtos"];

    $SQL = "select id_produtos from tb_produtos where nome_produtos='$nome_produtos'";
    $result_id = mysqli_query($conexao, $SQL) or die("Erro no banco de dados.");
    $total = mysqli_num_rows($result_id);
    
    // Obtém os dados do produto aqui:
    $dados = mysqli_fetch_array($result_id);
    $id =  $dados["id_produtos"];

    $resultado = mysqli_query($conexao, "SELECT nome_produtos, descricao_produtos, preco_produtos, quantidade_produtos, vencimento_produtos, categoria_produtos, tb_imagens_id_imagens FROM tb_produtos WHERE id_produtos = $id");

    while($registro=mysqli_fetch_array($resultado)){
        $nome_produto=$registro["nome_produtos"];
        $descricao_produtos=$registro["descricao_produtos"];   
        $preco_produto=$registro["preco_produtos"];
        $categoria_produtos=$registro["categoria_produtos"];
        $quantidade_produto=$registro["quantidade_produtos"];   
        $tb_imagens_id_imagens=$registro["tb_imagens_id_imagens"];
    }

    //Encontra imagem com base no ID da estrangeira
    $encontra = mysqli_query($conexao, "select id_imagens, arquivo_imagens from tb_imagens where id_imagens= '$tb_imagens_id_imagens'");

    while($foto=mysqli_fetch_array($encontra)){ 
        $imagem=$foto["id_imagens"];
        $arquivo=$foto["arquivo_imagens"];
    }
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style-default.css">
    <title>Produto</title>
</head>
<body>

    <!--Section - Cabeçalho/Barra superior-->
    <?php include "header.php";?>

    <!--
        Sant' - alterei todos os campos 'textarea' (exeto descrição) para label, o textarea tem por padrão a função de redimencionar dai não fica legal para mostrar resultados  ;)
    -->
    <!--Main-->
    <main>
        <div class="painel">
            
            <div class="conteudo-painel">
                <form action="funcoes/carrinho_comprar!.php?id_produtos=<?php echo $id?>" method="POST">

                   	<div class="campo">
						<img src="<?php echo $arquivo ?>" class="img_upload">
					</div>

                    <div class="campo">
                    <label for="nome_produto">Nome do Produto:</label>
                      <div class="titulo_produto">
                        <label type="text" class="campoTexto"  name="nome_produto" id="disabled"><?php echo $nome_produto ?></label>
                       </div>
                    </div>
                    <div id="clear"></div>


                    <div class="campo">
                        <label for="preco_produto">Preço:</label>
                        <label type="text" class="campoTexto"  name="preco_produto" id="disabled"><?php echo $preco_produto ?></label>
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <label for="categoria_produtos">Categoria:</label> 
                        <label type="text" class="campoTexto"  name="categoria_produtos" id="disabled"><?php echo $categoria_produtos ?></label>
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <label for="descricao_produtos">Descrição: </label>
                        <textarea class="campoDesc" name="descricao_produtos" id="disabled"><?php echo  $descricao_produtos?></textarea>
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <label for="quantidade">Quantidade para compra:</label> 
                        <input type="number" class="campoTexto" min="1"  name="quantidade" required/>
                    </div>
                    <div id="clear"></div>

                <div class="buttons">
                    <div>
                        <button class="voltar" type="button" onclick="window.location.href = 'home.php';">Voltar</button>
                    </div>

                    <div>
                        <button class="botao" type="submit" >Comprar</button> 
                        <?php //Aqui a função de inserção do produto individual no carrinho é chamada ?>
                    </div>
                </div>

               <?php
                if(isset($_GET['inclusao']) && $_GET['inclusao'] == 'erro'){?>
                <div class="erro">
                    <?php
                        $mensagem = $_GET["mensagem"];
                        echo $mensagem;

                    ?>
                <script>
                    var nome = document.getElementById('nome_produto');
                    nome.focus();
                </script>
                </div>

                <?php
                    }
                    else 
                    if(isset($_GET['inclusao']) && $_GET['inclusao'] == 'sucesso'){ ?>
                        <div class="sucesso">
                        </div>

                        <?php
                            }	
                       ?> 
                </form>				
            </div>
        </div>

        <!--Limpa float-->
        <div id="clear"></div>

        <!--Footer - Canto inferior-->
        <?php include "footer.php";?> 
    </main>
</body>
</html>