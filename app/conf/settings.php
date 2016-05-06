<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production

//        // Renderer settings
//        'renderer' => [
//            'template_path' => __DIR__ . '/../templates/',
//        ],
        // Monolog settings
//        'logger' => [
//            'name' => 'slim-app',
//            'path' => __DIR__ . '/../logs/app.log',
//        ],
    ],
    'db.config' => [
        'master' => [
            'database_type' => 'mysql',
            'database_name' => 'demon',
            'server' => '127.0.0.1',
            'username' => 'root',
            'password' => 'ma',
            'charset' => 'utf8'
        ]
    ],
];