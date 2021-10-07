<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="css/style-default.css">
	<title>Cadastro de Clientes</title>
</head>
<body>	
	<!--Section - Cabeçalho/Barra superior-->
    <?php 
		session_start();
		include "header.php";
	?>

    <!--Section Main-->
	<main>
		<div class="painel">
			<h2>Cadastro de Clientes</h2>

			<div class="conteudo-painel">
				<form action="funcoes/cadastrar_clientes.php" method="POST">

				<div class="campo">
						<img src="img/addUser.png" class="img_upload">
						<label for="img_usuarios">Imagem de Perfil</label>
						<input class="campoImg" type="file"  name="upload_file" onclick="window.location.href='imagens_clientes.php'"><br>
					</div>

					<div class="campo">
						<label for="nome_clientes">Nome Completo:</label>
						<input type="text" class="campoTexto"  name="nome_clientes" required/>
					</div>
					<div id="clear"></div>

					<div class="campo">
						<label for="user_clientes">Nome de Usuário:</label>
						<input type="text" class="campoTexto"  name="user_clientes" required/>
					</div>
					<div id="clear"></div>

                    <div class="campo">
						<label for="cpf_clientes">CPF:</label>
						<input type="text" class="campoTexto"  name="cpf_clientes" required/>
					</div>
					<div id="clear"></div>

					<div class="campo">
						<label for="email_clientes">E-mail:</label>
						<input type="text" class="campoTexto" name="email_clientes" required/>
					</div>
					<div id="clear"></div>

					<div class="campo">
                    	<label for="senha_clientes">Senha:</label>
						<input type="password" class="campoTexto" name="senha_clientes" required/>
					</div>
					<div id="clear"></div>

					<div class="campo">
                    	<label for="telefone_clientes">Telefone:</label>
						<input type="text" class="campoTexto"  name="telefone_clientes" required/>
					</div>
					<div id="clear"></div>

					
					<div class="campo">
						<label for="nascimento_clientes">Data de Nascimento: </label>
						<input type="date" name="nascimento_clientes" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2050-12-31">
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
                                var nome = document.getElementById('nome_clientes');
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
                            <button class="voltar" type="button" onclick="window.location.href = 'login_clientes.php';">Voltar</button>
                       </div>

                        <div>
                            <button class="botao" type="submit" onclick="window.location.href = 'cadastro_endere_cliente.php';">Cadastrar-se</button>
                        </div>
				</div>

					<a href="login_clientes.php">Já tem uma conta? Faça o seu login.</a>
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