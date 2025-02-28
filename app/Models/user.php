<?php

namespace App\Models;

class User
{
  private $userId;
  private $role;
  private $name;
  private $address;
  private $email;
  private $password;
  private $phoneNumber;

  //Constructor
  public function __construct($userId, $role, $name, $address, $email, $password, $phoneNumber)
  {
    $this->userId = $userId;
    $this->role = $role;
    $this->name = $name;
    $this->address = $address;
    $this->email = $email;
    $this->password = $password;
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
    return $this->password;
  }

  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
}
