<header>
    <nav>
        <a href="/" class="logo">
            <div class="logo-icon"></div>
            <span class="logo-text">TheBarn</span>
        </a>
        <ul class="nav-links">
            <li><a href="/events">Events</a></li>
            <li><a href="/register">Host a Workshop</a></li>
            <li><a href="/partners">Partners</a></li>
            <li><a href="/events">Calendar</a></li>
        </ul>
        <div class="nav-buttons">
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php if ($_SESSION['role'] === 'organizer' || $_SESSION['role'] === 'admin'): ?>
                    <a href="/events/organizer" style="color: white; text-decoration: none; margin-right: 1rem;">My Events</a>
                <?php endif; ?>
                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <a href="/admin/dashboard" style="color: white; text-decoration: none; margin-right: 1rem;">Admin</a>
                <?php endif; ?>
                <a href="/dashboard" style="color: white; text-decoration: none; margin-right: 1rem;">Dashboard</a>
                <a href="/logout" class="btn btn-login">Logout</a>
            <?php else: ?>
                <a href="/login" class="btn btn-login">Login</a>
                <a href="/register" class="btn btn-signup">Sign up</a>
            <?php endif; ?>
        </div>
    </nav>
</header>

