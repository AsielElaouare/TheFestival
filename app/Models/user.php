<?php

namespace App\Models;

use App\Models\Enums\UserRole;

class User
{
  private $userId;
  private UserRole $role;
  private $name;
  private $address;
  private $email;
  private $passwordHash;
  private $phoneNumber;

  //Constructor
  public function __construct($userId, $role, $name, $address, $email, $passwordHash, $phoneNumber)
  {
    $this->userId = $userId;
    $this->role = $role;
    $this->name = $name;
    $this->address = $address;
    $this->email = $email;
    $this->passwordHash = $passwordHash;
    $this->phoneNumber = $phoneNumber;
  }

  //Getters
  public function getUserId()
  {
    return $this->userId;
  }

  public function getRole()
  {
    return $this->role;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getAddress()
  {
    return $this->address;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function getPassword()
  {
    return $this->passwordHash;
  }

  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
}
