<?php

    //Para estabelecer uma conexão a um banco de dados por PDO é necessário a seguinte estrutura

    $dsn = 'mysql:host=localhost;dbname=udemy_pdo';
    //É passado o prefixo do banco (mysql), o endereço do banco (localhost), e o nome da database (udemy_pdo)

    $user = 'root'; //Usuário de acesso

    $pass = ''; //Senha de acesso

    $conexao = new PDO($dsn, $user, $pass);
    //Primeiro parâmetro = DSN (Data Source Name) = Nome da fonte de dados
    //Segundo parâmetro = Usuário de acesso
    //Terceiro parâmetro = Senha de acesso

?>