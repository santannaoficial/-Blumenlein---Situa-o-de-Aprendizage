<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar Clientes</title>
	<link rel="stylesheet" type="text/css" href="css/style-default.css">
</head>

<?php	
	include 'funcoes/conexao.php';  
	 
	$id_usuarios = $_GET["id_clientes"];
	$sql = "select * from tb_clientes where id_clientes = ".$_GET["id_clientes"];
	$executar = mysqli_query($conexao,$sql);
	$resultado = mysqli_fetch_array($executar);
?>

<body>
	<main>
		<div class="painel">
			<h2>Alterar Dados de Cliente</h2>

			<div class="conteudo-painel">
				<!--<input type="file">-->
                <img src="img/User_Log.jpg" class="img_upload">
			</label> 
				<form action="editar_clientes.php" method="POST">
					<div class="campo">
						<label for="id_clientes"></label><br>
						<input type="hidden" class="campoTexto" name="id_clientes" value="<?php echo $resultado["id_clientes"];?>" required/>
					</div>
					<div id="clear"></div>

					<div class="campo">
						<label for="nome_clientes">Nome</label>
						<input type="text" class="campoTexto" name="nome_clientes" value="<?php echo $resultado["nome_clientes"];?>" required/>
					</div>
					<div id="clear"></div>

					<div class="campo">
						<label for="user_clientes">Nome de Usuário</label>
						<input type="text" class="campoTexto" name="user_clientes" value="<?php echo $resultado["user_clientes"];?>" required/>
					</div>
                    <div id="clear"></div>

					<div class="campo">
						<label for="email_clientes">E-mail</label>
						<input type="text" class="campoTexto" name="email_clientes" value="<?php echo $resultado["email_clientes"];?>" required/>
					</div>
					<div id="clear"></div>

					<div class="campo">
						<label for="senha_clientes">Senha</label>
						<input type="password" class="campoTexto" name="senha_clientes" value="<?php echo $resultado["senha_clientes"];?>" required/>
					</div>
					<div id="clear"></div>

					<div class="campo">
						<label for="telefone_clientes">Telefone</label>
						<input type="text" class="campoTexto"  name="telefone_clientes" value="<?php echo $resultado["telefone_clientes"];?>" required/>
					</div>
					<div id="clear"></div>

					<div class="campo">
						<label for="data_clientes">Data</label>
						<input type="date" name="data_clientes" min="1900-01-01" max="2099-12-31" value="<?php echo $resultado["data_clientes"];?>" required/>
					</div>
					<div id="clear"></div>

				<div class="buttons">
					<div>
						<button class="voltar" type="button" onclick="location.href = 'consulta_perfil_user.php';">Voltar</button>
					</div>

					<div>	
						<button class="botao" type="submit">Salvar</button>
					</div>
				</div>
				</form>				
	</main>
</body>
</html>