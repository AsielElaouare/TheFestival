<?php
namespace App\Repositories;

use PDO;
use App\Models\User;
use App\Models\Enums\UserRole;

class UserRepository extends Repository
{
    public function findByEmail($email) {
        try {
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
        } catch (\PDOException $e) {
            error_log("findByEmail error: " . $e->getMessage());
            return null;
        }
    }

    public function checkEmailOrPhoneNumberExists($email, $phoneNumber) {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM USER WHERE email = :email OR phone_number = :phoneNumber LIMIT 1");
            $stmt->execute([':email' => $email, ':phoneNumber' => $phoneNumber]);
            return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
        } catch (\PDOException $e) {
            error_log("checkEmailOrPhoneNumberExists error: " . $e->getMessage());
            return false;
        }
    }

    public function createUser($name, $email, $passHash, $role = 'visitor', $phoneNumber = null) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO USER (name, email, pass_hash, role, phone_number) VALUES (:name, :email, :hash, :role, :phone)");
            $stmt->execute([
                ':name'  => $name,
                ':email' => $email,
                ':hash'  => $passHash,
                ':role'  => $role,
                ':phone' => $phoneNumber
            ]);
            return $this->connection->lastInsertId();
        } catch (\PDOException $e) {
            error_log("createUser error: " . $e->getMessage());
            return false;
        }
    }
    
    public function getAllUsers($search = '', $sortColumn = 'registration_date', $sortDirection = 'DESC') {
        try {
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
        } catch (\PDOException $e) {
            error_log("getAllUsers error: " . $e->getMessage());
            return [];
        }
    }
    
    public function getUserById($id) {
        try {
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
        } catch (\PDOException $e) {
            error_log("getUserById error: " . $e->getMessage());
            return null;
        }
    }
    
    public function deleteUser($id) {
        try {
            $stmt = $this->connection->prepare("DELETE FROM USER WHERE user_id = :id");
            return $stmt->execute([':id' => $id]);
        } catch (\PDOException $e) {
            error_log("deleteUser error: " . $e->getMessage());
            return false;
        }
    }

    public function updateUser($id, $name, $email, $passHash, $role, $phoneNumber) {
        try {
            $stmt = $this->connection->prepare("UPDATE USER SET name = :name, email = :email, pass_hash = :passHash, role = :role, phone_number = :phoneNumber WHERE user_id = :id");
            return $stmt->execute([
                ':name'        => $name,
                ':email'       => $email,
                ':passHash'    => $passHash,
                ':role'        => $role,
                ':phoneNumber' => $phoneNumber,
                ':id'          => $id
            ]);
        } catch (\PDOException $e) {
            error_log("updateUser error: " . $e->getMessage());
            return false;
        }
    }
}
