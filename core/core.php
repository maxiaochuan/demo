<?php

require  '../vendor/autoload.php';

$dotEnv = new \Dotenv\Dotenv(BASE_PATH);

$dotEnv->load();

//$settings = require_once APP_PATH . '/conf/settings.php';


$app = new \Slim\App(\Core\Lib\Config::get('core'));

require_once  BASE_PATH . '/app/dependencies.php';

ob_clean();

require_once BASE_PATH . '/app/routers.php';

$app->run();