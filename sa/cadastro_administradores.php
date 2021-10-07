<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="css/style-default.css">
	<title>Cadastro de Administradores</title>
</head>
<body>	
	<!--Section - Cabeçalho/Barra superior-->
    <?php
		include "header_adm.php";
	?>

    <!--Section Main-->
	<main>
		<div class="painel">
			<h2>Cadastro de Administradores</h2>

			<div class="conteudo-painel">
				<form action="funcoes/cadastrar_administradores.php" method="POST">
				
					<div class="campo">
						<img src="img/addUser.png" class="img_upload">
						<label for="img_administradores">Imagem de Usuário:</label>
						<input class="campoImg" type="file"  name="upload_file" onclick="window.location.href='imagens_administradores.php'">
					</div>

					<div class="campo">
						<label for="nome_administradores">Nome:</label>
						<input type="text" class="campoTexto"  name="nome_administradores" required/>
					</div>
					<div id="clear"></div>
					

					<div class="campo">
						<label for="email_administradores">E-mail:</label>
						<input type="text" class="campoTexto" name="email_administradores" required/>
					</div>
					<div id="clear"></div>

					
					<div class="campo">
						<label for="cpf_administradores">CPF:</label>
						<input type="text" class="campoTexto"  name="cpf_administradores" required/>
					</div>
					<div id="clear"></div>

					<div class="campo">
                    	<label for="senha_administradores">Senha:</label>
						<input type="password" class="campoTexto" name="senha_administradores" required/>
					</div>
					<div id="clear"></div>

					<div class="campo">
                    	<label for="telefone_administradores">Telefone:</label>
						<input type="text" class="campoTexto"  name="telefone_administradores" required/>
					</div>
					<div id="clear"></div>

					<?php
				     if(isset($_GET['inclusao']) && $_GET['inclusao'] == 'erro'){?>
						<div class="erro">
								<?php
									$mensagem = $_GET["mensagem"];
									echo $mensagem;
								?>
							<script>
								var nome = document.getElementById('nome_administradores');
								nome.focus();
							</script>
						</div>
				    <?php
					}
					else 
						if(isset($_GET['inclusao']) && $_GET['inclusao'] == 'sucesso'){?>
						<div class="sucesso">
							Cadastro realizado com sucesso
						</div>
					<?php
					}	
					?> 

					<div class="buttons">
						<div>
                            <button class="voltar" type="button" onclick="window.location.href = 'login_administradores.php';">Voltar</button>
                       </div>

                        <div>
                            <button class="botao" type="submit">Cadastrar</button>
						</div>
					</div>

					<a href="login_administradores.php">Já tem uma conta? Faça o seu login.</a>
				</form>				
			</div>
		</div>		
	</main>		
</body>
</html>

<?php include "js/jqueryMask.php"?>