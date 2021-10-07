<?php
    if(isset($_SESSION['user_clientes'])){
        echo $_SESSION['user_clientes'];
    }
    else{
        echo '<a href="login_clientes.php">Olá, faça o seu login</a>';
    } 
?>