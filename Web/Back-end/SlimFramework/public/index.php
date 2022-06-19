<?php
require '../vendor/autoload.php';

$app = new \Slim\App;

$app->get('/postagens2', function () {
    echo "Lista de postagens foda";
});

/*Parâmetros obrigatório*/

$app->get('/postagens3/{id}', function ($request, $response) {
    $id = $request->getAttribute('id');
    echo "Lista de postagens foda com id $id";
});

/*Placeholder opcional*/

$app->get('/postagens[/{ano}[/{mes}]]', function ($request, $response) {
    $ano = $request->getAttribute('ano');
    $mes = $request->getAttribute('mes');
    echo "Listagem foda: Ano: $ano e Mes: $mes";
});

/*Placeholder flexível usando regex*/

$app->get('/lista/{itens:.*}', function ($request, $response) {
    $itens = $request->getAttribute('itens');

    var_dump(explode('/', $itens));
});

/*Nomeação*/

$app->get('/blog/postagens/{id}', function ($request, $response) {
    echo "Listar postagem para um id: ";
})->setName("blog");

$app->get('/meusite', function ($request, $response) {
    $retorno = $this->get("router")->pathFor("blog", ["id" => "5"]);

    echo $retorno;
});

/*Agrupamento de rotas*/

$app->group('/v1', function () {
    $this->get('/usuarios', function () {
        echo "Listagem foda de usuários";
    });

    $this->get('/postagens', function () {
        echo "Listagem foda de postagens";
    });
});



$app->run();
