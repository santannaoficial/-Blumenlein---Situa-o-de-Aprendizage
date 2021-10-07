<!--ADICIONA AS MASCARAS PARA OS CAMPOS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/jQuery-Mask-Plugin/src/jquery.mask.js"></script>
<script>
    var campo = ['', ''];
    campo = document.querySelectorAll(".conteudo-painel .campo");
        
    for(var i = 0; i < campo.length; i++){
        if(campo[i].querySelector('label').innerHTML == "CPF:"){
            //CPF
            $(campo[i].querySelector('input')).mask('000.000.000-00');
            campo[i].querySelector('input').placeholder = "000.000.000-00";
        }

        if(campo[i].querySelector('label').innerHTML == "Número do Cartão:"){
            //Carão de Crédito
            $(campo[i].querySelector('input')).mask('0000-0000-0000');
            campo[i].querySelector('input').placeholder = "0000-0000-0000";
        }

        if(campo[i].querySelector('label').innerHTML == "Telefone:"){
            //Telefone
            $(campo[i].querySelector('input')).mask('(00) 00000-0000');
            campo[i].querySelector('input').placeholder = "(00) 00000-0000";
        }

        if(campo[i].querySelector('label').innerHTML == "Senha:"){
            //Senha
            $(campo[i].querySelector('input')).mask('00000000000000');
        }

        if(campo[i].querySelector('label').innerHTML == "E-mail:"){
            //Email
            campo[i].querySelector('input').placeholder = "nome@exemplo.com";
        }

        if(campo[i].querySelector('label').innerHTML == "Preço"){
            //Preço
            campo[i].querySelector('input').placeholder = "R$ 00.00";
        }

        if(campo[i].querySelector('label').innerHTML == "Código CVV:"){
            //CVV
            $(campo[i].querySelector('input')).mask('000');
            campo[i].querySelector('input').placeholder = "000";
        }

    }
</script>