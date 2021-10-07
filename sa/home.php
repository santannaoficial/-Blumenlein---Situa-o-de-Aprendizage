<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style-default.css">
    <title>home</title>
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
    <!--verificar sem o action do form-->
    <form action="" type="submit">
        <!--Section - Cabeçalho/Barra superior-->
        <?php include "header.php";?>

        <?php
            if(array_key_exists('busca', $_GET) && $_GET['busca'] != ""){
                include "searchComponent.php";
            }
            else{
                include "defaultComponents_home.php";
            }
        ?>

        <!--Section Main-->
        <main>
            <div class="produtos">
                <?php include "funcoes/produtos.php";?>
            </div>
        </main>

        <!--Limpa float-->
        <div id="clear"></div>

        <!--Section - Canto inferior-->
        <?php include "footer.php";?>
    </form>
</body>
</html>