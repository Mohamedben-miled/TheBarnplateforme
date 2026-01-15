<?php
$title = 'Organizer Dashboard - The Barn Coworking';
ob_start();
?>

<h1 style="margin-bottom: 2rem; color: var(--primary-color);">Organizer Dashboard</h1>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <h2>My Events</h2>
    <a href="/events/create" class="btn btn-primary">Create New Event</a>
</div>

<?php if (!empty($events)): ?>
    <div class="grid">
        <?php foreach ($events as $event): ?>
            <div class="card">
                <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                    <h3 class="card-title"><?= htmlspecialchars($event['title']) ?></h3>
                    <span style="padding: 0.25rem 0.75rem; background-color: 
                        <?= $event['status'] === 'approved' ? 'var(--success-color)' : 
                            ($event['status'] === 'rejected' ? 'var(--error-color)' : 'var(--warning-color)') ?>; 
                        color: white; border-radius: 4px; font-size: 0.85rem; text-transform: uppercase;">
                        <?= $event['status'] ?>
                    </span>
                </div>
                <p style="margin-bottom: 0.5rem;">
                    <strong>Date:</strong> <?= date('F j, Y', strtotime($event['event_date'])) ?>
                </p>
                <p style="margin-bottom: 0.5rem;">
                    <strong>Time:</strong> <?= date('g:i A', strtotime($event['start_time'])) ?> - 
                    <?= date('g:i A', strtotime($event['end_time'])) ?>
                </p>
                <p style="margin-bottom: 1rem;">
                    <strong>Location:</strong> <?= htmlspecialchars($event['location']) ?>
                </p>
                <a href="/events/<?= $event['id'] ?>" class="btn btn-primary">View Details</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="card text-center">
        <p style="color: var(--text-light); margin-bottom: 1.5rem;">You haven't created any events yet.</p>
        <a href="/events/create" class="btn btn-primary">Create Your First Event</a>
    </div>
<?php endif; ?>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?>

