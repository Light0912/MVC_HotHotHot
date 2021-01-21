<?php

use vendor\System\Router;
use vendor\System\System;
use vendor\System\SystemException;

include '../vendor/autoload.php';
include '../config/route.php';
$core = new System();

if (!Router::Route()) {
    try {
        throw new SystemException('Aucune route est configuré sur ' . $_SERVER['REQUEST_URI']);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}