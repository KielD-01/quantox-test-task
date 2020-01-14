<?php

use Application\Controllers\StudentController;
use FastRoute\RouteCollector;
use Framework\Core\Request;

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $router) {
    $router->addGroup('/students', function (RouteCollector $router) {
        $router->get('/{student:\d+}', [StudentController::class, 'show']);
    });
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        list(, $handler, $args) = $routeInfo;
        list($controller, $method) = $handler;

        $controller = new $controller(Request::i());
        $controller->{$method}(...array_values($args));
        break;
}