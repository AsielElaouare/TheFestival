<?php
namespace App\Controllers;

use App\Repositories\UserRepository;

class LoginController
{
    private $userRepo;
    
    public function __construct(){
        $this->userRepo = new UserRepository();
    }

    // Display login form
    public function index()
    {
        require __DIR__ . '/../views/login/login.php';
    }

    // Process login
    public function processLogin()
    {
        try {
            
            $email    = htmlspecialchars($_POST['email']) ?? '';
            $password = $_POST['password'] ?? '';

            // Find user by email
            $user = $this->userRepo->findByEmail($email);

            

            // Verify password (ensure that getPasswordHash() returns the stored hash)
            if ($user && password_verify($password, $user->getPasswordHash())) {
                $_SESSION['user_id'] = $user->getUserId();
                // Convert the enum to its string value for session storage
                $_SESSION['role']    = $user->getRole()->value;
                $_SESSION['email']   = $user->getEmail();
                header("Location: /");  // Redirect to home page
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

    // Logout
    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /");  // Redirect to home page
        exit;
    }
}
