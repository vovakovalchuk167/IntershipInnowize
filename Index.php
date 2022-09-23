<?php

use Task13\Router;

include_once('Router.php');

$router = new Router();

//Route => [Method, class, GET/POST]
$router->addRoutes([
    '/' => ['userList', 'Controller\HomeController', 'POST'],
    '/enterFormAddUser' => ['enterFormAddUser', 'Controller\HomeController', 'GET'],
    '/submitFormAddUser' => ['submitFormAddUser', 'Controller\HomeController', 'POST'],
    '/delete' => ['delete', 'Controller\HomeController', 'GET'],
    '/enterFormEditUser' => ['enterFormEditUser', 'Controller\HomeController', 'GET'],
]);

$router->addRoute(['/submitFormEditUser' => ['submitFormEditUser', 'Controller\HomeController', 'POST']]);

$router->start();
