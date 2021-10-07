<?php
    include 'conexao.php';
        $sql = "delete from tb_produtos where id_produtos = ".$_GET["id_produtos"];
        $query = mysqli_query($conexao,$sql);
        excluir();

        function excluir(){
            include 'conexao.php';
            $resultado = mysqli_query ($conexao, "select id_produtos FROM tb_produtos where id_produtos = ".intval($_GET["id_produtos"]) or die(mysqli_error($conexao)));
            mysqli_query($conexao, "delete from tb_produtos_has_tb_fornecedores where tb_produtos_id_produtos = ".[$resultado]);   
        }
        
	    if(mysqli_affected_rows($conexao) >= 0 ){
		    header('location: ../consulta_produtos.php');
	    }
?>