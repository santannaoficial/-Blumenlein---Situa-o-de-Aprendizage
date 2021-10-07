<?php session_start() ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style-default.css">
    <title>Consulta de Produtos</title>

    <!--JAVASCRIPT-->
    <script>
        function apagar(id_produtos){						     
            if(window.confirm("Confirmas a exclusão?")){
                window.location = 'funcoes/excluir_produtos.php?id_produtos='+ id_produtos;
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

                //mysqli_query - Faz a conexão com o banco e acentuação
                mysqli_query($conexao,"set names 'utf8'");   
                $resultado = mysqli_query($conexao,"select id_produtos, nome_produtos, descricao_produtos, preco_produtos, quantidade_produtos, vencimento_produtos, categoria_produtos from tb_produtos");	
            ?>

            <!--Div - Pagina-->
            <div class="pagina_consulta">
                <div class="buttons_superior">
                    <button onclick="history.go(-1);" type="button">Voltar</button>
                    <button onclick="location.href = 'cadastro_produtos.php';" type="button">Cadastrar um novo produto</button>
                </div>

                <h1>Consulta de produtos</h1>
                
                <!--Tabela-->
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>				
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Quantidade em estoque</th>
                        <th>Data de vencimento</th>
                        <th>Categoria</th>
                        <th>Excluir</th>
                    </tr>		

                    <?php
                        while($registro_cadastro=mysqli_fetch_array($resultado)){
                            $id_produtos = $registro_cadastro["id_produtos"];
                            $nome_produtos = $registro_cadastro["nome_produtos"];
                            $descricao_produtos = $registro_cadastro["descricao_produtos"];
                            $preco_produtos = $registro_cadastro["preco_produtos"];
                            $quantidade_produtos = $registro_cadastro["quantidade_produtos"];
                            $vencimento_produtos = $registro_cadastro["vencimento_produtos"];
                            $categoria_produtos = $registro_cadastro["categoria_produtos"];
                        
                        /*if(!$registro_cadastro=mysqli_fetch_array($resultado)){
                            $id_produtos = "undefined";
                            $nome_produtos = "undefined";
                            $descricao_produtos = "undefined";
                            $preco_produtos = "undefined";
                            $quantidade_produtos = "undefined";
                            $vencimento_produtos = "undefined";
                            $categoria_produtos = "undefined";
                        }*/
                    ?>

                    <tr>		
                        <td><?php echo $id_produtos ?></td>
                        <td><?php echo $nome_produtos ?></td>
                        <td><?php echo $descricao_produtos ?></td>
                        <td><?php echo $preco_produtos; ?></td>
                        <td><?php echo $quantidade_produtos ?></td>
                        <td><?php echo $vencimento_produtos ?></td>	
                        <td><?php echo $categoria_produtos ?></td>	

              
                        <td>
                            <a title="Clique para excluir" onclick = "apagar('<?php echo $registro_cadastro['id_produtos']?>');">
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