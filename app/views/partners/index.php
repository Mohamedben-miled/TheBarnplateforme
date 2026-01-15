<?php
$title = 'Partners - The Barn Coworking';
ob_start();
?>

<div class="section-header">
    <h2>Our Partners</h2>
    <p>Clubs, associations, and organizations that host events at The Barn</p>
</div>

<?php if (!empty($partners)): ?>
    <!-- Partners Carousel -->
    <div class="partners-section" style="margin-top: 2rem;">
        <div class="partners-carousel">
            <div class="partners-track">
                <?php 
                // Display partners twice for seamless loop
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

    <!-- Detailed Partner Cards -->
    <h2 style="margin: 4rem 0 2rem; font-size: 2rem; font-weight: 700; background: var(--gradient-primary); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
        Partner Details
    </h2>
    <div class="grid">
        <?php foreach ($partners as $partner): ?>
            <div class="card">
                <h3 class="card-title"><?= htmlspecialchars($partner['name']) ?></h3>
                <p style="margin-bottom: 0.5rem;">
                    <strong>Type:</strong> <?= ucfirst($partner['type']) ?>
                </p>
                <?php if ($partner['description']): ?>
                    <p style="color: var(--text-light); margin-bottom: 1rem;">
                        <?= htmlspecialchars($partner['description']) ?>
                    </p>
                <?php endif; ?>
                <?php if ($partner['contact_email']): ?>
                    <p style="margin-bottom: 0.5rem;">
                        <strong>Contact:</strong> 
                        <a href="mailto:<?= htmlspecialchars($partner['contact_email']) ?>">
                            <?= htmlspecialchars($partner['contact_email']) ?>
                        </a>
                    </p>
                <?php endif; ?>
                <?php if ($partner['website']): ?>
                    <p>
                        <a href="<?= htmlspecialchars($partner['website']) ?>" target="_blank" 
                           class="btn btn-outline">Visit Website</a>
                    </p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="card text-center">
        <p style="color: var(--text-light);">No partners listed yet.</p>
    </div>
<?php endif; ?>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?>

