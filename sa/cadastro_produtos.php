<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style-default.css">
    <title>Cadastro de Produto</title>
</head>
<body>
    <!--Section - Cabeçalho/Barra superior-->
    <?php include "header_adm.php"; ?>

    <!--Main-->
    <main>
        <div class="painel">
            <h2>Cadastro de Produtos</h2> 
            
            <div class="conteudo-painel">
                <form action="funcoes/cadastrar_produtos.php" method="POST">
                    <div class="campo">
                        <img src="img/addProduto.png" class="img_upload">
                        <label for="img_produto">Imagem do Produto:</label>
                        <input class="campoImg" type="file" name="upload_file" onclick="window.location.href='imagens_produtos.php'">
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <label for="nome_produto">Nome do Produto:</label>
                        <input class="campoTexto" type="text" name="nome_produtos" required/>
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <label for="nome_fornecedor">Fornecedor:</label>
                        <input class="campoTexto" type="text" name="nome_fornecedor" required/>
                    </div>
                    <div id="clear"></div>


                    <div class="campo">
                        <label for="preco_produto">Preço:</label>
                        <input class="campoTexto" type="text" name="preco_produtos" required/>
                    </div>
                    <div id="clear"></div>

                    
                    <div class="campo">
                        <label for="quantidade_produtos">Quantidade produtos:</label>
                        <input class="campoTexto" type="number" name="quantidade_produtos" min='1' required/>
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <label for="descricao_produtos">Descrição: </label>
                        <textarea class="campoDesc" name="descricao_produtos" placeholder="insira uma descrição"></textarea>
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <select id="categoria" name="categoria">
                            <option value="" disabled selected hidden>Categoria</option>
                            <option value="Frutas, Verduras e Legumes">Frutas, Verduras e Legumes</option>
                            <option value="Plantas Ornamentais e Medicinais">Plantas Ornamentais e Medicinais</option>
                            <option value="Sementes">Sementes</option>
                            <option value="Livros">Livros</option>
                            <option value="Cesta">Cesta Pré-Montada</option>
                        </select>
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <label for="data_vencimento">Data de Vencimento: </label>
                        <input type="date" name="data_vencimento" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2050-12-31">
                    </div>
                    <div id="clear"></div>

                <div class="buttons">
                    <div>
                        <button class="voltar" type="button" onclick="window.location.href = 'home_adm.php';">Voltar</button>
                    </div>

                    <div>
                        <button class="botao" type="submit">Cadastrar</button>
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
                            Cadastro realizado com sucesso
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

<?php include "js/jqueryMask.php"?>