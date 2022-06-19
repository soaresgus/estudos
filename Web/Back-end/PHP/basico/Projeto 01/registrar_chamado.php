<?php

    session_start();

    $arquivo = fopen('../../projeto_01/bd.hd', 'a'); 
    //fopen = Função para abrir um arquivo de texto ou cria-lo caso não existe
    //O segundo parâmetro (a) foi passado pois abriu o arquivo apenas para escrita
    
    $texto = str_replace('#', '-', $_POST);

    fwrite($arquivo, implode('#', $texto).'#'.$_SESSION['id'].PHP_EOL); //Escrevendo no arquivo
    //PHP_EOL, define qual é o caracter de pular linha dependendo do sistema
    //Exemplo: \n

    fclose($arquivo); //Fechando o arquivo

    header('Location: abrir_chamado.php');

?>