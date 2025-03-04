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

        // Load database configuration from dbconfig1.php.
        require __DIR__ . '/../config/dbconfig1.php';
        // Now we have: $type, $servername, $username, $password, $database

        // Create a PDO connection.
        try {
            $dsn = "$type:host=$servername;dbname=$database;charset=utf8";
            $pdo = new \PDO($dsn, $username, $password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Database connection failed: " . $e->getMessage();
            return;
        }

        // Check if the email exists in the 'USER' table.
        $stmt = $pdo->prepare("SELECT * FROM `USER` WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        // For security, we don't reveal whether the email exists or not.

        // Generate a secure random token.
        $token = bin2hex(random_bytes(16));

        // Insert the token into the 'password_resets' table.
        // Ensure your 'password_resets' table exists with columns: email, token, expires_at.
        $expires_at = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $stmt = $pdo->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (:email, :token, :expires_at)");
        $stmt->execute([
            ':email'      => $email,
            ':token'      => $token,
            ':expires_at' => $expires_at
        ]);

        // Compose the password reset link.
        $resetLink = "http://127.0.0.1/resetPassword?token=" . urlencode($token) . "&email=" . urlencode($email);

        // Compose the email.
        $subject = "Password Reset Request";
        $message = "Hello,\n\nWe received a request to reset your password. To reset your password, please click the link below:\n\n"
                 . $resetLink . "\n\n"
                 . "If you did not request a password reset, please ignore this email.\n\nThank you.";
        $headers = "From: no-reply@example.com\r\n";

        // Send the email.
        if (mail($email, $subject, $message, $headers)) {
            echo "If the email exists in our system, a password reset link has been sent to " . htmlspecialchars($email) . ".";
        } else {
            echo "There was an error sending the email.";
        }
    }
}
