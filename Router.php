<?php

namespace Task13;

use Controller\HomeController;

include_once('Controller/HomeController.php');

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
        $method = $this->routes[parse_url($_SERVER['REQUEST_URI'])['path']][0];
        $controllerStr = $this->routes[parse_url($_SERVER['REQUEST_URI'])['path']][1];
        $controller = new $controllerStr();
        $controller->$method();
    }
}
