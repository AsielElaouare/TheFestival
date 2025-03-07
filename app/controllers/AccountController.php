<?php
namespace App\Controllers;

use App\Repositories\UserRepository;

class AccountController {
    private $userRepo;
    
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // Ensure the user is logged in
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }
        $this->userRepo = new UserRepository();
    }
    
    // Display the edit account form for the logged-in user.
    public function edit() {
        $userId = $_SESSION['user_id'];
        $user = $this->userRepo->getUserById($userId);
        if (!$user) {
            header("Location: /?error=User+not+found");
            exit();
        }
        include __DIR__ . '/../views/account/edit.php';
    }
    
    // Process updating the account.
    public function update() {
        $userId = $_POST['user_id'] ?? null;
        if (!$userId) {
            header("Location: /account/edit?error=User+not+found");
            exit();
        }
        
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phoneNumber = $_POST['phone_number'] ?? '';
        $newPassword = $_POST['password'] ?? '';
        
        $user = $this->userRepo->getUserById($userId);
        if (!$user) {
            header("Location: /account/edit?error=User+not+found");
            exit();
        }
        
        if (!empty($newPassword)) {
            $passHash = password_hash($newPassword, PASSWORD_DEFAULT);
        } else {
            $passHash = $user->getPasswordHash();
        }
        
        // Update user data in repository.
        $this->userRepo->updateUser($userId, $name, $email, $passHash, $user->getRole()->value, $phoneNumber);
        header("Location: /?message=Account+updated");
        exit();
    }
}
