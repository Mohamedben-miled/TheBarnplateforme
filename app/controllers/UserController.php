<?php

class UserController extends BaseController {
    private $userModel;

    public function __construct() {
        parent::__construct();
        $this->requireAuth();
        $this->userModel = new User();
    }

    public function dashboard() {
        $user = $this->getCurrentUser();
        $role = $_SESSION['role'];

        if ($role === 'admin') {
            $this->redirect('/admin/dashboard');
        } elseif ($role === 'organizer') {
            $this->redirect('/events/organizer');
        }

        // Regular user dashboard
        $eventModel = new Event();
        $upcomingEvents = $eventModel->getUpcomingEvents(10);
        $notificationModel = new Notification();
        $notifications = $notificationModel->getUserNotifications($user['id'], true);
        $unreadCount = $notificationModel->getUnreadCount($user['id']);

        $this->view('dashboard/user', [
            'user' => $user,
            'upcomingEvents' => $upcomingEvents,
            'notifications' => $notifications,
            'unreadCount' => $unreadCount
        ]);
    }

    public function profile() {
        $user = $this->getCurrentUser();
        $interestModel = new Interest();
        $allInterests = $interestModel->getAll();
        $userInterests = $this->userModel->getUserInterests($user['id']);
        $userInterestIds = array_column($userInterests, 'id');

        $this->view('dashboard/profile', [
            'user' => $user,
            'allInterests' => $allInterests,
            'userInterestIds' => $userInterestIds,
            'csrf_token' => $this->generateCsrfToken()
        ]);
    }

    public function updateProfile() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/profile');
        }

        if (!$this->validateCsrf($_POST['csrf_token'] ?? '')) {
            $this->redirect('/profile');
        }

        $userId = $_SESSION['user_id'];
        $firstName = trim($_POST['first_name'] ?? '');
        $lastName = trim($_POST['last_name'] ?? '');
        $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';
        $emailNotifications = isset($_POST['email_notifications']) ? 1 : 0;
        $interestIds = $_POST['interests'] ?? [];

        $updateData = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email_notifications' => $emailNotifications
        ];

        // Check if email changed
        $currentUser = $this->userModel->findById($userId);
        if ($email !== $currentUser['email']) {
            // Check if new email exists
            if ($this->userModel->findByEmail($email)) {
                $this->redirect('/profile?error=email_exists');
            }
            $updateData['email'] = $email;
        }

        // Update password if provided
        if (!empty($password)) {
            if ($password !== $confirmPassword) {
                $this->redirect('/profile?error=password_mismatch');
            }
            if (strlen($password) < 6) {
                $this->redirect('/profile?error=password_short');
            }
            $updateData['password'] = $password;
        }

        $this->userModel->updateProfile($userId, $updateData);
        $this->userModel->setUserInterests($userId, $interestIds);

        $_SESSION['email'] = $updateData['email'] ?? $currentUser['email'];
        $_SESSION['first_name'] = $firstName;

        $this->redirect('/profile?success=1');
    }

    public function requestOrganizer() {
        $userId = $_SESSION['user_id'];
        $user = $this->userModel->findById($userId);

        if ($user['role'] !== 'user') {
            $this->redirect('/dashboard');
        }

        if ($user['organizer_status'] === 'pending') {
            $this->redirect('/dashboard?message=request_pending');
        }

        $this->userModel->requestOrganizerRole($userId);
        $this->redirect('/dashboard?message=request_sent');
    }
}

