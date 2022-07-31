<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require '../vendor/autoload.php';

$app = new \Slim\App;

/* Padrão PSR7 - GET */
$app->get('/postagens4', function (Request $request, Response $response) {
    $response->getBody()->write('Listagem de postagens');

    return $response;
});

/* POST */
$app->post('/contas/adiciona', function (Request $request, Response $response) {
    $post = $request->getParsedBody();
    $nome = $post['nome'];
    $email = $post['email'];

    //Salvar no banco

    return $response->getBody()->write("Sucesso");
});

/* PUT */

$app->put('/contas/atualiza', function(Request $request, Response $response) {
    $post = $request->getParsedBody();
    $id = $post['id'];
    $nome = $post['nome'];
    $email = $post['email'];

    //Atualizar no banco

    return $response->getBody()->write("Sucesso a atualizar");
});

/* DELETE */

$app->delete('/contas/remove/{id}', function(Request $request, Response $response) {
    //Remover no banco
    $id = $request->getAttribute('id');
    return $response->getBody()->write("Sucesso ao remover - $id");
});

$app->run();
