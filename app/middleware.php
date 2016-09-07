<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$index = function (Request $request, Response $response, $next) {
    $newResponse = $response->withHeader('Access-Control-Allow-Origin', '*');
    $newResponse = $newResponse->withHeader('Access-Control-Allow-Methods', 'GET,POST');
    $newResponse = $newResponse->withHeader('Access-Control-Allow-Headers', 'http-x-requested-with,content-type');

    $response = $next($request, $newResponse);

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