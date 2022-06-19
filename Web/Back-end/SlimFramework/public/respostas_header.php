<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

/* Header */

$app->get('/header', function(Request $request, Response $response) {
    $response->getBody()->write('resposta foda');
    return $response->withHeader('allow', 'PUT')
    ->withAddedHeader('Content-length', 10);
});

/* JSON response */

$app->get('/json', function(Request $request, Response $response) {
    return $response->withJson([
        "nome" => "João",
        "sobrenome" => "Caires"
    ]);
});

/* XML Response */

$app->get('/xml', function(Request $request, Response $response) {
    $xml = file_get_contents('arquivo.xml');
    
    $response->write($xml);
    return $response->withHeader('Content-Type', 'application/xml');
});

$app->run();
