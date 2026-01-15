# How to Start The Barn Server

## Method 1: Using the Batch File (Easiest)

Double-click `start_server.bat` in the project root folder.

Or run from command line:
```bash
start_server.bat
```

## Method 2: Manual Start

Open PowerShell or Command Prompt in the project folder:

```bash
cd public
php -S localhost:8000 router.php
```

## Method 3: From Project Root

```bash
cd public
php -S localhost:8000 router.php
```

## Access the Application

Once the server is running, open your browser and go to:

**http://localhost:8000**

## Stop the Server

Press `Ctrl+C` in the terminal where the server is running.

Or kill all PHP processes:
```powershell
Get-Process -Name php | Stop-Process -Force
```

## Troubleshooting

**Error: "router.php not found"**
- Make sure you're running the command from the `public` directory
- Or use `start_server.bat` which handles this automatically

**Error: "Port 8000 already in use"**
- Stop any existing PHP servers
- Or change the port: `php -S localhost:8080 router.php`

**Error: "Failed to open stream"**
- Make sure you're in the `public` directory
- Check that `router.php` exists in the `public` folder

## Default Login

- Email: `admin@thebarn.com`
- Password: `admin123`

