<?php
$title = 'Sign Up - The Barn Coworking';
ob_start();
?>

<div style="max-width: 500px; margin: 2rem auto;">
    <div class="card">
        <h2 class="card-title text-center">Create Account</h2>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="/register">
            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
            
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required minlength="6">
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required minlength="6">
            </div>

            <?php if (!empty($interests)): ?>
                <div class="form-group">
                    <label>Interests (optional)</label>
                    <div class="checkbox-group">
                        <?php foreach ($interests as $interest): ?>
                            <label>
                                <input type="checkbox" name="interests[]" value="<?= $interest['id'] ?>">
                                <?= htmlspecialchars($interest['name']) ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Create Account</button>
        </form>

        <p style="text-align: center; margin-top: 1.5rem; color: var(--text-light);">
            Already have an account? <a href="/login" style="color: var(--primary-color);">Login here</a>
        </p>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?>

