<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

/*Injeção de dependência*/

/*Usando use*/

/* class Servico
{
} */

/* $servico = new Servico; */

/* $app->get('/servico', function (Request $request, Response $response) use ($servico) {
    var_dump($servico);
}); */

/*Usando container*/

$container = $app->getContainer();
$container['servico'] = function () {
    return new Servico;
};

$app->get('/servico', function (Request $request, Response $response) {
    $servico = $this->get('servico');
    var_dump($servico);
});

/* Controllers como serviço */

/* $container['View'] = function () {
    return new MyApp\View;
}; */

$container['Home'] = function () {
    return new MyApp\controllers\Home(new MyApp\View);
};

$app->get('/usuario', 'Home:index');

$app->run();
