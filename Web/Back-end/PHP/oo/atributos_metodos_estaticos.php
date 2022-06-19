<?php

    class Exemplo 
    {
        public $texto = 'Não sou estático';
        public static $texto2 = 'SOU estático';

        public function metodo() {
            echo 'Método NÃO estático';
        }

        public static function metodo2() {
            echo 'Método ESTÁTICO';
        }
    }

    //Para acessar métodos/atributos estáticos é necessário usar o operador de resolução de objetos (::)
    //E vale citar que não é possível acessar métodos/atributos estáticos pela seta (->), apenas pelo (::)

    $x = new Exemplo();

    echo $x->texto;

    echo '<br/>';

    $x->metodo();

    echo '<br/>';

    //E também não é necessário instanciar para chamar estáticos

    echo Exemplo::$texto2;

    echo '<br/>';

    Exemplo::metodo2();

    echo '<br/>';

    //Porém puxando estáticos pela seta (->) será gerado um erro.

    echo $x->texto2;

?>