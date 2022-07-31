<?php

   $dsn = 'mysql:host=localhost;dbname=udemy_pdo';
   $user = 'root';
   $pass = '';
   
   try {

        $conexao = new PDO($dsn, $user, $pass);

        $query = 'CREATE TABLE IF NOT EXISTS tb_usuarios(
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            nome VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL,
            senha VARCHAR(32) NOT NULL
        );';

        $retorno = $conexao->exec($query);
        echo $retorno;

        //O exec é pouco utilizado pois ele retorna apenas quantos registros foram modificados
        //Ou seja, retorna um número e não o registro exatamente.
        
        
    } catch(PDOException $e) {
        echo 'Falha na conexão do PDO com o banco de dados - Código: '. $e->getCode() .' - Mensagem: '. $e->getMessage();
    }

?>