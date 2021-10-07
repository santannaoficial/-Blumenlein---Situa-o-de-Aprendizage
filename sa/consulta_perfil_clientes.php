<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style-default.css">
	<title>Consulta de clientes</title>

    <!--JAVASCRIPT-->
	<script>
		function apagar(id_clientes){						     
			if(window.confirm("Confirmas a exclusão?")){
				window.location = 'funcoes/excluir_perfil_clientes.php?id_clientes=' + id_clientes;			
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
                $resultado = mysqli_query($conexao,"select id_clientes, nome_clientes, user_clientes, cpf_clientes, email_clientes, telefone_clientes, nascimento_clientes from tb_clientes");	
            ?> 
            
            <!--Div - Pagina-->
            <div class="pagina_consulta">
                <div class="buttons_superior">
                    <button onclick="history.go(-1);" type="button">Voltar</button>
                    <button onclick="location.href = 'cadastro_clientes.php';" type="button">Cadastrar um novo cliente</button>
                </div>

                <h1>Consulta de clientes</h1>

                <!--Tabela-->
                <table>	
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>User</th>				
                        <th>CPF</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Nascimento</th>
                    </tr>	
                    	

                    <?php 
                        while($registro_cadastro=mysqli_fetch_array($resultado)){
                            $id_clientes=$registro_cadastro["id_clientes"];
                            $nome_clientes=$registro_cadastro["nome_clientes"];
                            $user_clientes=$registro_cadastro["user_clientes"];
                            $cpf_clientes=$registro_cadastro["cpf_clientes"];
                            $email_clientes=$registro_cadastro["email_clientes"];
                            $telefone_clientes=$registro_cadastro["telefone_clientes"];
                            $nascimento_clientes=$registro_cadastro["nascimento_clientes"];

                        /*if(!$registro_cadastro=mysqli_fetch_array($resultado)){
                            $id_clientes = "undefined";
                            $nome_clientes = "undefined";
                            $user_clientes = "undefined";
                            $cpf_clientes = "undefined";
                            $email_clientes = "undefined";
                            $telefone_clientes = "undefined";
                            $nascimento_clientes = "undefined";
                        }*/
                    ?>

                    <tr>	
                        <td><?php echo $id_clientes ?></td>
                        <td><?php echo $nome_clientes ?></td>
                        <td><?php echo $user_clientes ?></td>
                        <td><?php echo $cpf_clientes ?></td>
                        <td><?php echo $email_clientes ?></td>
                        <td><?php echo $telefone_clientes ?></td>
                        <td><?php echo $nascimento_clientes ?></td>

                  
                       
                    </tr>   
            
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