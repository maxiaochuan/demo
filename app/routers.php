<?php

$app->group('/api', function () {
    $this->post('/logout[/{params:.*}]', 'App\Controllers\AuthController:logout');

    $this->post('/login[/{params:.*}]', 'App\Controllers\AuthController:login');

    $this->post('/register[/{params:.*}]', 'App\Controllers\AuthController:register');

    $this->get('/local[/{params:.*}]', 'App\Controllers\LocalController:local');

    $this->get('/city[/{params:.*}]', 'App\Controllers\CityController:cities');

    $this->get('/message[/{params:.*}]', 'App\Controllers\MessageController:getPersonalMsg');

    $this->post('/newMessage[/{params:.*}]', 'App\Controllers\MessageController:sendMsg');

    $this->get('/friend[/{params:.*}]', 'App\Controllers\FriendController:friends');

})->add($index);


$app->get('/', function ($request, $response) {
    $this->view->render($response, 'index.html');
});

$app->get('/test', function () {
    var_dump($_SESSION);
});