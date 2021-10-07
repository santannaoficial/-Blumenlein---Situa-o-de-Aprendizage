<?php    
    if(isset($_SESSION['nome_administradores'])){
        echo $_SESSION['nome_administradores'];
    }
    else{
        echo '<a href="login_administradores.php">Olá, faça o seu login</a>';
    } 
?>