<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-default.css">
    <title>Comunicar</title>
</head>
<body>
    <div class="opcoes_comunicar">
        <h2>Comunicar</h2>
        <button type="button" onclick="opcao(this)">Gerente</button>
        <button type="button" onclick="opcao(this)">Funcionario</button>
        <button type="button" onclick="opcao(this)">Fornecedor</button>
        <button class="voltar_button" onclick="history.go(-1);">Voltar</button>
    </div>

    <form action="" type="submit">
        <div class="campo_comunicar" value="">
            <h2>Comunicar</h2>

            <div>
                <label for="nome_usuarios">Nome:</label>
                <input type="text" class="nome" name="nome_funcionarios"/>
            </div>

            <div>
                <label for="user_usuarios">ID</label>
                <input type="number" class="id"  name="id_funcionarios"/>
            </div>

            <textarea placeholder="Digite aqui a sua mensagem"></textarea>

            <div class="buttons_comunicar">
                <button type="button" onclick="opcao(this)">Voltar</button>
                <button type="button" onclick="opcao(this)">Enviar</button>
            </div>

            <br>
            <p></p>
        </div>
    </form>
</body>
</html>

<script>
        var comunicar = document.querySelector(".campo_comunicar");
        comunicar.style.display = "none";

        function opcao(x){

            switch(x.innerHTML){
                case 'Voltar':
                    comunicar.style.display = "none";
                    break;

                case 'Enviar':
                    comunicar.querySelector("p").style.color = "green";
                    comunicar.querySelector("p").innerHTML = "Mensagem Enviada.";
                    break;

                default:
                    comunicar.querySelector("h2").innerHTML = "Comunicar "+ x.innerHTML;
                    comunicar.querySelector("p").innerHTML = "";
                    comunicar.style.display = "";
                    break;
            }
        }
</script>