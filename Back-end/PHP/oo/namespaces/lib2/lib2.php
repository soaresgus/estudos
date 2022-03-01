<?php

    namespace B;

    class Cliente
    {
        public $nome = 'Maria';

        public function __get($name)
        {
            return $this->$name;
        }
    }

?>