@echo off
REM Start The Barn Coworking Platform Server
echo Starting The Barn Coworking Platform...
echo.

REM Get the directory where this batch file is located
set "SCRIPT_DIR=%~dp0"
set "PUBLIC_DIR=%SCRIPT_DIR%public"

REM Change to public directory
cd /d "%PUBLIC_DIR%"

REM Verify router.php exists
if not exist "router.php" (
    echo ERROR: router.php not found!
    echo Expected: %PUBLIC_DIR%\router.php
    pause
    exit /b 1
)

echo Current directory: %CD%
echo Server starting at http://localhost:8000
echo Press Ctrl+C to stop the server
echo.

REM Start PHP server
php -S localhost:8000 router.php

