<?php

    try {
        //pg_query(null, 'Select * from contatos'); //Gerando erro
        echo 'Não deu erro</br>';

        if(!file_exists('arquivo_random_a')) {
            throw new Exception('O arquivo em questão não existe');
        }

    } catch(Error $e) { //Caso o erro aconteça
        echo 'Deu erro</br>';
    } catch(Exception $e) {
        echo 'Deu erro</br>';
        echo $e;
    } finally {
        //Sempre acontecerá, dando erro ou não
        echo 'Finally</br>';
    }
    

?>