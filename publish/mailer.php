<?php

use function Hyperf\Support\env;

return [
    'host'     => env('MAIL_HOST', 'smtp.exmail.qq.com'),
    'port'     => env('MAIL_PORT', 465),
    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],
];
