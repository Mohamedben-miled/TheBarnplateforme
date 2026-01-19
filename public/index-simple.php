<?php
/**
 * Simple Static Router for Marketing Site
 * 
 * This replaces the MVC router with a simple static page router.
 * No database, no authentication, no sessions - just static pages.
 * 
 * REMOVED: All MVC routing, controllers, models, database connections
 */

// Set error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define base path
define('BASE_PATH', dirname(__DIR__));

// Get the requested path
$requestUri = $_SERVER['REQUEST_URI'];
$requestPath = parse_url($requestUri, PHP_URL_PATH);

// Remove leading slash
$requestPath = ltrim($requestPath, '/');

// Default to homepage if empty
if (empty($requestPath)) {
    $requestPath = 'home';
}

// Map routes to view files
$routes = [
    '' => 'home',
    'home' => 'home',
    'index' => 'home',
    'events' => 'events/index',
    'partners' => 'partners/index',
];

// Get the view file path
$viewFile = isset($routes[$requestPath]) ? $routes[$requestPath] : $requestPath;
$viewPath = BASE_PATH . '/app/views/' . $viewFile . '.php';

// Check if view exists
if (!file_exists($viewPath)) {
    // 404 - View not found
    http_response_code(404);
    $viewPath = BASE_PATH . '/app/views/404.php';
    if (!file_exists($viewPath)) {
        die('Page not found');
    }
}

// Include the view (views handle their own layout includes)
require_once $viewPath;

