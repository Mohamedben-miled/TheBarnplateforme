<?php
// Static marketing homepage - No database required
// PHP used only as template engine for includes and simple variables

// REFACTORED: Using real content from thebarncoworkingspace.com, repositioned for training organizations
$title = 'The Barn – Lieu de formation permanent à Soukra | 288m², Wi-Fi 5G, Salles de réunion';
$metaDescription = 'Espace écologique de 288m² à Ariana avec Wi-Fi 5G 160 Mbps, 100+ plantes, salles de réunion et équipements premium. Idéal pour cabinets de formation, associations et clubs. Programmes récurrents, jours fixes, partenariats à long terme.';

// Static image paths - no database lookup needed
$heroImage = '/images/hero-workspace.jpg';
$communityImage = '/images/community-workshop.jpg';

ob_start();
?>

<!-- Hero Section - Background Image -->
<section class="hero-section" style="min-height: 100vh; position: relative; margin: 0; padding: 0; overflow: hidden;">
    <!-- Background Image -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;">
        <img src="<?= $heroImage ?>" alt="Espace de formation The Barn" 
             style="width: 100%; height: 100%; object-fit: cover; filter: brightness(0.6);">
        <!-- Overlay for better text readability -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.2) 100%);"></div>
    </div>
    
    <!-- Content Overlay -->
    <div style="position: relative; z-index: 2; max-width: 1400px; margin: 0 auto; padding: 6rem 40px; min-height: 85vh; display: flex; flex-direction: column; justify-content: center;">
        <div style="max-width: 700px;">
            <!-- SIMPLIFIED: Hero headline - core positioning message only -->
            <h1 style="font-size: 3.5rem; font-weight: 800; color: white; margin-bottom: 1.5rem; line-height: 1.2; font-family: 'Georgia', serif; letter-spacing: -1px; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                Lieu de formation permanent à Soukra — idéal pour associations, clubs et cabinets de formation
            </h1>
            
            <!-- SIMPLIFIED: Short descriptive text - removed detailed metrics, amenities, and technical specs -->
            <div style="font-size: 1.25rem; color: rgba(255,255,255,0.95); margin-bottom: 2.5rem; line-height: 1.7; font-weight: 400; text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                <p style="margin-bottom: 0.75rem;">
                    <strong style="color: white;">Programmes récurrents, jours fixes.</strong> Partenariats à long terme pour votre organisation.
                </p>
                <p style="margin-bottom: 0;">
                    Pas une location ponctuelle—<strong style="color: white;">votre base de formation permanente</strong>.
                </p>
            </div>
            
            <!-- SIMPLIFIED: Single CTA - removed detailed bullets with metrics and amenities -->
            <div>
                <a href="#contact" class="btn btn-secondary" style="padding: 1.125rem 2.5rem; font-size: 1.0625rem; font-weight: 600; box-shadow: 0 4px 12px rgba(0,0,0,0.3); display: inline-block;">
                    Planifier une visite pour votre organisation
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Divider Line -->
<div style="border-top: 1px solid var(--border-color); margin: 0;"></div>

<!-- Services Section - Redesigned -->
<section style="margin: 0; padding: 6rem 0; position: relative; overflow: hidden; background-image: url('<?= $communityImage ?>'); background-size: cover; background-position: center; background-attachment: fixed;">
    <!-- White overlay for lighter look -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255, 255, 255, 0.75); pointer-events: none; z-index: 0;"></div>
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 60px; position: relative; z-index: 1;">
        <div style="text-align: center; margin-bottom: 4rem;">
            <!-- REFACTORED: Section heading repositioned for training organizations -->
            <h2 style="font-size: 2.75rem; font-weight: 700; color: #2C1810; margin-bottom: 1.25rem; font-family: 'Georgia', serif; line-height: 1.2; letter-spacing: -0.3px;">
                Espace écologique à Ariana — conçu pour les programmes de formation récurrents
            </h2>
            <p style="font-size: 1.15rem; color: #5D4037; line-height: 1.7; max-width: 800px; margin: 0 auto; font-weight: 400;">
                Un environnement professionnel de 288m² avec Wi-Fi 5G, salles de réunion, et équipements premium. Idéal pour les cabinets de formation, associations et clubs qui recherchent une base stable pour leurs programmes récurrents sur jours fixes.
            </p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem;">
            <!-- Attend a Workshop Card -->
            <div style="display: flex; flex-direction: column; background: linear-gradient(180deg, #FFFFFF 0%, #FDFCFA 100%); border-radius: 20px; padding: 2.5rem; box-shadow: 0 4px 20px rgba(0,0,0,0.08), 0 2px 8px rgba(0,0,0,0.04); border: 1px solid rgba(139, 90, 60, 0.1); position: relative; overflow: hidden; height: 100%;" class="service-card">
                <!-- Image at top -->
                <div style="border-radius: 16px; overflow: hidden; box-shadow: 0 6px 20px rgba(0,0,0,0.12); margin-bottom: 2rem; height: 220px; position: relative;">
                    <img src="/images/Attend.png" alt="Workshop Session" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                </div>
                <!-- TRANSLATED: Card title and content -->
                <h3 style="font-size: 1.6rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif; line-height: 1.25;">
                    Participer à une formation
                </h3>
                <p style="color: #5D4037; margin-bottom: 2rem; line-height: 1.65; font-size: 1rem; font-weight: 400; flex-grow: 1;">
                    Découvrez les formations à venir, conférences et sessions pratiques animées par des professionnels et des leaders communautaires.
                </p>
                <a href="/events" class="btn btn-beige" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.9rem 2rem; border-radius: 10px; background: linear-gradient(135deg, #F5E6D3 0%, #E8D5C4 100%); color: #2C1810; text-decoration: none; font-weight: 600; font-size: 0.95rem; box-shadow: 0 2px 8px rgba(139, 90, 60, 0.15); border: 1px solid rgba(139, 90, 60, 0.2); width: fit-content; margin-top: auto;">
                    <span>Voir les événements à venir</span>
                    <span style="font-size: 1rem;">→</span>
                </a>
            </div>
            
            <!-- Host a Workshop Card -->
            <div style="display: flex; flex-direction: column; background: linear-gradient(180deg, #FFFFFF 0%, #FDFCFA 100%); border-radius: 20px; padding: 2.5rem; box-shadow: 0 4px 20px rgba(0,0,0,0.08), 0 2px 8px rgba(0,0,0,0.04); border: 1px solid rgba(139, 90, 60, 0.1); position: relative; overflow: hidden; height: 100%;" class="service-card">
                <!-- Image at top -->
                <div style="border-radius: 16px; overflow: hidden; box-shadow: 0 6px 20px rgba(0,0,0,0.12); margin-bottom: 2rem; height: 220px; position: relative;">
                    <img src="/images/host.png" alt="Host Workshop" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                </div>
                <!-- TRANSLATED: Card title - "Establish Your Training Base" → "Établir votre base de formation" -->
                <h3 style="font-size: 1.6rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif; line-height: 1.25;">
                    Établir votre base de formation
                </h3>
                <p style="color: #5D4037; margin-bottom: 1.25rem; line-height: 1.65; font-size: 1rem; font-weight: 400;">
                    Partenariat pour programmes de formation récurrents sur jours fixes. Même configuration, environnement professionnel, stabilité à long terme pour votre organisation.
                </p>
                <ul style="list-style: none; padding: 0; margin: 0 0 2rem 0;">
                    <li style="color: #5D4037; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.75rem; font-size: 0.95rem; font-weight: 400;">
                        <span style="color: #2D5016; font-size: 1.1rem; font-weight: 700;">✓</span> Programmes récurrents, jours fixes
                    </li>
                    <li style="color: #5D4037; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.75rem; font-size: 0.95rem; font-weight: 400;">
                        <span style="color: #2D5016; font-size: 1.1rem; font-weight: 700;">✓</span> Partenariats à long terme
                    </li>
                    <li style="color: #5D4037; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.75rem; font-size: 0.95rem; font-weight: 400;">
                        <span style="color: #2D5016; font-size: 1.1rem; font-weight: 700;">✓</span> Environnement professionnel et stable
                    </li>
                </ul>
                <a href="#contact" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.9rem 2rem; border-radius: 10px; background: #FF6B35; color: white; text-decoration: none; font-weight: 600; font-size: 0.95rem; box-shadow: 0 3px 10px rgba(255, 107, 53, 0.3); width: fit-content; margin-top: auto;">
                    <span>Contacter pour utilisation formation</span>
                    <span style="font-size: 1rem;">→</span>
                </a>
            </div>
            
            <!-- Join the Community Card -->
            <div style="display: flex; flex-direction: column; background: linear-gradient(180deg, #FFFFFF 0%, #FDFCFA 100%); border-radius: 20px; padding: 2.5rem; box-shadow: 0 4px 20px rgba(0,0,0,0.08), 0 2px 8px rgba(0,0,0,0.04); border: 1px solid rgba(139, 90, 60, 0.1); position: relative; overflow: hidden; height: 100%;" class="service-card">
                <!-- Image at top -->
                <div style="border-radius: 16px; overflow: hidden; box-shadow: 0 6px 20px rgba(0,0,0,0.12); margin-bottom: 2rem; height: 220px; position: relative;">
                    <img src="/images/join.png" alt="Join Community" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                </div>
                <!-- TRANSLATED: Card title and content -->
                <h3 style="font-size: 1.6rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif; line-height: 1.25;">
                    Rejoindre des programmes de formation
                </h3>
                <p style="color: #5D4037; margin-bottom: 2.5rem; line-height: 1.65; font-size: 1rem; font-weight: 400; flex-grow: 1;">
                    Découvrez les programmes de formation réguliers organisés par nos organisations partenaires à The Barn. Connectez-vous à une communauté d'apprenants et de professionnels.
                </p>
                <a href="/events" class="btn btn-beige" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.9rem 2rem; border-radius: 10px; background: #F5E6D3; color: #2C1810; text-decoration: none; font-weight: 600; font-size: 0.95rem; box-shadow: 0 2px 8px rgba(139, 90, 60, 0.15); border: 1px solid rgba(139, 90, 60, 0.2); width: fit-content; margin-top: auto;">
                    <span>Voir les événements à venir</span>
                    <span style="font-size: 1rem;">→</span>
                </a>
            </div>
        </div>
        
    </div>
</section>

<!-- Divider Line -->
<div style="border-top: 1px solid var(--border-color); margin: 0;"></div>

<!-- Amenities & Features Section - REFACTORED: Using real amenities from thebarncoworkingspace.com, repositioned for training organizations -->
<section id="amenities" style="margin: 0; padding: 6rem 0; position: relative; overflow: hidden; background-image: url('/images/community-workshop.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
    <!-- White overlay for readability -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255, 255, 255, 0.75); pointer-events: none; z-index: 0;"></div>
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 40px; position: relative; z-index: 1;">
        <div style="text-align: center; margin-bottom: 4rem;">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Georgia', serif; line-height: 1.3;">
                Équipements et avantages
            </h2>
            <p style="font-size: 1.15rem; color: #5D4037; line-height: 1.7; max-width: 800px; margin: 0 auto; font-weight: 400;">
                Un espace professionnel équipé pour vos programmes de formation récurrents.
            </p>
        </div>
        
        <!-- REFACTORED: Real amenities from thebarncoworkingspace.com, repositioned for training use -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
            <!-- Wi-Fi - UPDATED: Removed 5G mention, updated to "Wi-Fi haut débit (100 Mb/s)" -->
            <div style="padding: 2rem; background: #FDF8F3; border-radius: 16px; border: 1px solid rgba(139, 90, 60, 0.1); text-align: center;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">📶</div>
                <h3 style="font-size: 1.25rem; font-weight: 700; color: #2C1810; margin-bottom: 0.75rem; font-family: 'Inter', sans-serif;">
                    Wi-Fi haut débit (100 Mb/s)
                </h3>
                <p style="color: #5D4037; font-size: 0.95rem; line-height: 1.6;">
                    Connexion haut débit fiable pour vos sessions de formation et présentations en ligne.
                </p>
            </div>
            
            <!-- Meeting Rooms -->
            <div style="padding: 2rem; background: #FDF8F3; border-radius: 16px; border: 1px solid rgba(139, 90, 60, 0.1); text-align: center;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">🏢</div>
                <h3 style="font-size: 1.25rem; font-weight: 700; color: #2C1810; margin-bottom: 0.75rem; font-family: 'Inter', sans-serif;">
                    Salles de réunion
                </h3>
                <p style="color: #5D4037; font-size: 0.95rem; line-height: 1.6;">
                    Espaces dédiés pour vos sessions de formation, réunions d'équipe et présentations.
                </p>
            </div>
            
            <!-- Space Capacity - UPDATED: Removed square meter reference, kept capacity and flexibility -->
            <div style="padding: 2rem; background: #FDF8F3; border-radius: 16px; border: 1px solid rgba(139, 90, 60, 0.1); text-align: center;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">📐</div>
                <h3 style="font-size: 1.25rem; font-weight: 700; color: #2C1810; margin-bottom: 0.75rem; font-family: 'Inter', sans-serif;">
                    Espace flexible
                </h3>
                <p style="color: #5D4037; font-size: 0.95rem; line-height: 1.6;">
                    Espace flexible pouvant accueillir jusqu'à 50 participants pour vos programmes de formation.
                </p>
            </div>
            
            <!-- Presentation Equipment - ADDED: Equipment for training presentations -->
            <div style="padding: 2rem; background: #FDF8F3; border-radius: 16px; border: 1px solid rgba(139, 90, 60, 0.1); text-align: center;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">📺</div>
                <h3 style="font-size: 1.25rem; font-weight: 700; color: #2C1810; margin-bottom: 0.75rem; font-family: 'Inter', sans-serif;">
                    Équipements de présentation
                </h3>
                <p style="color: #5D4037; font-size: 0.95rem; line-height: 1.6;">
                    Écran, vidéoprojecteur, tableau disponibles selon vos besoins pour vos sessions de formation.
                </p>
            </div>
            
            <!-- Parking -->
            <div style="padding: 2rem; background: #FDF8F3; border-radius: 16px; border: 1px solid rgba(139, 90, 60, 0.1); text-align: center;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">🅿️</div>
                <h3 style="font-size: 1.25rem; font-weight: 700; color: #2C1810; margin-bottom: 0.75rem; font-family: 'Inter', sans-serif;">
                    Parking gratuit
                </h3>
                <p style="color: #5D4037; font-size: 0.95rem; line-height: 1.6;">
                    Accès facile pour vos participants avec parking gratuit disponible.
                </p>
            </div>
            
            <!-- Climate Control -->
            <div style="padding: 2rem; background: #FDF8F3; border-radius: 16px; border: 1px solid rgba(139, 90, 60, 0.1); text-align: center;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">🌡️</div>
                <h3 style="font-size: 1.25rem; font-weight: 700; color: #2C1810; margin-bottom: 0.75rem; font-family: 'Inter', sans-serif;">
                    Climatisation
                </h3>
                <p style="color: #5D4037; font-size: 0.95rem; line-height: 1.6;">
                    Contrôle climatique optimal pour le confort de vos participants toute l'année.
                </p>
            </div>
            
            <!-- Catering - ADDED: Catering and refreshments available on request -->
            <div style="padding: 2rem; background: #FDF8F3; border-radius: 16px; border: 1px solid rgba(139, 90, 60, 0.1); text-align: center;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">☕</div>
                <h3 style="font-size: 1.25rem; font-weight: 700; color: #2C1810; margin-bottom: 0.75rem; font-family: 'Inter', sans-serif;">
                    Catering et restauration
                </h3>
                <p style="color: #5D4037; font-size: 0.95rem; line-height: 1.6;">
                    Pauses café, restauration et services de catering peuvent être organisés sur demande pour vos formations.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Divider Line -->
<div style="border-top: 1px solid var(--border-color); margin: 0;"></div>

<!-- Who This Space Is For Section -->
<section style="margin: 0; padding: 6rem 0; background: white;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 40px;">
        <div style="text-align: center; margin-bottom: 4rem;">
            <!-- TRANSLATED: Section heading -->
            <h2 style="font-size: 2.5rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Georgia', serif; line-height: 1.3;">
                Pour qui cet espace est conçu
            </h2>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2.5rem;">
            <!-- TRANSLATED: Training Organizations → Cabinets de formation -->
            <div style="text-align: center; padding: 2.5rem; background: #FDF8F3; border-radius: 20px; border: 1px solid rgba(139, 90, 60, 0.1);">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #2D5016 0%, #1e3a0f 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem;">
                    🎯
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif;">
                    Cabinets de formation
                </h3>
                <p style="color: #5D4037; line-height: 1.6; font-size: 1rem;">
                    Établissez votre base de formation permanente avec des programmes récurrents sur jours fixes. Même configuration, environnement professionnel, stabilité à long terme.
                </p>
            </div>
            
            <!-- TRANSLATED: Associations & Clubs -->
            <div style="text-align: center; padding: 2.5rem; background: #FDF8F3; border-radius: 20px; border: 1px solid rgba(139, 90, 60, 0.1);">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #FF6B35 0%, #FF8C42 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem;">
                    👥
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif;">
                    Associations et clubs
                </h3>
                <p style="color: #5D4037; line-height: 1.6; font-size: 1rem;">
                    Arrêtez de chercher des salles. Construisez un partenariat à long terme avec des jours récurrents fixes et une configuration fiable et professionnelle.
                </p>
            </div>
            
            <!-- TRANSLATED: Professional Partners → Organisations recherchant un partenariat -->
            <div style="text-align: center; padding: 2.5rem; background: #FDF8F3; border-radius: 20px; border: 1px solid rgba(139, 90, 60, 0.1);">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #F5E6D3 0%, #E8D5C4 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem;">
                    🌱
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif;">
                    Organisations recherchant un partenariat
                </h3>
                <p style="color: #5D4037; line-height: 1.6; font-size: 1rem;">
                    Rejoignez une communauté de cabinets de formation. Pas de locations ponctuelles—construisez des partenariats durables et développez votre présence communautaire.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Divider Line -->
<div style="border-top: 1px solid var(--border-color); margin: 0;"></div>

<!-- Upcoming Events Section - Static placeholder content -->
<!-- REMOVED: Database-driven events section. This is now a static marketing site. -->
<!-- If you want to show sample events, add static HTML cards here -->

<!-- How It Works Section -->
<section style="margin: 0; padding: 6rem 0; position: relative; overflow: hidden; background-image: url('/images/community-workshop.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
    <!-- Overlay for readability -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255, 255, 255, 0.85); pointer-events: none; z-index: 0;"></div>
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 40px; position: relative; z-index: 1;">
        <!-- TRANSLATED: Section heading - "How It Works" → "Comment ça fonctionne" -->
        <h2 style="text-align: center; font-size: 2.5rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 1rem; font-family: 'Georgia', serif; line-height: 1.3;">
            Comment ça fonctionne
        </h2>
        <p style="text-align: center; font-size: 1.1rem; color: var(--text-medium); margin-bottom: 4rem; max-width: 600px; margin-left: auto; margin-right: auto;">
            Étapes simples pour établir votre base de formation à The Barn.
        </p>
        
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 3rem; position: relative;">
            <!-- TRANSLATED: Step 1 -->
            <div style="text-align: center; position: relative;">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #2D5016 0%, #1e3a0f 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; box-shadow: 0 4px 15px rgba(45, 80, 22, 0.3); font-size: 2rem; font-weight: 700; color: white;">
                    1
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif;">
                    Discuter de vos besoins de formation
                </h3>
                <p style="color: var(--text-medium); line-height: 1.6;">
                    Contactez-nous pour discuter des programmes de formation de votre organisation. Nous explorerons comment The Barn peut servir de base de formation permanente.
                </p>
            </div>
            
            <!-- TRANSLATED: Step 2 -->
            <div style="text-align: center; position: relative;">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #FF6B35 0%, #FF8C42 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3); font-size: 2rem; font-weight: 700; color: white;">
                    2
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif;">
                    Établir votre programme récurrent
                </h3>
                <p style="color: var(--text-medium); line-height: 1.6;">
                    Définissez vos jours fixes—hebdomadaires ou bi-hebdomadaires. Mêmes jours, même configuration, à chaque fois. Une base stable pour vos programmes de formation.
                </p>
            </div>
            
            <!-- TRANSLATED: Step 3 -->
            <div style="text-align: center; position: relative;">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #F5E6D3 0%, #E8D5C4 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; box-shadow: 0 4px 15px rgba(139, 90, 60, 0.2); font-size: 2rem; font-weight: 700; color: #2C1810;">
                    3
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif;">
                    Construire un partenariat à long terme
                </h3>
                <p style="color: var(--text-medium); line-height: 1.6;">
                    Développez la présence de votre organisation dans notre communauté. Nous soutenons vos programmes et aidons à construire des partenariats durables.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Divider Line -->
<div style="border-top: 1px solid var(--border-color); margin: 0;"></div>

<!-- Communities & Partners Section - Exact Match -->
<section style="margin: 0; padding: 5rem 0; position: relative; overflow: hidden; background-image: url('/images/community-workshop.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
    <!-- Overlay for readability -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255, 255, 255, 0.85); pointer-events: none; z-index: 0;"></div>
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 40px; position: relative; z-index: 1;">
        <!-- TRANSLATED: Section heading -->
        <h2 style="text-align: center; font-size: 2.2rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 3rem; font-family: 'Georgia', serif; line-height: 1.3;">
            Communautés et partenaires à The Barn
        </h2>
        
        <!-- Partners Section - Static placeholder -->
        <!-- REMOVED: Database-driven partners carousel. This is now a static marketing site. -->
        <div style="text-align: center; padding: 3rem; background: linear-gradient(135deg, rgba(139, 69, 19, 0.05) 0%, rgba(160, 82, 45, 0.05) 100%); border-radius: 20px; margin-bottom: 4rem; border: 1px solid rgba(139, 69, 19, 0.1);">
            <p style="color: var(--text-medium); font-size: 1.1rem;">Rejoignez notre communauté grandissante de partenaires !</p>
        </div>
        
        <!-- TRANSLATED: Become a Partner CTA -->
        <div style="text-align: center; padding: 3rem; background: linear-gradient(135deg, #2D5016 0%, #1e3a0f 100%); border-radius: 24px; box-shadow: 0 8px 32px rgba(45, 80, 22, 0.3); margin-bottom: 3rem;">
            <h3 style="font-size: 2rem; font-weight: 700; color: white; margin-bottom: 1rem; font-family: 'Georgia', serif;">
                Prêt à établir votre base de formation permanente ?
            </h3>
            <p style="font-size: 1.15rem; color: rgba(255, 255, 255, 0.9); margin-bottom: 2rem; max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.6;">
                Partenariat avec The Barn pour programmes de formation récurrents. Jours fixes, même configuration, environnement professionnel. Une base stable pour votre organisation.
            </p>
            <a href="#contact" class="btn" style="display: inline-flex; align-items: center; gap: 0.75rem; padding: 1rem 2.5rem; border-radius: 50px; background: white; color: #2D5016; text-decoration: none; font-weight: 600; font-size: 1rem; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); transition: all 0.3s ease;">
                <span>Planifier une visite pour votre organisation</span>
                <span style="font-size: 1.2rem;">→</span>
            </a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include __DIR__ . '/layouts/main.php';
?>
