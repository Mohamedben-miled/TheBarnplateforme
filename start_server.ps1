# Start The Barn Coworking Platform Server
Write-Host "Starting The Barn Coworking Platform..." -ForegroundColor Green
Write-Host ""

# Get the script directory
$scriptPath = Split-Path -Parent $MyInvocation.MyCommand.Path
$publicPath = Join-Path $scriptPath "public"

# Check if router.php exists
if (-not (Test-Path (Join-Path $publicPath "router.php"))) {
    Write-Host "ERROR: router.php not found in public directory!" -ForegroundColor Red
    Write-Host "Expected location: $publicPath\router.php" -ForegroundColor Yellow
    pause
    exit 1
}

# Change to public directory
Set-Location $publicPath

Write-Host "Current directory: $(Get-Location)" -ForegroundColor Cyan
Write-Host "Server starting at http://localhost:8000" -ForegroundColor Green
Write-Host "Press Ctrl+C to stop the server" -ForegroundColor Yellow
Write-Host ""

# Start the server
php -S localhost:8000 router.php

