<?php
    require_once 'conexao.php';
    mysqli_query($conexao,"SET NAMES 'utf8'");

    $id_produtos = $_POST["id_produtos"];
    $nome_produtos = $_POST['nome_produtos'];
    $preco_produtos = $_POST['preco_produtos'];
    $quantidade_produtos = $_POST['quantidade_produtos'];
    $descricao_produtos = $_POST['descricao_produtos'];
    $categoria_produtos = $_POST['categoria_produtos'];
    $data_input = $_POST['vencimento_produtos'];
    $vencimento_produtos = date("Y-m-d", strtotime($data_input));
    //aqui a gente vai ter que arrumar um jeito de pegar o forncedor tambeem

    $SQL = "update tb_produtos set nome_produtos='$nome_produtos',preco_produtos='$preco_produtos',quantidade_produtos='$quantidade_produtos',descricao_produtos='$descricao_produtos',categoria_produtos='$categoria_produtos',vencimento_produtos='$vencimento_produtos' where id_produtos='$id_produtos'";

    if($SQL < 0) {
        die('Problema na alteração:'.mysql_error());
            echo "$id_produtos".$id_produtos;
    }	   

    else {
        $executar = mysqli_query($conexao,$SQL);	
        echo "<script>alert('Registro alterado');</script>";
        echo "<script>window.location='consulta_produtos.php'</script>";	
    }	
?>