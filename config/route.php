<?php

use vendor\System\Router;
$router = new Router();

$router->setRoute("",  "HomeController/index");
$router->setRoute("app", "AppController/app");
$router->setRoute("data", "DataController/index");
$router->setRoute(10, "DataController/index");