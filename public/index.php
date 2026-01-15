<?php
// Front Controller - All requests are routed through this file

// Set error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define base path
define('BASE_PATH', dirname(__DIR__));

// Autoloader
spl_autoload_register(function ($class) {
    $paths = [
        BASE_PATH . '/app/core/' . $class . '.php',
        BASE_PATH . '/app/models/' . $class . '.php',
        BASE_PATH . '/app/controllers/' . $class . '.php',
    ];
    
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

// Load configuration
require_once BASE_PATH . '/app/config/app.php';

// Start session (if not already started)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Initialize router
$router = new Router();

// Public routes
$router->get('/', 'Home@index');
$router->get('/events', 'Event@index');
$router->get('/events/{id}', 'Event@show');
$router->get('/partners', 'Partner@index');

// Auth routes
$router->get('/login', 'Auth@showLogin', ['Guest']);
$router->post('/login', 'Auth@login', ['Guest']);
$router->get('/register', 'Auth@showRegister', ['Guest']);
$router->post('/register', 'Auth@register', ['Guest']);
$router->get('/logout', 'Auth@logout', ['Auth']);

// User routes
$router->get('/dashboard', 'User@dashboard', ['Auth']);
$router->get('/profile', 'User@profile', ['Auth']);
$router->post('/profile', 'User@updateProfile', ['Auth']);
$router->post('/request-organizer', 'User@requestOrganizer', ['Auth']);

// Event routes
$router->get('/events/create', 'Event@create', ['Auth']);
$router->post('/events', 'Event@store', ['Auth']);
$router->post('/events/{id}/register', 'Event@register', ['Auth']);
$router->get('/events/organizer', 'Event@organizerEvents', ['Auth']);

// Partner routes (admin only)
$router->get('/partners/create', 'Partner@create', ['Auth']);
$router->post('/partners', 'Partner@store', ['Auth']);

// Admin routes
$router->get('/admin/dashboard', 'Admin@dashboard', ['Auth']);
$router->post('/admin/events/{id}/approve', 'Admin@approveEvent', ['Auth']);
$router->post('/admin/events/{id}/reject', 'Admin@rejectEvent', ['Auth']);
$router->post('/admin/organizers/{id}/approve', 'Admin@approveOrganizer', ['Auth']);
$router->post('/admin/organizers/{id}/reject', 'Admin@rejectOrganizer', ['Auth']);

// Dispatch the request
$router->dispatch();

