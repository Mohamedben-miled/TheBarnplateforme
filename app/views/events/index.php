<?php
// Static Events page - No database required
// REMOVED: All database queries for events, interests, filtering

// TRANSLATED: French version - Events page
$title = 'Programmes de formation à The Barn | Base de formation permanente pour organisations';
$metaDescription = 'Découvrez les programmes de formation récurrents organisés par nos organisations partenaires à The Barn. Jours fixes, partenariats à long terme à Soukra.';
ob_start();
?>

<!-- Hero Section - Professional -->
<section class="hero-section" style="min-height: 85vh; position: relative; margin: 0; padding: 0; overflow: hidden;">
    <!-- Background Image -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;">
        <img src="/images/heroevents.png" alt="Événements à The Barn" 
             style="width: 100%; height: 100%; object-fit: cover; filter: brightness(0.6);">
        <!-- Overlay for better text readability -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.2) 100%);"></div>
    </div>
    
    <!-- Content Overlay -->
    <div style="position: relative; z-index: 2; max-width: 1400px; margin: 0 auto; padding: 6rem 40px; min-height: 85vh; display: flex; flex-direction: column; justify-content: center;">
        <div style="max-width: 700px;">
            <!-- TRANSLATED: Hero section -->
            <h1 style="font-size: 3.5rem; font-weight: 800; color: white; margin-bottom: 1.5rem; line-height: 1.2; font-family: 'Georgia', serif; letter-spacing: -1px; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                Programmes de formation à The Barn
            </h1>
            <p style="font-size: 1.25rem; color: rgba(255,255,255,0.95); margin-bottom: 2.5rem; line-height: 1.8; font-weight: 400; text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                Programmes de formation récurrents organisés par nos organisations partenaires. Jours fixes, partenariats à long terme, environnement professionnel.
            </p>
            
            <!-- TRANSLATED: CTAs - Removed secondary CTA, kept only primary -->
            <div style="margin-bottom: 2.5rem;">
                <a href="#contact" class="btn btn-secondary" style="padding: 1rem 2rem; font-size: 1rem; font-weight: 600; box-shadow: 0 4px 12px rgba(0,0,0,0.3); display: inline-block;">
                    Devenir partenaire
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Divider Line -->
<div style="border-top: 1px solid var(--border-color); margin: 0;"></div>

<!-- Filter Section - REMOVED: Database-driven filter -->
<!-- REMOVED: Dynamic interest filtering. This is now a static marketing site. -->

<!-- Events Grid - Modern Redesign -->
<section id="events-grid" style="margin: 0; padding: 5rem 0; background: linear-gradient(180deg, #FBF6F0 0%, #FFFFFF 100%);">
    <div class="container" style="max-width: 1600px; margin: 0 auto; padding: 0 3rem;">
        <!-- Header Section -->
        <div style="text-align: center; margin-bottom: 4rem;">
            <!-- TRANSLATED: Section heading -->
            <h2 style="font-size: 3rem; font-weight: 800; color: #2C1810; margin-bottom: 1rem; font-family: 'Georgia', serif; line-height: 1.2; letter-spacing: -1px;">
                Événements à venir
            </h2>
            <p style="font-size: 1.125rem; color: #5D4037; max-width: 600px; margin: 0 auto; line-height: 1.7; font-weight: 400;">
                Programmes de formation récurrents organisés par nos organisations partenaires. Rejoignez une communauté de professionnels et d'apprenants.
            </p>
        </div>
        
        <!-- REMOVED: Database-driven events grid -->
        <!-- This is now a static marketing site - no dynamic events -->
        
        <!-- Empty State - New Design -->
            <div style="max-width: 700px; margin: 0 auto;">
                <div style="background: white; border-radius: 20px; padding: 4rem 3rem; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: 1px solid rgba(139, 90, 60, 0.1); position: relative; overflow: hidden;">
                    <!-- Subtle background pattern -->
                    <div style="position: absolute; top: -50px; right: -50px; width: 200px; height: 200px; background: linear-gradient(135deg, #F5E6D3 0%, transparent 100%); border-radius: 50%; opacity: 0.3;"></div>
                    <div style="position: absolute; bottom: -30px; left: -30px; width: 150px; height: 150px; background: linear-gradient(135deg, #E8F0E0 0%, transparent 100%); border-radius: 50%; opacity: 0.3;"></div>
                    
                    <div style="position: relative; z-index: 1; text-align: center;">
                        <div style="display: inline-flex; align-items: center; justify-content: center; width: 100px; height: 100px; background: linear-gradient(135deg, #FDF8F3 0%, #F5E6D3 100%); border-radius: 20px; margin-bottom: 2rem; box-shadow: 0 4px 16px rgba(139, 90, 60, 0.1);">
                            <img src="/images/calendar.png" alt="Calendar" style="width: 60px; height: 60px; object-fit: contain;">
                        </div>
                        
                        <!-- TRANSLATED: Empty state -->
                        <h3 style="font-size: 2rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Georgia', serif; line-height: 1.3; letter-spacing: -0.3px;">
                            Aucun événement programmé pour le moment
                        </h3>
                        
                        <p style="color: #5D4037; margin-bottom: 2.5rem; font-size: 1.0625rem; line-height: 1.7; max-width: 520px; margin-left: auto; margin-right: auto;">
                            Soyez la première organisation à établir votre base de formation permanente à The Barn. Discutez d'un partenariat de formation avec nous.
                        </p>
                        
                        <a href="#contact" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: 0.75rem; padding: 1.1rem 2.5rem; border-radius: 50px; background: linear-gradient(135deg, #FF6B35 0%, #FF8C42 100%); color: white; text-decoration: none; font-weight: 600; font-size: 1.05rem; box-shadow: 0 4px 16px rgba(255, 107, 53, 0.3); transition: all 0.3s ease;">
                            <span>Discuter d'un partenariat de formation</span>
                            <span style="font-size: 1.1rem;">→</span>
                        </a>
                    </div>
                </div>
            </div>
    </div>
</section>

<!-- Divider Line -->
<div style="border-top: 1px solid var(--border-color); margin: 0;"></div>

<!-- How It Works Section - Professional -->
<section style="margin: 0; padding: 6rem 0; position: relative; overflow: hidden; background-image: url('/images/community-workshop.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
    <!-- Overlay for readability -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255, 255, 255, 0.85); pointer-events: none; z-index: 0;"></div>
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 40px; position: relative; z-index: 1;">
        <div style="text-align: center; margin-bottom: 5rem;">
            <!-- TRANSLATED: Section heading -->
            <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 1rem; font-family: 'Georgia', serif; line-height: 1.3; letter-spacing: -0.5px;">
                Comment ça fonctionne
            </h2>
            <p style="font-size: 1.0625rem; color: var(--text-medium); max-width: 600px; margin: 0 auto; line-height: 1.6;">
                Étapes simples pour établir votre base de formation permanente à The Barn.
            </p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 3.5rem; position: relative;">
            <!-- TRANSLATED: Step 1 -->
            <div style="text-align: center; position: relative;">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #2D5016 0%, #1e3a0f 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; box-shadow: 0 4px 16px rgba(45, 80, 22, 0.25); font-size: 2rem; font-weight: 700; color: white; transition: all 0.3s ease;">
                    1
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif; line-height: 1.3;">
                    Discuter de vos besoins de formation
                </h3>
                <p style="color: var(--text-medium); line-height: 1.6; font-size: 1rem;">
                    Contactez-nous pour discuter des programmes de formation de votre organisation. Nous explorerons comment The Barn peut servir de base de formation permanente.
                </p>
            </div>
            
            <!-- TRANSLATED: Step 2 -->
            <div style="text-align: center; position: relative;">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #FF6B35 0%, #FF8C42 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; box-shadow: 0 4px 16px rgba(255, 107, 53, 0.25); font-size: 2rem; font-weight: 700; color: white; transition: all 0.3s ease;">
                    2
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif; line-height: 1.3;">
                    Établir votre programme récurrent
                </h3>
                <p style="color: var(--text-medium); line-height: 1.6; font-size: 1rem;">
                    Définissez vos jours fixes—hebdomadaires ou bi-hebdomadaires. Mêmes jours, même configuration, à chaque fois. Une base stable pour vos programmes de formation.
                </p>
            </div>
            
            <!-- TRANSLATED: Step 3 -->
            <div style="text-align: center; position: relative;">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #F5E6D3 0%, #E8D5C4 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; box-shadow: 0 4px 16px rgba(139, 90, 60, 0.2); font-size: 2rem; font-weight: 700; color: #2C1810; transition: all 0.3s ease;">
                    3
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif; line-height: 1.3;">
                    Construire un partenariat à long terme
                </h3>
                <p style="color: var(--text-medium); line-height: 1.6; font-size: 1rem;">
                    Développez la présence de votre organisation dans notre communauté. Nous soutenons vos programmes et aidons à construire des partenariats durables.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Divider Line -->
<div style="border-top: 1px solid var(--border-color); margin: 0;"></div>

<!-- CTA Section - Professional -->
<section style="margin: 0; padding: 6rem 0; background: var(--bg-light);">
    <div class="container" style="max-width: 1000px; margin: 0 auto; padding: 0 40px;">
        <div style="text-align: center; padding: 4.5rem 4rem; background: linear-gradient(135deg, #2D5016 0%, #1e3a0f 100%); border-radius: 20px; box-shadow: 0 4px 24px rgba(45, 80, 22, 0.25); position: relative; overflow: hidden;">
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.08) 0%, transparent 50%); pointer-events: none;"></div>
            <!-- Calendar background decoration -->
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-image: url('/images/calendar.png'); background-size: 150px; background-repeat: no-repeat; background-position: top right; opacity: 0.05; pointer-events: none; border-radius: 20px;"></div>
            <div style="position: relative; z-index: 1;">
                <!-- TRANSLATED: CTA section -->
                <h2 style="font-size: 2.5rem; font-weight: 700; color: white; margin-bottom: 1.25rem; font-family: 'Georgia', serif; line-height: 1.3; letter-spacing: -0.5px;">
                    Prêt à établir votre base de formation permanente ?
                </h2>
                <p style="font-size: 1.125rem; color: rgba(255, 255, 255, 0.95); margin-bottom: 2.5rem; max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.6;">
                    Partenariat avec The Barn pour programmes de formation récurrents. Jours fixes, même configuration, environnement professionnel. Une base stable pour votre organisation.
                </p>
                <a href="#contact" class="btn" style="display: inline-flex; align-items: center; gap: 0.625rem; padding: 1.0625rem 2.5rem; border-radius: 50px; background: white; color: #2D5016; text-decoration: none; font-weight: 600; font-size: 1rem; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); transition: all 0.25s ease;">
                    <span>Discuter d'un partenariat de formation</span>
                    <span style="font-size: 1.125rem;">→</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- REMOVED: Event filtering JavaScript - No database-driven events to filter -->
<!-- REMOVED: Event card hover effects JavaScript - No dynamic event cards -->

<style>
.filter-btn {
    transition: all 0.25s ease;
}

.event-card {
    opacity: 1;
    transform: translateY(0);
    transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
}

.event-card img {
    transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.btn-primary:hover,
.btn-secondary:hover,
.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2) !important;
}

/* Responsive Design */
@media (max-width: 768px) {
    #events-grid .container {
        padding: 0 1.5rem;
    }
    
    #events-grid h2 {
        font-size: 2.25rem !important;
    }
    
    .events-grid {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }
    
    .event-card {
        border-radius: 20px !important;
    }
    
    .event-card > div:first-child {
        height: 200px !important;
    }
}

@media (max-width: 480px) {
    #events-grid {
        padding: 3rem 0 !important;
    }
    
    #events-grid h2 {
        font-size: 1.875rem !important;
    }
    
    .event-card > div:last-child {
        padding: 1.75rem !important;
    }
}
</style>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?>
