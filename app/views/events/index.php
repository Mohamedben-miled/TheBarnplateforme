<?php
$title = 'Events - The Barn Coworking';
ob_start();
?>

<div style="margin-bottom: 2rem;">
    <h1 style="margin-bottom: 0.5rem; font-size: 2.5rem; font-weight: 700; background: var(--gradient-primary); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
        Hosted Events & Workshops
    </h1>
    <p style="color: var(--text-light); font-size: 1.1rem;">
        Events hosted by clubs, associations, coaches, and trainers at The Barn
    </p>
</div>

<?php if (!empty($interests)): ?>
    <div style="margin-bottom: 2rem;">
        <h3 style="margin-bottom: 1rem;">Filter by Interest</h3>
        <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
            <a href="/events" 
               style="padding: 0.5rem 1rem; background-color: <?= $selectedInterest ? 'var(--bg-white)' : 'var(--primary-color)' ?>; 
                      color: <?= $selectedInterest ? 'var(--text-dark)' : 'white' ?>; 
                      border-radius: 4px; text-decoration: none; border: 1px solid var(--primary-color);">
                All Events
            </a>
            <?php foreach ($interests as $interest): ?>
                <a href="/events?interest=<?= $interest['id'] ?>" 
                   style="padding: 0.5rem 1rem; background-color: <?= $selectedInterest == $interest['id'] ? 'var(--primary-color)' : 'var(--bg-white)' ?>; 
                          color: <?= $selectedInterest == $interest['id'] ? 'white' : 'var(--text-dark)' ?>; 
                          border-radius: 4px; text-decoration: none; border: 1px solid var(--primary-color);">
                    <?= htmlspecialchars($interest['name']) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<?php if (!empty($events)): ?>
    <div class="grid">
        <?php foreach ($events as $event): ?>
            <div class="card">
                <h3 class="card-title"><?= htmlspecialchars($event['title']) ?></h3>
                <p style="color: var(--text-light); margin-bottom: 1rem;">
                    <?= htmlspecialchars(substr($event['description'], 0, 150)) ?>...
                </p>
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
                <?php if ($event['organizer_email']): ?>
                    <p style="margin-bottom: 1rem; color: var(--text-light); font-size: 0.9rem;">
                        By: <?= htmlspecialchars($event['first_name'] . ' ' . $event['last_name']) ?>
                    </p>
                <?php endif; ?>
                <a href="/events/<?= $event['id'] ?>" class="btn btn-primary">View Details</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="card text-center">
        <p style="color: var(--text-light);">No events found. Check back soon!</p>
    </div>
<?php endif; ?>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?>

