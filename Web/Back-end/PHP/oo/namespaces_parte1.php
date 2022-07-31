<?php

   //Namespaces pode ser entendido por um agrupador dentro do código
   //No qual por exemplo, mesmo se existir classes de mesmo nome, por estarem
   //em namespaces diferentes, não irão causar erros

    namespace A;

    class Cliente
    {
        public $nome = 'João';

        public function __get($atr)
        {
            return $this->$atr;
        }
    }

    namespace B; //Então percaba que a partir da palavra reserva 'namespace' eu declaro onde se inicia um agrupamento
    
    class Cliente
    {
        public $nome = 'Maria';

        public function __get($atr)
        {
            return $this->$atr;
        }
    }

    //$cliente = new Cliente(); Nesse exemplo, como eu não falei de qual namespace irei puxar, ele irá puxar do último declarado (B)

    $cliente = new \A\Cliente(); //E para declarar qual namespace quero utilizar (\'nome'\)

    echo $cliente->__get('nome'); 
   
?>