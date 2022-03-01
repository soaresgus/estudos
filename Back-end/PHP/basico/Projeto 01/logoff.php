<?php

    session_start(); //Sempre que for trabalhar com session é necessário essa chamada

    //Remover um índice da session
    //unset($_SESSION['login']);

    //Remover todos indices da session
    session_destroy();
    
    header('Location: index.php');
?>