<?php

    //Está solicitando para o nosso script os arquivos lib1 e lib2, ambos possuem um namespace de nomes diferentes (A e B)
    require './namespaces/lib1/lib1.php';
    require './namespaces/lib2/lib2.php';

    use A\Cliente; //Está dizendo que a classe Cliente será do namespace A
    use B\Cliente as Cliente2; //Estou dizendo que agora o Cliente do namespace B será chamado de Cliente2 (aliases);

    $clienteA = new Cliente();
    $clienteB = new Cliente2();

    echo $clienteA->__get('nome');
    echo $clienteB->__get('nome');

?>