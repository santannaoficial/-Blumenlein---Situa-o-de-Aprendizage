<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style-default.css">
	<title>Consulta de administradores</title>

    <!--JAVASCRIPT-->
	<script>
		function apagar(id_administradores){						     
			if(window.confirm("Confirmas a exclusão?")){
				window.location = 'funcoes/excluir_administradores.php?id_administradores=' + id_administradores;			
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
                $resultado = mysqli_query($conexao,"select id_administradores, nome_administradores, cpf_administradores, email_administradores, telefone_administradores from tb_administradores");
            ?> 
            
            <!--Div - Pagina-->
            <div class="pagina_consulta">
                <div class="buttons_superior">
                    <button onclick="history.go(-1);" type="button">Voltar</button>
                    <button onclick="location.href = 'cadastro_administradores.php';" type="button">Cadastrar um novo administrador</button>
                </div>

                <h1>Consulta de administradores</h1>

                <!--Tabela-->
                <table>	
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>				
                        <th>CPF</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Excluir</th>
                    </tr>	
                    	
                    <?php 
                        while($registro_cadastro=mysqli_fetch_array($resultado)){
                            $id_administradores=$registro_cadastro["id_administradores"];
                            $nome_administradores=$registro_cadastro["nome_administradores"];
                            $cpf_administradores=$registro_cadastro["cpf_administradores"];
                            $email_administradores=$registro_cadastro["email_administradores"];
                            $telefone_administradores=$registro_cadastro["telefone_administradores"];

                        /*if(!$registro_cadastro=mysqli_fetch_array($resultado)){
                            $id_administradores = "undefined";
                            $nome_administradores = "undefined";
                            $cpf_administradores = "undefined";
                            $email_admininstradores = "undefined";
                            $telefone_administradores = "undefined";
                        }*/
                    ?>

                    <tr>	
                        <td><?php echo $id_administradores ?></td>
                        <td><?php echo $nome_administradores ?></td>
                        <td><?php echo $cpf_administradores ?></td>
                        <td><?php echo $email_administradores ?></td>
                        <td><?php echo $telefone_administradores ?></td>

                        <td>
                            <a title="Clique para excluir" onclick = "apagar('<?php echo $registro_cadastro['id_administradores']?>');">
                                Excluir
                            </a>
                        </td>
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