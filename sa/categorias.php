<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style-default.css">
    <title>
        <?php 
            if(isset($_GET['categoria'])){
                echo $_GET["categoria"];
            }
            else{
                //retorna a tela home quando há uma busca direta pela search bar
                if(isset($_GET['busca'])){
                    header('location: home.php?busca='.$_GET['busca']);
                }
                else{
                    echo 'Não foi possivel adicionar o caminho.';
                }
            }
        ?>
    </title>
</head>

<style>
    main{
        width: 100%
    }

    .cabecalho{
        min-width: 100%;
    }
</style>

<body>
    <form action="home.php" type="submit">
        <!--Section - Cabeçalho/Barra superior-->
        <?php include "header.php";?>

        <!--Titulo-->
        <div class="titulo">
            <label>
                <?php 
                    if(isset($_GET['categoria'])){
                        echo $_GET["categoria"];
                    }
                    else{
                        if(isset($_GET['busca'])){
                            header('location: home.php?busca='.$_GET['busca']);
                        }
                        else{
                            echo 'Não foi possivel adicionar o caminho.';
                        }
                    }
                ?>
            </label>
        </div>

        <!--Section Main-->
        <main>
            <div class="produtos">
                <?php include "funcoes/produtos.php";?>
            </div>
        </main>

        <!--Limpa float-->
        <div id="clear"></div>

        <!--Footer - Canto inferior-->
        <?php include "footer.php";?>
    </form>
</body>
</html>