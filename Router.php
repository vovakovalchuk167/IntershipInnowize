<?php

namespace Task13;

use Controller\UserController;

include_once('Controller/UserController.php');
include_once('Request.php');

class Router
{
    private $routes;

    public function addRoutes($routes): void
    {
        $this->routes = $routes;
    }

    public function addRoute($route)
    {
        $this->routes[] = $route;
    }

    public function start(): void
    {
        $request = new Request();
        $SERVER = $request->getSERVER();
        $method = $this->routes[parse_url($SERVER['REQUEST_URI'])['path']][0];
        $controllerStr = $this->routes[parse_url($SERVER['REQUEST_URI'])['path']][1];
        $controller = new $controllerStr();
        $controller->$method($request);
    }
}
