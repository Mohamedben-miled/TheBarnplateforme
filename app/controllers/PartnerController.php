<?php

class PartnerController extends BaseController {
    private $partnerModel;

    public function __construct() {
        parent::__construct();
        $this->partnerModel = new Partner();
    }

    public function index() {
        $partners = $this->partnerModel->getAllPartners();
        $this->view('partners/index', ['partners' => $partners]);
    }

    public function create() {
        $this->requireRoles(['admin']);
        $this->view('partners/create', ['csrf_token' => $this->generateCsrfToken()]);
    }

    public function store() {
        $this->requireRoles(['admin']);

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/partners/create');
        }

        if (!$this->validateCsrf($_POST['csrf_token'] ?? '')) {
            $this->redirect('/partners/create');
        }

        $name = trim($_POST['name'] ?? '');
        $type = $_POST['type'] ?? '';
        $description = trim($_POST['description'] ?? '');
        $contactEmail = filter_var($_POST['contact_email'] ?? '', FILTER_SANITIZE_EMAIL);
        $website = filter_var($_POST['website'] ?? '', FILTER_SANITIZE_URL);

        if (empty($name) || empty($type)) {
            $this->redirect('/partners/create?error=missing_fields');
        }

        $this->partnerModel->create([
            'name' => $name,
            'type' => $type,
            'description' => $description,
            'contact_email' => $contactEmail,
            'website' => $website,
            'created_by' => $_SESSION['user_id']
        ]);

        $this->redirect('/partners?message=created');
    }
}

