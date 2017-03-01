<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';

$config = [
    'settings' => [
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'task',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],
    ],
];

$app = new \Slim\App($config);

require '../dependencies.php';

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