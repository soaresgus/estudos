<?php
  session_start(); //Iniciando a sessão
  
  if((!isset($_SESSION['login'])) || (!$_SESSION['login'])) { //Verificando se o usuário está autentificado
    header('Location: index.php');
  }

?>