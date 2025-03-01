<?php
namespace App\Repositories;

use App\Models\User;
use PDO;

class UserRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // user zoeken via email
    public function findByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new User(
                $row['user_id'],
                $row['role'],
                $row['name'],
                $row['email'],
                $row['pass_hash'],
                $row['phone_number']
            );
        }
        return null;
    }

    // maak nieuwe user aan
    public function createUser($name, $email, $passHash, $role = 'visitor', $phoneNumber = null)
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, pass_hash, role, phone_number) VALUES (:name, :email, :hash, :role, :phone)");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':hash' => $passHash,
            ':role' => $role,
            ':phone' => $phoneNumber
        ]);
        return $this->pdo->lastInsertId();
    }
}
