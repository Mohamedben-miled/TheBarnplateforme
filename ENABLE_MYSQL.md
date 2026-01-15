# How to Enable MySQL Extension in PHP

## Quick Test Command

Run this to test MySQL:
```bash
php test_mysql.php
```

## Current Status

✅ **PHP**: Installed (8.4.6)  
❌ **PDO MySQL Extension**: Not enabled  
❓ **MySQL Server**: Unknown (need to test)

## Steps to Enable MySQL

### Step 1: Find php.ini file

Run this command:
```bash
php --ini
```

Look for "Loaded Configuration File" - that's your php.ini location.

### Step 2: Edit php.ini

Open php.ini in a text editor and find these lines (they might be commented with `;`):

```ini
;extension=pdo_mysql
;extension=mysqli
```

Remove the semicolon (`;`) to uncomment them:

```ini
extension=pdo_mysql
extension=mysqli
```

### Step 3: Restart PHP/Web Server

- If using PHP built-in server: Stop and restart it
- If using XAMPP/WAMP: Restart Apache service
- If using Laragon: Restart Laragon

### Step 4: Verify

Run again:
```bash
php test_mysql.php
```

## Alternative: Check if MySQL Server is Running

If you're using **XAMPP**:
- Open XAMPP Control Panel
- Check if MySQL service is running (green)

If you're using **WAMP**:
- Click WAMP icon → Services → MySQL → Start Service

If you're using **Laragon**:
- MySQL should start automatically

## Manual MySQL Test

If MySQL command line is available:
```bash
mysql -u root -p
```

Or test connection:
```bash
mysql -u root -p -e "SELECT 1;"
```

## After Enabling Extension

Once pdo_mysql is enabled, run:
```bash
php test_mysql.php
```

This will test:
1. ✅ PHP MySQL extension
2. ✅ MySQL server connection
3. ✅ Database existence
4. ✅ Database access
5. ✅ Tables existence

