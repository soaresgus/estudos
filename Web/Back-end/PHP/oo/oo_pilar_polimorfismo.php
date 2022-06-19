<?php

    //O pilar do polimorfismo pode ser entendido como a reescrita de métodos extendidos de classes pais em classes filhos
    
    class Veiculo
    {
        public $cor = null;
        public $placa = null;

        function acelerar() 
        {
            echo 'Acelereiiiii';
        }

        function trocarMarcha() 
        {
            echo 'Embreagem com o pé e marcha com a mão';
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

        function trocarMarcha()
        //Percaba que esse método já existe na classe veiculo, porém estou reescrevendo na classe moto
        //Então nesse caso o método principal da classe moto será esse, e não o da classe veículo
        {
            echo 'Embreagem com a mão e marcha com o pé.';
        }
    }

    $carro = new Carro('Branco', 'ABC1D34');
    $moto = new Moto('Rosa', 'EFG5H67');

    $carro->trocarMarcha();

    echo '<br/>';

    $moto->trocarMarcha();
?>