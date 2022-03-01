<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

    <body>
        <?php
            
            //$lista_frutas = array('Abacaxi', 'Tomate', 'Abacate', 'Banana');
            $lista_frutas = ['Abacaxi', 'Tomate', 'Abacate', 'Banana'];

            $lista_frutas[] = 'Uva'; //Insere um novo elemento no array

            echo '<pre>';
            print_r($lista_frutas);
            echo '</pre>';

            //Array MULTIDIMENSIONAL - Arrays dentro de arrays

            $lista_coisas = [];
            $lista_coisas['Frutas'] = ['Abacaxi', 'Tomate', 'Banana'];
            $lista_coisas['Pessoas'] = ['José', 'Maria', 'Cleber'];

            echo '<pre>';
            print_r($lista_coisas);
            echo '</pre>';

            //Metódos de pesquisa para arrays

            //in_array('objeto', array); //Retorna true ou false
            //array_search('objeto', array) //Retorna o indice do objeto

            echo in_array('Tomate', $lista_frutas); //True = 1 / False = vazio
            echo '<br/>';
            echo array_search('Banana', $lista_frutas); //Retorna o indice (1);
        ?>
    </body>

</html>