<?php
	require_once "funcoes/conexao.php";
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="css/style-default.css">
	<title>Cadastro de Imagens de Produtos</title>

	<?php
		if(isset($_POST['upload'])){
			$nome_arquivo = $_FILES['upload_file']['name'];
			$diretorio_alvo = "upload/"; 

			if($nome_arquivo != ''){
				$arquivo_alvo = $diretorio_alvo.basename($_FILES['upload_file']['name']);

				//Extensão do arquivo
				$extensao = strtolower(pathinfo($arquivo_alvo,PATHINFO_EXTENSION));

				//Extesões válidas de arquivo
				$extensoes_array = array("jpg", "jpeg", "png", "gif");

				//Verificando se a extensão é válida
				if(in_array($extensao, $extensoes_array)){
					//Convertendo para base64
					$imagem_base64 = base64_encode(file_get_contents($_FILES['upload_file']['tmp_name']));
					$arquivo_imagens = "data::arquivo_imagens/".$extensao.";base64,".$imagem_base64;

					//Armazenando a imagem na pasta "upload"
					if(move_uploaded_file($_FILES['upload_file']['tmp_name'],$arquivo_alvo)){
						//Inserindo o arquivo no banco de dados
						$query = "insert into tb_imagens(nome_imagens,arquivo_imagens) values('".$nome_arquivo."','".$arquivo_imagens."')";
						mysqli_query($conexao, $query);
					}
				}
			}
		}

	?>

</head>
<body>	
	<!--Section - Cabeçalho/Barra superior-->
	<?php include "header_adm.php";?>

	<!--Main-->
	<main>
		<div class="painel">
			<h2>Cadastro de Imagens de Produtos</h2>

			<!-- Seleciona imagens já salvas no banco -->
			<?php 
				$resultado = mysqli_query($conexao,"select id_imagens, nome_imagens, arquivo_imagens from tb_imagens");	
			?>

			<!-- Salva os dados em variáveis -->
			<?php
				while($registro_cadastro=mysqli_fetch_array($resultado)){
					$id_imagens = $registro_cadastro["id_imagens"];
					$nome_imagens = $registro_cadastro["nome_imagens"];
					$arquivo_imagens = $registro_cadastro["arquivo_imagens"];
			?>

			<?php
				}
			?>

			<div class="conteudo-painel">
				<form action="" method="POST" enctype="multipart/form-data">
				
					<div class="campo">
						<img src="img/produto.png" class="img_upload">
						<label for="img_usuarios">Escolha Imagem:</label>
						<input type="file" class="campoImg" name="upload_file"/>
					</div>

					<div class="buttons">
						<div>
							<button class="voltar" onclick="location.href='cadastro_produtos.php?id_imagens=<?php //echo $registro_cadastro['id_imagens']?>';" type="button">Voltar para o cadastro</button>
						</div>

						<div>
							<button class="botao" type="submit" name="upload" value="Salvar">Cadastrar</button>
							<!-- USANDO GET, MANDAR IMAGEM PARA O CADASTRO DE PRODUTO -->
						</div>
					</div>
                </form>				
			</div>
		</div>		
	</main>	
</body>
</html>