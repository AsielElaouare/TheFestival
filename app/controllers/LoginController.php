<?php
namespace App\Controllers;

use App\Repositories\UserRepository;
use PDO;

class LoginController
{
    private $userRepo;

    public function __construct(PDO $pdo)
    {
        $this->userRepo = new UserRepository($pdo);
    }

    // laat login form zien
    public function index()
    {
        require __DIR__ . '/../views/login/login.php';
    }

    // proccess login
    public function processLogin()
    {
        session_start();
        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // vind user via email
        $user = $this->userRepo->findByEmail($email);

        // wachtwoord verifieren
        if ($user && password_verify($password, $user->getPasswordHash())) {
            // als login succesvol is
            $_SESSION['user_id'] = $user->getUserId();
            $_SESSION['role']    = $user->getRole();
            $_SESSION['email']   = $user->getEmail();
            header('/../views/home/index.php'); 
            exit;
        } else {
            echo "Invalid email or password.";
        }
    }

    // laat register form zien
    public function showRegister()
    {
        require __DIR__ . '/../views/login/register.php';
    }

    // process registratie
    public function processRegister()
    {
        $name     = $_POST['name'] ?? '';
        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $phone    = $_POST['phone_number'] ?? '';

        // controleer of email al bestaat
        $existing = $this->userRepo->findByEmail($email);
        if ($existing) {
            echo "Email already in use.";
            return;
        }

        // Hash the password
        $passHash = password_hash($password, PASSWORD_DEFAULT);

        // Create a new user with the role 'customer'
        $newUserId = $this->userRepo->createUser($name, $email, $passHash, 'customer', $phone);

        session_start();
        $_SESSION['user_id'] = $newUserId;
        $_SESSION['role']    = 'customer';
        $_SESSION['email']   = $email;

        echo "Registration successful!";
    }

    // logout
    public function logout()
    {
        session_start();
        session_destroy();
        header('/../views/home/index.php');  // terug naar home page
        exit;
    }
}
