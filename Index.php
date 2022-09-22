<?php

use Controller\HomeController;
include_once('Controller/HomeController.php');
include_once('Router.php');

$router = new Router(new HomeController());
$router->getRequest();
