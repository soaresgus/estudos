<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Capsule\Manager as Capsule;

require '../vendor/autoload.php';

$app = new \Slim\App;

$container = $app->getContainer();
$container['db'] = function () {
    $capsule = new Capsule;

    $capsule->addConnection([
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'sandbox',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ]);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$app->get('/usuarios', function (Request $request, Response $response) {
    $db = $this->get('db');

    /*Criar
    $db->schema()->dropIfExists('usuarios');
    $db->schema()->create('usuarios', function ($table) {
        $table->increments('id');
        $table->string('nome');
        $table->string('email');
        $table->timestamps();
    });
    */

    /*Inserir*/
    /* $db->table('usuarios')->insert([
        'nome' => 'João da Silva',
        'email' => 'joaozinho@gmail.com'
    ]); */

    /*Atualizar*/
    /* $db->table('usuarios')
            ->where('id', 1)
            ->update([
                'nome' => 'João',
            ]); */

    /*Deletar*/
    /* $db->table('usuarios')
            ->where('id', 1)
            ->delete(); */

    /*Listar*/
    $usuarios = $db->table('usuarios')
    ->where('nome', 'like', 'j%')
    ->where('id', '=', 4)
    ->get();
    foreach($usuarios as $usuario) {
        echo ($usuario->nome . '<br>');
    }
});

$app->run();
