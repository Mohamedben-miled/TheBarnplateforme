<?php

class Router {
    private $routes = [];
    private $middleware = [];

    public function get($path, $handler, $middleware = []) {
        $this->addRoute('GET', $path, $handler, $middleware);
    }

    public function post($path, $handler, $middleware = []) {
        $this->addRoute('POST', $path, $handler, $middleware);
    }

    private function addRoute($method, $path, $handler, $middleware) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler,
            'middleware' => $middleware
        ];
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = rtrim($uri, '/') ?: '/';

        foreach ($this->routes as $route) {
            $pattern = $this->convertToRegex($route['path']);
            
            if ($route['method'] === $method && preg_match($pattern, $uri, $matches)) {
                array_shift($matches);
                
                // Run middleware
                foreach ($route['middleware'] as $mw) {
                    if (!$this->runMiddleware($mw)) {
                        return;
                    }
                }
                
                // Execute handler
                $handler = $route['handler'];
                if (is_string($handler) && strpos($handler, '@') !== false) {
                    list($controller, $method) = explode('@', $handler);
                    $controllerClass = $controller . 'Controller';
                    $controllerFile = __DIR__ . '/../controllers/' . $controllerClass . '.php';
                    
                    if (file_exists($controllerFile)) {
                        require_once $controllerFile;
                        $controllerInstance = new $controllerClass();
                        call_user_func_array([$controllerInstance, $method], $matches);
                    } else {
                        http_response_code(404);
                        die("Controller not found: $controllerClass");
                    }
                } else {
                    call_user_func_array($handler, $matches);
                }
                return;
            }
        }

        http_response_code(404);
        die("Route not found: $uri");
    }

    private function convertToRegex($path) {
        $pattern = preg_replace('/\{(\w+)\}/', '([^/]+)', $path);
        return '#^' . $pattern . '$#';
    }

    private function runMiddleware($middleware) {
        $middlewareFile = __DIR__ . '/middleware/' . ucfirst($middleware) . '.php';
        if (file_exists($middlewareFile)) {
            require_once $middlewareFile;
            $middlewareClass = ucfirst($middleware) . 'Middleware';
            if (class_exists($middlewareClass)) {
                $mw = new $middlewareClass();
                return $mw->handle();
            }
        }
        return true;
    }
}

