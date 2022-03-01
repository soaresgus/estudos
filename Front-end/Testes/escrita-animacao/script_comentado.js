function cursorAnimation(cursor_id, texto_id, segundos_escrita) 
{
    //Puxa o texto que será digitado ANTES de ser limpo.
    let texto_content = document.getElementById(texto_id).textContent; 
    
    //Limpa o texto, pois como queremos escrever, não pode estar aparecendo
    document.getElementById(texto_id).textContent = '';

    //Transforma o nosso texto (texto_content) em um array, dividindo letra por letra
    //Para isso é usado o operador rest/spread (...), que ele dependendo do contexto une ou separa elementos
    //Nesse caso ele está separando elementos, desse caso, elementos do nosso texto, e levando a um array

    //Para mais info pesquise: Operador Rest/Spread JavaScript
    let letras = [...texto_content];

    //Declaração para controlar o temporizador
    let i = 0;
    
    //Puxando o cursor pelo seu ID
    let cursor = document.getElementById(cursor_id);
    
    //Criado um intervalo de tempo, que de certo em certo tempo será chamado, até ser encerrado
    let timer = setInterval(() => {
        //Aqui está pegando o conteúdo textual do elemento já apagado,
        //a cada certo tempo ele adiciona uma letra do array, apartir da váriavel 'i'
        //que de tempo em tempo aumenta em +1 (i++).
        document.getElementById(texto_id).textContent += letras[i];

        //Aqui está movendo o marginLeft do cursor, a partir do tamanho do elemento (offsetWidth).
        //Pois a cada letra adicionada um tamanho é declarado, ficando maior, 
        //então assim o cursor anda junto com o tamanho do texto
        cursor.style.marginLeft = `${document.getElementById(texto_id).offsetWidth}px`;

        //Aumentando a variável de controle (i)
        i++;

        //E quando o i for maior ou igual a quantidade de letras da palavra o timer para
        if(i >= letras.length) {
            clearInterval(timer);
        }
    }, segundos_escrita*1000);
}

//Chamada da função (id do cursor, id do texto, tempo de cada letra)
cursorAnimation('cursor', 'escrita', 0.1);