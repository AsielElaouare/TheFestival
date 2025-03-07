<?php
namespace App\Controllers;

class LogoutController {
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header("Location: /");
        exit();
    }
}
