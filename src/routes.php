<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function (Request $request, Response $response) {

    $response->getBody()->write('Index');

    return $response;
});

$app->get('/{page}', function (Request $request, Response $response) {
    $page = $request->getAttribute('page');
    $response->getBody()->write('Page: '.$page);

    return $response;
});