<?php
/**
 * Import Database Schema
 */

$config = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'dbname' => 'thebarn_db'
];

try {
    $pdo = new PDO(
        "mysql:host={$config['host']};charset=utf8mb4",
        $config['username'],
        $config['password'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    
    // Create database if not exists
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$config['dbname']}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE `{$config['dbname']}`");
    
    echo "Reading schema file...\n";
    $sql = file_get_contents(__DIR__ . '/database/schema.sql');
    
    // Remove USE statement
    $sql = preg_replace('/USE\s+[^;]+;/i', '', $sql);
    
    // Split by semicolon but preserve CREATE TABLE statements
    $statements = [];
    $current = '';
    $inCreateTable = false;
    
    $lines = explode("\n", $sql);
    foreach ($lines as $line) {
        $line = trim($line);
        
        // Skip comments and empty lines
        if (empty($line) || 
            strpos($line, '--') === 0 || 
            strpos($line, '/*') === 0 ||
            strpos($line, '*/') !== false) {
            continue;
        }
        
        $current .= $line . "\n";
        
        if (stripos($line, 'CREATE TABLE') !== false || 
            stripos($line, 'CREATE DATABASE') !== false ||
            stripos($line, 'INSERT INTO') !== false) {
            $inCreateTable = true;
        }
        
        if ($inCreateTable && substr(rtrim($line), -1) === ';') {
            $statements[] = trim($current);
            $current = '';
            $inCreateTable = false;
        }
    }
    
    if (!empty($current)) {
        $statements[] = trim($current);
    }
    
    echo "Executing " . count($statements) . " statements...\n";
    
    $success = 0;
    $errors = 0;
    
    foreach ($statements as $i => $statement) {
        $statement = trim($statement);
        if (empty($statement)) continue;
        
        try {
            $pdo->exec($statement);
            $success++;
            if (stripos($statement, 'CREATE TABLE') !== false) {
                preg_match('/CREATE TABLE.*?`?(\w+)`?/i', $statement, $matches);
                $tableName = $matches[1] ?? 'unknown';
                echo "  ✓ Created table: $tableName\n";
            }
        } catch (PDOException $e) {
            // Ignore "already exists" errors
            if (strpos($e->getMessage(), 'already exists') === false &&
                strpos($e->getMessage(), 'Duplicate') === false) {
                $errors++;
                echo "  ✗ Error: " . substr($statement, 0, 50) . "...\n";
                echo "    " . $e->getMessage() . "\n";
            } else {
                $success++;
            }
        }
    }
    
    echo "\n✓ Import complete! ($success successful, $errors errors)\n";
    
    // Verify
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "\nTables created: " . count($tables) . "\n";
    echo "  " . implode(", ", $tables) . "\n";
    
    // Check admin user
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM users WHERE role = 'admin'");
    $adminCount = $stmt->fetch()['count'];
    echo "\nAdmin users: $adminCount\n";
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    exit(1);
}

