<?php require_once 'validar_acesso.php' ?>

<?php
$linhas = 0;
$registros = [];

//Está abrindo o arquivo (foopen)
//Enquanto não chegar no final (!feof) o número de linhas é aumentado em +1
//E o fgets puxa os elementos (linhas) do arquivo
for ($arq = fopen('../../projeto_01/bd.hd', 'r'); !feof($arq); $linhas++) {
  $todos = fgets($arq);

  $registro_detalhes = explode('#', $todos);
  if (count($registro_detalhes) > 3) {
    if ($_SESSION['cargo'] == 0) {
      //Exibir apenas chamados criados pelo usuário
      if ($_SESSION['id'] != $registro_detalhes[3]) {
        continue;
      } else {
        $registros[] = $todos;
      }
    } else {
      $registros[] = $todos;
    }
  }
}

fclose($arq);
?>

<html>

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .card-consultar-chamado {
      padding: 30px 0 0 0;
      width: 100%;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php">
      <img src="imagens/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      App Help Desk
    </a>

    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" href="logoff.php">SAIR</a></li>
    </ul>
  </nav>

  <div class="container">
    <div class="row">

      <div class="card-consultar-chamado">
        <div class="card">
          <div class="card-header">
            Consulta de chamado
          </div>

          <div class="card-body">

            <?php

            foreach ($registros as $chamado) {
              $registro = explode('#', $chamado);


              if (count($registro) < 3) {
                continue;
              }
            ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $registro[0] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $registro[1] ?></h6>
                  <p class="card-text"><?= $registro[2] ?></p>
                </div>
              </div>

            <?php } ?>

            <div class="row mt-5">
              <div class="col-6">
                <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>