<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style-default.css">
	<title>Consultar usuários</title>

	<script>
		function apagar(id_clientes){						     
			if(window.confirm("Confirmas a exclusão?")){
				window.location = 'excluir_perfil_clientes.php?id_clientes=' + id_clientes;			
			}	
		}  	  
   </script>
</head>

<?php
	require_once 'conexao.php';
	//mysqli_query->Faz a conexão com o banco e acentuação
	mysqli_query($conexao,"set names 'utf8'");   
	$resultado = mysqli_query($conexao,"select id_clientes, user_clientes, nome_clientes, email_clientes, senha_clientes, telefone_clientes, data_clientes from tb_clientes");	
?> 

<body>
    <div id="container">
        <div class="painel">
            <h2>Consulta de usuários</h2>
        </div>
        
        <table class="">	
            <thead class="">
                <tr>
                    <th>User</th>				
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Data de nascimento</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>	
            </thead>	

        <?php 
        while($registro_cadastro=mysqli_fetch_array($resultado)) {
            $id_clientes=$registro_cadastro["id_clientes"];
            $nome_clientes=$registro_cadastro["nome_clientes"];
            $user_clientes=$registro_cadastro["user_clientes"];
            $email_clientes=$registro_cadastro["email_clientes"];
            $telefone_clientes=$registro_cadastro["telefone_clientes"];
            $data_clientes=$registro_cadastro["data_clientes"];
            echo "<br>";
        ?>

        <tr>		
            <td><?php echo $nome_clientes ?></td>
            <td><?php echo $user_clientes ?></td>
            <td><?php echo $email_clientes ?></td>
            <td><?php echo $telefone_clientes ?></td>
            <td><?php echo $data_clientes ?></td>	

            <td align="center"><a href="../editar_clientes.php?id_clientes=<?php echo $registro_cadastro["id_clientes"]?>"><img src="img/editar.png" title="Clique para alterar" width=38px></img></a>
            
            <td align="center"><a href="#" title="Clique para excluir" onclick = "apagar('<?php echo $registro_cadastro["id_clientes"]?>;');"><img src="img/Excluir.png"></a></td>	
        </tr>   
    </table>
    
    <?php
        }
    ?>

    <div class="buttons">
        <button class="voltar" onclick="history.go(-1);">Voltar</button>
        <button class="botao" onclick="location.href = 'cadastro_clientes.php';">Cadastrar novo usuário</button>
    </div>
    </div>
</body>
</html>	