<?php
/**
 * Setup verification script
 * Run this to check if your environment is configured correctly
 */

echo "The Barn Coworking - Setup Verification\n";
echo "========================================\n\n";

$errors = [];
$warnings = [];

// Check PHP version
echo "Checking PHP version... ";
if (version_compare(PHP_VERSION, '8.0.0', '>=')) {
    echo "OK (" . PHP_VERSION . ")\n";
} else {
    $errors[] = "PHP 8.0+ required. Current: " . PHP_VERSION;
    echo "FAILED\n";
}

// Check if composer dependencies are installed
echo "Checking Composer dependencies... ";
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    echo "OK\n";
} else {
    $warnings[] = "Composer dependencies not installed. Run: composer install";
    echo "WARNING\n";
}

// Check database config
echo "Checking database configuration... ";
if (file_exists(__DIR__ . '/app/config/database.php')) {
    $dbConfig = require __DIR__ . '/app/config/database.php';
    echo "OK\n";
    
    // Try to connect
    echo "Testing database connection... ";
    try {
        $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset={$dbConfig['charset']}";
        $pdo = new PDO($dsn, $dbConfig['username'], $dbConfig['password'], $dbConfig['options']);
        echo "OK\n";
    } catch (PDOException $e) {
        $errors[] = "Database connection failed: " . $e->getMessage();
        echo "FAILED\n";
    }
} else {
    $errors[] = "Database configuration file not found";
    echo "FAILED\n";
}

// Check directory structure
echo "Checking directory structure... ";
$requiredDirs = [
    'app/controllers',
    'app/models',
    'app/views',
    'app/core',
    'app/config',
    'public'
];

$allExist = true;
foreach ($requiredDirs as $dir) {
    if (!is_dir(__DIR__ . '/' . $dir)) {
        $allExist = false;
        break;
    }
}

if ($allExist) {
    echo "OK\n";
} else {
    $errors[] = "Some required directories are missing";
    echo "FAILED\n";
}

// Check .htaccess
echo "Checking .htaccess... ";
if (file_exists(__DIR__ . '/public/.htaccess')) {
    echo "OK\n";
} else {
    $warnings[] = ".htaccess file not found. URL rewriting may not work";
    echo "WARNING\n";
}

// Summary
echo "\n========================================\n";
echo "Summary:\n";

if (empty($errors) && empty($warnings)) {
    echo "✓ All checks passed! Your environment is ready.\n";
} else {
    if (!empty($errors)) {
        echo "\nErrors (must be fixed):\n";
        foreach ($errors as $error) {
            echo "  ✗ $error\n";
        }
    }
    
    if (!empty($warnings)) {
        echo "\nWarnings:\n";
        foreach ($warnings as $warning) {
            echo "  ⚠ $warning\n";
        }
    }
}

echo "\nNext steps:\n";
echo "1. Import database schema: mysql -u root -p thebarn_db < database/schema.sql\n";
echo "2. Configure email settings in app/config/email.php (optional)\n";
echo "3. Point your web server to the public/ directory\n";
echo "4. Visit your site and login with admin@thebarn.com / admin123\n";

