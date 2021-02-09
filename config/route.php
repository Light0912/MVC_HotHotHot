<?php

use vendor\System\Router;
$router = new Router();

$router->setRoute("",  "HomeController/index");
//$router->setRoute("login",  "LoginController/index");
$router->setRoute("login",  "AuthenticationController/_Login");
$router->setRoute("register",  "AuthenticationController/_Register", "register");
$router->setRoute("data", "DataController/index", 'index', ['GET', 'POST']);
$router->setRoute("capteur", "CapteurController/index");
$router->setRoute("docs", "DocumentationController/home", 'HomeDocView');
$router->setRoute("docs/create", "DocumentationController/create", 'CreateDocView', ['GET', 'POST']);
$router->setRoute("docs/<id>", "DocumentationController/doc", 'DocView');
$router->setRoute("docs/delete/<id>", "DocumentationController/delete", 'DocDeleteView');
$router->setRoute("docs/update/<id>", "DocumentationController/update", 'DocUpdateView', ['GET', 'POST']);