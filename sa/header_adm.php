<header>
    <style>
        main{
            margin-left: 180px;
            padding-top: 24px;
        }
        .produto{
            float: left;
            width: 10%;
        }
        .cabecalho{
            width: calc(100% - 180px);
            float: right;
        }
            /*após chegar em 360px ele tera display="none*/
            @media (max-width: 600px){  
                .cabecalho_menu_adm{
                    display: none;
                    width: 0;
                    height: 0;
                }
                main{
                    margin-left: 0;
                    padding-top: 0;
                }
                .cabecalho{
                    width: 100%;
                    float: right;
                }
            }
    </style>

    <div class="cabecalho">
        <div class="cabecalho_usuario">
            <img class="img_usuario" onclick='location.href="login_administradores.php"'><label><?php include "funcoes/administrador.php"?></label>
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
    </div>
    </div>
    
    <ul class="cabecalho_menu_adm">
        <li><img class="img_icon" src="img/hamburgerButtomLight.png"><button onclick="location.href='home_adm.php';" type="button">Home</button></li>
        <?php
            //Minha Conta
            if(isset($_SESSION['id_administradores'])){
                echo '<li><img class="img_icon" src="img/user.png"><button onclick=location.href="minha_conta_administradores.php"; type="button">Minha Conta</button></li>';
            }
            else{
                echo '<li class="disabled_content"><img class="img_icon" src="img/user.png"><button type="button">Minha Conta</button></li>';
            }
        ?>
        <hr>

        <li><img class="img_icon" src="img/addProduto.png"><button onclick="location.href='cadastro_produtos.php'" type="button">Cadastrar Produto</button></li>


        <li><img class="img_icon" src="img/addProvider.png"><button onclick="location.href='cadastro_fornecedor.php'" type="button">Cadastrar Fornecedor</button></li>
        <li><img class="img_icon" src="img/documento.png"><button onclick="location.href='relatorio.php'" type="button">Relatórios</button></li>
        <li><img class="img_icon" src="img/documento.png"><button onclick="location.href='relatorio.php'" type="button">Estoque</button></li>
        <hr>
        <li><img class="img_icon" src="img/documento2.png"><button onclick="location.href='consulta_perfil_clientes.php'" type="button">Consulta de Clientes</button></li>
        <li><img class="img_icon" src="img/documento2.png"><button onclick="location.href='consulta_administradores.php'" type="button">Consulta de Administradores</button></li>
        <li><img class="img_icon" src="img/documento2.png"><button onclick="location.href='consulta_produtos.php'" type="button">Consulta de Produtos</button></li>
        <li><img class="img_icon" src="img/documento2.png"><button onclick="location.href='consulta_fornecedores.php'" type="button">Consulta de Fornecedores</button></li>
        <hr>
        <?php
            //Comunicar
            if(isset($_SESSION['id_administradores'])){
                echo '<li><img class="img_icon" src="img/documento.png"><button onclick=location.href="comunicar.php"; type="button">Comunicar</button></li>';
            }
            else{
                echo '<li class="disabled_content"><img class="img_icon" src="img/documento.png"><button type="button">Comunicar</button></li>';
            }
        ?>
        <li><img class="img_icon" src="img/produto.png"><button onclick="location.href='home.php'" type="button">Acessar loja como cliente</button></li>
        <li><img class="img_icon" src="img/sair.png"><button onclick="location.href='funcoes/deslogar_administradores.php'">Sair</button></li>
    </ul>
</header>