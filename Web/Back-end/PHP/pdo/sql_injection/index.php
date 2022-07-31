<?php

    $dsn = 'mysql:root=localhost;dbname=udemy_pdo';
    $user = 'root';
    $pass = '';

    try {
        //SQL Injection, pode ser entendido por o usuário inserir comandos no SQL a partir da entrada de dados
        //e obviamente essa ação será feita por um usuário mal intensionado

        $pdo = new PDO($dsn, $user, $pass);

        $query = 'SELECT * FROM tb_usuarios WHERE ';
        $query .= " email = :email ";
        $query .= " AND senha = :senha ";

        //$stmt = $pdo->query($query)->fetch(PDO::FETCH_ASSOC); - MÉTODO INSEGURO

        //MÉTODO SEGURO ---IMPORTANTE---

        $stmt = $pdo->prepare($query); //Primeiramente prepara a query

        //Após isso, é necessário definir váriaveis para seus dados

        $stmt->bindValue(':email', $_POST['email']); //Nome da váriavel, Dado, (opcional) Tipo de dado
        $stmt->bindValue(':senha', $_POST['senha']);

        $stmt->execute(); //Executa a query tratada
        
        //Agora podemos retornar o dado

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        echo '<pre>';
        print_r($usuario);
        echo '</pre>';

    } catch(PDOException $e) {
        echo $e->getMessage();
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection</title>
</head>

<body>
    
    <form action="index.php" method="post">
        <input type="email" name="email">
        <input type="password" name="senha">
        <input type="submit" value="Enviar">
    </form>

</body>
</html>