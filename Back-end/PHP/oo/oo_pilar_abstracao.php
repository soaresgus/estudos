<?php

    //O pilar da abstração pode ser entendido pela visualização que você possui, como o que é necessário, 
    //apartir de um modelo.

    //Modelo
    class Funcionario
    {
        //Atributos
        public $nome = 'José';
        public $telefone = '11 99999-8888';
        public $numFilhos = 2;

        //Getters e Setters
        //Vale citar que o PHP não possuí métodos padrões para get e set, porém
        //como convenção o nome do método é escrito dessas formas:

        function setNome($nome) 
        {
            $this->nome = $nome;
        }

        function setNumFilhos($numFilhos) 
        {
            $this->numFilhos = $numFilhos;
        }

        function getNome() 
        {
            return $this->nome;
        }

        function getNumFilhos() 
        {
            return $this->numFilhos;
        }

        //Getters e Setters overloading
        //é uma boa prática de usar get ou set de forma dinâmica

        function __set($atributo, $valor) 
        { //Como boa prática o nome do método se utiliza dois underline no íncio (__)
            $this->$atributo = $valor;
        }

        function __get($atributo) 
        {
            return $this->$atributo;
        }

        //Métodos
        function resumoFuncionario() 
        {
            return $this->__get('nome').' possuí '.$this->__get('numFilhos').' filhos';
            //return $this->getNome().' possuí '.$this->getNumFilhos().' filhos';
            //return $this->nome.' possuí '.$this->numFilhos.' filhos';
        }

        function modificarNumFilho($numFilhos) 
        {
            $this->numFilhos = $numFilhos;
        }
    }

    $func1 = new Funcionario();

    echo $func1->resumoFuncionario();
    $func1->__set('numFilhos', 5);
    echo '<br/>';
    echo $func1->resumoFuncionario();
    echo '<br/>';
    echo $func1->__get('telefone');

?>