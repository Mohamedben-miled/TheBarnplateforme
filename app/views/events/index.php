<?php
$title = 'Events & Workshops at The Barn | Hourly Workshop Space';
$metaDescription = 'Discover workshops and trainings at The Barn or host your own event with hourly space rental in Soukra.';
ob_start();
?>

<!-- Hero Section - Professional -->
<section class="hero-section" style="min-height: 85vh; position: relative; margin: 0; padding: 0; overflow: hidden;">
    <!-- Background Image -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;">
        <img src="/images/heroevents.png" alt="Events at The Barn" 
             style="width: 100%; height: 100%; object-fit: cover; filter: brightness(0.6);">
        <!-- Overlay for better text readability -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.2) 100%);"></div>
    </div>
    
    <!-- Content Overlay -->
    <div style="position: relative; z-index: 2; max-width: 1400px; margin: 0 auto; padding: 6rem 40px; min-height: 85vh; display: flex; flex-direction: column; justify-content: center;">
        <div style="max-width: 700px;">
            <h1 style="font-size: 3.5rem; font-weight: 800; color: white; margin-bottom: 1.5rem; line-height: 1.2; font-family: 'Georgia', serif; letter-spacing: -1px; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                Events & Workshops at The Barn
            </h1>
            <p style="font-size: 1.25rem; color: rgba(255,255,255,0.95); margin-bottom: 2.5rem; line-height: 1.8; font-weight: 400; text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">
                Discover workshops, trainings, and meetups hosted by clubs, associations, coaches, and trainers.
            </p>
            
            <div style="display: flex; gap: 1rem; margin-bottom: 2.5rem; flex-wrap: wrap;">
                <a href="/register" class="btn btn-secondary" style="padding: 1rem 2rem; font-size: 1rem; font-weight: 600; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                    Host a Workshop
                </a>
                <a href="#events-grid" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1rem; font-weight: 600; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                    Browse Events
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Divider Line -->
<div style="border-top: 1px solid var(--border-color); margin: 0;"></div>

<!-- Filter Section - Professional Design -->
<?php if (!empty($interests)): ?>
<section style="margin: 0; padding: 4rem 0; background: var(--bg-light);">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 40px;">
        <div style="background: white; border-radius: 16px; padding: 2.5rem 3rem; box-shadow: 0 2px 16px rgba(0,0,0,0.06); border: 1px solid rgba(139, 90, 60, 0.08); position: relative;">
            <!-- Calendar background decoration -->
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-image: url('/images/calendar.png'); background-size: 100px; background-repeat: no-repeat; background-position: top right; opacity: 0.03; pointer-events: none; border-radius: 16px;"></div>
            <div style="text-align: center; margin-bottom: 2rem; position: relative; z-index: 1;">
                <h2 style="font-size: 1.25rem; font-weight: 600; color: #2C1810; margin-bottom: 0.5rem; font-family: 'Inter', sans-serif; letter-spacing: 0.3px;">
                    Filter Events
                </h2>
                <p style="font-size: 0.875rem; color: var(--text-medium); text-transform: uppercase; letter-spacing: 1px; font-weight: 500;">
                    Find by topic
                </p>
            </div>
            <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; justify-content: center; align-items: center; position: relative; z-index: 1;">
                <button class="filter-btn active" data-filter="all" style="padding: 0.875rem 2rem; background: #2D5016; color: white; border: none; border-radius: 50px; font-size: 0.9375rem; font-weight: 600; cursor: pointer; transition: all 0.25s ease; box-shadow: 0 2px 8px rgba(45, 80, 22, 0.2);">
                    All Events
                </button>
                <?php foreach ($interests as $interest): ?>
                    <button class="filter-btn" data-filter="<?= htmlspecialchars($interest['id']) ?>" style="padding: 0.875rem 2rem; background: #FDF8F3; color: #2C1810; border: 1px solid rgba(139, 90, 60, 0.15); border-radius: 50px; font-size: 0.9375rem; font-weight: 500; cursor: pointer; transition: all 0.25s ease;">
                        <?= htmlspecialchars($interest['name']) ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Events Grid - Professional -->
<section id="events-grid" style="margin: 0; padding: 6rem 0; background: var(--bg-light);">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 40px;">
        <div style="text-align: center; margin-bottom: 5rem;">
            <div style="display: inline-block; padding: 0.5rem 1.5rem; background: linear-gradient(135deg, #F5E6D3 0%, #E8D5C4 100%); border-radius: 50px; margin-bottom: 1.5rem;">
                <span style="font-size: 0.875rem; font-weight: 600; color: #2C1810; text-transform: uppercase; letter-spacing: 1px;">Events & Workshops</span>
            </div>
            <h2 style="font-size: 2.75rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 1.25rem; font-family: 'Georgia', serif; line-height: 1.2; letter-spacing: -0.5px;">
                Upcoming Events
            </h2>
            <p style="font-size: 1.125rem; color: var(--text-medium); max-width: 650px; margin: 0 auto; line-height: 1.7;">
                Discover workshops, trainings, and sessions happening soon at The Barn.
            </p>
        </div>
        
        <?php if (!empty($events)): ?>
            <div class="events-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(360px, 1fr)); gap: 2.5rem;">
                <?php 
                $eventImages = [
                    '/images/community-workshop.jpg',
                    '/images/WhatsApp Image 2026-01-11 at 10.07.20 AM.jpeg',
                    '/images/WhatsApp Image 2026-01-11 at 10.07.21 AM (1).jpeg',
                    '/images/WhatsApp Image 2026-01-11 at 10.07.21 AM (2).jpeg',
                    '/images/WhatsApp Image 2026-01-11 at 10.07.21 AM.jpeg'
                ];
                $imageIndex = 0;
                foreach ($events as $event): 
                    $interestIds = $event['interests'] ?? [];
                    $eventImage = $eventImages[$imageIndex % count($eventImages)];
                    $imageIndex++;
                ?>
                    <div class="card event-card" 
                         data-interests="<?= htmlspecialchars(json_encode($interestIds)) ?>"
                         style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: 1px solid rgba(139, 90, 60, 0.1); transition: all 0.3s ease; display: flex; flex-direction: column; height: 100%;">
                        
                        <!-- Event Image -->
                        <div style="width: 100%; height: 200px; position: relative; overflow: hidden;">
                            <img src="<?= htmlspecialchars($eventImage) ?>" alt="<?= htmlspecialchars($event['title']) ?>" 
                                 style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;">
                            <div style="position: absolute; top: 1rem; right: 1rem; background: rgba(255, 255, 255, 0.95); padding: 0.5rem 1rem; border-radius: 16px; font-size: 0.8125rem; font-weight: 700; color: #2D5016; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                <?= date('M j', strtotime($event['event_date'])) ?>
                            </div>
                        </div>
                        
                        <!-- Event Content -->
                        <div style="padding: 2rem; flex-grow: 1; display: flex; flex-direction: column;">
                            <h3 class="card-title" style="font-size: 1.5rem; font-weight: 700; color: #2C1810; margin-bottom: 1.5rem; font-family: 'Inter', sans-serif; line-height: 1.4;">
                                <?= htmlspecialchars($event['title']) ?>
                            </h3>
                            
                            <div style="margin-bottom: 2rem; flex-grow: 1;">
                                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem; color: var(--text-dark); font-size: 0.9375rem;">
                                    <img src="/images/calendar.png" alt="Calendar" style="width: 18px; height: 18px; object-fit: contain; opacity: 0.6;">
                                    <span style="font-weight: 500;"><?= date('F j, Y', strtotime($event['event_date'])) ?></span>
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem; color: var(--text-dark); font-size: 0.9375rem;">
                                    <span style="font-size: 1rem; width: 18px; text-align: center; opacity: 0.6;">🕐</span>
                                    <span style="font-weight: 500;"><?= date('g:i A', strtotime($event['start_time'])) ?> - <?= date('g:i A', strtotime($event['end_time'])) ?></span>
                                </div>
                                <?php if (!empty($event['first_name'])): ?>
                                    <div style="display: flex; align-items: center; gap: 0.75rem; color: var(--text-light); font-size: 0.875rem;">
                                        <span style="font-size: 1rem; width: 18px; text-align: center; opacity: 0.6;">👤</span>
                                        <span style="font-weight: 500;">Hosted by <?= htmlspecialchars($event['first_name'] . ' ' . $event['last_name']) ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <a href="/events/<?= $event['id'] ?>" class="btn btn-primary" style="width: 100%; text-align: center; padding: 1rem 1.5rem; border-radius: 12px; background: #2D5016; color: white; text-decoration: none; font-weight: 600; font-size: 0.9375rem; box-shadow: 0 2px 8px rgba(45, 80, 22, 0.2); transition: all 0.3s ease; display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem;">
                                <span>View Details</span>
                                <span style="font-size: 1rem;">→</span>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
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
                        
                        <h3 style="font-size: 2rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Georgia', serif; line-height: 1.3; letter-spacing: -0.3px;">
                            No events scheduled yet
                        </h3>
                        
                        <p style="color: #5D4037; margin-bottom: 2.5rem; font-size: 1.0625rem; line-height: 1.7; max-width: 520px; margin-left: auto; margin-right: auto;">
                            Be the first to host a workshop or training at The Barn. Our flexible space is ready for your next event.
                        </p>
                        
                        <a href="/register" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: 0.75rem; padding: 1.1rem 2.5rem; border-radius: 50px; background: linear-gradient(135deg, #FF6B35 0%, #FF8C42 100%); color: white; text-decoration: none; font-weight: 600; font-size: 1.05rem; box-shadow: 0 4px 16px rgba(255, 107, 53, 0.3); transition: all 0.3s ease;">
                            <span>Host a Workshop</span>
                            <span style="font-size: 1.1rem;">→</span>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
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
            <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 1rem; font-family: 'Georgia', serif; line-height: 1.3; letter-spacing: -0.5px;">
                How Hosting Works
            </h2>
            <p style="font-size: 1.0625rem; color: var(--text-medium); max-width: 600px; margin: 0 auto; line-height: 1.6;">
                Simple steps to host your workshop or training at The Barn.
            </p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 3.5rem; position: relative;">
            <!-- Step 1 -->
            <div style="text-align: center; position: relative;">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #2D5016 0%, #1e3a0f 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; box-shadow: 0 4px 16px rgba(45, 80, 22, 0.25); font-size: 2rem; font-weight: 700; color: white; transition: all 0.3s ease;">
                    1
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif; line-height: 1.3;">
                    Choose your date and time
                </h3>
                <p style="color: var(--text-medium); line-height: 1.6; font-size: 1rem;">
                    Select the perfect date and time slot for your workshop. We offer flexible hourly rentals.
                </p>
            </div>
            
            <!-- Step 2 -->
            <div style="text-align: center; position: relative;">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #FF6B35 0%, #FF8C42 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; box-shadow: 0 4px 16px rgba(255, 107, 53, 0.25); font-size: 2rem; font-weight: 700; color: white; transition: all 0.3s ease;">
                    2
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif; line-height: 1.3;">
                    Book the space by the hour
                </h3>
                <p style="color: var(--text-medium); line-height: 1.6; font-size: 1rem;">
                    Reserve the space for your event. Our hourly booking system makes it easy and affordable.
                </p>
            </div>
            
            <!-- Step 3 -->
            <div style="text-align: center; position: relative;">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #F5E6D3 0%, #E8D5C4 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; box-shadow: 0 4px 16px rgba(139, 90, 60, 0.2); font-size: 2rem; font-weight: 700; color: #2C1810; transition: all 0.3s ease;">
                    3
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #2C1810; margin-bottom: 1rem; font-family: 'Inter', sans-serif; line-height: 1.3;">
                    We help promote your event
                </h3>
                <p style="color: var(--text-medium); line-height: 1.6; font-size: 1rem;">
                    Once approved, we'll help promote your event to our community and partners.
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
                <h2 style="font-size: 2.5rem; font-weight: 700; color: white; margin-bottom: 1.25rem; font-family: 'Georgia', serif; line-height: 1.3; letter-spacing: -0.5px;">
                    Ready to Host Your Workshop?
                </h2>
                <p style="font-size: 1.125rem; color: rgba(255, 255, 255, 0.95); margin-bottom: 2.5rem; max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.6;">
                    Rent our space by the hour and bring your audience. We provide the venue and help promote your event.
                </p>
                <a href="/register" class="btn" style="display: inline-flex; align-items: center; gap: 0.625rem; padding: 1.0625rem 2.5rem; border-radius: 50px; background: white; color: #2D5016; text-decoration: none; font-weight: 600; font-size: 1rem; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); transition: all 0.25s ease;">
                    <span>Host a Workshop</span>
                    <span style="font-size: 1.125rem;">→</span>
                </a>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const eventCards = document.querySelectorAll('.event-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filterValue = this.getAttribute('data-filter');
            
            // Update active state
            filterButtons.forEach(btn => {
                if (btn === this) {
                    btn.classList.add('active');
                    btn.style.background = '#2D5016';
                    btn.style.color = 'white';
                    btn.style.border = 'none';
                    btn.style.boxShadow = '0 2px 8px rgba(45, 80, 22, 0.2)';
                } else {
                    btn.classList.remove('active');
                    btn.style.background = '#FDF8F3';
                    btn.style.color = '#2C1810';
                    btn.style.border = '1px solid rgba(139, 90, 60, 0.15)';
                    btn.style.boxShadow = 'none';
                }
            });
            
            // Filter events
            eventCards.forEach(card => {
                if (filterValue === 'all') {
                    card.style.display = 'flex';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 10);
                } else {
                    const interests = JSON.parse(card.getAttribute('data-interests') || '[]');
                    if (interests.includes(parseInt(filterValue))) {
                        card.style.display = 'flex';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 10);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                }
            });
        });
    });
    
    // Event card hover effects - Professional
    eventCards.forEach(card => {
        const img = card.querySelector('img');
        
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
            this.style.boxShadow = '0 8px 24px rgba(0,0,0,0.1)';
            if (img) {
                img.style.transform = 'scale(1.05)';
            }
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 2px 12px rgba(0,0,0,0.06)';
            if (img) {
                img.style.transform = 'scale(1)';
            }
        });
    });
    
    // Filter button hover
    filterButtons.forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            if (!this.classList.contains('active')) {
                this.style.background = '#F5E6D3';
                this.style.borderColor = 'rgba(139, 90, 60, 0.25)';
            }
        });
        
        btn.addEventListener('mouseleave', function() {
            if (!this.classList.contains('active')) {
                this.style.background = '#FDF8F3';
                this.style.borderColor = 'rgba(139, 90, 60, 0.15)';
            }
        });
    });
});
</script>

<style>
.filter-btn {
    transition: all 0.25s ease;
}

.event-card {
    opacity: 1;
    transform: translateY(0);
    transition: all 0.3s ease;
}

.btn-primary:hover,
.btn-secondary:hover,
.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2) !important;
}
</style>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?>
