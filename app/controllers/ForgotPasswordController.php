<?php
namespace App\Controllers;

class ForgotPasswordController {
    public function __construct() {
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
        $email = $_POST['email'] ?? '';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email address.";
            return;
        }

        // Load database configuration from dbconfig1.php
        require __DIR__ . '/../config/dbconfig1.php';

        // Create a PDO connection
        try {
            $dsn = "$type:host=$servername;dbname=$database;charset=utf8";
            $pdo = new \PDO($dsn, $username, $password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Database connection failed: " . $e->getMessage();
            return;
        }

        // Check if email exists (for security, we do not reveal this information)
        $stmt = $pdo->prepare("SELECT * FROM `USER` WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        // We don't reveal whether the email exists or not

        // Generate a secure random token.
        $token = bin2hex(random_bytes(16));
        $expires_at = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $stmt = $pdo->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (:email, :token, :expires_at)");
        $stmt->execute([
            ':email'      => $email,
            ':token'      => $token,
            ':expires_at' => $expires_at
        ]);

        // Compose the password reset link.
        $resetLink = "http://127.0.0.1/resetPassword?token=" . urlencode($token) . "&email=" . urlencode($email);

        // Instead of sending the email, display the reset link on a success page.
        include __DIR__ . '/../views/login/forgot_password_success.php';
    }
}
