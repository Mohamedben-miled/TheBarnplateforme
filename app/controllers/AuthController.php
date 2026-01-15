<?php

class AuthController extends BaseController {
    private $userModel;

    public function __construct() {
        parent::__construct();
        $this->userModel = new User();
    }

    public function showLogin() {
        if ($this->isLoggedIn()) {
            $this->redirect('/dashboard');
        }
        $this->view('auth/login', ['csrf_token' => $this->generateCsrfToken()]);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/login');
        }

        if (!$this->validateCsrf($_POST['csrf_token'] ?? '')) {
            $this->view('auth/login', [
                'error' => 'Invalid security token',
                'csrf_token' => $this->generateCsrfToken()
            ]);
            return;
        }

        $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $this->view('auth/login', [
                'error' => 'Please fill in all fields',
                'csrf_token' => $this->generateCsrfToken()
            ]);
            return;
        }

        $user = $this->userModel->findByEmail($email);

        if (!$user || !$this->userModel->verifyPassword($password, $user['password'])) {
            $this->view('auth/login', [
                'error' => 'Invalid email or password',
                'csrf_token' => $this->generateCsrfToken()
            ]);
            return;
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['first_name'] = $user['first_name'];

        $this->redirect('/dashboard');
    }

    public function showRegister() {
        if ($this->isLoggedIn()) {
            $this->redirect('/dashboard');
        }
        $interestModel = new Interest();
        $interests = $interestModel->getAll();
        $this->view('auth/register', [
            'interests' => $interests,
            'csrf_token' => $this->generateCsrfToken()
        ]);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/register');
        }

        if (!$this->validateCsrf($_POST['csrf_token'] ?? '')) {
            $interestModel = new Interest();
            $interests = $interestModel->getAll();
            $this->view('auth/register', [
                'error' => 'Invalid security token',
                'interests' => $interests,
                'csrf_token' => $this->generateCsrfToken()
            ]);
            return;
        }

        $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';
        $firstName = trim($_POST['first_name'] ?? '');
        $lastName = trim($_POST['last_name'] ?? '');
        $interestIds = $_POST['interests'] ?? [];

        // Validation
        if (empty($email) || empty($password) || empty($firstName) || empty($lastName)) {
            $interestModel = new Interest();
            $interests = $interestModel->getAll();
            $this->view('auth/register', [
                'error' => 'Please fill in all required fields',
                'interests' => $interests,
                'csrf_token' => $this->generateCsrfToken()
            ]);
            return;
        }

        if ($password !== $confirmPassword) {
            $interestModel = new Interest();
            $interests = $interestModel->getAll();
            $this->view('auth/register', [
                'error' => 'Passwords do not match',
                'interests' => $interests,
                'csrf_token' => $this->generateCsrfToken()
            ]);
            return;
        }

        if (strlen($password) < 6) {
            $interestModel = new Interest();
            $interests = $interestModel->getAll();
            $this->view('auth/register', [
                'error' => 'Password must be at least 6 characters',
                'interests' => $interests,
                'csrf_token' => $this->generateCsrfToken()
            ]);
            return;
        }

        // Check if email exists
        if ($this->userModel->findByEmail($email)) {
            $interestModel = new Interest();
            $interests = $interestModel->getAll();
            $this->view('auth/register', [
                'error' => 'Email already registered',
                'interests' => $interests,
                'csrf_token' => $this->generateCsrfToken()
            ]);
            return;
        }

        // Create user
        $userId = $this->userModel->createUser([
            'email' => $email,
            'password' => $password,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'role' => 'user'
        ]);

        // Set interests
        if (!empty($interestIds)) {
            $this->userModel->setUserInterests($userId, $interestIds);
        }

        // Auto-login
        $_SESSION['user_id'] = $userId;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = 'user';
        $_SESSION['first_name'] = $firstName;

        $this->redirect('/dashboard');
    }

    public function logout() {
        session_destroy();
        $this->redirect('/');
    }
}

