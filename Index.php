<?php

use Task13\Router;

include_once('Router.php');

$router = new Router();

$router->addRoutes([
    '/' => ['index', 'Controller\UserController'],
    '/users%GET' => ['index', 'Controller\UserController'],
    '/users/create%GET' => ['create', 'Controller\UserController'],
    '/users%POST' => ['store', 'Controller\UserController'],
    '/users/delete%GET' => ['delete', 'Controller\UserController'],
    '/users/edit%GET' => ['edit', 'Controller\UserController'],
    '/users%PUT' => ['update', 'Controller\UserController']
]);

$router->start();
