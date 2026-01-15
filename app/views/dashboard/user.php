<?php
$title = 'Dashboard - The Barn Coworking';
ob_start();
?>

<h1 style="margin-bottom: 2rem; color: var(--primary-color);">Welcome, <?= htmlspecialchars($user['first_name']) ?>!</h1>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
    <div>
        <h2 style="margin-bottom: 1rem; color: var(--primary-color);">Upcoming Events</h2>
        <?php if (!empty($upcomingEvents)): ?>
            <div>
                <?php foreach (array_slice($upcomingEvents, 0, 5) as $event): ?>
                    <div class="card">
                        <h3 class="card-title"><?= htmlspecialchars($event['title']) ?></h3>
                        <p style="margin-bottom: 0.5rem;">
                            <strong>Date:</strong> <?= date('F j, Y', strtotime($event['event_date'])) ?>
                        </p>
                        <p style="margin-bottom: 1rem;">
                            <strong>Time:</strong> <?= date('g:i A', strtotime($event['start_time'])) ?> - 
                            <?= date('g:i A', strtotime($event['end_time'])) ?>
                        </p>
                        <a href="/events/<?= $event['id'] ?>" class="btn btn-primary">View Event</a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div style="margin-top: 1.5rem;">
                <a href="/events" class="btn btn-secondary">View All Events</a>
            </div>
        <?php else: ?>
            <div class="card">
                <p style="color: var(--text-light);">No upcoming events. <a href="/events">Browse events</a></p>
            </div>
        <?php endif; ?>
    </div>

    <div>
        <div class="card" style="margin-bottom: 1.5rem;">
            <h3 class="card-title">Quick Actions</h3>
            <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                <a href="/profile" class="btn btn-outline">Edit Profile</a>
                <a href="/events" class="btn btn-outline">Browse Events</a>
                <?php if ($user['role'] === 'user' && $user['organizer_status'] !== 'pending'): ?>
                    <form method="POST" action="/request-organizer" style="margin: 0;">
                        <button type="submit" class="btn btn-secondary" style="width: 100%;">
                            Request Organizer Access
                        </button>
                        <p style="font-size: 0.85rem; color: var(--text-light); margin-top: 0.5rem; text-align: center;">
                            For clubs, associations, coaches & trainers
                        </p>
                    </form>
                <?php elseif ($user['organizer_status'] === 'pending'): ?>
                    <div class="alert alert-info">
                        Your organizer request is pending approval. Once approved, you'll be able to host events at The Barn.
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($unreadCount > 0): ?>
            <div class="card">
                <h3 class="card-title">Notifications (<?= $unreadCount ?> unread)</h3>
                <?php foreach (array_slice($notifications, 0, 5) as $notification): ?>
                    <div style="padding: 0.75rem 0; border-bottom: 1px solid var(--border-color);">
                        <strong><?= htmlspecialchars($notification['title']) ?></strong>
                        <p style="color: var(--text-light); font-size: 0.9rem; margin-top: 0.25rem;">
                            <?= htmlspecialchars($notification['message']) ?>
                        </p>
                        <span style="color: var(--text-light); font-size: 0.85rem;">
                            <?= date('M j, Y', strtotime($notification['created_at'])) ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?>

