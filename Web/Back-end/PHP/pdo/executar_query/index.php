<?php

   $dsn = 'mysql:host=localhost;dbname=udemy_pdo';
   $user = 'root';
   $pass = '';
   
   try {

        $pdo = new PDO($dsn, $user, $pass);

        $query = 'SELECT * FROM tb_usuarios';

        $consulta = $pdo->query($query); //O comando query ele executa a query
        //$retorno = $consulta->fetchAll(); //Retorna todos os registros da query

        //O fetchAll sem nenhum parâmetro retorna duas formas de acessar os dados do array, número, e associativa
        //Exemplo: 
        //[id] => 1
        //[0] => 1

        $retorno = $consulta->fetchAll(PDO::FETCH_ASSOC); //Para retornar indices associativos
        //Recuperar: $retorno[i]['id'];

        //$retorno = $consulta->fetchAll(PDO::FETCH_NUM) //Para retornar indices númericos
        //$retorno = $consulta->fetchAll(PDO::FETCH_BOTH) //Para retornar os dois juntos

        //$retorno = $consulta->fetchAll(PDO::FETCH_OBJ) //Para retornar um objeto
        //Vale citar que para objetos o dado será recuperado assim:
        //$retorno[i]->id;

        //E para retornar um único registro se usa:
        //$retorno = $consulta->fetch(PDO::...);

        /*echo '<pre>';
        print_r($retorno);
        echo '</pre>';*/

        foreach($retorno as $usuario) {
            echo $usuario['nome'] .' ';
        }
               
    } catch(PDOException $e) {
        echo 'Falha na conexão do PDO com o banco de dados - Código: '. $e->getCode() .' - Mensagem: '. $e->getMessage();
    }

?>