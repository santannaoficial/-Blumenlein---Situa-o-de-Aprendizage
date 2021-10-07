 <?php
	//Tela para visualização da conta pessoal (CLIENTE)
	require_once 'funcoes/conexao.php';
	mysqli_query($conexao,"set names 'utf8'"); 
	session_start();
	// Salva nas variáveis o user e a senha de login do cliente que está usando no momento

	$login =  $_SESSION['user_clientes'];
	$senha =  $_SESSION['senha_clientes'];

	// Usa essas variáveis como filtro
	$SQL = "select id_clientes from tb_clientes where user_clientes='$login' AND senha_clientes='$senha'";
	$result_id = mysqli_query($conexao, $SQL) or die("Erro no banco de dados.");
	$total = mysqli_num_rows($result_id);
	
	// Para obter os dados do usuário aqui:
	$dados = mysqli_fetch_array($result_id);
	$id =  $dados["id_clientes"];

	$resultado = mysqli_query($conexao, "select nome_clientes,user_clientes,cpf_clientes, email_clientes,senha_clientes,telefone_clientes from tb_clientes where  id_clientes = '$id'");

	// Para então salvar os dados do user em uma variável para que se possa manipular a info e visualizar a informação

	while($registro=mysqli_fetch_array($resultado)){
		$nome_clientes=$registro["nome_clientes"];
		$user_clientes=$registro["user_clientes"];   
		$cpf_clientes=$registro["cpf_clientes"];
		$email_clientes=$registro["email_clientes"];   
		$senha_clientes=$registro["senha_clientes"];   
		$telefone_clientes=$registro["telefone_clientes"];   
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="css/style-default.css">
	<title>Minha conta</title>
</head>
<style>
	textarea{
		resize: none;
		display:block;
		height: 1rem;
	}
</style>
<body>	
	<!--Section - Cabeçalho/Barra superior-->
    <?php include "header.php";?>

    <!--Section Main-->
	<main>
		<div class="painel">
			<h2>Minha Conta</h2>

			<div class="conteudo-painel">
				<form action="" method="POST">
				
					<div class="campo">
						<img src="img/user.png" class="img_upload">
					</div>

					<div class="campo">
						<label for="nome_clientes">Nome:</label>
						<textarea type="text" class="campoTexto" name="nome_clientes" id="disabled"><?php echo $nome_clientes ?></textarea>
					</div>
					<div id="clear"></div>

                    <div class="campo">
						<label for="user_clientes">Nome de Usuário:</label>
						<textarea type="text" class="campoTexto" name="user_clientes" id="disabled"><?php echo $user_clientes ?></textarea>
					</div>
					<div id="clear"></div>
					

					<div class="campo">
						<label for="email_clientes">E-mail:</label>
						<textarea type="text" class="campoTexto" name="email_clientes" id="disabled"><?php echo $email_clientes ?></textarea>
					</div>
					<div id="clear"></div>

					
					<div class="campo">
						<label for="cpf_clientes">CPF:</label>
						<textarea type="text" class="campoTexto" name="cpf_clientes" id="disabled"><?php echo $cpf_clientes ?></textarea>
					</div>
					<div id="clear"></div>

					<div class="campo">
						<label for="senha_clientes">Senha:</label>
						<input type="password" class="campoTexto" name="senha_clientes" id="disabled" value=<?php echo $senha_clientes?> >

					</div>
					<div id="clear"></div>

					<div class="campo">
                    	<label for="telefone_clientes">Telefone:</label>
						<textarea type="text" class="campoTexto" name="telefone_clientes" id="disabled"><?php echo $telefone_clientes ?></textarea>
					</div>
					<div id="clear"></div>

					<?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 'sucesso'){?>
						<div class="sucesso">
							Informações atualizadas com sucesso!
						</div>
					<?php
					}	
					?> 

					<div class="buttons">
							<div>
                     	       <button class="voltar" type="button" onclick="window.location.href = 'home.php';">Voltar
							</button>
                    	   </div>

                     	   <div>
                        	    <button class="botao" type="button" onclick="window.location.href = 'alterar_dados_clientes.php';">Alterar Dados</button>
                      	  </div>
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
