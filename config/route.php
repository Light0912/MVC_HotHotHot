<?php

use vendor\System\Router;
$router = new Router();

$router->setRoute("",  "HomeController/index");
//$router->setRoute("login",  "LoginController/index");
$router->setRoute("login",  "AuthenticationController/_Login");
$router->setRoute("register",  "AuthenticationController/_Register", "register");
$router->setRoute("data", "DataController/index", 'index', ['GET', 'POST']);