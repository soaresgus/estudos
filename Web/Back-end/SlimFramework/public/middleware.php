<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

/*Middleware*/

$app->add(function ($request, $response, $next) {
    $response->write('Inicio camada 1 + ');
    /*  return $next($request, $response); */
    $response = $next($request, $response);
    
    $response->write('Fim da camada 1 + ');
    return $response;
});

$app->get('/usuarios', function (Request $request, Response $response) {
    $response->write(' Ação principal do usuarios ');
});

$app->get('/postagens', function (Request $request, Response $response) {
    $response->write(' Ação principal de postagens ');
});

$app->run();
