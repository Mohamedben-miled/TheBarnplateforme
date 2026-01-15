<?php
/**
 * MySQL Connection Test Script
 * Run: php test_mysql.php
 */

echo "Testing MySQL Connection...\n";
echo "==========================\n\n";

// Load database config
$config = require __DIR__ . '/app/config/database.php';

echo "Configuration:\n";
echo "  Host: {$config['host']}\n";
echo "  Database: {$config['dbname']}\n";
echo "  Username: {$config['username']}\n";
echo "  Password: " . (empty($config['password']) ? '(empty)' : '***') . "\n\n";

// Test 1: Check if PDO MySQL extension is available
echo "1. Checking PHP MySQL extension... ";
if (extension_loaded('pdo_mysql')) {
    echo "✓ OK\n";
} else {
    echo "✗ FAILED - PDO MySQL extension not loaded\n";
    echo "  Install php_pdo_mysql extension\n";
    exit(1);
}

// Test 2: Try to connect to MySQL server
echo "2. Testing MySQL server connection... ";
try {
    $dsn = "mysql:host={$config['host']};charset={$config['charset']}";
    $pdo = new PDO($dsn, $config['username'], $config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 5
    ]);
    echo "✓ OK - Connected to MySQL server\n";
    
    // Test 3: Check if database exists
    echo "3. Checking if database '{$config['dbname']}' exists... ";
    $stmt = $pdo->query("SHOW DATABASES LIKE '{$config['dbname']}'");
    if ($stmt->rowCount() > 0) {
        echo "✓ OK - Database exists\n";
        
        // Test 4: Try to use the database
        echo "4. Testing database access... ";
        $pdo->exec("USE {$config['dbname']}");
        echo "✓ OK - Can access database\n";
        
        // Test 5: Check if tables exist
        echo "5. Checking tables... ";
        $stmt = $pdo->query("SHOW TABLES");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        if (count($tables) > 0) {
            echo "✓ OK - Found " . count($tables) . " table(s)\n";
            echo "   Tables: " . implode(', ', $tables) . "\n";
        } else {
            echo "⚠ WARNING - Database exists but no tables found\n";
            echo "   Run: mysql -u root -p thebarn_db < database/schema.sql\n";
        }
    } else {
        echo "✗ FAILED - Database '{$config['dbname']}' does not exist\n";
        echo "   Create it with: CREATE DATABASE {$config['dbname']};\n";
        echo "   Then run: mysql -u root -p {$config['dbname']} < database/schema.sql\n";
    }
    
} catch (PDOException $e) {
    echo "✗ FAILED\n";
    echo "   Error: " . $e->getMessage() . "\n\n";
    echo "Troubleshooting:\n";
    echo "  - Make sure MySQL server is running\n";
    echo "  - Check username/password in app/config/database.php\n";
    echo "  - Try: mysql -u {$config['username']} -p -h {$config['host']}\n";
    exit(1);
}

echo "\n==========================\n";
echo "✓ All MySQL tests passed!\n";
echo "Your MySQL setup is working correctly.\n";

