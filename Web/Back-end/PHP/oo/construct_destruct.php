<?php

   class Pessoa 
   {
      public $nome = null;

      function __construct($nome) //Ele é sempre executado quando o objeto é instanciado (criado)
      {
         $this->nome = $nome;
      }

      /*function __destruct() //Executado sempre para a exclusão do objeto, se ele foi chamado, ele será executado
      {
         echo '<br/>Objeto excluido';
      }*/
   }

   $pessoa = new Pessoa('João'); //Percaba que os parâmetros solicitados no construct são passado aqui
   echo "Olá, $pessoa->nome";

?>