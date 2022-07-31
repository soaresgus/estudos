<?php
    
    session_start(); 
    //SESSION - Armazena um dado na sessão do navegador, no qual posso acessar em qualquer script pela global $_SESSION

    $autentificado = false;

    $usuarios_array = [ //Simulando os usuários de um banco de dados
        ['id' => 1, 'email' => 'teste@admin.com', 'senha' => '123', 'cargo' => 1],
        ['id' => 2, 'email' => 'ninja@admin.com', 'senha' => '123', 'cargo' => 1],
        ['id' => 3, 'email' => 'joao@user.com', 'senha' => '123', 'cargo' => 0],
        ['id' => 4, 'email' => 'maria@user.com', 'senha' => '123', 'cargo' => 0],
    ];

    foreach($usuarios_array as $usuarios) { //Percorre todos os elementos do array
        if($usuarios['email'] == $_POST['email'] && $usuarios['senha'] == $_POST['senha']) {
            $autentificado = true;
            $id = $usuarios['id'];
            $cargo = $usuarios['cargo'];
        }
    }

    if($autentificado) {
        $_SESSION['login'] = true; //Definindo um parâmetro para o objeto 'login' do array SESSION
        $_SESSION['id'] = $id;
        $_SESSION['cargo'] = $cargo;
        header('Location: home.php');
    }else {
        $_SESSION['login'] = false;
        header('Location: index.php?login=erro'); //Está enviando o usuário novamente ao index
    }

?>