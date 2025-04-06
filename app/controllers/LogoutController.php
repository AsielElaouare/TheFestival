<?php
namespace App\Controllers;

class LogoutController {
    public function index() {
        session_destroy();
        header("Location: /");
        exit();
    }
}
