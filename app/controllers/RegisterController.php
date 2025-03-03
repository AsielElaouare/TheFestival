<?php

namespace App\Controllers;

use App\Repositories\UserRepository;
use PDO;

class RegisterController{

private $userRepo;
public function __construct(){
    $this->userRepo = new UserRepository();
}

public function index()
{
    require __DIR__ . '/../views/login/register.php';
}

// process registratie
public function processRegister()
{
    $name     = $_POST['name'] ?? '';
    $email    = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $phoneNumber    = $_POST['phone_number'] ?? '';

   
    // controleer of email al bestaat
    $existing = $this->userRepo->checkEmailOrPhoneNumberExists($email, $phoneNumber);

    if ($existing) {
        $error = "The combination of email and/or phone number are already in use.";
        require __DIR__ . "/../views/login/register.php";
        return;
    }
    // Hash the password
    $passHash = password_hash($password, PASSWORD_DEFAULT);

    // Create a new user with the role 'customer'
    $newUserId = $this->userRepo->createUser($name, $email, $passHash, 'customer', $phoneNumber);

    session_start();
    $_SESSION['user_id'] = $newUserId;
    $_SESSION['role']    = 'customer';
    $_SESSION['email']   = $email;

    header('Location: /');
}
}

