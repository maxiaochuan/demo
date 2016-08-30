<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$index = function (Request $request, Response $response, $next) {

    $contentType = $request->getHeader('CONTENT_TYPE')[0];

    if (preg_match('/application\/json/', $contentType) === 0) {
        $this->view->render($response, 'index.html');
    } else {
        $response = $next($request, $response);
    }

    return $response;
};