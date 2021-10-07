<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar Perfil</title>
	<link rel="stylesheet" type="text/css" href="css/style-default.css">
</head>

<?php	
	include 'funcoes/conexao.php';  
	 
	$id_administradores = $_GET["id_administradores"];
	$sql = "select * from tb_administradores where id_administradores = ".$_GET["id_administradores"];
	$executar = mysqli_query($conexao,$sql);
	$resultado = mysqli_fetch_array($executar);
?>

<body>
	<main>
		<div class="painel">
			<h2>Alterar Dados de Usuário</h2>

			<div class="conteudo-painel">
				<!--<input type="file">-->
                <img src="img/User_Log.jpg" class="img_upload">
			</label> 
				<form action="editar_administradores.php" method="POST">
					<div class="campo">
						<label for="id_administradores"></label><br>
						<input type="hidden" class="campoTexto" name="id_administradores" value="<?php echo $resultado["id_administradores"];?>" required/>
					</div>
					<div id="clear"></div>

					<div class="campo">
						<label for="nome_administradores">Nome</label>
						<input type="text" class="campoTexto" name="nome_administradores" value="<?php echo $resultado["nome_administradores"];?>" required/>
					</div>
					<div id="clear"></div>

					<div class="campo">
						<label for="user_administradores">Nome de Usuário</label>
						<input type="text" class="campoTexto" name="user_administradores" value="<?php echo $resultado["user_administradores"];?>" required/>
					</div>
                    <div id="clear"></div>

					<div class="campo">
						<label for="email_administradores">E-mail</label>
						<input type="text" class="campoTexto" name="email_administradores" value="<?php echo $resultado["email_administradores"];?>" required/>
					</div>
					<div id="clear"></div>

					<div class="campo">
						<label for="senha_administradores">Senha</label>
						<input type="password" class="campoTexto" name="senha_administradores" value="<?php echo $resultado["senha_administradores"];?>" required/>
					</div>
					<div id="clear"></div>

					<div class="campo">
						<label for="telefone_administradores">Telefone</label>
						<input type="text" class="campoTexto"  name="telefone_administradores" value="<?php echo $resultado["telefone_administradores"];?>" required/>
					</div>
					<div id="clear"></div>

					<div class="campo">
						<label for="data_administradores">Data</label>
						<input type="date" name="data_administradores" min="1900-01-01" max="2099-12-31" value="<?php echo $resultado["data_administradores"];?>" required/>
					</div>
					<div id="clear"></div>


				 <div class="buttons">	
					<div>
						<button class="voltar" type="button" onclick="location.href = 'consulta_administradores.php';">Voltar</button>
					</div>

					<div>
						<button class="botao" type="submit">Salvar</button>
					</div>
				</div>
			</form>				
	</main>
</body>
</html>