<?php

require BASE_PATH . '/vendor/autoload.php';

$dotEnv = new \Dotenv\Dotenv(BASE_PATH);

$dotEnv->load();

//$settings = require_once APP_PATH . '/conf/settings.php';


$app = new \Slim\App(\Core\Lib\Config::get('core'));

require_once APP_PATH . '/dependencies.php';

ob_clean();

require_once APP_PATH . '/routers.php';

$app->run();