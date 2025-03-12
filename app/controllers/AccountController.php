<?php
namespace App\Controllers;

use App\Repositories\UserRepository;
use App\Helper\MailHelper;

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
    
    // Verwerk de accountupdate en verstuur bevestigingsmail als het e-mailadres is gewijzigd
    public function update() {
        $userId = $_POST['user_id'] ?? null;
        if (!$userId) {
            header("Location: /account/edit?error=User+not+found");
            exit();
        }
        
        // Haal formulierinvoer op
        $name        = trim($_POST['name'] ?? '');
        $email       = trim($_POST['email'] ?? '');
        $phoneNumber = trim($_POST['phone_number'] ?? '');
        $newPassword = $_POST['new_password'] ?? ''; 
        $currentPassword = $_POST['current_password'] ?? ''; 
        
        // Haal bestaande gebruikersgegevens op
        $user = $this->userRepo->getUserById($userId);
        if (!$user) {
            header("Location: /account/edit?error=User+not+found");
            exit();
        }
        
        // Controleer of het e-mailadres is gewijzigd
        $emailChanged = ($email !== $user->getEmail());
        
        // Als er een nieuw wachtwoord is ingevoerd, controleer dan het huidige wachtwoord en maak een hash van het nieuwe wachtwoord.
        if (!empty($newPassword)) {
            if (empty($currentPassword) || !password_verify($currentPassword, $user->getPasswordHash())) {
                header("Location: /account/edit?error=Current+password+is+incorrect");
                exit();
            }
            $passHash = password_hash($newPassword, PASSWORD_DEFAULT);
        } else {
            $passHash = $user->getPasswordHash();
        }
        
        // Werk de gebruikersgegevens bij in de repository
        $this->userRepo->updateUser($userId, $name, $email, $passHash, $user->getRole()->value, $phoneNumber);
        
        // Als het e-mailadres is gewijzigd, stuur dan een bevestigingsmail met MailHelper
        if ($emailChanged) {
            $mailHelper = new MailHelper();
            $mailHelper->sendAccountConfirmation($email, $name);
        }
        
        header("Location: /?message=Account+updated");
        exit();
    }
}
