<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

echo "=== DIAGNÓSTICO LARAVEL ===\n\n";

// Verificar que existen los archivos
$files = [
    'app/Models/Product.php',
    'app/Models/Category.php',
    'app/Http/Controllers/ProductController.php',
    'app/Http/Controllers/CategoryController.php'
];

foreach ($files as $file) {
    $exists = file_exists(__DIR__.'/'.$file);
    echo ($exists ? '✓' : '✗') . " $file\n";
}

echo "\n=== INTENTANDO CARGAR MODELOS ===\n";

try {
    $product = new App\Models\Product();
    echo "✓ Product cargado correctamente\n";
} catch (Exception $e) {
    echo "✗ Error al cargar Product: " . $e->getMessage() . "\n";
}

try {
    $category = new App\Models\Category();
    echo "✓ Category cargado correctamente\n";
} catch (Exception $e) {
    echo "✗ Error al cargar Category: " . $e->getMessage() . "\n";
}