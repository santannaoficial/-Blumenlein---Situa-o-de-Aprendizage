<?php 
if($_POST){
    session_start();

    $user_clientes = $_POST['user_clientes'];
    $senha_clientes = $_POST['senha_clientes'];
    $sql = "";
    
    include "conexao.php";

    //faz a validação para o login
    $sql = mysqli_query($conexao, "select id_clientes, nome_clientes, user_clientes, email_clientes, senha_clientes from tb_clientes where user_clientes = '$user_clientes' and senha_clientes = '$senha_clientes'");
    
    while($inf_clientes = mysqli_fetch_array($sql)){
        $id_clientes = $inf_clientes['id_clientes'];
        $nome_clientes = $inf_clientes['nome_clientes'];
        $email_clientes = $inf_clientes['email_clientes'];
    }

    if(mysqli_num_rows($sql) > 0){
        $_SESSION['id_clientes'] = $id_clientes;
        $_SESSION['nome_clientes'] = $nome_clientes;
        $_SESSION['user_clientes'] = $user_clientes;
        $_SESSION['email_clientes'] = $email_clientes;
        $_SESSION['senha_clientes'] = $senha_clientes;
        header('location: ../home.php');
    }else{
        header('location: ../login_clientes.php');
    }
}
?>