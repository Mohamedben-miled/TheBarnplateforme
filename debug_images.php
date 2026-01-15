<?php
// Debug script to check images
$imagesDir = __DIR__ . '/public/images';
echo "Checking images in: $imagesDir\n";
echo "Directory exists: " . (is_dir($imagesDir) ? 'YES' : 'NO') . "\n\n";

if (is_dir($imagesDir)) {
    $files = scandir($imagesDir);
    echo "Files found:\n";
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $fullPath = $imagesDir . '/' . $file;
            $exists = file_exists($fullPath);
            $isImage = in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
            echo "  - $file (exists: " . ($exists ? 'YES' : 'NO') . ", is image: " . ($isImage ? 'YES' : 'NO') . ")\n";
            
            if (stripos($file, 'hero-workspace') !== false) {
                echo "    ⭐ This is the hero image!\n";
            }
        }
    }
    
    echo "\nLooking for hero-workspace.jpg...\n";
    $heroPath = $imagesDir . '/hero-workspace.jpg';
    if (file_exists($heroPath)) {
        echo "✓ Found: $heroPath\n";
        echo "  Size: " . filesize($heroPath) . " bytes\n";
        echo "  Web path: /images/hero-workspace.jpg\n";
    } else {
        echo "✗ Not found: $heroPath\n";
        echo "\nChecking for similar names...\n";
        foreach ($files as $file) {
            if (stripos($file, 'hero') !== false || stripos($file, 'workspace') !== false) {
                echo "  Found similar: $file\n";
            }
        }
    }
} else {
    echo "Directory does not exist!\n";
}

