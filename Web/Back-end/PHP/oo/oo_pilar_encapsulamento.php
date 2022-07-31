<?php

    //O pilar do encapsulamento pode ser entendido como uma forma de proteção para atributos e/ou métodos

    class Objeto
    {
        public $nome = 'Jorge';
        //Public = Pode ser acessado de qualquer local (Aplicação e/ou Outras classes)

        private $sobrenome = 'Silva'; 
        //Private = Não pode ser acessado de NENHUM local, apenas na própria classe

        protected $idade = 27; 
        //Protected = Não pode ser acessado na aplicação, MAS pode ser acessado em outras classes (herança)

        public function getSobrenome() 
        //Um exemplo para pegar o valor de um atributo privado pode ser uma função publica
        {
            return $this->sobrenome;
        }   
        
        /*
        public function __get($atributo)
        {
            return $this->$atributo;
        }
        */
    }

    class ObjetoFilho extends Objeto //Perceba que apenas os atributos PUBLIC e PROTECTED serão extendidos
    {
        public $nome = 'Rodrigo';
        public $altura = 1.70;

        public function setIdade($idade) {
            $this->idade = $idade;
        }
    }

    /*
    $pessoa = new Objeto();

    echo $pessoa->getSobrenome();
    
    //echo $pessoa->sobrenome; //Como é privado/protected não é possível nem editar e nem puxar seu valor DIRETAMENTE

    //POREEEEEEM, se eu tiver um método de overloading GET, o PHP tem a inteligência para puxar o atributo PRIVADO
    //pelo método get.
    //Ou seja, isso escrito acima, é o mesmo que isso:
    //echo $pessoa->__get('sobrenome');
    */

    $pessoaFilho = new ObjetoFilho();

    echo '<pre>';
    print_r($pessoaFilho); 
    //Mesmo que o objeto PRIVATE apareça como atributo do ObjetoFilho, ele só pode ser acessado no ObjetoPai
    echo '</pre>';
    
    $pessoaFilho->setIdade(18);

    echo '<pre>';
    print_r($pessoaFilho); 
    echo '</pre>';
    
?>