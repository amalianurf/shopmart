<?php

class Router {
    protected $routes = [];

    public function add($method, $path, $controller, $action, $middleware = []) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware,
        ];
    }

    public function run() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $baseDirectory = BASEFOLDER;
        $requestPath = str_replace($baseDirectory, '', $requestPath);

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod) {
                $routePath = preg_replace('/\{([a-zA-Z0-9_-]+)\}/', '([a-zA-Z0-9_-]+)', $route['path']);
                $pattern = "/^" . str_replace('/', '\/', $routePath) . "$/";

                if (preg_match($pattern, $requestPath, $matches)) {
                    $routeParams = array_slice($matches, 1);

                    foreach ($route['middleware'] as $middleware) {
                        $middlewareInstance = new $middleware;
                        $middlewareInstance->before();
                    }

                    $controller = new $route['controller'];
                    $action = $route['action'];

                    if (method_exists($controller, $action)) {
                        $controller->$action(...$routeParams);
                        return;
                    } else {
                        http_response_code(404);
                        echo 'Not Found';
                        return;
                    }
                }
            }
        }

        http_response_code(404);
        echo 'Not Found';
    }
}