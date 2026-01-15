<?php

class AdminController extends BaseController {
    private $userModel;
    private $eventModel;
    private $partnerModel;
    private $notificationModel;
    private $emailService;

    public function __construct() {
        parent::__construct();
        $this->requireRole('admin');
        $this->userModel = new User();
        $this->eventModel = new Event();
        $this->partnerModel = new Partner();
        $this->notificationModel = new Notification();
        $this->emailService = new EmailService();
    }

    public function dashboard() {
        $pendingEvents = $this->eventModel->getPendingEvents();
        $pendingOrganizers = $this->userModel->getPendingOrganizers();
        $allEvents = $this->eventModel->findAll([], 'created_at DESC');
        $partners = $this->partnerModel->getAllPartners();

        $this->view('dashboard/admin', [
            'pendingEvents' => $pendingEvents,
            'pendingOrganizers' => $pendingOrganizers,
            'allEvents' => $allEvents,
            'partners' => $partners,
            'csrf_token' => $this->generateCsrfToken()
        ]);
    }

    public function approveEvent($eventId) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/dashboard');
        }

        if (!$this->validateCsrf($_POST['csrf_token'] ?? '')) {
            $this->redirect('/admin/dashboard');
        }

        $event = $this->eventModel->findById($eventId);
        if (!$event) {
            $this->redirect('/admin/dashboard');
        }

        // Check time conflict
        if ($this->eventModel->checkTimeConflict($event['event_date'], $event['start_time'], $event['end_time'], $eventId)) {
            $this->redirect('/admin/dashboard?error=time_conflict');
        }

        $this->eventModel->approveEvent($eventId);

        // Send notification to organizer
        $organizer = $this->userModel->findById($event['organizer_id']);
        if ($organizer && $this->userModel->hasEmailNotifications($organizer['id'])) {
            $this->emailService->sendEventApproved($organizer['email'], $event['title']);
        }

        // Create notification
        $this->notificationModel->createNotification(
            $event['organizer_id'],
            'event_approved',
            'Event Approved',
            "Your event '{$event['title']}' has been approved.",
            $eventId,
            'event'
        );

        // Notify users with matching interests
        $this->notifyUsersAboutNewEvent($eventId);

        $this->redirect('/admin/dashboard?message=event_approved');
    }

    public function rejectEvent($eventId) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/dashboard');
        }

        if (!$this->validateCsrf($_POST['csrf_token'] ?? '')) {
            $this->redirect('/admin/dashboard');
        }

        $reason = trim($_POST['reason'] ?? '');
        $event = $this->eventModel->findById($eventId);
        
        if (!$event) {
            $this->redirect('/admin/dashboard');
        }

        $this->eventModel->rejectEvent($eventId, $reason);

        // Send notification to organizer
        $organizer = $this->userModel->findById($event['organizer_id']);
        if ($organizer && $this->userModel->hasEmailNotifications($organizer['id'])) {
            $this->emailService->sendEventRejected($organizer['email'], $event['title'], $reason);
        }

        // Create notification
        $this->notificationModel->createNotification(
            $event['organizer_id'],
            'event_rejected',
            'Event Rejected',
            "Your event '{$event['title']}' was rejected." . ($reason ? " Reason: $reason" : ''),
            $eventId,
            'event'
        );

        $this->redirect('/admin/dashboard?message=event_rejected');
    }

    public function approveOrganizer($userId) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/dashboard');
        }

        if (!$this->validateCsrf($_POST['csrf_token'] ?? '')) {
            $this->redirect('/admin/dashboard');
        }

        $this->userModel->approveOrganizer($userId);
        $user = $this->userModel->findById($userId);

        // Create notification
        $this->notificationModel->createNotification(
            $userId,
            'organizer_approved',
            'Organizer Request Approved',
            'Your request to become an organizer has been approved. You can now create events.',
            null,
            null
        );

        $this->redirect('/admin/dashboard?message=organizer_approved');
    }

    public function rejectOrganizer($userId) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/dashboard');
        }

        if (!$this->validateCsrf($_POST['csrf_token'] ?? '')) {
            $this->redirect('/admin/dashboard');
        }

        $this->userModel->rejectOrganizer($userId);

        // Create notification
        $this->notificationModel->createNotification(
            $userId,
            'organizer_rejected',
            'Organizer Request Rejected',
            'Your request to become an organizer was not approved at this time.',
            null,
            null
        );

        $this->redirect('/admin/dashboard?message=organizer_rejected');
    }

    private function notifyUsersAboutNewEvent($eventId) {
        $event = $this->eventModel->getEventWithDetails($eventId);
        $eventInterests = $this->eventModel->getEventInterests($eventId);
        
        if (empty($eventInterests)) {
            return;
        }

        $interestIds = array_column($eventInterests, 'id');
        $placeholders = implode(',', array_fill(0, count($interestIds), '?'));

        // Find users with matching interests who have email notifications enabled
        $sql = "SELECT DISTINCT u.id, u.email, u.first_name
                FROM users u
                INNER JOIN user_interests ui ON u.id = ui.user_id
                WHERE ui.interest_id IN ($placeholders)
                AND u.email_notifications = 1
                AND u.id != ?";

        $params = array_merge($interestIds, [$event['organizer_id']]);
        $users = $this->db->fetchAll($sql, $params);

        foreach ($users as $user) {
            if ($this->userModel->hasEmailNotifications($user['id'])) {
                $eventDate = date('F j, Y', strtotime($event['event_date']));
                $this->emailService->sendNewEventNotification(
                    $user['email'],
                    $event['title'],
                    $eventDate
                );

                // Create in-app notification
                $this->notificationModel->createNotification(
                    $user['id'],
                    'new_event',
                    'New Event Available',
                    "A new event '{$event['title']}' matching your interests has been added.",
                    $eventId,
                    'event'
                );
            }
        }
    }
}

