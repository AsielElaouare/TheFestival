<?php
namespace App\Repositories;

use PDO;
use App\Models\User;
use App\Models\Enums\UserRole;

class UserRepository extends Repository
{
    // user vinden doormiddel van email
    public function findByEmail($email) {
        $stmt = $this->connection->prepare("SELECT * FROM USER WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new User(
                $row['user_id'],
                UserRole::from($row['role']),
                $row['name'],
                $row['email'],
                $row['pass_hash'],
                $row['phone_number'],
                $row['registration_date']
            );
        }
        return null;
    }

    // check als email of telefoonnummer bestaat
    public function checkEmailOrPhoneNumberExists($email, $phoneNumber) {
        $stmt = $this->connection->prepare("SELECT * FROM USER WHERE email = :email OR phone_number = :phoneNumber LIMIT 1");
        $stmt->execute([':email' => $email, ':phoneNumber' => $phoneNumber]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }

    // Maak nieuwe user
    public function createUser($name, $email, $passHash, $role = 'visitor', $phoneNumber = null) {
        $stmt = $this->connection->prepare("INSERT INTO USER (name, email, pass_hash, role, phone_number) VALUES (:name, :email, :hash, :role, :phone)");
        $stmt->execute([
            ':name'  => $name,
            ':email' => $email,
            ':hash'  => $passHash,
            ':role'  => $role,
            ':phone' => $phoneNumber
        ]);
        return $this->connection->lastInsertId();
    }
    
    // Haal alle user op uit de database (search/filter/sort)
    public function getAllUsers($search = '', $sortColumn = 'registration_date', $sortDirection = 'DESC') {
        $allowedSortColumns = ['user_id', 'name', 'email', 'phone_number', 'registration_date', 'role'];
        if (!in_array($sortColumn, $allowedSortColumns)) {
            $sortColumn = 'registration_date';
        }
        $allowedDirections = ['ASC', 'DESC'];
        if (!in_array($sortDirection, $allowedDirections)) {
            $sortDirection = 'DESC';
        }
        
        $query = "SELECT * FROM USER";
        $params = [];
        if (!empty($search)) {
            $query .= " WHERE name LIKE :search OR email LIKE :search OR phone_number LIKE :search";
            $params[':search'] = "%$search%";
        }
        $query .= " ORDER BY $sortColumn $sortDirection";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Krijg een enkele user door ID
    public function getUserById($id) {
        $stmt = $this->connection->prepare("SELECT * FROM USER WHERE user_id = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new User(
                $row['user_id'],
                UserRole::from($row['role']),
                $row['name'],
                $row['email'],
                $row['pass_hash'],
                $row['phone_number']
            );
        }
        return null;
    }
    
    // user verwijderen
    public function deleteUser($id) {
        $stmt = $this->connection->prepare("DELETE FROM USER WHERE user_id = :id");
        $stmt->execute([':id' => $id]);
    }

    // Update an existing user.
    public function updateUser($id, $name, $email, $passHash, $role, $phoneNumber) {
        $stmt = $this->connection->prepare("UPDATE USER SET name = :name, email = :email, pass_hash = :passHash, role = :role, phone_number = :phoneNumber WHERE user_id = :id");
        $stmt->execute([
            ':name'        => $name,
            ':email'       => $email,
            ':passHash'    => $passHash,
            ':role'        => $role,
            ':phoneNumber' => $phoneNumber,
            ':id'          => $id
        ]);
    }
}
