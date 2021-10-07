<?php
    require_once 'conexao.php';
    $id_carrinhos = $_GET['id_carrinhos'];
     $sql = "delete from tb_carrinhos where id_carrinhos = ".$id_carrinhos;
    $query = mysqli_query($conexao,$sql);
    
        
    header('location:../carrinho_compras.php');
?>