<?php
namespace App\Controllers;

class DanceController
{
    public function index()
    {
        // laad de dance page view
        require __DIR__ . '/../views/dance/dance.php';
    }
}
