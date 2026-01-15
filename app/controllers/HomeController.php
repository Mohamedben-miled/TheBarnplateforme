<?php

class HomeController extends BaseController {
    public function index() {
        $eventModel = new Event();
        $featuredEvents = $eventModel->getUpcomingEvents(6);
        $interestModel = new Interest();
        $interests = $interestModel->getAll();
        $partnerModel = new Partner();
        $partners = $partnerModel->getAllPartners();

        // Get Barn images
        $barnImages = $this->getBarnImages();

        $this->view('home', [
            'featuredEvents' => $featuredEvents,
            'interests' => $interests,
            'partners' => $partners,
            'barnImages' => $barnImages
        ]);
    }

    private function getBarnImages() {
        $imagesDir = __DIR__ . '/../../public/images';
        $images = [];
        $heroImage = null;
        $communityImage = null;
        
        if (is_dir($imagesDir)) {
            $files = scandir($imagesDir);
            foreach ($files as $file) {
                if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    // Check if this is the hero image
                    if (stripos($file, 'hero-workspace') !== false) {
                        $heroImage = '/images/' . $file;
                    } elseif (stripos($file, 'community-workshop') !== false) {
                        $communityImage = '/images/' . $file;
                    } else {
                        $images[] = '/images/' . $file;
                    }
                }
            }
        }
        
        // Put hero image first if found
        if ($heroImage) {
            array_unshift($images, $heroImage);
        }
        
        return [
            'hero' => $heroImage ?: ($images[0] ?? null),
            'community' => $communityImage,
            'all' => $images
        ];
    }
}

