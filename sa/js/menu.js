//Primeiro click = visivel, Segundo click = invisivel
var click = true;

function menu(x){
    switch(x){
        case 'menu':
            var menu = document.querySelector(".menu");

            if(click == true){
                menu.style.display = "block";
                click = false;
            }
            else{
                menu.style.display = "none";
                click = true;
            }
            break;

        case 'categorias-over':
            var categorias = document.querySelector(".categorias");
            
            categorias.style.display = "block";
            break;
            
        case 'categorias-out':
            var categorias = document.querySelector(".categorias");
            
            categorias.style.display = "none";
            break;

        default:
            break;
    }
}