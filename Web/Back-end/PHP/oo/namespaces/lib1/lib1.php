<?php

    namespace A;

    class Cliente
    {
        public $nome = 'João';

        public function __get($name)
        {
            return $this->$name;
        }
    }

?>