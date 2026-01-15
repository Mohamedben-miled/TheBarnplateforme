<?php
$title = 'Home - The Barn Coworking';
ob_start();
?>

<!-- Hero Section - Background Image -->
<section class="hero-section" style="min-height: 100vh; position: relative; margin: 0; padding: 0; overflow: hidden;">
    <?php 
    $heroImage = is_array($barnImages) && isset($barnImages['hero']) ? $barnImages['hero'] : (is_array($barnImages) && isset($barnImages[0]) ? $barnImages[0] : null);
    ?>
    
    <!-- Background Image -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;">
        <?php if ($heroImage): ?>
            <img src="<?= htmlspecialchars($heroImage) ?>" alt="The Barn Workshop Space" 
                 style="width: 100%; height: 100%; object-fit: cover; filter: brightness(0.6);">
        <?php else: ?>
            <div style="width: 100%; height: 100%; background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);"></div>
        <?php endif; ?>
        <!-- Overlay for better text readability -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.2) 100%);"></div>
    </div>
    
    <!-- Content Overlay -->
    <div style="position: relative; z-index: 2; max-width: 1400px; margin: 0 auto; padding: 6rem 40px; min-height: 85vh; display: flex; flex-direction: column; justify-content: center;">
        <div style="max-width: 700px;">
            <h1 style="font-size: 3.5rem; font-weight: 800; color: white; margin-bottom: 1.5rem; line-height: 1.2; font-family: 'Georgia', serif; letter-spacing: -1px; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                Where Workshops, Trainings & Communities Come to Life
            </h1>
            <p style="font-size: 1.25rem; color: rgba(255,255,255,0.95); margin-bottom: 2.5rem; line-height: 1.8; font-weight: 400; text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                Host or attend workshops in a warm, inviting space <strong style="color: white;">Soukra</strong>. <strong style="color: white;">Hourly rental • Real people • Real learning.</strong>
            </p>
            
            <div style="display: flex; gap: 1rem; margin-bottom: 2.5rem; flex-wrap: wrap;">
                <a href="/events" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1rem; font-weight: 600; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                    View Upcoming Events
                </a>
                <a href="/register" class="btn btn-secondary" style="padding: 1rem 2rem; font-size: 1rem; font-weight: 600; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                    Host a Workshop
                </a>
            </div>
            
            <div style="display: flex; gap: 2rem; color: rgba(255,255,255,0.9); font-size: 1rem; flex-wrap: wrap; font-weight: 400; text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                <span>• Free parking</span>
                <span>• Flexible hours</span>
                <span>• Up to 50 people</span>
            </div>
        </div>
    </div>
</section>

<!-- Divider Line -->
<div style="border-top: 1px solid var(--border-color); margin: 0;"></div>

<!-- Services Section - Redesigned -->
<section style="margin: 0; padding: 6rem 0; position: relative; overflow: hidden; <?php if (!empty($barnImages) && isset($barnImages['community'])): ?>background-image: url('<?= htmlspecialchars($barnImages['community']) ?>'); background-size: cover; background-position: center; background-attachment: fixed;<?php else: ?>background: linear-gradient(180deg, #F9F6F0 0%, #F5F1EA 50%, #FDF9F3 100%);<?php endif; ?>">
    <!-- White overlay for lighter look -->
    <?php if (!empty($barnImages) && isset($barnImages['community'])): ?>
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255, 255, 255, 0.75); pointer-events: none; z-index: 0;"></div>
    <?php endif; ?>
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 60px; position: relative; z-index: 1;">
        <div style="text-align: center; margin-bottom: 4rem;">
            <h2 style="font-size: 2.75rem; font-weight: 700; color: #2C1810; margin-bottom: 1.25rem; font-family: 'Georgia', serif; line-height: 1.2; letter-spacing: -0.3px;">
                Built for people who teach, learn, and bring others together
            </h2>
            <p style="font-size: 1.15rem; color: #5D4037; line-height: 1.7; max-width: 800px; margin: 0 auto; font-weight: 400;">
                Attend inspiring workshops, host your own sessions, or become part of an active learning community at TheBarn.
            </p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem;">
            <!-- Attend a Workshop Card -->
            <div style="display: flex; flex-direction: column; background: linear-gradient(180deg, #FFFFFF 0%, #FDFCFA 100%); border-radius: 20px; padding: 2.5rem; box-shadow: 0 4px 20px rgba(0,0,0,0.08), 0 2px 8px rgba(0,0,0,0.04); border: 1px solid rgba(139, 90, 60, 0.1); position: relative; overflow: hidden; height: 100%;" class="service-card">
                <!-- Image at top -->
                <div style="border-radius: 16px; overflow: hidden; box-shadow: 0 6px 20px rgba(0,0,0,0.12); margin-bottom: 2rem; height: 220px; position: relative;">
                    <img src="/images/Attend.png" alt="Workshop Session" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                </div>
                <h3 style="font-size: 1.6rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif; line-height: 1.25;">
                    Attend a Workshop
                </h3>
                <p style="color: #5D4037; margin-bottom: 2rem; line-height: 1.65; font-size: 1rem; font-weight: 400; flex-grow: 1;">
                    Discover upcoming trainings, talks, and hands-on sessions led by professionals and community leaders.
                </p>
                <a href="/events" class="btn btn-beige" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.9rem 2rem; border-radius: 10px; background: linear-gradient(135deg, #F5E6D3 0%, #E8D5C4 100%); color: #2C1810; text-decoration: none; font-weight: 600; font-size: 0.95rem; box-shadow: 0 2px 8px rgba(139, 90, 60, 0.15); border: 1px solid rgba(139, 90, 60, 0.2); width: fit-content; margin-top: auto;">
                    <span>View Upcoming Events</span>
                    <span style="font-size: 1rem;">→</span>
                </a>
            </div>
            
            <!-- Host a Workshop Card -->
            <div style="display: flex; flex-direction: column; background: linear-gradient(180deg, #FFFFFF 0%, #FDFCFA 100%); border-radius: 20px; padding: 2.5rem; box-shadow: 0 4px 20px rgba(0,0,0,0.08), 0 2px 8px rgba(0,0,0,0.04); border: 1px solid rgba(139, 90, 60, 0.1); position: relative; overflow: hidden; height: 100%;" class="service-card">
                <!-- Image at top -->
                <div style="border-radius: 16px; overflow: hidden; box-shadow: 0 6px 20px rgba(0,0,0,0.12); margin-bottom: 2rem; height: 220px; position: relative;">
                    <img src="/images/host.png" alt="Host Workshop" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                </div>
                <h3 style="font-size: 1.6rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif; line-height: 1.25;">
                    Host a Workshop
                </h3>
                <p style="color: #5D4037; margin-bottom: 1.25rem; line-height: 1.65; font-size: 1rem; font-weight: 400;">
                    Rent a fully equipped space by the hour and bring your audience.
                </p>
                <ul style="list-style: none; padding: 0; margin: 0 0 2rem 0;">
                    <li style="color: #5D4037; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.75rem; font-size: 0.95rem; font-weight: 400;">
                        <span style="color: #2D5016; font-size: 1.1rem; font-weight: 700;">✓</span> Flexible hours
                    </li>
                    <li style="color: #5D4037; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.75rem; font-size: 0.95rem; font-weight: 400;">
                        <span style="color: #2D5016; font-size: 1.1rem; font-weight: 700;">✓</span> Up to 50 people
                    </li>
                    <li style="color: #5D4037; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.75rem; font-size: 0.95rem; font-weight: 400;">
                        <span style="color: #2D5016; font-size: 1.1rem; font-weight: 700;">✓</span> Promotion included
                    </li>
                </ul>
                <a href="/register" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.9rem 2rem; border-radius: 10px; background: #FF6B35; color: white; text-decoration: none; font-weight: 600; font-size: 0.95rem; box-shadow: 0 3px 10px rgba(255, 107, 53, 0.3); width: fit-content; margin-top: auto;">
                    <span>Host a Workshop</span>
                    <span style="font-size: 1rem;">→</span>
                </a>
            </div>
            
            <!-- Join the Community Card -->
            <div style="display: flex; flex-direction: column; background: linear-gradient(180deg, #FFFFFF 0%, #FDFCFA 100%); border-radius: 20px; padding: 2.5rem; box-shadow: 0 4px 20px rgba(0,0,0,0.08), 0 2px 8px rgba(0,0,0,0.04); border: 1px solid rgba(139, 90, 60, 0.1); position: relative; overflow: hidden; height: 100%;" class="service-card">
                <!-- Image at top -->
                <div style="border-radius: 16px; overflow: hidden; box-shadow: 0 6px 20px rgba(0,0,0,0.12); margin-bottom: 2rem; height: 220px; position: relative;">
                    <img src="/images/join.png" alt="Join Community" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                </div>
                <h3 style="font-size: 1.6rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif; line-height: 1.25;">
                    Join the Community
                </h3>
                <p style="color: #5D4037; margin-bottom: 2.5rem; line-height: 1.65; font-size: 1rem; font-weight: 400; flex-grow: 1;">
                    Connect and grow with trainers, clubs, and organizations that regularly host and share knowledge at TheBarn.
                </p>
                <a href="/register" class="btn btn-beige" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.9rem 2rem; border-radius: 10px; background: #F5E6D3; color: #2C1810; text-decoration: none; font-weight: 600; font-size: 0.95rem; box-shadow: 0 2px 8px rgba(139, 90, 60, 0.15); border: 1px solid rgba(139, 90, 60, 0.2); width: fit-content; margin-top: auto;">
                    <span>Join</span>
                    <span style="font-size: 1rem;">→</span>
                </a>
            </div>
        </div>
        
    </div>
</section>

<!-- Divider Line -->
<div style="border-top: 1px solid var(--border-color); margin: 0;"></div>

<!-- Communities & Partners Section - Exact Match -->
<section style="margin: 0; padding: 5rem 0; background: var(--bg-light);">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 40px;">
        <h2 style="text-align: center; font-size: 2.2rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 3rem; font-family: 'Georgia', serif; line-height: 1.3;">
            Communities & Partners at The Barn
        </h2>
        
        <!-- Partners Carousel -->
        <?php if (!empty($partners)): ?>
            <div class="partners-section" style="margin-bottom: 4rem;">
                <div class="partners-carousel">
                    <div class="partners-track">
                        <?php 
                        for ($i = 0; $i < 2; $i++): 
                            foreach ($partners as $partner): 
                        ?>
                            <div class="partner-logo">
                                <?php if (!empty($partner['website'])): ?>
                                    <a href="<?= htmlspecialchars($partner['website']) ?>" target="_blank" style="text-decoration: none; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                                        <div class="partner-name"><?= htmlspecialchars($partner['name']) ?></div>
                                    </a>
                                <?php else: ?>
                                    <div class="partner-name"><?= htmlspecialchars($partner['name']) ?></div>
                                <?php endif; ?>
                            </div>
                        <?php 
                            endforeach;
                        endfor; 
                        ?>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div style="text-align: center; padding: 3rem; background: linear-gradient(135deg, rgba(139, 69, 19, 0.05) 0%, rgba(160, 82, 45, 0.05) 100%); border-radius: 20px; margin-bottom: 4rem; border: 1px solid rgba(139, 69, 19, 0.1);">
                <p style="color: var(--text-medium); font-size: 1.1rem;">Join our growing community of partners!</p>
            </div>
        <?php endif; ?>
        
        <!-- Become a Partner CTA -->
        <div style="text-align: center; padding: 3rem; background: linear-gradient(135deg, #2D5016 0%, #1e3a0f 100%); border-radius: 24px; box-shadow: 0 8px 32px rgba(45, 80, 22, 0.3); margin-bottom: 3rem;">
            <h3 style="font-size: 2rem; font-weight: 700; color: white; margin-bottom: 1rem; font-family: 'Georgia', serif;">
                Become Our Partner
            </h3>
            <p style="font-size: 1.15rem; color: rgba(255, 255, 255, 0.9); margin-bottom: 2rem; max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.6;">
                Join clubs, associations, and organizations that host events at The Barn. Partner with us and reach your community.
            </p>
            <a href="/partners/create" class="btn" style="display: inline-flex; align-items: center; gap: 0.75rem; padding: 1rem 2.5rem; border-radius: 50px; background: white; color: #2D5016; text-decoration: none; font-weight: 600; font-size: 1rem; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); transition: all 0.3s ease;">
                <span>Apply to Become a Partner</span>
                <span style="font-size: 1.2rem;">→</span>
            </a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include __DIR__ . '/layouts/main.php';
?>
