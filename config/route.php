
<?php

use vendor\System\Router;
$router = new Router();

$router->setRoute("",  "HomeController/index");
//$router->setRoute("login",  "LoginController/index");
$router->setRoute("login",  "AuthenticationController/_Login", 'login', ['GET', 'POST']);
$router->setRoute("register",  "AuthenticationController/_Register", 'register', ['GET', 'POST']);
$router->setRoute("data", "DataController/index", 'index', ['GET', 'POST']);
$router->setRoute("capteur", "CapteurController/index");
$router->setRoute("api/docs", "DocumentationController/home", 'HomeDocView');
$router->setRoute("api/docs/create", "DocumentationController/create", 'CreateDocView', ['GET', 'POST']);
$router->setRoute("api/doc/<id>", "DocumentationController/doc", 'DocView');
$router->setRoute("api/doc/delete/<id>", "DocumentationController/delete", 'DocDeleteView');
$router->setRoute("api/doc/update/<id>", "DocumentationController/update", 'DocUpdateView', ['GET', 'POST']);