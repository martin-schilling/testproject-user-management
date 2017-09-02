<?php
declare(strict_types = 1);

namespace App\Config;

use App\Model\Messaging\MessageDescription;
use App\Model\Aggregate\User\UserDescription;

return [
    'environment' => getenv('PROOPH_ENV')?: 'prod',
    'pdo' => [
        'dsn' => getenv('PDO_DSN'),
        'user' => getenv('PDO_USER'),
        'pwd' => getenv('PDO_PWD'),
    ],
    'mongo' => [
        'server' => getenv('MONGO_SERVER'),
        'db' => getenv('MONGO_DB_NAME'),
    ],
    'event_machine' => [
        'descriptions' => [
            MessageDescription::class,
            UserDescription::class
        ]
    ]
];
