<?php
namespace App\Controllers;

use App\Repositories\UserRepository;

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
            $email    = htmlspecialchars($_POST['email']) ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userRepo->findByEmail($email);

            // verifieer ww (getpasswarodhas returnt de gehaste ww)
            if ($user && password_verify($password, $user->getPasswordHash())) {
                $_SESSION['user_id'] = $user->getUserId();
                $_SESSION['userName'] = $user->getName();

                $_SESSION['role']    = $user->getRole()->value;
                $_SESSION['email']   = $user->getEmail();
                header("Location: /"); 
                exit;
            } else {
                $error = "Invalid password or email";
                require __DIR__ . '/../views/login/login.php';
            }
        } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
            exit;
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /");  
        exit;
    }
}
