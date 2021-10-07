<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style-default.css">
	<title>Login de Administradores</title>
</head>
<body>	
<?php
			session_start();
			include 'header_adm.php';
		?>
	<main>
	
		<div class="painel">
			<h2>Login de Administradores</h2>

			<div class="conteudo-painel">
				<!--FOTO DO PERFIL - Ilustrar que é para um perfil-->
                <img src="img/User_Log.png" class="img_upload">

				<form action="funcoes/logar_administradores.php" method="POST">
					<div class="campo">
						<label for="cpf_administradores">CPF:</label><br>
						<input type="text" class="campoTexto"  name="cpf_administradores" required/><br>
					</div>
					<div id="clear"></div>

					<div class="campo">
                    	<label for="senha_administradores">Senha:</label><br>
						<input type="password" class="campoTexto" name="senha_administradores" required/><br>
					</div>
					<div id="clear"></div>

				 <div class="buttons">
					<div>
						<button class="voltar" type="button" onclick="window.location.href='home_adm.php';">Voltar</button>
					</div>

					<div>
						<button class="botao" type="submit">Fazer Log-in</button>
					</div>
				 </div>

					<a href="cadastro_administradores.php">Não tem uma conta? Faça o seu cadastro!</a>
				</form>				
			</div>
		</div>		
	</main>	
</body>
</html>

<?php include "js/jqueryMask.php"?>