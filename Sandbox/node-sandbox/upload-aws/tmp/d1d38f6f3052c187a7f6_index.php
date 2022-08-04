<?php

$dsn = 'mysql:host=localhost;dbname=sandbox';
$user = 'root';
$pass = '';

try {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');
/*     header('Content-Type: application/json'); */

    print_r($_POST);
    $pdo = new PDO($dsn, $user, $pass);

    $query = "INSERT INTO usuarios(texto, sobrenome) VALUES (:texto, 'César')";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':texto', $_POST);
    $stmt->execute();
    /* $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC); */

    /*         $data = $retorno;

    die(json_encode($data)); */

} catch (PDOException $e) {
    echo 'Falha na conexão do PDO com o banco de dados - Código: ' . $e->getCode() . ' - Mensagem: ' . $e->getMessage();
}
