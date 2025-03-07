<?php
namespace App\Models;

use App\Models\Enums\UserRole;

class User
{
    private $userId;
    private UserRole $role;
    private $name;
    private $email;
    private $passwordHash;
    private $phoneNumber;
    private $registrationDate;


    // Constructor
    public function __construct($userId, $role, $name, $email, $passwordHash, $phoneNumber, $registrationDate = null)
    {
        $this->userId       = $userId;
        $this->role         = $role;
        $this->name         = $name;
        $this->email        = $email;
        $this->passwordHash = $passwordHash;
        $this->phoneNumber  = $phoneNumber;
        $this->registrationDate = $registrationDate;

    }

    // Getters
    public function getUserId() { 
        return $this->userId; 
    }

    public function getRole() { 
        return $this->role; 
    }

    public function getName() { 
        return $this->name; 
    }

    public function getEmail() { 
        return $this->email; 
    }

    public function getPasswordHash() { 
        return $this->passwordHash; 
    }

    public function getPhoneNumber() { 
        return $this->phoneNumber; 
    }

    public function getRegistrationDate() { 
        return $this->registrationDate; 
    }

    // Setters 
    public function setEmail($email) { 
        $this->email = $email; 
    }

    public function setPasswordHash($passwordHash) { 
        $this->passwordHash = $passwordHash; 
    }
}
