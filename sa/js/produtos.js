/*
<!--Produto-->
    <article class="produto">
        <h1>ProdutoX</h1>
        <img class="produto_img">
        <div class="produto_inf">
            <label>Preço: R$ </label><br>
            <label>Categoria: </label><br>
            <label>Descrição: </label><br>
        </div>
    </article>
*/

for(x = 0; x <= 100; x++){
    document.querySelector("main").insertAdjacentHTML("afterbegin", "<article class='produto'><h1>ProdutoX</h1><img class='produto_img'><div class='produto_inf'><label>Preço: R$ </label><br><label>Categoria: </label><br><label>Descrição: </label><br></div></article>");
}
