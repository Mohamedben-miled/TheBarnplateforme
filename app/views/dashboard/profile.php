<?php
$title = 'Profile - The Barn Coworking';
ob_start();
?>

<h1 style="margin-bottom: 2rem; color: var(--primary-color);">Edit Profile</h1>

<div style="max-width: 600px;">
    <div class="card">
        <form method="POST" action="/profile">
            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" 
                       value="<?= htmlspecialchars($user['first_name']) ?>" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" 
                       value="<?= htmlspecialchars($user['last_name']) ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" 
                       value="<?= htmlspecialchars($user['email']) ?>" required>
            </div>

            <div class="form-group">
                <label for="password">New Password (leave blank to keep current)</label>
                <input type="password" id="password" name="password" minlength="6">
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm New Password</label>
                <input type="password" id="confirm_password" name="confirm_password" minlength="6">
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="email_notifications" value="1" 
                           <?= $user['email_notifications'] ? 'checked' : '' ?>>
                    Receive email notifications
                </label>
            </div>

            <?php if (!empty($allInterests)): ?>
                <div class="form-group">
                    <label>Interests</label>
                    <div class="checkbox-group">
                        <?php foreach ($allInterests as $interest): ?>
                            <label>
                                <input type="checkbox" name="interests[]" value="<?= $interest['id'] ?>"
                                       <?= in_array($interest['id'], $userInterestIds) ? 'checked' : '' ?>>
                                <?= htmlspecialchars($interest['name']) ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary">Update Profile</button>
            <a href="/dashboard" class="btn btn-outline" style="margin-left: 1rem;">Cancel</a>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?>

