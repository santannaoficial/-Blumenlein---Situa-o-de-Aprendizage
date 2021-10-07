<?php
    require_once 'conexao.php';
	    $sql = "delete from tb_administradores where id_administradores = ".$_GET["id_administradores"];
        $query = mysqli_query($conexao,$sql);

        
	    if(mysqli_affected_rows($conexao) >= 0 ){
		    echo "<script>alert('Registro apagado com sucesso');</script>";
		    header('location: ../consulta_administradores.php');
	    }
?>