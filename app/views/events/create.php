<?php
$title = 'Create Event - The Barn Coworking';
ob_start();
?>

<div style="max-width: 700px; margin: 0 auto;">
    <div class="card">
        <h2 class="card-title">Request Space for Your Event</h2>
        <p style="color: var(--text-light); margin-bottom: 1.5rem;">
            As an organizer, you can request to host workshops, trainings, meetings, or events at The Barn. 
            Your request will be reviewed by our admin team.
        </p>

        <form method="POST" action="/events">
            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">

            <div class="form-group">
                <label for="title">Event Title *</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="description">Description *</label>
                <textarea id="description" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="event_date">Event Date *</label>
                <input type="date" id="event_date" name="event_date" required min="<?= date('Y-m-d') ?>">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div class="form-group">
                    <label for="start_time">Start Time *</label>
                    <input type="time" id="start_time" name="start_time" required>
                </div>

                <div class="form-group">
                    <label for="end_time">End Time *</label>
                    <input type="time" id="end_time" name="end_time" required>
                </div>
            </div>

            <div class="form-group">
                <label for="location">Location *</label>
                <input type="text" id="location" name="location" required>
            </div>

            <div class="form-group">
                <label for="max_participants">Max Participants (optional)</label>
                <input type="number" id="max_participants" name="max_participants" min="1">
            </div>

            <div class="form-group">
                <label for="partner_id">Partner (optional)</label>
                <select id="partner_id" name="partner_id">
                    <option value="">None</option>
                    <?php foreach ($partners as $partner): ?>
                        <option value="<?= $partner['id'] ?>"><?= htmlspecialchars($partner['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <?php if (!empty($interests)): ?>
                <div class="form-group">
                    <label>Interests *</label>
                    <div class="checkbox-group">
                        <?php foreach ($interests as $interest): ?>
                            <label>
                                <input type="checkbox" name="interests[]" value="<?= $interest['id'] ?>" required>
                                <?= htmlspecialchars($interest['name']) ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="alert alert-info">
                Your event will be submitted for admin approval before being published.
            </div>

            <button type="submit" class="btn btn-primary">Submit Event</button>
            <a href="/events/organizer" class="btn btn-outline" style="margin-left: 1rem;">Cancel</a>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?>

