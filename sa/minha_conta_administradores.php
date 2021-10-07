<?php
	//Tela para visualização da conta pessoal (ADMINISTRADOR)
	require_once 'funcoes/conexao.php';
	mysqli_query($conexao,"set names 'utf8'"); 
	session_start();

	// Salva nas variáveis o cpf e a senha de login do administrador que está usando no momento

	$login_admin = $_SESSION['cpf_administradores'];
	$senha_admin = $_SESSION['senha_administradores'];

	// Para usar elas como filtro
	$SQL = "select id_administradores from tb_administradores where cpf_administradores='$login_admin' AND senha_administradores='$senha_admin'";
	$result_id = mysqli_query($conexao, $SQL) or die("Erro no banco de dados.");
	$total = mysqli_num_rows($result_id);
	
	// Obtém os dados do usuário aqui:
	$dados = mysqli_fetch_array($result_id);
	$id =  $dados["id_administradores"];

	$resultado = mysqli_query($conexao, "select nome_administradores, cpf_administradores, email_administradores, senha_administradores, telefone_administradores from tb_administradores where  id_administradores = $id");

	// Aqui ele salva os dados do administrador em uma variável para que se possa manipular a info

	while($registro=mysqli_fetch_array($resultado)){
		$nome_administradores=$registro["nome_administradores"];
		$cpf_administradores=$registro["cpf_administradores"];   
		$email_administradores=$registro["email_administradores"];
		$senha_administradores=$registro["senha_administradores"];   
		$telefone_administradores=$registro["telefone_administradores"];   
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
    <?php include "header_adm.php";?>

    <!--Section Main-->
	<main>
		<div class="painel">
			<h2>Minha Conta</h2>

			<div class="conteudo-painel">
				<form action="alterar_dados_administradores.php" method="POST">
				
					<div class="campo">
						<img src="img/user.png" class="img_upload">
					</div>

					<div class="campo">
						<label for="nome_administradores">Nome:</label>
						<textarea type="text" class="campoTexto"  name="nome_clientes" id="disabled"><?php echo $nome_administradores ?></textarea>

					</div>
					<div id="clear"></div>

                    <div class="campo">
						<label for="cpf_administradores">CPF:</label>
						<textarea type="text" class="campoTexto"  name="cpf_administradores" id="disabled"><?php echo $cpf_administradores ?></textarea>
					</div>
					<div id="clear"></div>
					

					<div class="campo">
						<label for="email_administradores">E-mail:</label>
						<textarea type="password" class="campoTexto"  name="email_administradores" id="disabled"><?php echo $email_administradores ?></textarea>
					</div>
					<div id="clear"></div>

					
					<div class="campo">
						<label for="senha_administradores">Senha:</label>
						<input type="password" class="campoTexto"  name="senha_administradores" id="disabled" value=<?php echo $senha_administradores?>>
					</div>
					<div id="clear"></div>

					<div class="campo">
						<label for="telefone_administradores">Telefone:</label>
						<textarea type="text" class="campoTexto"  name="telefone_administradores" id="disabled"><?php echo $telefone_administradores ?></textarea>
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
                     	       <button class="voltar" type="button" onclick="window.location.href = 'home_adm.php';">Voltar
							</button>
                    	   </div>

                     	   <div>
                        	    <button class="botao" type="submit">Alterar Dados</button>
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
