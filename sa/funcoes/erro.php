<?php

require_once 'conexao.php';

/*
    Esse é o arquivo de erros de inserção do PHP. O que acontece é que quando algum IF trigga um acontecimento que não deveria acontecer, ele chama um header que contém o código de erro relacionado ao IF e o tipo de arquivo de onde ele se originou. Ler linha 13 do cadastro de fornecedor, por exemplo.
*/


$cod_erro = $_GET["codigo_erro"];
mysqli_query($conexao,"set names 'utf8'");  
$resultado = mysqli_query($conexao, "select * from tb_erros where id_erros = $cod_erro");

while($registro=mysqli_fetch_array($resultado)){
    $msg=$registro["mensagens"];   
}

/* 
  Depois, o codigo de erro é adquirido através do GET e fazemos a conexão com o banco de dados para selecionar qual é a ID do banco que corresponde a ID que informei.
  Depois, pegamos a variável em que salvamos essa operação para igualar a uma de registro para que possamos selecionar o campo de mensagens de erro do banco de dados que equivale ao código de erro.
*/
// fazer um para cadastro administrativo 

$arquivo = $_GET["arquivo"];

if($arquivo == "cdp"){
    header('location:../cadastro_produtos.php?inclusao=erro&mensagem='.$msg);
}else{
    if($arquivo == "cdf"){
        header('location:../cadastro_fornecedor.php?inclusao=erro&mensagem='.$msg);
    }else{
        if($arquivo == "cdef"){
            header('location:../cadastro_endere_fornecedor.php?inclusao=erro&mensagem='.$msg);
        }else{
            if($arquivo == "cdu"){
                header('location:../cadastro_clientes.php?inclusao=erro&mensagem='.$msg);
            }else{
                if($arquivo == "ata"){
                    header('location:../alterar_dados_clientes.php?inclusao=erro&mensagem='.$msg);
                }else{
                    if($arquivo == "atb"){
                        header('location:../alterar_dados_administradores.php?inclusao=erro&mensagem='.$msg);
                    }else{
                        if($arquivo == "fnc"){
                            header('location:../finalizar_compra.php?inclusao=erro&mensagem='.$msg);
                        }else{
                            if($arquivo == "cda"){
                                header('location:../cadastro_administradores.php?inclusao=erro&mensagem='.$msg);
                            }
                        }
                    }
                }
            }
        }
    }
}

/* 
  Por fim, o arquivo de onde o erro se originou é adquirido pelo GET e filtrado, indicando para onde e para qual label de que arquivo a mensagem que obtivemos deverá se encaminhar. Linha 57 do cadastrar_user.php para exemplo visual. Com isso, podemos personalizar o tipo de mensagem de erro que queremos em uma label dinamicamente ^^
*/

// Abraços, Matheus

?>

