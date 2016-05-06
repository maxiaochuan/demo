<?php

$container = $app->getContainer();

$container['view'] = function () {
    return new Slim\Views\PhpRenderer(BASE_PATH . '/templates/');
};

$container['controller'] = function () use($container) {
    return new \Core\Lib\BaseController($container);
};