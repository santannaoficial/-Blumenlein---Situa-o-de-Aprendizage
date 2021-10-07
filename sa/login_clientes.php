<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style-default.css">
	<title>Login de Cliente</title>
</head>
<body>	
	<main>
		<?php
			session_start();
			include 'header.php';
		?>
		<div class="painel">
			<h2>Login de Cliente</h2>

			<div class="conteudo-painel">
				<!--<input type="file">-->
                <img src="img/User_Log.png" class="img_upload">
				<form action="funcoes/logar_clientes.php" method="POST">
					<div class="campo">
						<label for="user_clientes">Nome de Usuário:</label><br>
						<input type="text" class="campoTexto"  name="user_clientes" required/><br>
					</div>
					<div id="clear"></div>

					<div class="campo">
                    	<label for="senha_clientes">Senha:</label><br>
						<input type="password" class="campoTexto" name="senha_clientes" required/><br>
					</div>
					<div id="clear"></div>

				 <div class="buttons">
					<div>
						<button class="voltar" type="button" onclick="window.location.href='home.php';">Voltar</button>
					</div>

					<div>
						<button class="botao" type="submit">Fazer Log-in</button>
					</div>
				 </div>

					<a href="cadastro_clientes.php">Não tem uma conta? Faça o seu cadastro!</a>
				</form>				
			</div>
		</div>		
	</main>	
</body>
</html>

<?php include "js/jqueryMask.php"?>