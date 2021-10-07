<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style-default.css">
    <title>home</title>
</head>
<body>
	<!--Section - Cabeçalho/Barra superior-->
	<?php 
		include "header_adm.php";
	?>

	<!--Main-->
	<main>
		<div class="painel">
			<h2>Cadastro de Fornecedores</h2>

			<div class="conteudo-painel">
				<form action="funcoes/cadastrar_fornecedor.php" method="POST">
					<div class="campo">
						<img src="img/addProvider.png" class="img_upload">
						<label for="img_usuarios">Logo (opcional):</label>
						<input class="campoImg" type="file"  name="upload_file" onclick="window.location.href='imagens_fornecedores.php'"><br>
					</div>

					<div class="campo">
						<label for="nome_fornecedor">Nome:</label>
						<input type="text" class="campoTexto"  name="nome_fornecedor" required/>
					</div>
					<div id="clear"></div>
					
					<div class="campo">
						<label for="email_fornecedor">E-mail:</label>
						<input type="text" class="campoTexto" name="email_fornecedor" required/>
					</div>
					<div id="clear"></div>
					
					<div class="campo">
						<label for="telefone_fornecedor">Telefone:</label>
						<input type="text" class="campoTexto"  name="telefone_fornecedor" required/>
					</div>
					<div id="clear"></div>

					
				<div class="buttons">	
					<div>
						<button class="voltar" type="button" onclick="window.location.href = 'home_adm.php';">Voltar</button>
					</div>

					<div>
						<button class="botao" type="submit" onclick="window.location.href = 'cadastro_endere_fornecedor.php';">Cadastrar</button>
					</div>
				</div>
				
					<?php
					if(isset($_GET['inclusao']) && $_GET['inclusao'] == 'erro'){?>
					<div class="erro">
						<?php
							$mensagem = $_GET["mensagem"];
							echo $mensagem;
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