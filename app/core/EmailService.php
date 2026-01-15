<?php

// Load PHPMailer if available
$autoloadPath = __DIR__ . '/../../vendor/autoload.php';
if (file_exists($autoloadPath)) {
    require_once $autoloadPath;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailService {
    private $config;
    private $mailer;

    public function __construct() {
        $this->config = require __DIR__ . '/../config/email.php';
        if (class_exists('PHPMailer\PHPMailer\PHPMailer')) {
            $this->mailer = new PHPMailer(true);
            $this->configure();
        } else {
            $this->mailer = null;
            error_log("PHPMailer not available. Install via: composer install");
        }
    }

    private function configure() {
        if (!$this->mailer) return;
        
        try {
            $this->mailer->isSMTP();
            $this->mailer->Host = $this->config['host'];
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = $this->config['username'];
            $this->mailer->Password = $this->config['password'];
            $this->mailer->SMTPSecure = $this->config['encryption'];
            $this->mailer->Port = $this->config['port'];
            $this->mailer->CharSet = 'UTF-8';
            
            $this->mailer->setFrom($this->config['from_email'], $this->config['from_name']);
        } catch (Exception $e) {
            error_log("Email configuration error: " . $e->getMessage());
        }
    }

    public function send($to, $subject, $body, $isHTML = true) {
        if (!$this->mailer) {
            error_log("EmailService: PHPMailer not available. Email not sent to: $to");
            return false;
        }
        
        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($to);
            $this->mailer->isHTML($isHTML);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;
            
            return $this->mailer->send();
        } catch (Exception $e) {
            error_log("Email send error: " . $e->getMessage());
            return false;
        }
    }

    public function sendEventApproved($userEmail, $eventTitle) {
        $subject = "Event Approved: $eventTitle";
        $body = "
        <html>
        <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
            <h2 style='color: #2c3e50;'>Event Approved!</h2>
            <p>Great news! Your event <strong>$eventTitle</strong> has been approved and is now live on The Barn platform.</p>
            <p>You can now manage your event from your organizer dashboard.</p>
            <p>Best regards,<br>The Barn Team</p>
        </body>
        </html>
        ";
        return $this->send($userEmail, $subject, $body);
    }

    public function sendEventRejected($userEmail, $eventTitle, $reason = '') {
        $subject = "Event Update: $eventTitle";
        $body = "
        <html>
        <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
            <h2 style='color: #2c3e50;'>Event Status Update</h2>
            <p>Unfortunately, your event <strong>$eventTitle</strong> could not be approved at this time.</p>
            " . ($reason ? "<p>Reason: $reason</p>" : "") . "
            <p>Please review your event details and feel free to submit a new request.</p>
            <p>Best regards,<br>The Barn Team</p>
        </body>
        </html>
        ";
        return $this->send($userEmail, $subject, $body);
    }

    public function sendNewEventNotification($userEmail, $eventTitle, $eventDate) {
        $subject = "New Event Matching Your Interests: $eventTitle";
        $body = "
        <html>
        <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
            <h2 style='color: #2c3e50;'>New Event Available!</h2>
            <p>A new event matching your interests has been added:</p>
            <p><strong>$eventTitle</strong><br>Date: $eventDate</p>
            <p>Visit The Barn platform to learn more and register.</p>
            <p>Best regards,<br>The Barn Team</p>
        </body>
        </html>
        ";
        return $this->send($userEmail, $subject, $body);
    }
}

