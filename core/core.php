<?php

require '../vendor/autoload.php';

$dotEnv = new \Dotenv\Dotenv(BASE_PATH);

$dotEnv->load();

$settings = \Core\Lib\Config::get('core');
$settings['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $c->view->render($response, 'index.html');
    };
};

$app = new \Slim\App($settings);

require APP_PATH . '/helper.php';

require_once APP_PATH . '/dependencies.php';

require_once APP_PATH . '/middleware.php';

ob_clean();

require_once APP_PATH . '/routers.php';

\Core\Lib\Session::start();

$app->run();