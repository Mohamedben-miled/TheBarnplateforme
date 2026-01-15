# Installation Guide

## Quick Start

1. **Install Composer dependencies**
   ```bash
   composer install
   ```

2. **Configure Database**
   - Edit `app/config/database.php` with your MySQL credentials
   - Create the database: `CREATE DATABASE thebarn_db;`
   - Import schema: `mysql -u root -p thebarn_db < database/schema.sql`

3. **Configure Email (Optional)**
   - Edit `app/config/email.php` with your SMTP settings
   - For Gmail: Use App Password (not regular password)

4. **Set Up Web Server**

   **Option A: PHP Built-in Server (Development)**
   ```bash
   cd public
   php -S localhost:8000
   ```
   Then visit: http://localhost:8000

   **Option B: Apache**
   - Point DocumentRoot to `public/` directory
   - Ensure mod_rewrite is enabled
   - `.htaccess` should work automatically

   **Option C: Nginx**
   ```nginx
   server {
       listen 80;
       server_name thebarn.local;
       root /path/to/TheBarnp/public;
       index index.php;

       location / {
           try_files $uri $uri/ /index.php?$query_string;
       }

       location ~ \.php$ {
           fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;
           fastcgi_index index.php;
           include fastcgi_params;
           fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
       }
   }
   ```

5. **Verify Installation**
   ```bash
   php setup.php
   ```

6. **Login**
   - URL: http://your-domain/
   - Admin: admin@thebarn.com / admin123
   - **Change admin password immediately!**

## Default Data

The schema includes:
- 6 default interests (Technology, Business, Wellness, Arts & Culture, Education, Networking)
- 1 admin user (admin@thebarn.com / admin123)

## Troubleshooting

**"Route not found" errors:**
- Ensure `.htaccess` is in `public/` directory
- Check mod_rewrite is enabled (Apache)
- Verify web server points to `public/` directory

**Database connection errors:**
- Check `app/config/database.php` credentials
- Ensure MySQL is running
- Verify database exists

**Email not sending:**
- Check `app/config/email.php` settings
- Verify PHPMailer is installed: `composer install`
- Check server logs for SMTP errors

**Class not found errors:**
- Run `composer install`
- Check autoloader in `public/index.php`

## File Permissions

Ensure these directories are writable (if needed):
- `app/config/` (for future config caching)
- Logs directory (if you add logging)

## Security Checklist

- [ ] Change default admin password
- [ ] Update database credentials
- [ ] Configure email settings
- [ ] Set proper file permissions
- [ ] Enable HTTPS in production
- [ ] Review `app/config/` files
- [ ] Disable error display in production (`ini_set('display_errors', 0)`)

