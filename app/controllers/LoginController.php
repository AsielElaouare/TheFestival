<?php
namespace App\Controllers;

use App\Repositories\UserRepository;
use PDO;

class LoginController
{
    private $userRepo;
    public function __construct(){
        $this->userRepo = new UserRepository();
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
        $email    = htmlspecialchars($_POST['email']) ?? '';
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
                    $error = "invalid password or email";
                require __DIR__ ."/../views/login/login.php";
            }
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
