<?php
use Framework\Core\Database\Connection;
use Framework\Core\Request;


$bootstrap = [
    Connection::class,
    Request::class
];

array_map(function ($class) {
    switch ($class) {
        case Connection::class:
            /** @var Connection $connector */
            $connector = call_user_func("{$class}::init", $class);
            $connector->connect();
            break;
        default:
            call_user_func("{$class}::init", $class);
            break;
    }
}, $bootstrap);