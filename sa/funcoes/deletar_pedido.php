<?php
    require_once 'conexao.php';
    $id_pedidos = $_GET['id_pedidos'];
	    $sql = "delete from tb_pedidos where id_pedidos = ".$id_pedidos;
        $query = mysqli_query($conexao,$sql);
        
    header('location:../pedidos.php');
?>