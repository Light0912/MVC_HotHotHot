<?php

use vendor\System\Router;
use vendor\System\System;
use vendor\System\SystemException;

include '../vendor/autoload.php';
include '../config/route.php';
$core = new System();
if (Router::getRoute()) {
    $param = explode("/", Router::getRoute());
    $controller = $param[0];
    $action = $param[1];

    include '../Controller/' . $controller . '.php';

    $controller = new $controller();

    if (method_exists($controller, $action)) {
        $controller->$action();
    }
} else {
    try {
        throw new SystemException('Aucune route est configuré sur ' . $_SERVER['REQUEST_URI']);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}