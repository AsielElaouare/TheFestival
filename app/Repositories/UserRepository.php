<?php
namespace App\Repositories;

use PDO;
use App\Models\User;
use App\Models\Enums\UserRole;

class UserRepository extends Repository
{
    // user zoeken via email
    public function findByEmail($email)
    {
        $stmt = $this->connection->prepare("SELECT * FROM USER WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new User(
                $row['user_id'],
                // Convert the string to a UserRole enum instance.
                UserRole::from($row['role']),
                $row['name'],
                $row['email'],
                $row['pass_hash'],
                $row['phone_number']
            );
        }
        return null;
    }

    public function checkEmailOrPhoneNumberExists($email, $phoneNumber){
        $stmt = $this->connection->prepare("SELECT * FROM USER WHERE email = :email OR phone_number = :phoneNumber LIMIT 1");
        $stmt->execute([':email' => $email, ':phoneNumber' => $phoneNumber]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return true;
        }
        return false;
    }
    
    // maak nieuwe user aan
    public function createUser($name, $email, $passHash, $role = 'visitor', $phoneNumber = null)
    {
        $stmt = $this->connection->prepare("INSERT INTO USER (name, email, pass_hash, role, phone_number) VALUES (:name, :email, :hash, :role, :phone)");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':hash' => $passHash,
            ':role' => $role,
            ':phone' => $phoneNumber
        ]);
        return $this->connection->lastInsertId();
    }
}
