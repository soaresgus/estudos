<?php

    //Interfaces pode ser entendido como uma regra/protocolo que deve ser seguido por uma classe
    //apartir do momento em que essa interface é implementada na classe

    interface EquipamentoInterface
    {
        public function ligar();
        public function desligar();
    }//Então estou dizendo que todas as classes que implementarem essa interface terão que ter esses métodos
    //Independente de sua estrutura, porém, com o mesmo nome de declaração.

    class Geladeira implements EquipamentoInterface //é implementado pela palavra reservada 'implements'
    {
        public function ligar()
        {
            echo 'Ligar';
        }

        public function desligar()
        {
            echo 'Desligar';
        }
    }

    class TV implements EquipamentoInterface
    {
        public function ligar()
        {
            echo 'Ligar';
        }
    }

    $geladeira = new Geladeira();
    $tv = new TV();

    //Percaba que a TV irá gerar um erro, pois possui apenas 1 de 2 métodos.

?>