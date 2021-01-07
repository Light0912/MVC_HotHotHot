<?php

use vendor\System\Router;
$router = new Router();

$router->setRoute("",  "HomeController/index");
$router->setRoute("app", "AppController/app", "app");
$router->setRoute("data", "DataController/index", 'index', ['GET', 'POST']);
$router->setRoute('hello/<name>', 'HelloController/hello');
$router->setRoute('hello', 'HelloController/hello');
$router->setRoute(10, "DataController/index");