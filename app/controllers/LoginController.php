<?php
namespace App\Controllers;

use App\Repositories\UserRepository;
use App\Helper\InputHelper;


class LoginController
{
    private $userRepo;
    
    public function __construct(){
        $this->userRepo = new UserRepository();
    }

    public function index()
    {
        if(isset($_SESSION['user_id'])){
            header("Location: /");
            exit;
        }
        require __DIR__ . '/../views/login/login.php';
    }

    // login processen 
    public function processLogin()
    {
        try {
            $email    = InputHelper::sanitizeEmail($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($email) || empty($password)) {
                $error = "Please enter both email and password.";
                require __DIR__ . '/../views/login/login.php';
                return;
            }

            $user = $this->userRepo->findByEmail($email);

            if ($user && password_verify($password, $user->getPasswordHash())) {
                $_SESSION['user_id']   = $user->getUserId();
                $_SESSION['userName']  = $user->getName();
                $_SESSION['role']      = $user->getRole()->value;
                $_SESSION['email']     = $user->getEmail();

                header("Location: /");
                exit;
            } else {
                $error = "Invalid email or password.";
                require __DIR__ . '/../views/login/login.php';
                return;
            }
        } catch (\Throwable $e) {
            $error = "Something went wrong. Please try again later.";
            require __DIR__ . '/../views/login/login.php';
            return;
        }
    }


    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        session_destroy();
        header("Location: /");  
        exit;
    }
    
}
