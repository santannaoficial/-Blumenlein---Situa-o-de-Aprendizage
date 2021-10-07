<?php
	//Tela para alterar dados da conta pessoal (CLIENTE)
	require_once 'funcoes/conexao.php';
	mysqli_query($conexao,"set names 'utf8'"); 
	session_start();

	// Salva nas variáveis o user e a senha de login do cliente que está usando no momento
	if(isset($_SESSION['cpf_administradores']) && isset($_SESSION['senha_administradores'])){
        $login =  $_SESSION['cpf_administradores'];
	    $senha =  $_SESSION['senha_administradores'];
    }

	$id_produtos = $_GET["id_produtos"];
	$sql = "select * from tb_produtos where id_produtos = ".$_GET["id_produtos"];
	$executar = mysqli_query($conexao,$sql);
	$resultado = mysqli_fetch_array($executar);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style-default.css">
    <title>Alterar Dados</title>
</head>
<body>
    <!--Section - Cabeçalho/Barra superior-->
    <?php include "header_adm.php";?>

    <!--Main-->
    <main>
        <div class="painel">
            <h2>Alterar Dados de Produto</h2>
            
            <div class="conteudo-painel">
                <form action="funcoes/cadastrar_produtos.php" method="POST">
                    <div class="campo">
                        <img src="img/produto.png" class="img_upload">
                        <label for="img_produto">Imagem do Produto:</label>
                        <input class="campoImg" type="file" name="upload_file" onclick="window.location.href='imagens_produtos.php'">
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <label for="nome_produto">Nome do Produto</label>
                        <input class="campoTexto" type="text" name="nome_produtos" value=<?php echo $resultado["nome_produtos"];?> required></input>
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <label for="nome_fornecedor">ID do Fornecedor</label>
                        <input class="campoTexto" type="text" name="nome_fornecedor" value=<?php echo $resultado["tb_fornecedores_id_fornecedores"];?> required></input>
                        <!-- aqui da pra usar o bagulho que o sor passou do combobox -->
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <label for="preco_produto">Preço</label>
                        <input class="campoTexto" type="text" name="preco_produtos" value=<?php echo $resultado["preco_produtos"];?>></input>
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <label for="quantidade_produtos">Quantidade produtos:</label>
                        <input class="campoTexto" type="number" name="quantidade_produtos" value=<?php echo $resultado["quantidade_produtos"];?> required/>
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <label for="descricao_produto">Descrição:</label>
                        <textarea class="campoDesc" name="descricao_produtos" placeholder="Insira uma descrição"><?php print $resultado["descricao_produtos"];?></textarea>
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <select name="categoria">
                            <option value="<?php echo $resultado["categoria_produtos"];?>" selected hidden><?php echo $resultado["categoria_produtos"];?></option>
                            <option value="Frutas, Verduras e Legumes">Frutas, Verduras e Legumes</option>
                            <option value="Plantas Ornamentais e Medicinais">Plantas Ornamentais e Medicinais</option>
                            <option value="Sementes">Sementes</option>
                            <option value="Livros">Livros</option>
                            <option value="Cesta Pré-Montada">Cesta Pré-Montada</option>
                        </select>
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <label for="data_vencimento">Data de Vencimento:</label>
                        <input type="date" name="data_vencimento" placeholder="dd-mm-yyyy" value="<?php echo $resultado["vencimento_produtos"];?>" min="1997-01-01" max="2050-12-31">
                    </div>
                    <div id="clear"></div>

                    <div class="buttons">
                        <button class="voltar" onclick="history.go(-1);">Voltar</button>
                        <button class="botao" type="submit">Alterar</button>
                        <button class="excluir" type="submit">Excluir Produto</button>
                    </div>
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