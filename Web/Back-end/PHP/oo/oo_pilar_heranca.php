<?php

    //O pilar da herança pode ser entendido pela reutilização de métodos e/ou atributos apartir de uma classe pai
    
    class Veiculo
    {
        public $cor = null;
        public $placa = null;

        function acelerar() 
        {
            echo 'Acelereiiiii';
        }
    }

    class Carro extends Veiculo 
    //A partir da palavra reservada 'extends' você está puxando os atributos e/ou métodos da classe 'Veiculo'
    {
        public $tetoSolar = true;

        function __construct($cor, $placa)
        {
            $this->cor = $cor;
            $this->placa = $placa; 
            //Perceba que é como se os atributos cor e placa fizessem parte da classe carro, quando que na verdade
            //faz parte da classe veiculo
        }

        function abrirTetoSolar() 
        {
            echo 'VUMMMMMMM -teto solar aberto-';
        }
    }

    class Moto extends Veiculo
    {
        public $contraPesoGuidao = true;

        function __construct($cor, $placa)
        {
            $this->cor = $cor;
            $this->placa = $placa; 
        }

        function empinar() {
            echo 'Bolololololo PAH';
        }
    }

    $carro = new Carro('Branco', 'ABC1D34');
    $moto = new Moto('Rosa', 'EFG5H67');

    echo '<pre>';
    print_r($carro);
    echo '</pre>';
    
    echo '<hr/>';

    echo '<pre>';
    print_r($moto);
    echo '</pre>';

    echo '<hr/>';

    $carro->abrirTetoSolar();
?>