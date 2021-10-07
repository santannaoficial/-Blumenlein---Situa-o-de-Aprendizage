<?php
session_start();

if ($_POST) {
    include "conexao.php";

    $estado_enderecos = $_POST['estado'];
    $cidade_enderecos = $_POST['cidade_enderecos'];
    $bairro_enderecos = $_POST['bairro_enderecos'];
    $rua_enderecos = $_POST['rua_enderecos'];
    $numero_enderecos = $_POST['numero_endereco'];
    $complemento_enderecos = $_POST['complemento_enderecos'];



    if(is_string($estado_enderecos) && is_string($cidade_enderecos) && is_string($bairro_enderecos)  && is_string($rua_enderecos)  && is_numeric($numero_enderecos)  && is_string($complemento_enderecos)) {
   
         if(strlen($estado_enderecos) > 2){
             header('location:erro.php?codigo_erro=8&arquivo=cdef');
         }else{
              if(strlen($cidade_enderecos) > 28){
                  header('location:erro.php?codigo_erro=9&arquivo=cdef');
              }else{
                 if(strlen($bairro_enderecos) > 45){
                     header('location:erro.php?codigo_erro=10&arquivo=cdef');
                  }else{
                      if(strlen($rua_enderecos) > 45){
                        header('location:erro.php?codigo_erro=11&arquivo=cdef');
                     }else{
                          if(strlen($numero_enderecos) > 4){
                             header('location:erro.php?codigo_erro=12&arquivo=cdef');
                          }else{
                           

                                    $resultado = mysqli_query ($conexao, "select id_fornecedores FROM tb_fornecedores order by id_fornecedores desc  limit 1")
                                    or die(mysqli_error($conexao));
                            
                                    $id = mysqli_fetch_assoc($resultado);
                            
                                    foreach ($id as $id_fornecedores) {
                                    }
                                   if(mysqli_query($conexao, "insert into tb_enderecos(estado_enderecos, cidade_enderecos, bairro_enderecos, rua_enderecos, numero_enderecos, complemento_enderecos, tb_fornecedores_id_fornecedores) values ('$estado_enderecos', '$cidade_enderecos', '$bairro_enderecos', '$rua_enderecos', '$numero_enderecos', '$complemento_enderecos', '$id_fornecedores')")){  
                                            header('location:../cadastro_endere_fornecedor.php?inclusao=sucesso');       
                                        }else{
                                            header('location:../cadastro_endere_fornecedor.php?inclusao=erro'); 
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }   
           
?>
