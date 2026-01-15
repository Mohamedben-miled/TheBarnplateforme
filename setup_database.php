<?php
/**
 * Database Setup Script
 * Creates database and imports schema
 */

echo "Setting up The Barn Database...\n";
echo "==============================\n\n";

// Check if PDO MySQL is available
if (!extension_loaded('pdo_mysql')) {
    echo "⚠ WARNING: PDO MySQL extension not loaded.\n";
    echo "Attempting to continue anyway...\n\n";
    
    // Try to load it manually
    if (function_exists('dl')) {
        $extensions = [
            'php_pdo_mysql.dll',
            'pdo_mysql.dll',
            'ext/php_pdo_mysql.dll',
            'ext/pdo_mysql.dll'
        ];
        
        $loaded = false;
        foreach ($extensions as $ext) {
            if (@dl($ext)) {
                echo "✓ Loaded extension: $ext\n\n";
                $loaded = true;
                break;
            }
        }
        
        if (!$loaded) {
            echo "✗ Could not load PDO MySQL extension.\n";
            echo "Please enable it in php.ini:\n";
            echo "  extension=pdo_mysql\n";
            echo "  extension=mysqli\n\n";
            echo "Attempting to continue with basic connection...\n\n";
        }
    }
}

$config = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'dbname' => 'thebarn_db'
];

try {
    // Connect to MySQL server (without database)
    echo "1. Connecting to MySQL server... ";
    $dsn = "mysql:host={$config['host']};charset=utf8mb4";
    $pdo = new PDO($dsn, $config['username'], $config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    echo "✓ OK\n";
    
    // Check if database exists
    echo "2. Checking database '{$config['dbname']}'... ";
    $stmt = $pdo->query("SHOW DATABASES LIKE '{$config['dbname']}'");
    if ($stmt->rowCount() > 0) {
        echo "✓ Already exists\n";
    } else {
        echo "Creating database... ";
        $pdo->exec("CREATE DATABASE `{$config['dbname']}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        echo "✓ Created\n";
    }
    
    // Connect to the database
    echo "3. Connecting to database... ";
    $pdo->exec("USE `{$config['dbname']}`");
    echo "✓ OK\n";
    
    // Check if tables exist
    echo "4. Checking tables... ";
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    if (count($tables) > 0) {
        echo "Found " . count($tables) . " table(s)\n";
        echo "   Tables: " . implode(', ', $tables) . "\n";
        echo "\n⚠ Database already has tables. Skipping schema import.\n";
        echo "   To re-import, drop the database first or manually run schema.sql\n";
    } else {
        echo "No tables found. Importing schema...\n";
        
        // Read and execute schema
        $schemaFile = __DIR__ . '/database/schema.sql';
        if (!file_exists($schemaFile)) {
            throw new Exception("Schema file not found: $schemaFile");
        }
        
        $sql = file_get_contents($schemaFile);
        
        // Remove USE database statement if present (we're already using it)
        $sql = preg_replace('/USE\s+[^;]+;/i', '', $sql);
        
        // Split by semicolons and execute
        $statements = array_filter(
            array_map('trim', explode(';', $sql)),
            function($stmt) {
                return !empty($stmt) && 
                       !preg_match('/^--/', $stmt) && 
                       !preg_match('/^\/\*/', $stmt);
            }
        );
        
        $executed = 0;
        foreach ($statements as $statement) {
            if (!empty(trim($statement))) {
                try {
                    $pdo->exec($statement);
                    $executed++;
                } catch (PDOException $e) {
                    // Ignore "already exists" errors
                    if (strpos($e->getMessage(), 'already exists') === false &&
                        strpos($e->getMessage(), 'Duplicate') === false) {
                        echo "   Warning: " . $e->getMessage() . "\n";
                    }
                }
            }
        }
        
        echo "✓ Imported schema ($executed statements executed)\n";
    }
    
    // Verify tables
    echo "\n5. Verifying setup... ";
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "✓ OK - Found " . count($tables) . " table(s)\n";
    
    // Check for admin user
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM users WHERE role = 'admin'");
    $adminCount = $stmt->fetch()['count'];
    echo "   Admin users: $adminCount\n";
    
    echo "\n==============================\n";
    echo "✓ Database setup complete!\n";
    echo "\nYou can now:\n";
    echo "1. Test connection: php test_mysql.php\n";
    echo "2. Start server: cd public && php -S localhost:8000\n";
    echo "3. Login: admin@thebarn.com / admin123\n";
    
} catch (PDOException $e) {
    echo "✗ FAILED\n";
    echo "Error: " . $e->getMessage() . "\n\n";
    echo "Troubleshooting:\n";
    echo "- Check MySQL is running\n";
    echo "- Verify username/password in app/config/database.php\n";
    echo "- Enable PDO MySQL extension in php.ini\n";
    exit(1);
} catch (Exception $e) {
    echo "✗ FAILED\n";
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}

