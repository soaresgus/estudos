<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

    <body>
        <?php
            $texto = 'olá, Marcondes! Como andas?';

            echo strtoupper($texto); //Retorna a string toda maiúscula
            echo '<br/>';
            echo strtolower($texto); //Retorna a string toda minúscula
            echo '<br/>';
            echo ucfirst($texto); //Transforma o primeiro caracterece da string em maiúsculo
            echo '<br/>';
            echo strlen($texto); //Retorna a quantidade de caracteres
            echo '<br/>';
            echo str_replace('andas', 'está', $texto); //Substitui strings
            echo '<br/>';
            echo substr($texto, 6, 9); //Anda caracteres pra frente apartir de uma posição
            echo '<br/>';
            echo '<br/>';
        ?>
    </body>

</html>