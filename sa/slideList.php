
<!--Slide Cards-->
<div class="slideList">
    <div class="slideList_buttons">
        <button type="button" class="return" onclick="slideList(this)"><img src="img/seta1.png"></button>
        <button type="button" class="next" onclick="slideList(this)"><img src="img/seta2.png"></button>
    </div>
    <ul class="cards">
        <li onclick="Categoria(this)"><i style="display: none;">Plantas Ornamentais e Medicinais</i></li>
        <li onclick="Categoria(this)"><i style="display: none;">Frutas, Verduras e Legumes</i></li>
        <li onclick="Categoria(this)"><i style="display: none;">Sementes</i></li>
        <li onclick="Categoria(this)"><i style="display: none;">Livros</i></li>
        <li onclick="Categoria(this)"><i style="display: none;">Cesta Pré-Montada</i></li>
    </ul>        
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    var cards = Array[''];
    cards = document.querySelectorAll('.cards li');

    var y = 0;
    setList();

    //atribui a visibilidade para o card em foco e remove a visibilidade para os cards que não estão em foco.
    function setList(action){
        for(x = 0; x < cards.length; x++){
            cards[x].style.display = "";
            if(x == y){
                if(cards[y].querySelector('p')){
                    cards[y].querySelector("p").innerHTML = (y+1) +'/'+ cards.length;
                }else{
                    //adiciona um contador para a quantidade itens presentes na ul
                    cards[y].insertAdjacentHTML("afterbegin", "<p></p>");
                }

                //adiciona a imagem de fundo 'backgroundImage' automaticamente seguindo o padrão: 1.jpg, 2.jpg etc...
                cards[y].style.backgroundImage = "url(img/"+ (y+1) +".jpg)";
            }
            else{

                cards[x].style.display = "none";
            }
        }
    }

    //altera o valor para o card que estará em foco.
    function slideList(x){
        if(x.className == "return" && y > 0){
            //return
            y--;
            setList('return');
        }
        else{
            if(x.className == "next" && y < (cards.length - 1)){
                //next
                y++;
                setList('next');
            }
        }
    }
</script>