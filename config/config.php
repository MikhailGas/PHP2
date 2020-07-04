<?php

use Shop\services\Db;

return [
    'baseDir' => __DIR__ . '/../',
    'servicesDir' => __DIR__ . '/../services/',
    'viewsDir' => __DIR__ . '/../views/',
    'connect' => [
        'class' => Db::class,
        'driver' => 'mysql',
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'db' => 'shop',
        'charset' => 'utf8',
    ],
    'requst' => [
        'class'
    ]
]