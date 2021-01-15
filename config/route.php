<?php

use vendor\System\Router;
$router = new Router();

$router->setRoute("",  "HomeController/index");
$router->setRoute("login",  "LoginController/index");
$router->setRoute("data", "DataController/index", 'index', ['GET', 'POST']);