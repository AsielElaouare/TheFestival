<?php
namespace App\Controllers;

use App\Service\PasswordResetService;
use App\Helper\InputHelper;

class ForgotPasswordController
{
    private PasswordResetService $resetService;

    public function __construct()
    {
        $this->resetService = new PasswordResetService();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handlePost();
        } else {
            $this->index();
        }
    }

    private function index()
    {
        include __DIR__ . '/../views/login/forgot_password.php';
    }

    private function handlePost()
    {
        $email = InputHelper::sanitizeEmail($_POST['email'] ?? '');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Ongeldig e-mailadres.";
            return;
        }

        $token = $this->resetService->requestReset($email);
        if (!$token) {
            // We geven geen info of het e-mailadres wel of niet bestaat
            $token = 'fake_' . bin2hex(random_bytes(10)); 
        }

        $resetLink = "http://127.0.0.1/resetPassword?token=" . urlencode($token) . "&email=" . urlencode($email);
        include __DIR__ . '/../views/login/forgot_password_success.php';
    }
}
