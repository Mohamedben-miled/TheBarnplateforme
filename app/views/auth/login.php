<?php
$title = 'Login - The Barn Coworking';
ob_start();
?>

<div style="max-width: 400px; margin: 2rem auto;">
    <div class="card">
        <h2 class="card-title text-center">Login</h2>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="/login">
            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
        </form>

        <p style="text-align: center; margin-top: 1.5rem; color: var(--text-light);">
            Don't have an account? <a href="/register" style="color: var(--primary-color);">Sign up here</a>
        </p>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?>

