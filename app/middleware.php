<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$index = function (Request $request, Response $response, $next) {

    $params = $request->getServerParams();

    if (array_key_exists('HTTP_X_REQUESTED_WITH', $params)
        && 'XMLHttpRequest' === $params['HTTP_X_REQUESTED_WITH']
    ) {
        $response = $response->withHeader('Access-Control-Allow-Origin', '*');
        $response = $next($request, $response);
    } else {
        $this->view->render($response, 'index.html');
    }

    return $response;
};

//$getId = function (Request $request, Response $response, $next) {
//    $params = explode('/', $request->getAttribute('params'));
//
////    var_dump($request->getAttribute('params'));
////    var_dump($request->getQueryParams());
//
//    $response = $next($request, $response);
//
//    return $response;
//};