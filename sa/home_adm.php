<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style-default.css">
    <title>home</title>
</head>
<body>
    <form action="" type="submit">
        <!--Section - Cabeçalho/Barra superior-->
        <?php include "header_adm.php";?>

        <!--Section Main-->
        <main>
            <?php include "funcoes/produtos.php";?>

            <!--Limpa float-->
            <div id="clear"></div>

            <!--Footer - Canto inferior-->
            <?php include "footer.php";?>
        </main>
    </form>
</body>
</html>