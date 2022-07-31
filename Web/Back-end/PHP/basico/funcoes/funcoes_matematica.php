<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

    <body>
        <?php
            $numero = 16.75;

            echo ceil($numero); //Arredonda o número para cima
            echo '<br/>';
            echo floor($numero); //Corta as casas decimais
            echo '<br/>';
            echo round($numero); //Arredonda de forma dinâmica, dependendo das casas decimais
            echo '<br/>';
            echo rand(10, 20); //Gera um número aleatório entre dois limites.
            echo '<br/>';
            echo sqrt($numero); //Retorna a raiz quadrada
            echo '<br/>';

        ?>
    </body>

</html>