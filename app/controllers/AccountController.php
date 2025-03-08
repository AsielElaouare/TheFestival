<?php
namespace App\Controllers;

use App\Repositories\UserRepository;

class AccountController {
    private $userRepo;
    
    public function __construct() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }
        $this->userRepo = new UserRepository();
    }
    
    // laat edit form zien
    public function edit() {
        $userId = $_SESSION['user_id'];
        $user = $this->userRepo->getUserById($userId);
        if (!$user) {
            header("Location: /?error=User+not+found");
            exit();
        }
        include __DIR__ . '/../views/account/edit.php';
    }
    
    // proces van het updaten van account details
    public function update() {
        $userId = $_POST['user_id'] ?? null;
        if (!$userId) {
            header("Location: /account/edit?error=User+not+found");
            exit();
        }
        
        // krijg form input
        $name        = trim($_POST['name'] ?? '');
        $email       = trim($_POST['email'] ?? '');
        $phoneNumber = trim($_POST['phone_number'] ?? '');
        $newPassword = $_POST['new_password'] ?? ''; 
        $currentPassword = $_POST['current_password'] ?? ''; 
        
        // haal oude user data op via de repository
        $user = $this->userRepo->getUserById($userId);
        if (!$user) {
            header("Location: /account/edit?error=User+not+found");
            exit();
        }
        
        // controleer of email is veranderd
        $emailChanged = ($email !== $user->getEmail());
        
        // als password wordt geupdate, als er een nieuw wachtwoord wordt ingevoerd, verifieer het huidige wachtwoord.
        if (!empty($newPassword)) {
            if (empty($currentPassword) || !password_verify($currentPassword, $user->getPasswordHash())) {
                header("Location: /account/edit?error=Current+password+is+incorrect");
                exit();
            }
            $passHash = password_hash($newPassword, PASSWORD_DEFAULT);
        } else {
            $passHash = $user->getPasswordHash();
        }
        
        // update user data in repository
        $this->userRepo->updateUser($userId, $name, $email, $passHash, $user->getRole()->value, $phoneNumber);
        
        // als email is veranderd stuur een confirmation mail.
        if ($emailChanged) {
            mail(
                $email,
                "Email Updated",
                "Your email has been updated to: " . $email,
                "From: no-reply@example.com"
            );
        }
        
        header("Location: /?message=Account+updated");
        exit();
    }
}
