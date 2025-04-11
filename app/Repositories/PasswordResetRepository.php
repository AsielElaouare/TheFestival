<?php
namespace App\Repositories;

use PDOException;

class PasswordResetRepository extends Repository
{
    public function createToken(string $email, string $token, string $expiresAt): bool
    {
        try {
            $stmt = $this->connection->prepare("
                INSERT INTO password_resets (email, token, expires_at)
                VALUES (:email, :token, :expires_at)
            ");
            return $stmt->execute([
                ':email' => $email,
                ':token' => $token,
                ':expires_at' => $expiresAt
            ]);
        } catch (PDOException $e) {
            error_log("Error storing reset token: " . $e->getMessage());
            return false;
        }
    }
}
