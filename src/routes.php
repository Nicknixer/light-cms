<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function (Request $request, Response $response) {

    return $this->view->render($response, 'base.html.twig', []);
});

$app->get('/{page}', function (Request $request, Response $response) {
    $page_url = $request->getAttribute('page');

    $pages = $this->get('db')->table('page');
    $pages->where('url', $page_url);
    $pages->where('is_visible', 1);
    $page = $pages->first();

    if(empty($page)) {
        return $response->write("NotFound");
    }

    return $this->view->render($response, 'page.html.twig', [
        'title' => $page->title,
        'body' => $page->body,
    ]);
});