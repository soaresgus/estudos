<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

    <body>
        <?php

            $array = ['Abacaxi', 'Tomate', 'Abacate', 'Banana'];
            $array2 = ['Goiaba', 'Manga', 'Uva', 'Melancia'];


            /*if(is_array($array)) { //Verifica se a váriavel é um array (true/false)
                echo 'é um array';
            }else {
                echo 'hão é um array';
            }

            echo '<br>';
        
            print_r(array_keys($array)); //Retorna as chaves (indices) de um array

            echo '<br>';

            echo '<pre>';
            print_r($array);
            echo '<pre/>';

            sort($array); //Ordena o array em ordem alfabética e arruma os indices de acordo com a organização

            echo '<pre>';
            print_r($array);
            echo '<pre/>';

            echo count($array); //Retorna a quantidade de elementos do array

            $novo_array = array_merge($array, $array2); //Junta os arrays em um único

            echo '<pre>';
            print_r($novo_array);
            echo '<pre/>';*/

            $data = '26/04/2020';

            $explode = explode('/', $data); 
            //Transforma os elementos de uma string em um array, removendo o delimitador (/) (Similar ao split do JS);

            echo '<pre>';
            print_r($explode);
            echo '<pre/>';

        ?>
    </body>

</html>