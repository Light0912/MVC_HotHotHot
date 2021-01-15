<?php


namespace vendor\System;


class Request
{

    private string $url;
    private array $urlParams = [];
    private array $postParams = [];
    private array $route = [];
    private string $siteUrl;


    public function __construct()
    {
        $this->siteUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . '://' . $_SERVER['HTTP_HOST'] . '/';
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return array
     */
    public function getUrlParams(): array
    {
        return $this->urlParams;
    }

    /**
     * @param string $name
     * @return string|bool
     */
    public function getUrlParam(string $name): string|bool
    {
        return (isset($this->urlParams[$name]) ? $this->urlParams[$name] : false);
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function addUrlParams(string $name, string $value): void
    {
        $this->urlParams[$name] = $value;
    }

    /**
     * @return array
     */
    public function getPostParams(): array
    {
        return $this->postParams;
    }

    /**
     * @return string
     */
    public function getSiteUrl(): string
    {
        return $this->siteUrl;
    }

    /**
     * @return array
     */
    public function getRoute(): array
    {
        return $this->route;
    }

    /**
     * @param array $route
     */
    public function setRoute(array $route): void
    {
        $this->route = $route;
    }

    public function isPOST(): bool
    {
        return $this->route['method'] === 'POST';
    }

    public function isGET(): bool
    {
        return $this->route['method'] === 'GET';
    }
}