<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';

$container = new \Slim\Container;
$app = new \Slim\App($container);

$container = $app->getContainer();

$container['settings']['db'] = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'task',
        'username' => 'root',
        'password' => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ];

$container['db'] = function ($container) {

    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$app->get('/', function (Request $request, Response $response) {

    $response->getBody()->write('Index');

    return $response;
});

$app->get('/{page}', function (Request $request, Response $response) {
    $page = $request->getAttribute('page');
    $response->getBody()->write('Page: '.$page);

    return $response;
});

$app->run();