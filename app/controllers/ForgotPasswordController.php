<?php
namespace App\Controllers;

use App\Service\UserService;
use App\Helper\InputHelper;

class ForgotPasswordController {
    private $userService;

    public function __construct() {
        $this->userService = new UserService();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handlePost();
        } else {
            $this->index();
        }
    }

    private function index() {
        include __DIR__ . '/../views/login/forgot_password.php';
    }

    private function handlePost() {
        // Sanitize en valideer het e-mailadres
        $email = InputHelper::sanitizeEmail($_POST['email'] ?? '');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email address.";
            return;
        }

        // Laad databaseconfiguratie
        require __DIR__ . '/../config/dbconfig1.php';

        // Maak een PDO-verbinding
        try {
            $dsn = "$type:host=$servername;dbname=$database;charset=utf8";
            $pdo = new \PDO($dsn, $username, $password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Database connection failed: " . $e->getMessage();
            return;
        }

        // Controleer of het e-mailadres bestaat
        $stmt = $pdo->prepare("SELECT * FROM `USER` WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        // We onthullen niet of het e-mailadres bestaat

        // Genereer een secure random token.
        $token = bin2hex(random_bytes(16));
        $expires_at = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $stmt = $pdo->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (:email, :token, :expires_at)");
        $stmt->execute([
            ':email'      => $email,
            ':token'      => $token,
            ':expires_at' => $expires_at
        ]);

        // Stel de password reset link samen
        $resetLink = "http://127.0.0.1/resetPassword?token=" . urlencode($token) . "&email=" . urlencode($email);

        // In plaats van de e-mail te versturen, toon de reset link op een succespagina.
        include __DIR__ . '/../views/login/forgot_password_success.php';
    }
}
