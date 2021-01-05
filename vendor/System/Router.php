<?php

namespace vendor\System;

class Router extends System
{
    private ?string $method;
    private ?string $route;
    private static $route_list = null;

    /**
     * Router constructor.
     * @param array $method
     */
    public function setRoute(string $route, string $method): void
    {
        if ("/" . $route === $_SERVER['REQUEST_URI']){
            $this->method = $method;
            self::$route_list = $this->method;
        }else{
            $this->method = null;
        }
    }

    public static function getRoute(): string|null{
        return self::$route_list;
    }
}