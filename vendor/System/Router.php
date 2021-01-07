<?php

namespace vendor\System;

use JetBrains\PhpStorm\Pure;

class Router extends System
{
    // private ?string $method;
    private static array $route_list = [];
    private static mixed $request = false;

    /**
     * Router constructor.
     * @param string $url
     * @param string $action
     * @param string $name
     * @param array $methods
     */
    public function setRoute(string $url, string $action, string $name = '', array $methods = ['GET']): void
    {
        self::$route_list[] = [
            'url' => $url,
            'action' => $action,
            'name' => $name,
            'methods' => $methods
        ];
        /*
        if ("/" . $route === $_SERVER['REQUEST_URI'] && strtoupper($method) === strtoupper($_SERVER['REQUEST_METHOD'])){
            $this->method = $action;
            self::$route_list = $this->method;
        }else{
            $this->method = null;
        }
        */
    }

    private static function resolve(string $name) : array|bool {
        $result = false;
        foreach (self::$route_list as $route) {
            if ($route['name'] === $name) {
                $result = $route;
                break;
            }
        }
        return $result;
    }

    public static function getLink(string $name) : string|bool {
        $route = self::resolve($name);
        if ($route === false) return false;
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . '://' . $_SERVER['HTTP_HOST'] . '/' . $route['url'];
    }

    public static function getRequest(): Request|bool
    {
        return self::$request;
    }


    private static function matchUrl(string $client_url, array $route): bool|Request
    {
        if (!in_array(strtoupper($_SERVER['REQUEST_METHOD']), $route['methods'])) return false;
        if (str_starts_with($client_url, '/')) $client_url = substr($client_url, 1);

        $client_url_part = explode('/', $client_url);
        $route_part = explode('/', $route['url']);
        if (count($client_url_part) !== count($route_part)) return false;

        $request = new Request();
        $match = true;
        for ($i = 0; count($route_part) > $i; ++$i) {
            if (str_starts_with($route_part[$i], '<')) {
                $param_name = str_replace('<', '', $route_part[$i]);
                $param_name = str_replace('>', '', $param_name);
                $request->addUrlParams($param_name, $client_url_part[$i]);
            } else {
                if ($route_part[$i] !== $client_url_part[$i]) $match = false;
            }
        }

        if ($match === false) return false;

        $request->setRoute($route);
        $request->setUrl($client_url);
        return $request;
    }

    public static function Route(): bool
    {
        $request = false;
        foreach (self::$route_list as $route) {
            $matchResult = self::matchUrl($_SERVER['REQUEST_URI'], $route);
            if ($matchResult !== false) {
                $request = $matchResult;
                break;
            }
        }

        if ($request === false) return false;

        self::$request = $request;

        $action_part = explode('/', $request->getRoute()['action']);
        require(__DIR__ . '/../../Controller/' . $action_part[0] . '.php');
        $controller = new $action_part[0];
        $controller->{$action_part[1]}($request);
        return true;
    }
}