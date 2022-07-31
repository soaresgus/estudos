<?php
    //include 'header.html'; //Include = Está incluindo um arquivo (html/php) dentro da página.
    //require 'header.html'; //Require = Está incluindo um arquivo (html/php) dentro da página.

    //include_once 'header.html';
    require_once 'header.html';

    //Porém, a maior diferença é que caso o include não encontre o arquivo, a página continua sendo escrita
    //Já no require, a página não é escrita, a página para do require para baixo.
    
    echo '<br/>';
?>

conteúdo index

<?php
    require_once 'header.html'; 
    //Já utilizando o require_once ou include_once só é possível usar o arquivo UMA vez, não podendo
    //ser chamado novamente por outro require once

    echo '<br/>';
?>