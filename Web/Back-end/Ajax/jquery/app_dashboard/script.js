//No JQuery existem 3 métodos para controlar o Ajax:
//$(seletor).load(url) - Carrega a resposta, que por padrão faz uma requisição GET

//$.get() - Retorna a resposta por callback, mas o get é passado de forma menos segura
//$.post() - Retorna a reposta por callback

//$.ajax() - Configurar de forma mais avançada

$(document).ready(() => {
	$('#documentacao').click(() => {
        //$('#pagina').load('documentacao.html'); //Request Ajax

        /*
        $.get('documentacao.html', data => { //Data = responseText
            $('#pagina').html(data);
        });
        */

        $.post('documentacao.html', data => {
            $('#pagina').html(data);
        })
    });

    $('#suporte').click(() => {
        $('#pagina').load('suporte.html');

        /*
        $.get('suporte.html', data => { //Data = responseText
            $('#pagina').html(data);
        });
        */

        $.post('suporte.html', data => {
            $('#pagina').html(data);
        })
    });

    $('#data').on('change', e => {
        
        let data = $(e.target).val();

        $.ajax({ //Objeto literal
            type: 'GET',
            url: 'app.php',
            data: `data=${data}`,
            dataType: 'json',
            success: dados => {
                $('#numeroVendas').html(dados.numero_vendas);
                $('#totalVendas').html(dados.total_vendas);
            },
            error: dados => { console.log(dados) }
        });

        //Método, url, dados, o que fazer caso ocorra sucesso/erro
    });
});