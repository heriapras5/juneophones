<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$about = App\Models\About::first();
if ($about) {
    echo "ID: " . $about->id . "\n";
    echo "Foto: " . ($about->foto ?? 'null') . "\n";
    echo "Deskripsi: " . substr($about->deskripsi, 0, 50) . "...\n";
} else {
    echo "No about record found\n";
}

// Check all files in abouts dir
$files = glob(__DIR__ . '/storage/app/public/abouts/*');
echo "\nFiles in storage/app/public/abouts/:\n";
foreach ($files as $f) {
    echo "  " . basename($f) . " (" . round(filesize($f)/1024, 1) . " KB)\n";
}
