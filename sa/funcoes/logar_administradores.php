<?php 
if($_POST){
    session_start();
    include "conexao.php";
    include "removeChar.php";

    $cpf_administradores = strval($_POST['cpf_administradores']);
        $cpf_administradores = RemoveSpecialChar($cpf_administradores);
    $senha_administradores = $_POST['senha_administradores'];
    $sql = "";

    //faz a validação para o login
    $sql = mysqli_query($conexao, "select id_administradores, nome_administradores, cpf_administradores, email_administradores, senha_administradores, telefone_administradores from tb_administradores where cpf_administradores = '$cpf_administradores' and senha_administradores = '$senha_administradores'");
    
    while($inf_administradores = mysqli_fetch_array($sql)){
        $id_administradores = $inf_administradores['id_administradores'];
        $nome_administradores = $inf_administradores['nome_administradores'];
        $email_administradores = $inf_administradores['email_administradores'];
        $telefone_administradores = $inf_administradores['telefone_administradores'];
    }

    if(mysqli_num_rows($sql) > 0){
        $_SESSION['id_administradores'] = $id_administradores;
        $_SESSION['nome_administradores'] = $nome_administradores;
        $_SESSION['cpf_administradores'] = $cpf_administradores;
        $_SESSION['email_administradores'] = $email_administradores;
        $_SESSION['senha_administradores'] = $senha_administradores;
        $_SESSION['telefone_administradores'] = $telefone_administradores;
        header('location: ../home_adm.php');
    }else{
        header('location: ../login_administradores.php');
    }
}
?>