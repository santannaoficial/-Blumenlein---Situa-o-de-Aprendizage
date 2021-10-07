<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style-default.css">
    <title>Cadastro de Endereços</title>
</head>
<body>
        <!--Section - Cabeçalho/Barra superior-->
        <?php include "header_adm.php";?>

        <!--Main-->
        <main>
			<div class="painel">
                <h2>Informe o endereço do Fornecedor</h2>

                <div class="conteudo-painel">
                    <form action="funcoes/cadastrar_enderec_fornecedor.php" method="POST">
                    
                        <div class="campo">
                            <label>Insira o Estado do Fornecedor:</label>					
                        </div>
                        <div id="clear"></div>

                        
                        <div class="campo">
                            <select id="estado" name="estado">
                                <option value="" disabled selected hidden>Estado:</option>
                                <option value="AC" >Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="BA">Bahia</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RR">Roraima</option>
                                <option value="RO">Rondônia</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocatins</option>
                            </select>
                        </div>
                        <div id="clear"></div>



                        <div class="campo">
                            <label for="cidade_enderecos">Cidade:</label>
                            <input type="text" class="campoTexto"  name="cidade_enderecos" required/>
                        </div>
                        <div id="clear"></div>

                        <div class="campo">
                            <label for="bairro_enderecos">Bairro:</label>
                            <input type="text" class="campoTexto"  name="bairro_enderecos" required/>
                        </div>
                        <div id="clear"></div>


                        <div class="campo">
                            <label for="rua_enderecos">Rua:</label>
                            <input type="text" class="campoTexto"  name="rua_enderecos" required/>
                        </div>
                        <div id="clear"></div>
                        

                        <div class="campo">
                            <label for="numero_endereco">Número do local:</label>
                            <input type="number" class="campoTexto" min="1" name="numero_endereco" required/>
                        </div>
                        <div id="clear"></div>

                        <!-- Na hora de botar o tipo da residência, fazer automaticamente pelo insert-->

                        <div class="campo">
                            <label for="complemento_enderecos">Complemento:</label>
                            <input type="text" class="campoTexto"  name="complemento_enderecos" required/>
                        </div>
                        <div id="clear"></div>

                    <div class="buttons">
                        <div>
                            <button class="voltar" type="button" onclick="window.location.href='cadastro_fornecedor.php';">Voltar</button>
                        </div>
                        <div>
                            <button class="botao" type="submit">Cadastrar</button>
                        </div>
                    </div>

                        <?php
				     if(isset($_GET['inclusao']) && $_GET['inclusao'] == 'erro'){?>
				      <div class="erro">
							<?php
								$mensagem = $_GET["mensagem"];
								echo $mensagem;
					   		?>
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


                    </form>				
                </div>
            </div>

            <!--Limpa float-->
            <div id="clear"></div>

            <!--Footer - Canto inferior-->
            <?php include "footer.php";?>
        </main>
    </form>
</body>
</html>

<?php include "js/jqueryMask.php"?>