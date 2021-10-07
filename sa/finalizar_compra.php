<?php 
	session_start();
	include "funcoes/conexao.php";

	//Aqui ele coleta informações do usuário
	$user =  $_SESSION['user_clientes'];
	$senha =  $_SESSION['senha_clientes'];
	  
	$SQL = "select cpf_clientes from tb_clientes where user_clientes='$user' AND senha_clientes='$senha'";
	$result_id = mysqli_query($conexao, $SQL) or die("Erro no banco de dados.");
	$total = mysqli_num_rows($result_id);	 
	$dados = mysqli_fetch_array($result_id);
	$cpf_clientes =  $dados["cpf_clientes"];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="css/style-default.css">
	<title>Finalizar Compra</title>
</head>
<body>	
	<main>
		<div class="painel">
			<h2>Finalizar Compra</h2>

			<div class="conteudo-painel">
				<form action="funcoes/finalizar_e_comprar.php" method="POST">
					<div class="campo">
						<label for="escolha">Forma de Pagamento:</label>
						<select id="escolha" name="escolha" style="margin-top: 2%;">
                            <option value="" disabled selected hidden>Selecione uma forma de pagamento</option>
                            <option value="Debito">Débito</option>
                            <option value="Credito">Crédito</option>
                        </select>
					</div>
					<div id="clear"></div>

					<div class="campo">
						<label for="nome_titular">Nome do Titular</label>
						<input type="text" class="campoTexto"  name="nome_titular" required/>
					</div>
					<div id="clear"></div>

                    <div class="campo">
						<label for="cpf_titular">CPF:</label>
						<input type="text" class="campoTexto"  name="cpf_titular" value=<?php echo $cpf_clientes?> disabled/>
					</div>
					<div id="clear"></div>

                    <div class="campo">
						<label for="numero_cartao">Número do Cartão:</label>
                        <input type="text" class="campoTexto"  name="numero_cartao" required/>
                    </div>
					<div id="clear"></div>

                    <div class="campo">
						<label for="cvv_cartao">Código CVV:</label>
                        <input type="text" name="cvv_cartao" placeholder="CVV" style="width: 30px; height: min-content;" required>
                    </div>
					<div id="clear"></div>

                    <div class="campo">
						<label for="data_vencimento">Data de Vencimento: </label>
						<input type="date" name="data_vencimento" placeholder="mm-aa" style="margin-top: 2%;" required>
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
                                var nome = document.getElementById('nome_titular');
                                nome.focus();
                            </script>
                        </div>
				    <?php
				        }
					    
                        	
					  ?> 

                    <div class="buttons">
                        <div>
                            <button class="voltar" type="button" onclick="window.location.href = 'carrinho_compras.php';">Voltar</button>
                        </div>

                        <div>
                            <button class="botao" type="submit">Finalizar Compra</button>
                        </div>
                    </div>
				</form>				
			</div>
			
		</div>		
	</main>	
</body>
</html>

<?php include "js/jqueryMask.php"?>