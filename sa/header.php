<header>
    <div class="cabecalho">
        <div class="cabecalho_menu" onclick="menu('menu')">
            <img>
        </div>
        <div class="cabecalho_busca">
            <input name="busca" type="search" placeholder="Produtos ou categorias">
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <g id="XMLID_1_">   
                        <path id="XMLID_5_" d="M501.9,453.7L371.9,323c23.6-33.1,37.8-74,37.8-118.2C409.7,91.4,317.6,0,204.9,0S0.1,92.2,0.1,204.8   s92.2,204.8,204.8,204.8c44.1,0,85.1-14.2,118.2-37.8l130.8,130c6.3,7.1,15.8,10.2,23.6,10.2s18.1-3.2,23.6-10.2   C515.3,488.4,515.3,467.1,501.9,453.7L501.9,453.7z M204.9,365.5c-88.2,0-160.7-71.7-160.7-160.7S115.9,44.1,204.9,44.1   s160.7,71.7,160.7,160.7S293.2,365.5,204.9,365.5z"/>
                    </g>
                </svg>
                Buscar
            </button>
        </div>
        <div class="cabecalho_usuario">
            <img class="img_usuario" onclick='location.href="login_clientes.php"'><label><?php include "funcoes/cliente.php"?></label>
        </div>
    </div>
    
    <div class="menu">
        <ul class="itens">
            <li onclick="location.href='home.php';">Home</li>
            <?php
                //Minha Conta
                if(isset($_SESSION['id_clientes'])){
                    echo '<li onclick=location.href="minha_conta.php";>Minha conta</li>';
                }
                else{
                    echo '<li class="disabled_text">Minha conta</li>';
                }

                //Meus Pedidos
                if(isset($_SESSION['id_clientes'])){
                    echo '<li onclick=location.href="pedidos.php";>Meus Pedidos</li>';
                }
                else{
                    echo '<li class="disabled_text">Meus Pedidos</li>';
                }

                //Carrinho de Compras
                if(isset($_SESSION['id_clientes'])){
                    echo '<li onclick=location.href="carrinho_compras.php";>Carrinho de Compras</li>';
                }
                else{
                    echo '<li class="disabled_text">Carrinho de Compras</li>';
                }
            ?>
            <li onmouseover="menu('categorias-over')" onmouseout="menu('categorias-out')">Categorias <a>▸</a></li>
            <hr>
            <li onclick="location.href='funcoes/deslogar_clientes.php';">Sair</li>
            <!--esse link tem que ser mudado assim que a gente criar uma página de saída-->
        </ul>

        <!--SUBCATEGORIAS-->
        <ul class="subitens categorias" onmouseover="menu('categorias-over')" onmouseout="menu('categorias-out')">
            <li onclick="Categoria(this)">Frutas, Verduras e Legumes</li>
            <li onclick="Categoria(this)">Plantas Ornamentais e Medicinais</li>
            <li onclick="Categoria(this)">Sementes</li>
            <li onclick="Categoria(this)">Livros</li>
            <li onclick="Categoria(this)">Cesta Pré-Montada</li>
        </ul>
        <script type="text/javascript" src="js/categoria.js"></script>
    </div>
    <script lang="javascript" src="js/menu.js"></script>
</header>