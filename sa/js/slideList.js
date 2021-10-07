var cards = Array[''];
cards = document.querySelectorAll('.cards li');

pointsSet = false;

var y = 0;
setList();

//atribui a visibilidade para o card em foco e remove a visibilidade para os cards que não estão em foco.
function setList(){
    for(var x = 0; x < cards.length; x++){
        cards[x].style.display = "";

        setPoint();

        if(x == y){
            if(cards[y].querySelector("p")){
                cards[y].querySelector("p").innerHTML = (y+1) +'/'+ cards.length;
            }
            else{
                //adiciona um contador para a quantidade itens presentes na ul
                cards[y].insertAdjacentHTML("afterbegin", "<p></p>");
                cards[y].querySelector("p").innerHTML = (y+1) +'/'+ cards.length;
            }

            //adiciona a imagem de fundo 'backgroundImage' automaticamente seguindo o padrão: 1.jpg, 2.jpg etc...
            cards[y].style.backgroundImage = "url(img/"+ (y+1) +".jpg)";
        }
        else{
            cards[x].style.display = "none";
        }
    }
}

function setPoint(z){
    var points = Array[''];
    points = document.querySelectorAll('.points li');

    if(pointsSet == false){
        document.querySelector(".points").insertAdjacentHTML("afterbegin", "<li onclick='setPoint(this)'></li>");

        if(points.length >= 2){
            pointsSet = true;
            setPoint();
        }
    }
    else{
        if(z){
            for(var x = 0; x < cards.length; x++){
                points[x].style.opacity = "50%";
            }
            z.style.opacity = "100%";
            console.log(z.value);
        }
        else{
            for(var x = 0; x < cards.length; x++){
                points[x].style.opacity = "50%";
            }
            points[y].style.opacity = "100%";
        }
    }
}

//altera o valor para o card que estará em foco.
function slideList(x){
    if(x.className == "return" && y > 0){
        //return
        y--;
    }
    else{
        if(x.className == "next" && y < (cards.length - 1)){
            //next
            y++;
        }
    }
    setList();
}