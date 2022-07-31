<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

    <body>
        <?php
            //Tipos: string, boolean, int, float, array
            //Mas vale citar que não precisa citar o tipo da váriavel
            //O PHP é case sensitive!

            //Para declarar uma váriavel o nome precisa começar com dolar ($)
            //E regras de declaração continua

            //Variáveis

            $nome = 'Marcelo';
            $idade = 14;
            $altura = 1.75;
            $vivo = true;
            $idade = 16;

            //Concatenação (ponto (.) ao invés de mais (+))

            echo 'Olá '.$nome.', vi que possui '.$idade.' anos!';

            echo '<br/>';

            //Porém, existe uma forma mais rápida, usando as aspas duplas (parecido com a crase do ES6)

            echo "Olá $nome, vi que possui $idade anos!";
        
            echo "<br/>";

            //Já com aspas simples isso não é possível
            echo 'Olá $nome, vi que possui $idade anos!';


            //Variáveis constantes (engessadas)
            //Variáveis constantes são variáveis na qual seu valor não pode ser editado

            //define('nome', 'valor') - Assim é feito a declaração de constantes.

            define('BD_USUARIO', 'ninja137'); //é uma boa prática variáveis constantes serem de nome maiúsculo
            define('BD_SENHA', 'kkkjoasenhaai');

            define('BD_SENHA', 'teste123'); //Irá gerar um erro

            echo '<br/>'.BD_USUARIO.'<br/>';
            echo BD_SENHA.'<br/>';

            //Casting de variáveis (mudança de tipo)

            $peso = 50;
            $peso2 = (string) $peso2;

            //gettype() - Retorna o tipo da variável

            echo gettype($peso);
            echo '<br/>';
            echo gettype($peso2);
            echo '<br/>';
            echo gettype((float) $peso2);
            
        ?>

        <h1>Nome: <?=$nome?></h1>
        <h1>Idade: <?php echo $idade?></h1>
        <h1>Altura: <?=$altura?></h1>
        <h1>Vivo: <?=$vivo?></h1>
    </body>

</html>