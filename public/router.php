<?php
// Router for PHP built-in server
// This file handles all requests and routes them to index.php

// Get request URI, default to '/' if not set
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$requestPath = parse_url($requestUri, PHP_URL_PATH) ?? '/';

// If it's a file that exists (and not index.php), serve it directly
if ($requestPath !== '/' && 
    $requestPath !== '/index.php' && 
    file_exists(__DIR__ . $requestPath) && 
    is_file(__DIR__ . $requestPath)) {
    return false; // Let PHP serve the file
}

// Otherwise, route everything through index.php
require __DIR__ . '/index.php';

