# Quick Start Guide

## Step 1: Set Up Database

1. **Create the database:**
   ```sql
   CREATE DATABASE thebarn_db;
   ```

2. **Import the schema:**
   ```bash
   mysql -u root -p thebarn_db < database/schema.sql
   ```
   
   Or manually:
   - Open MySQL client (phpMyAdmin, MySQL Workbench, or command line)
   - Select `thebarn_db` database
   - Run the SQL from `database/schema.sql`

3. **Update database config** (if needed):
   - Edit `app/config/database.php`
   - Change `username` and `password` if your MySQL uses different credentials

## Step 2: Install Dependencies (Optional - for email)

**Option A: Install Composer** (recommended for email features)
- Download from: https://getcomposer.org/download/
- Then run: `composer install`

**Option B: Skip for now** (app works without email)
- The app will run but email notifications won't work
- You can add this later

## Step 3: Run the Application

### Method 1: PHP Built-in Server (Easiest for Testing)

```bash
cd public
php -S localhost:8000
```

Then open your browser: **http://localhost:8000**

### Method 2: Using XAMPP/WAMP

1. Copy the entire `TheBarnp` folder to `htdocs` (XAMPP) or `www` (WAMP)
2. Create a virtual host pointing to `TheBarnp/public` directory
3. Or access via: `http://localhost/TheBarnp/public`

### Method 3: Using Laragon/Other Local Server

1. Point your server's document root to `TheBarnp/public`
2. Access via your configured domain

## Step 4: Login

- **URL:** http://localhost:8000 (or your configured URL)
- **Admin Login:**
  - Email: `admin@thebarn.com`
  - Password: `admin123`
  
⚠️ **Change the admin password immediately after first login!**

## Troubleshooting

**"Route not found" error:**
- Make sure you're accessing via `public/index.php` or have URL rewriting configured
- For PHP built-in server, use: `php -S localhost:8000 -t public`

**Database connection error:**
- Check `app/config/database.php` credentials
- Make sure MySQL is running
- Verify database `thebarn_db` exists

**Class not found errors:**
- Run `composer install` if you want email features
- Or ignore if you don't need email (app will log errors but work)

**Can't access the site:**
- Make sure you're in the `public` directory when running PHP server
- Or configure your web server to point to `public/` directory

