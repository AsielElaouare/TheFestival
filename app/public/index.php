<?php
require __DIR__ . '/../vendor/autoload.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

if (!class_exists('Stripe\Stripe')) {
    die("Stripe library is NOT loaded! Check your Composer installation.");
} else {
    echo "Stripe is loaded successfully!";
}

$router = new App\PatternRouter();
$router->route($uri);