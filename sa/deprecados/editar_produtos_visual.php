<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar Produto</title>
	<link rel="stylesheet" type="text/css" href="css/style-default.css">
</head>

<?php	
	include 'funcoes/conexao.php';  
	 
	$id_produtos = $_GET["id_produtos"];
	$sql = "select * from tb_produtos where id_produtos = ".$_GET["id_produtos"];
	$executar = mysqli_query($conexao,$sql);
	$resultado = mysqli_fetch_array($executar);
?>

<body>
	<main>
		<div class="painel">
			<h2>Alterar Dados de Produto</h2>

			<div class="conteudo-painel">
				<form action="editar_produtos.php" method="POST">
                    <div class="campo">
                        <img src="img/produto.png" class="img_upload">
                        <label for="img_produto">Imagem do Produto:</label>
                        <input class="campoImg" type="file" title><br>
                    </div>
                    <div id="clear"></div>

					<div class="campo">
						<label for="id_produtos"></label><br>
						<input type="hidden" class="campoTexto" name="id_produtos" value="<?php echo $resultado["id_produtos"];?>" required/>
					</div>
					<div id="clear"></div>

					<div class="campo">
						<label for="nome_produtos">Nome do Produto</label>
						<input type="text" class="campoTexto" name="nome_produtos" value="<?php echo $resultado["nome_produtos"];?>" required/>
					</div>
                    <div id="clear"></div>
                    
                    <div class="campo">
                        <label for="nome_fornecedor">Fornecedor:</label>
                        <input class="campoTexto" type="text" name="nome_fornecedor" required/>
                        <!-- a gente tem que dar um jeito de resgatar o nome do forncedor pra colocar aqui no value (que por enquanto não existe pra não dar problema) -->
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <label for="preco_produtos">Preço:</label>
                        <input class="campoTexto" type="text" name="preco_produtos" value="<?php echo $resultado["preco_produtos"];?>" required/>
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <label for="quantidade_produtos">Quantidade produtos:</label>
                        <input class="campoTexto" type="number" name="quantidade_produtos" value="<?php echo $resultado["quantidade_produtos"];?>" required/>
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <label for="descricao_produtos">Descrição:</label>
                        <textarea class="campoDesc" name="descricao_produtos"><?php echo $resultado["descricao_produtos"];?></textarea>
                    </div>
                    <div id="clear"></div>

                    <div class="campo">
                        <select id="categoria" name="categoria_produtos">
                            <option value="" disabled selected hidden>Categoria</option>
                            <option value="F,V e L">Frutas, Verduras e Legumes</option>
                            <option value="Plantas">Plantas Ornamentais e Medicinais</option>
                            <option value="Sementes">Sementes</option>
                            <option value="Livros">Livros</option>
                            <option value="Cesta">Cesta Pré-Montada</option>
                        </select>
                    </div>
                    <div id="clear"></div>

					<div class="campo">
						<label for="vencimento_produtos">Data</label>
						<input type="date" name="vencimento_produtos" min="1900-01-01" max="2099-12-31" value="<?php echo $resultado["vencimento_produtos"];?>" required/>
					</div>
					<div id="clear"></div>

                <div class="buttons">
					<div>
						<button class="voltar" type="button" onclick="location.href = 'consulta_produtos.php';">Voltar</button>
                    </div>

                    <div >
						<button class="botao" type="submit">Salvar</button>
                    </div>
                </div>
				</form>
            </div>
        </div>			
	</main>
</body>
</html>