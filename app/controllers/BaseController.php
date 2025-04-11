<?php
namespace App\Controllers;

class BaseController {
    protected function redirectWithError(string $msg, string $redirectTo = '/'): void {
        header("Location: {$redirectTo}?error=" . urlencode($msg));
        exit();
    }

    protected function redirectWithMessage(string $msg, string $redirectTo = '/'): void {
        header("Location: {$redirectTo}?message=" . urlencode($msg));
        exit();
    }
}
