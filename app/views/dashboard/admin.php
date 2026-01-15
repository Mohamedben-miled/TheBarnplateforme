<?php
$title = 'Admin Dashboard - The Barn Coworking';
ob_start();
?>

<h1 style="margin-bottom: 2rem; color: var(--primary-color);">Admin Dashboard</h1>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 3rem;">
    <div class="card">
        <h3 class="card-title">Pending Events</h3>
        <p style="font-size: 2rem; color: var(--primary-color); margin: 1rem 0;">
            <?= count($pendingEvents) ?>
        </p>
        <a href="#pending-events" class="btn btn-primary">Review Events</a>
    </div>

    <div class="card">
        <h3 class="card-title">Pending Organizers</h3>
        <p style="font-size: 2rem; color: var(--primary-color); margin: 1rem 0;">
            <?= count($pendingOrganizers) ?>
        </p>
        <a href="#pending-organizers" class="btn btn-primary">Review Requests</a>
    </div>

    <div class="card">
        <h3 class="card-title">Total Events</h3>
        <p style="font-size: 2rem; color: var(--primary-color); margin: 1rem 0;">
            <?= count($allEvents) ?>
        </p>
        <a href="/events" class="btn btn-primary">View All</a>
    </div>
</div>

<div id="pending-events" style="margin-bottom: 3rem;">
    <h2 style="margin-bottom: 1.5rem; color: var(--primary-color);">Pending Events</h2>
    <?php if (!empty($pendingEvents)): ?>
        <div class="grid">
            <?php foreach ($pendingEvents as $event): ?>
                <div class="card">
                    <h3 class="card-title"><?= htmlspecialchars($event['title']) ?></h3>
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
                    <p style="margin-bottom: 1rem; color: var(--text-light);">
                        <?= htmlspecialchars(substr($event['description'], 0, 100)) ?>...
                    </p>
                    <div style="display: flex; gap: 0.5rem;">
                        <form method="POST" action="/admin/events/<?= $event['id'] ?>/approve" style="flex: 1;">
                            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Approve</button>
                        </form>
                        <form method="POST" action="/admin/events/<?= $event['id'] ?>/reject" style="flex: 1;">
                            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                            <div style="display: flex; gap: 0.5rem;">
                                <input type="text" name="reason" placeholder="Reason (optional)" 
                                       style="flex: 1; padding: 0.5rem; border: 1px solid var(--border-color); border-radius: 4px;">
                                <button type="submit" class="btn" style="background-color: var(--error-color); color: white;">Reject</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="card">
            <p style="color: var(--text-light);">No pending events.</p>
        </div>
    <?php endif; ?>
</div>

<div id="pending-organizers" style="margin-bottom: 3rem;">
    <h2 style="margin-bottom: 1.5rem; color: var(--primary-color);">Pending Organizer Requests</h2>
    <?php if (!empty($pendingOrganizers)): ?>
        <div class="grid">
            <?php foreach ($pendingOrganizers as $organizer): ?>
                <div class="card">
                    <h3 class="card-title"><?= htmlspecialchars($organizer['first_name'] . ' ' . $organizer['last_name']) ?></h3>
                    <p style="margin-bottom: 0.5rem;">
                        <strong>Email:</strong> <?= htmlspecialchars($organizer['email']) ?>
                    </p>
                    <p style="margin-bottom: 1rem; color: var(--text-light);">
                        Requested: <?= date('F j, Y', strtotime($organizer['created_at'])) ?>
                    </p>
                    <div style="display: flex; gap: 0.5rem;">
                        <form method="POST" action="/admin/organizers/<?= $organizer['id'] ?>/approve" style="flex: 1;">
                            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Approve</button>
                        </form>
                        <form method="POST" action="/admin/organizers/<?= $organizer['id'] ?>/reject" style="flex: 1;">
                            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                            <button type="submit" class="btn" style="background-color: var(--error-color); color: white; width: 100%;">Reject</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="card">
            <p style="color: var(--text-light);">No pending organizer requests.</p>
        </div>
    <?php endif; ?>
</div>

<div>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h2 style="color: var(--primary-color);">Partners</h2>
        <a href="/partners/create" class="btn btn-primary">Add Partner</a>
    </div>
    <?php if (!empty($partners)): ?>
        <div class="grid">
            <?php foreach ($partners as $partner): ?>
                <div class="card">
                    <h3 class="card-title"><?= htmlspecialchars($partner['name']) ?></h3>
                    <p style="margin-bottom: 0.5rem;">
                        <strong>Type:</strong> <?= ucfirst($partner['type']) ?>
                    </p>
                    <?php if ($partner['contact_email']): ?>
                        <p style="margin-bottom: 0.5rem;">
                            <strong>Email:</strong> <?= htmlspecialchars($partner['contact_email']) ?>
                        </p>
                    <?php endif; ?>
                    <?php if ($partner['description']): ?>
                        <p style="color: var(--text-light); margin-bottom: 1rem;">
                            <?= htmlspecialchars(substr($partner['description'], 0, 100)) ?>...
                        </p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="card">
            <p style="color: var(--text-light);">No partners yet.</p>
        </div>
    <?php endif; ?>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?>

