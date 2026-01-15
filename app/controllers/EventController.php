<?php

class EventController extends BaseController {
    private $eventModel;

    public function __construct() {
        parent::__construct();
        $this->eventModel = new Event();
    }

    public function index() {
        $events = $this->eventModel->getUpcomingEvents();
        $interestModel = new Interest();
        $interests = $interestModel->getAll();
        
        $selectedInterest = $_GET['interest'] ?? null;
        if ($selectedInterest) {
            $events = $this->eventModel->getEventsByInterest($selectedInterest);
        }

        $this->view('events/index', [
            'events' => $events,
            'interests' => $interests,
            'selectedInterest' => $selectedInterest
        ]);
    }

    public function show($id) {
        $event = $this->eventModel->getEventWithDetails($id);
        
        if (!$event) {
            http_response_code(404);
            die("Event not found");
        }

        $interests = $this->eventModel->getEventInterests($id);
        $registeredUsers = [];
        $isRegistered = false;

        if ($this->isLoggedIn()) {
            $userId = $_SESSION['user_id'];
            $registeredUsers = $this->eventModel->getRegisteredUsers($id);
            foreach ($registeredUsers as $regUser) {
                if ($regUser['id'] == $userId) {
                    $isRegistered = true;
                    break;
                }
            }
        }

        $this->view('events/show', [
            'event' => $event,
            'interests' => $interests,
            'registeredUsers' => $registeredUsers,
            'isRegistered' => $isRegistered
        ]);
    }

    public function create() {
        $this->requireRoles(['organizer', 'admin']);
        
        $interestModel = new Interest();
        $interests = $interestModel->getAll();
        $partnerModel = new Partner();
        $partners = $partnerModel->getAllPartners();

        $this->view('events/create', [
            'interests' => $interests,
            'partners' => $partners,
            'csrf_token' => $this->generateCsrfToken()
        ]);
    }

    public function store() {
        $this->requireRoles(['organizer', 'admin']);

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/events/create');
        }

        if (!$this->validateCsrf($_POST['csrf_token'] ?? '')) {
            $this->redirect('/events/create');
        }

        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $eventDate = $_POST['event_date'] ?? '';
        $startTime = $_POST['start_time'] ?? '';
        $endTime = $_POST['end_time'] ?? '';
        $location = trim($_POST['location'] ?? '');
        $maxParticipants = !empty($_POST['max_participants']) ? (int)$_POST['max_participants'] : null;
        $partnerId = !empty($_POST['partner_id']) ? (int)$_POST['partner_id'] : null;
        $interestIds = $_POST['interests'] ?? [];

        // Validation
        if (empty($title) || empty($description) || empty($eventDate) || 
            empty($startTime) || empty($endTime) || empty($location)) {
            $this->redirect('/events/create?error=missing_fields');
        }

        // Check time conflict
        if ($this->eventModel->checkTimeConflict($eventDate, $startTime, $endTime)) {
            $this->redirect('/events/create?error=time_conflict');
        }

        $organizerId = $_SESSION['user_id'];
        $eventId = $this->eventModel->createEvent([
            'title' => $title,
            'description' => $description,
            'event_date' => $eventDate,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'location' => $location,
            'max_participants' => $maxParticipants,
            'organizer_id' => $organizerId,
            'partner_id' => $partnerId,
            'status' => 'pending'
        ], $interestIds);

        $this->redirect("/events/$eventId?message=created");
    }

    public function register($eventId) {
        $this->requireAuth();

        $event = $this->eventModel->findById($eventId);
        if (!$event || $event['status'] !== 'approved') {
            $this->redirect('/events');
        }

        $userId = $_SESSION['user_id'];
        $success = $this->eventModel->registerUser($eventId, $userId);

        if ($success) {
            $this->redirect("/events/$eventId?message=registered");
        } else {
            $this->redirect("/events/$eventId?error=registration_failed");
        }
    }

    public function organizerEvents() {
        $this->requireRoles(['organizer', 'admin']);
        
        $organizerId = $_SESSION['user_id'];
        $events = $this->eventModel->getEventsByOrganizer($organizerId);

        $this->view('events/organizer_list', [
            'events' => $events
        ]);
    }
}

