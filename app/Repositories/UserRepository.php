<?php
namespace App\Repositories;

use PDO;
use PDOException;
use App\Models\User;
use App\Models\Enums\UserRole;

class UserRepository extends Repository
{
    public function findByEmail(string $email): ?User
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM USER WHERE email = :email LIMIT 1");
            $stmt->execute([':email' => $email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row ? $this->mapToUser($row) : null;
        } catch (PDOException $e) {
            error_log("findByEmail error: " . $e->getMessage());
            return null;
        }
    }

    public function checkEmailOrPhoneNumberExists(string $email, string $phoneNumber): bool
    {
        try {
            $stmt = $this->connection->prepare("SELECT 1 FROM USER WHERE email = :email OR phone_number = :phoneNumber LIMIT 1");
            $stmt->execute([':email' => $email, ':phoneNumber' => $phoneNumber]);
            return (bool) $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("checkEmailOrPhoneNumberExists error: " . $e->getMessage());
            return false;
        }
    }

    public function createUser(string $name, string $email, string $passHash, string $role = 'visitor', ?string $phoneNumber = null): int|false
    {
        try {
            $stmt = $this->connection->prepare("
                INSERT INTO USER (name, email, pass_hash, role, phone_number)
                VALUES (:name, :email, :hash, :role, :phone)
            ");
            $stmt->execute([
                ':name'  => $name,
                ':email' => $email,
                ':hash'  => $passHash,
                ':role'  => $role,
                ':phone' => $phoneNumber
            ]);
            return (int) $this->connection->lastInsertId();
        } catch (PDOException $e) {
            error_log("createUser error: " . $e->getMessage());
            return false;
        }
    }

    public function getAllUsers(string $search = '', string $sortColumn = 'registration_date', string $sortDirection = 'DESC'): array
    {
        try {
            $allowedColumns = ['user_id', 'name', 'email', 'phone_number', 'registration_date', 'role'];
            $allowedDirections = ['ASC', 'DESC'];

            if (!in_array($sortColumn, $allowedColumns)) {
                $sortColumn = 'registration_date';
            }
            if (!in_array($sortDirection, $allowedDirections)) {
                $sortDirection = 'DESC';
            }

            $query = "SELECT * FROM USER";
            $params = [];

            if (!empty($search)) {
                $query .= " WHERE name LIKE :search OR email LIKE :search OR phone_number LIKE :search";
                $params[':search'] = '%' . $search . '%';
            }

            $query .= " ORDER BY $sortColumn $sortDirection";

            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("getAllUsers error: " . $e->getMessage());
            return [];
        }
    }

    public function getUserById(int $id): ?User
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM USER WHERE user_id = :id LIMIT 1");
            $stmt->execute([':id' => $id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row ? $this->mapToUser($row) : null;
        } catch (PDOException $e) {
            error_log("getUserById error: " . $e->getMessage());
            return null;
        }
    }

    public function updateUser(int $id, string $name, string $email, string $passHash, string $role, ?string $phoneNumber): bool
    {
        try {
            $stmt = $this->connection->prepare("
                UPDATE USER 
                SET name = :name, email = :email, pass_hash = :passHash, role = :role, phone_number = :phoneNumber 
                WHERE user_id = :id
            ");
            return $stmt->execute([
                ':name'        => $name,
                ':email'       => $email,
                ':passHash'    => $passHash,
                ':role'        => $role,
                ':phoneNumber' => $phoneNumber,
                ':id'          => $id
            ]);
        } catch (PDOException $e) {
            error_log("updateUser error: " . $e->getMessage());
            return false;
        }
    }

    public function deleteUser(int $id): bool
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM USER WHERE user_id = :id");
            return $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            error_log("deleteUser error: " . $e->getMessage());
            return false;
        }
    }

    private function mapToUser(array $row): User
    {
        return new User(
            $row['user_id'],
            UserRole::from($row['role']),
            $row['name'],
            $row['email'],
            $row['pass_hash'],
            $row['phone_number'],
            $row['registration_date'] ?? null
        );
    }
}
