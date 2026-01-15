<?php
$title = htmlspecialchars($event['title']) . ' - The Barn Coworking';
ob_start();
?>

<div style="max-width: 800px; margin: 0 auto;">
    <div class="card">
        <h1 style="margin-bottom: 1rem; color: var(--primary-color);"><?= htmlspecialchars($event['title']) ?></h1>
        
        <?php if ($event['status'] !== 'approved'): ?>
            <div class="alert alert-info">
                Status: <strong><?= ucfirst($event['status']) ?></strong>
                <?php if ($event['status'] === 'rejected' && $event['rejection_reason']): ?>
                    <br>Reason: <?= htmlspecialchars($event['rejection_reason']) ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div style="margin-bottom: 1.5rem;">
            <p style="margin-bottom: 0.5rem;">
                <strong>Date:</strong> <?= date('F j, Y', strtotime($event['event_date'])) ?>
            </p>
            <p style="margin-bottom: 0.5rem;">
                <strong>Time:</strong> <?= date('g:i A', strtotime($event['start_time'])) ?> - 
                <?= date('g:i A', strtotime($event['end_time'])) ?>
            </p>
            <p style="margin-bottom: 0.5rem;">
                <strong>Location:</strong> <?= htmlspecialchars($event['location']) ?>
            </p>
            <?php if ($event['max_participants']): ?>
                <p style="margin-bottom: 0.5rem;">
                    <strong>Max Participants:</strong> <?= $event['max_participants'] ?>
                </p>
            <?php endif; ?>
            <?php if ($event['organizer_email']): ?>
                <p style="margin-bottom: 0.5rem;">
                    <strong>Organizer:</strong> <?= htmlspecialchars($event['first_name'] . ' ' . $event['last_name']) ?>
                </p>
            <?php endif; ?>
            <?php if ($event['partner_name']): ?>
                <p style="margin-bottom: 0.5rem;">
                    <strong>Partner:</strong> <?= htmlspecialchars($event['partner_name']) ?>
                </p>
            <?php endif; ?>
        </div>

        <?php if (!empty($interests)): ?>
            <div style="margin-bottom: 1.5rem;">
                <strong>Interests:</strong>
                <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-top: 0.5rem;">
                    <?php foreach ($interests as $interest): ?>
                        <span style="padding: 0.25rem 0.75rem; background-color: var(--accent-color); 
                                     border-radius: 4px; font-size: 0.9rem;">
                            <?= htmlspecialchars($interest['name']) ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <div style="margin-bottom: 2rem;">
            <h3 style="margin-bottom: 1rem; color: var(--primary-color);">Description</h3>
            <p style="white-space: pre-wrap;"><?= nl2br(htmlspecialchars($event['description'])) ?></p>
        </div>

        <?php if ($event['status'] === 'approved'): ?>
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php if (!$isRegistered): ?>
                    <form method="POST" action="/events/<?= $event['id'] ?>/register" style="margin-top: 2rem;">
                        <button type="submit" class="btn btn-primary">Register for Event</button>
                    </form>
                <?php else: ?>
                    <div class="alert alert-success">
                        You are registered for this event!
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="alert alert-info">
                    <a href="/login">Login</a> or <a href="/register">sign up</a> to register for this event.
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['user_id']) && ($_SESSION['role'] === 'organizer' || $_SESSION['role'] === 'admin') && 
                  ($_SESSION['user_id'] == $event['organizer_id'] || $_SESSION['role'] === 'admin')): ?>
            <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--border-color);">
                <h3 style="margin-bottom: 1rem; color: var(--primary-color);">Registered Participants</h3>
                <?php if (!empty($registeredUsers)): ?>
                    <ul style="list-style: none;">
                        <?php foreach ($registeredUsers as $user): ?>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid var(--border-color);">
                                <?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?> 
                                (<?= htmlspecialchars($user['email']) ?>)
                                <span style="color: var(--text-light); font-size: 0.9rem;">
                                    - Registered <?= date('M j, Y', strtotime($user['registered_at'])) ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p style="color: var(--text-light);">No registrations yet.</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?>

