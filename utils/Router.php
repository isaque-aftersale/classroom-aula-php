<?php

class Router
{
    private static array $routes = [];

    public static function get(string $uri, Closure $action): void
    {
        self::$routes["GET"][$uri] = $action;
    }

    public static function post(string $uri, Closure $action): void
    {
        self::$routes["POST"][$uri] = $action;
    }

    public static function boot(): void
    {
        if (!isset(self::$routes[$_SERVER['REQUEST_METHOD']][$_SERVER['REDIRECT_URL'] ?? $_SERVER['PATH_INFO'] ?? $_SERVER['REQUEST_URI']])) {
            headerTemplate();
            echo "404 Not Found";
            footerTemplate();
            http_response_code(404);
            return;
        }

        $action = self::$routes[$_SERVER['REQUEST_METHOD']][$_SERVER['REDIRECT_URL'] ?? $_SERVER['PATH_INFO'] ?? $_SERVER['REQUEST_URI']];

        $action();
    }
}