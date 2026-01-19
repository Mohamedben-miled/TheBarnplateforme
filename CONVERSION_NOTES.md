# Conversion Notes: PHP to Static HTML

## Summary
This project has been converted from a PHP-based MVC application to a pure static HTML/CSS/JS single-page website.

## Files Created
- **`index.html`** - Complete single-page website containing all content

## Files Deleted (PHP Views and Routing)
- `app/views/home.php` - Merged into index.html
- `app/views/partials/header.php` - Inlined into index.html
- `app/views/partials/footer.php` - Inlined into index.html
- `app/views/layouts/main.php` - CSS extracted and inlined into index.html
- `app/views/events/index.php` - Events page removed (as requested)
- `app/views/events/create.php` - Events page removed
- `app/views/events/show.php` - Events page removed
- `app/views/events/organizer_list.php` - Events page removed
- `public/index.php` - PHP router removed
- `public/router.php` - PHP router removed

## Content Merged into index.html

### Sections Included:
1. **Hero Section** (`#hero`)
   - Main headline and CTA
   - Background image: `images/hero-workspace.jpg`

2. **Services Section**
   - "Établir votre base de formation" card
   - Background image: `images/community-workshop.jpg`
   - **REMOVED**: "Attend a Workshop" and "Join the Community" cards (contained Events links)

3. **Amenities & Features Section** (`#amenities`)
   - Wi-Fi, Meeting Rooms, Space, Presentation Equipment, Parking, Climate Control, Catering
   - Background image: `images/community-workshop.jpg`

4. **Who This Space Is For Section** (`#who-for`)
   - Cabinets de formation
   - Associations et clubs
   - Organisations recherchant un partenariat

5. **How It Works Section** (`#how-it-works`)
   - 3-step process for establishing training partnerships
   - Background image: `images/community-workshop.jpg`

6. **Communities & Partners Section** (`#partners`)
   - Partner community message
   - CTA for training partnerships
   - Background image: `images/community-workshop.jpg`

7. **Footer/Contact Section** (`#contact`)
   - Contact information
   - Quick links (anchor navigation)
   - Company description

## Navigation Changes

### Before (PHP routing):
- `/` - Homepage
- `/events` - Events page
- `/partners` - Partners page

### After (Anchor links):
- `#hero` - Accueil
- `#amenities` - Équipements
- `#who-for` - Pour qui
- `#how-it-works` - Comment ça fonctionne
- `#partners` - Partenaires
- `#contact` - Contact

## Events Page Removal

### Removed:
- All Events page files (`app/views/events/*.php`)
- All navigation links to `/events`
- All buttons/CTAs linking to Events page
- "Attend a Workshop" card (linked to Events)
- "Join the Community" card (linked to Events)

### Kept:
- "Établir votre base de formation" card (links to `#contact`)

## Technical Changes

### PHP Removed:
- All `<?php ?>` tags
- All `include` and `require` statements
- All PHP variables (`$title`, `$metaDescription`, `$heroImage`, etc.)
- All `ob_start()` and `ob_get_clean()`
- PHP date function (replaced with JavaScript)

### JavaScript Added:
- Smooth scrolling for anchor links
- Dynamic year in footer copyright

### CSS:
- All styles from `main.php` inlined into `<style>` tag in `index.html`
- No external CSS files
- All existing styling preserved

## Image Paths
All image paths converted from PHP variables to static paths:
- `/images/hero-workspace.jpg` → `images/hero-workspace.jpg`
- `/images/community-workshop.jpg` → `images/community-workshop.jpg`
- `/images/host.png` → `images/host.png`

## Testing
The site can now be opened directly in a browser:
- Open `index.html` in any web browser
- No server required
- No PHP required
- All navigation works via anchor links with smooth scrolling

## Notes
- All content from `home.php` has been merged
- Design and styling unchanged
- All Events-related content removed
- Navigation fully functional with anchor links
- Site is now 100% static HTML/CSS/JS

