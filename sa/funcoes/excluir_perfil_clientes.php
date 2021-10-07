<?php
    require_once 'conexao.php';
		$sql = "delete from tb_clientes where id_clientes = ".$_GET["id_clientes"];
		$query = mysqli_query($conexao,$sql);

    

	    if(mysqli_affected_rows($conexao) >= 0 ){
		    echo "<script>alert('Registro apagado com sucesso');</script>";
		    header('location: ../consulta_perfil_clientes.php');
	    }
?>