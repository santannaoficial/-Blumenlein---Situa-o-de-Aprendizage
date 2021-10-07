<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style-default.css">
	<title>Consulta de fornecedores</title>

    <!--JAVASCRIPT-->
	<script>
		function apagar(id_clientes){						     
			if(window.confirm("Confirmas a exclusão?")){
				window.location = 'funcoes/excluir_fornecedores.php?id_fornecedores=' + id_fornecedores;
			}	
		}  	  
   </script>
</head>

<body>
    <!--Section - Cabeçalho/Barra superior-->
    <?php include "header_adm.php";?>

    <!--Section Main-->
    <main>
        <div class="consulta">

            <!--PHP-->
            <?php
                require_once 'funcoes/conexao.php';
                //mysqli_query->Faz a conexão com o banco e acentuação
                mysqli_query($conexao,"set names 'utf8'");   
                $resultado = mysqli_query($conexao,"select id_fornecedores, nome_fornecedores, email_fornecedores, telefone_fornecedores from tb_fornecedores");
            ?> 

            <!--Buscando informações de endereço do fornecedor-->
            <?php 
                require_once 'funcoes/conexao.php';
                mysqli_query($conexao,"set names 'utf8'");
                $sql = mysqli_query($conexao,"select estado_enderecos, cidade_enderecos, bairro_enderecos,rua_enderecos, numero_enderecos, complemento_enderecos from tb_enderecos");
            ?>
            
            <!--Div - Pagina-->
            <div class="pagina_consulta">
                <div class="buttons_superior">
                    <button onclick="history.go(-1);" type="button">Voltar</button>
                    <button onclick="location.href = 'cadastro_fornecedor.php';" type="button">Cadastrar um novo fornecedor</button>
                </div>

                <h1>Consulta de fornecedores</h1>

                <!--Tabela-->
                <table class="table_consulta">	
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>				
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Estado</th>
                        <th>Cidade</th>
                        <th>Bairro</th>
                        <th>Rua</th>
                        <th>Número</th>
                        <th>Complemento</th>
                        <th>Excluir</th>
                    </tr>	
                    	
                    <?php 
                        while($registro_cadastro=mysqli_fetch_array($resultado)){
                            $id_fornecedores=$registro_cadastro["id_fornecedores"];
                            $nome_fornecedores=$registro_cadastro["nome_fornecedores"];
                            $email_fornecedores=$registro_cadastro["email_fornecedores"];
                            $telefone_fornecedores=$registro_cadastro["telefone_fornecedores"];

                        /*if(!$registro_cadastro=mysqli_fetch_array($resultado)){
                            $id_fornecedores = "undefined";
                            $nome_fornecedores = "undefined";
                            $email_fornecedores = "undefined";
                            $telefone_fornecedores = "undefined";
                        }*/
                    ?>

                    <?php 
                        while($registro_cadastro_enderecos=mysqli_fetch_array($sql)){
                            $estado_enderecos=$registro_cadastro_enderecos["estado_enderecos"];
                            $cidade_enderecos=$registro_cadastro_enderecos["cidade_enderecos"];
                            $bairro_enderecos=$registro_cadastro_enderecos["bairro_enderecos"];
                            $rua_enderecos=$registro_cadastro_enderecos["rua_enderecos"];
                            $numero_enderecos=$registro_cadastro_enderecos['numero_enderecos'];
                            $complemento_enderecos=$registro_cadastro_enderecos['complemento_enderecos']

                        /*if(!$registro_cadastro=mysqli_fetch_array($resultado)){
                            $id_fornecedores = "undefined";
                            $nome_fornecedores = "undefined";
                            $email_fornecedores = "undefined";
                            $telefone_fornecedores = "undefined";
                        }*/
                    ?>

                    <tr>	
                        <td><?php echo $id_fornecedores ?></td>
                        <td><?php echo $nome_fornecedores ?></td>
                        <td><?php echo $email_fornecedores ?></td>
                        <td><?php echo $telefone_fornecedores ?></td>
                        <td><?php echo $estado_enderecos ?></td>
                        <td><?php echo $cidade_enderecos ?></td>
                        <td><?php echo $bairro_enderecos ?></td>
                        <td><?php echo $rua_enderecos ?></td>
                        <td><?php echo $numero_enderecos ?></td>
                        <td><?php echo $complemento_enderecos ?></td>

                      
                        <td>
                            <a title="Clique para excluir" onclick = "apagar('<?php echo $registro_cadastro['id_fornecedores']?>');">
                                Excluir
                            </a>
                        </td>
                    </tr>   
            
                    <?php
                        }
                    ?>

                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>

        <!--Limpa float-->
        <div id="clear"></div>

        <!--Footer - Canto inferior-->
        <?php include "footer.php";?>
    </main>
</body>
</html>	