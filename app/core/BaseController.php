<?php

class BaseController {
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    protected function view($viewPath, $data = []) {
        extract($data);
        $viewFile = __DIR__ . '/../views/' . $viewPath . '.php';
        
        if (!file_exists($viewFile)) {
            die("View not found: $viewPath");
        }
        
        require_once $viewFile;
    }

    protected function redirect($url) {
        header("Location: $url");
        exit;
    }

    protected function json($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    protected function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    protected function requireAuth() {
        if (!$this->isLoggedIn()) {
            $this->redirect('/login');
        }
    }

    protected function requireRole($role) {
        $this->requireAuth();
        if ($_SESSION['role'] !== $role) {
            http_response_code(403);
            die("Access denied. Required role: $role");
        }
    }

    protected function requireRoles($roles) {
        $this->requireAuth();
        if (!in_array($_SESSION['role'], $roles)) {
            http_response_code(403);
            die("Access denied.");
        }
    }

    protected function getCurrentUser() {
        if (!$this->isLoggedIn()) {
            return null;
        }
        require_once __DIR__ . '/../models/User.php';
        $userModel = new User();
        return $userModel->findById($_SESSION['user_id']);
    }

    protected function validateCsrf($token) {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }

    protected function generateCsrfToken() {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
}

