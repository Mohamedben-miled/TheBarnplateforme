<?php
$message = $_GET['message'] ?? null;
$error = $_GET['error'] ?? null;
$success = $_GET['success'] ?? null;
?>

<?php if ($message): ?>
    <div class="alert alert-info">
        <?php
        $messages = [
            'request_sent' => 'Your organizer request has been submitted. We will review it shortly.',
            'request_pending' => 'Your organizer request is pending approval.',
            'created' => 'Item created successfully.',
            'registered' => 'You have successfully registered for this event.',
            'event_approved' => 'Event approved successfully.',
            'event_rejected' => 'Event rejected.',
            'organizer_approved' => 'Organizer approved successfully.',
            'organizer_rejected' => 'Organizer request rejected.'
        ];
        echo $messages[$message] ?? $message;
        ?>
    </div>
<?php endif; ?>

<?php if ($error): ?>
    <div class="alert alert-error">
        <?php
        $errors = [
            'email_exists' => 'This email is already registered.',
            'password_mismatch' => 'Passwords do not match.',
            'password_short' => 'Password must be at least 6 characters.',
            'missing_fields' => 'Please fill in all required fields.',
            'time_conflict' => 'This time slot conflicts with another approved event.',
            'registration_failed' => 'Registration failed. The event may be full or you are already registered.'
        ];
        echo $errors[$error] ?? $error;
        ?>
    </div>
<?php endif; ?>

<?php if ($success): ?>
    <div class="alert alert-success">
        Profile updated successfully!
    </div>
<?php endif; ?>

