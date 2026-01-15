<?php
$title = 'Add Partner - The Barn Coworking';
ob_start();
?>

<div style="max-width: 600px; margin: 0 auto;">
    <div class="card">
        <h2 class="card-title">Add New Partner</h2>

        <form method="POST" action="/partners">
            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">

            <div class="form-group">
                <label for="name">Partner Name *</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="type">Type *</label>
                <select id="type" name="type" required>
                    <option value="">Select type</option>
                    <option value="consulting">Consulting Firm</option>
                    <option value="club">Club</option>
                    <option value="association">Association</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="email" id="contact_email" name="contact_email">
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="url" id="website" name="website" placeholder="https://example.com">
            </div>

            <button type="submit" class="btn btn-primary">Add Partner</button>
            <a href="/partners" class="btn btn-outline" style="margin-left: 1rem;">Cancel</a>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?>

