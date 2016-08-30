<?php

require  '../vendor/autoload.php';

$dotEnv = new \Dotenv\Dotenv(BASE_PATH);

$dotEnv->load();

$settings = \Core\Lib\Config::get('core');
$settings['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $c->view->render($response, 'index.html');
    };
};

$app = new \Slim\App($settings);

require_once  BASE_PATH . '/app/dependencies.php';

require_once BASE_PATH . '/app/middleware.php';

ob_clean();

require_once BASE_PATH . '/app/routers.php';

$app->run();