<?php

namespace vendor\System;

class Router extends System
{
    private ?string $method;
    private static $route_list = null;

    /**
     * Router constructor.
     * @param string $route
     * @param string $action
     * @param string $method
     */
    public function setRoute(string $route, string $action, string $method = 'GET'): void
    {
        if ("/" . $route === $_SERVER['REQUEST_URI'] && strtoupper($method) === strtoupper($_SERVER['REQUEST_METHOD'])){
            $this->method = $action;
            self::$route_list = $this->method;
        }else{
            $this->method = null;
        }
    }

    public static function getRoute(): string|null{
        return self::$route_list;
    }
}