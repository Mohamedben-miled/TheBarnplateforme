<?php
// Static header - No authentication/session logic
// REMOVED: All user authentication, session checks, and dynamic user menus
// This is now a static marketing site
?>
<header>
    <nav>
        <a href="/" class="logo">
            <div class="logo-icon"></div>
            <span class="logo-text">TheBarn</span>
        </a>
        <!-- REFACTORED: Navigation updated for training organizations focus -->
        <!-- REMOVED: "Partenaires" link - No partner organizations to display currently -->
        <ul class="nav-links">
            <li><a href="/">Accueil</a></li>
            <li><a href="#amenities">Équipements</a></li>
            <li><a href="/events">Événements</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="nav-buttons">
            <!-- REMOVED: Login/Register buttons - This is a static marketing site -->
            <!-- Contact information is in the footer -->
        </div>
    </nav>
</header>

