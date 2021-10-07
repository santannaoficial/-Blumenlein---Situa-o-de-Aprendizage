<?php
    if(isset($_GET["busca"])){
        $busca = $_GET["busca"];
        $_SESSION['busca'] = $busca;
        $_SESSION['categoria'] = null;
    }
    else{
        if(isset($_GET["categoria"])){
            $categoria = $_GET["categoria"];
            $_SESSION['categoria'] = $categoria;
            $_SESSION['busca'] = null;
        }
        else{
            $_SESSION['busca'] = null;
            $_SESSION['categoria'] = null;
        }
    }
?>

<?php
    include "conexao.php";
    $length = mysqli_query($conexao, "select count(*) length from tb_produtos");
    $length = mysqli_fetch_array($length); 
    
    //se for feita alguma busca
    if(isset($_SESSION['busca'])){
        $busca = $_SESSION['busca'];
        $sql = mysqli_query($conexao, "select * from tb_produtos where nome_produtos LIKE '%$busca%' OR categoria_produtos LIKE '%$busca%'");
        $i = 0;
        
        while($inf_produtos = mysqli_fetch_array($sql)){
            $id_produtos = $inf_produtos['id_produtos'];
            $tb_imagens_id_imagens = $inf_produtos['tb_imagens_id_imagens'];
               
            $query = mysqli_query($conexao, "select arquivo_imagens from tb_imagens where id_imagens = '$tb_imagens_id_imagens'");

            while($foto=mysqli_fetch_array($query)){ 
                $arquivo=$foto['arquivo_imagens'];
                $i++;
                if($i <= $length['length']){
                    echo   "<!--Produto-->
                        <article class='produto'>
                            <h1>". $inf_produtos['nome_produtos'] ."</h1>
                            <img class='produto_img' src=".$arquivo.">
                            <div class='produto_inf'>
                                <label>Preço: R$ <p>". $inf_produtos['preco_produtos'] ."</p></label><br>
                                <label>Categoria: <p>". $inf_produtos['categoria_produtos'] ."</p></label><br>
                                <label>Descrição: <p>". $inf_produtos['descricao_produtos'] ."</p></label><br>
                                "?>
                                <!DOCTYPE html>
                                <html lang="pt">
                                <head>
                                <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1">
                                    <link rel="stylesheet" href="css/style-default.css">
                                <title></title>
                                </head>
                                <body>

                                <div><button class="ver_mais" type=button  onclick="window.location.href = 'produto_individual.php?nome_produtos=<?php echo $inf_produtos['nome_produtos']?>';" > Veja Mais </button> </div>
                    <?php
                        echo   "  </div>
                        </article>";
                }
            }
        }
    }
    //Adiciona os produtos de forma padrão
    else{
        if(isset($_SESSION['categoria'])){
            $categoria = $_SESSION['categoria'];
            $sql = mysqli_query($conexao, "select * from tb_produtos where categoria_produtos LIKE '%$categoria%'");
            $i = 0;

            while($inf_produtos = mysqli_fetch_array($sql)){
                $id_produtos = $inf_produtos['id_produtos'];
                $tb_imagens_id_imagens = $inf_produtos['tb_imagens_id_imagens'];
                
                $query = mysqli_query($conexao, "select arquivo_imagens from tb_imagens where id_imagens = '$tb_imagens_id_imagens'");

                while($foto=mysqli_fetch_array($query)){ 
                    $arquivo=$foto['arquivo_imagens'];

                $i++;
                if($i <= $length['length']){
                    echo   "<!--Produto-->
                        <article class='produto'>
                        <h1>". $inf_produtos['nome_produtos'] ."</h1>
                            <img class='produto_img' src='".$arquivo."'>
                            <div class='produto_inf'>
                                <label>Preço: R$ <p>". $inf_produtos['preco_produtos'] ."</p></label><br>
                                <label>Categoria: <p>". $inf_produtos['categoria_produtos'] ."</p></label><br>
                                <label>Descrição: <p>". $inf_produtos['descricao_produtos'] ."</p></label><br>
                                "?>
                            <!DOCTYPE html>
                                <html lang="pt">
                                <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1">
                                <link rel="stylesheet" href="css/style-default.css">
                                <title></title>
                                </head>
                                <body>
                                
                                <div>
                                    <button class="ver_mais" type=button  onclick="window.location.href = 'produto_individual.php?nome_produtos=<?php echo $inf_produtos['nome_produtos']?>';" > Veja Mais </button> 
                                </div>
                    <?php
                    echo   "</div>
                            </article>";
                    }
                }
            }
        }
        else{
            $sql = mysqli_query($conexao, "select * from tb_produtos");
            $i = 0;

            while($inf_produtos = mysqli_fetch_array($sql)){
                $tb_imagens_id_imagens = $inf_produtos['tb_imagens_id_imagens']; 
                $query = mysqli_query($conexao, "select arquivo_imagens from tb_imagens where id_imagens = '$tb_imagens_id_imagens'");

                while($foto=mysqli_fetch_array($query)){ 
                    $arquivo=$foto['arquivo_imagens'];
                    $i++;
                    
                    if($i <= $length['length']){
                        echo   "<!--Produto-->
                            <article class='produto'>
                            <h1>". $inf_produtos['nome_produtos'] ."</h1>
                                <img class='produto_img' src='".$arquivo."'>
                                <div class='produto_inf'>
                                    <label>Preço: R$ <p>". $inf_produtos['preco_produtos'] ."</p></label><br>
                                    <label>Categoria: <p>". $inf_produtos['categoria_produtos'] ."</p></label><br>
                                    <label>Descrição: <p>". $inf_produtos['descricao_produtos'] ."</p></label><br>
                                    "?>
                                <!DOCTYPE html>
                                    <html lang="pt">
                                    <head>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1">
                                    <link rel="stylesheet" href="css/style-default.css">
                                    <title></title>
                                    </head>
                                    <body>
                                    
                                    <div>
                                        <button class="ver_mais" type=button  onclick="window.location.href = 'produto_individual.php?nome_produtos=<?php echo $inf_produtos['nome_produtos']?>';" > Veja Mais </button> 
                                    </div>
                        <?php
                        echo   "</div>
                                </article>";
                    }
                }
            }
        }
    }
?>