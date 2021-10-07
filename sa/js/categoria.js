function Categoria(x){
    if(x.querySelector('i')){
        window.location = 'categorias.php?categoria='+ x.querySelector('i').innerHTML;
    }
    else{
        window.location = 'categorias.php?categoria='+ x.innerHTML;
    }
}