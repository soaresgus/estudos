<?php
    $dsn = 'mysql:host=localhost;dbname=xudemy_pdo';
    $user = 'root';
    $pass = '';

    //Tratando erros (PDOException)
    
    try {
        $conexao = new PDO($dsn, $user, $pass);
        
    } catch(PDOException $e) {
        echo 'Falha na conexão do PDO com o banco de dados - Código: '. $e->getCode() .' - Mensagem: '. $e->getMessage();
    }

?>