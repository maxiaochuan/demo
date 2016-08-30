<?php

//$app->get('/[{params:.*}]', function ($req, $res, $args) {
//    $params = explode('/', $req->getAttribute('params'));
//    var_dump($params);
//});

$app->get('/home[/{params:.*}]', 'App\Controllers\HomeController:home');

$app->get('/login[/{params:.*}]', 'App\Controllers\HomeController:login')->setName('login');

$app->get('/register', 'App\Controllers\HomeController:register')->setName('register');

$app->post('/login[/{params:.*}]', 'App\Controllers\AuthController:login');

$app->post('/register[/{params:.*}]', 'App\Controllers\AuthController:register');