<?php

class Router
{
    private $controller;

    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    //Route => Method
    private array $routes = [
        '/' => 'userList',
        '/enterFormAddUser' => 'enterFormAddUser',
        '/submitFormAddUser' => 'submitFormAddUser',
        '/delete' => 'delete',
        '/enterFormEditUser' => 'enterFormEditUser',
        '/submitFormEditUser' => 'submitFormEditUser'
    ];

    public function getRequest(): void
    {
        $method = $this->routes[parse_url($_SERVER['REQUEST_URI'])['path']];
        $this->controller->$method();
    }
}