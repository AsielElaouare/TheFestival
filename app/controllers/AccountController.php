<?php
namespace App\Controllers;

use App\Service\UserService;
use App\Helper\InputHelper;

class AccountController {
    private $userService;
    
    public function __construct() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }
        $this->userService = new UserService();
    }
    
    // Laat edit form zien
    public function edit() {
        $userId = $_SESSION['user_id'];
        $user = $this->userService->getUserById($userId);
        if (!$user) {
            header("Location: /?error=User+not+found");
            exit();
        }
        include __DIR__ . '/../views/account/edit.php';
    }
    
    // Verwerk de accountupdate en verstuur bevestigingsmail als het e-mailadres is gewijzigd
    public function update() {
        $userId = InputHelper::sanitizeString($_POST['user_id'] ?? '');
        if (empty($userId)) {
            header("Location: /account/edit?error=User+not+found");
            exit();
        }
        
        // Haal en sanitize formulierinvoer op
        $name        = InputHelper::sanitizeString($_POST['name'] ?? '');
        $email       = InputHelper::sanitizeEmail($_POST['email'] ?? '');
        $phoneNumber = InputHelper::sanitizeString($_POST['phone_number'] ?? '');
        $newPassword = $_POST['new_password'] ?? ''; 
        $currentPassword = $_POST['current_password'] ?? ''; 
        
        // Haal bestaande gebruikersgegevens op
        $user = $this->userService->getUserById($userId);
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
            $pass = $newPassword;
        } else {
            $pass = ''; // Gebruik lege string om aan te geven dat geen nieuw wachtwoord is opgegeven.
        }
        
        $result = $this->userService->updateUser($userId, $name, $email, $pass, $user->getRole()->value, $phoneNumber);
        if (!$result) {
            header("Location: /account/edit?error=User+update+failed");
            exit();
        }
        
        header("Location: /?message=Account+updated");
        exit();
    }
}
