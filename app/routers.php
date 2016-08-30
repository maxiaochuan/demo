<?php

$app->group('/api', function () {

    $this->get('/home[/{params:.*}]', 'App\Controllers\HomeController:home')->setName('page');

    $this->get('/login[/{params:.*}]', 'App\Controllers\HomeController:login')->setName('login');

    $this->get('/register', 'App\Controllers\HomeController:register')->setName('register');

    $this->post('/login[/{params:.*}]', 'App\Controllers\AuthController:login');

    $this->post('/register[/{params:.*}]', 'App\Controllers\AuthController:register');

    $this->get('/local[/{params:.*}]', 'App\Controllers\LocalController:local');

})->add($index);

$app->get('/', function ($request, $response) {
    $this->view->render($response, 'index.html');
});

$app->get('/test', function () {

});