<?php
namespace App\Controllers;

use App\Service\UserService;
use App\Helper\InputHelper;

class AccountController extends BaseController {
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
            $this->redirectWithError("User not found");
        }

        include __DIR__ . '/../views/account/edit.php';
    }
    
    // Verwerk de accountupdate en verstuur bevestigingsmail als het e-mailadres is gewijzigd
    public function update() {
        $userId = InputHelper::sanitizeString($_POST['user_id'] ?? '');
        if (empty($userId)) {
            $this->redirectWithError("User not found");
        }
        
        // Haal en sanitize formulierinvoer op
        $name           = InputHelper::sanitizeString($_POST['name'] ?? '');
        $email          = InputHelper::sanitizeEmail($_POST['email'] ?? '');
        $phoneNumber    = InputHelper::sanitizeString($_POST['phone_number'] ?? '');
        $newPassword    = $_POST['new_password'] ?? '';
        $currentPassword = $_POST['current_password'] ?? '';
        
        // Haal bestaande gebruikersgegevens op
        $user = $this->userService->getUserById($userId);
        if (!$user) {
            $this->redirectWithError("User not found");
        }

        $emailChanged = $this->userService->hasEmailChanged($user->getEmail(), $email);

        
        // Handle password update check
        $pass = $this->userService->validatePasswordUpdate($user, $newPassword, $currentPassword);
        if ($pass === false) {
            $this->redirectWithError("Current password is incorrect");
        }

          // Perform update
          $result = $this->userService->updateUser(
            $userId,
            $name,
            $email,
            $pass,
            $user->getRole()->value,
            $phoneNumber
        );

        if (!$result) {
            $this->redirectWithError("User update failed");
        }

        header("Location: /?message=Account+updated");
        exit();
    }
}
