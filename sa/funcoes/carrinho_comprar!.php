<?php 
    session_start();
    include 'conexao.php';

    $user =  $_SESSION['user_clientes'];
    $senha =  $_SESSION['senha_clientes'];

    $SQL = "select id_clientes from tb_clientes where user_clientes='$user' AND senha_clientes='$senha'";
    $result_id = mysqli_query($conexao, $SQL) or die("Erro no banco de dados.");
    $dados = mysqli_fetch_array($result_id);

    // Dados do id do cliente e id do produto são capturados para que seja possível filtrar e trabalhar com produtos em específico e com um cliente em específico ao mesmo. A quantidade é capturada para que possamos adicionar e modificar a mesma em um carrinho já existente, uma vez que o cliente pode desejar comprar mais de uma quantidade de um mesmo produto já registrado
    $idc =  $dados["id_clientes"];
    $idp = $_GET["id_produtos"];
    $quantidade = $_POST["quantidade"];

    // Após o cadastro do produto em um carrinho, esse comando irá selecionar o id do carrinho gerado e a quantidade que o usuário selecionou para comprar
    $comando="SELECT id_carrinhos, quantidade FROM tb_carrinhos WHERE tb_clientes_id_clientes=".$idc." AND tb_produtos_id_produtos=".$idp;
   
    // Comando utilizado para selecionar id e quantidade de um carrinhos filtrados, retornando as linhas registradas
    $resultado=mysqli_query($conexao,$comando);
    $carrinhoRetornado=mysqli_fetch_assoc($resultado);
    //$carrinhoRetornado['quantidade']
    $linhas=mysqli_num_rows($resultado);

    // Se não existem linhas == 0, ele seleciona o id, preço e nome dos produtos com base no id que capturamos anteriormente. Com id de produtos do GET e o id de produtos que foi coletado, o programa vê se não existe mais de um registro com um mesmo id de produto para não ter que gerar um cadastro a mais.
    if($linhas==0){   

    $sql = "SELECT preco_produtos, nome_produtos, id_produtos FROM tb_produtos WHERE id_produtos = '$idp' ";
    $resultado = mysqli_query($conexao, $sql);

    while($registro_produtos=mysqli_fetch_array($resultado)){
        $id_produtos=$registro_produtos["id_produtos"];
        $nome_produtos=$registro_produtos["nome_produtos"];
        $preco_produtos=$registro_produtos["preco_produtos"];   
    }



     if($idp==$id_produtos ){
      mysqli_query($conexao,"INSERT INTO tb_carrinhos(tb_produtos_id_produtos,preço_individual, tb_clientes_id_clientes, nome_dos_produtos, quantidade) VALUES ('$idp', '$preco_produtos', '$idc', '$nome_produtos', '$quantidade')");
      header("location: ../carrinho_compras.php");
     }

}else{
    // Caso exista dois registros com mais de um id de produto, ele irá acrescentar a quantidade informada na tela de compra de produto individual para que se possa acrescentar a nova quantidade à antiga quantidade, apenas a atualizando.
    $quantidadeFinal= $carrinhoRetornado['quantidade'] + $quantidade ;
    $comando_att= "UPDATE tb_carrinhos SET quantidade='$quantidadeFinal' WHERE tb_produtos_id_produtos='$idp' AND tb_clientes_id_clientes='$idc'";
    mysqli_query($conexao,$comando_att);
    header("location: ../carrinho_compras.php");
}        

        // Em ambas ocasiões a tela será direcionada para o carrinho de compras.
     
?>  