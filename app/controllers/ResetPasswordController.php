<?php
namespace App\Controllers;

use App\Service\UserService;
use App\Helper\InputHelper;

class ResetPasswordController {
    private $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    // Toon het formulier voor het opnieuw instellen van het wachtwoord
    public function index() {
        $token = InputHelper::sanitizeString($_GET['token'] ?? '');
        $email = InputHelper::sanitizeEmail($_GET['email'] ?? '');

        // Basiscontrole: als token of e-mail ontbreekt, toon een foutmelding
        if (empty($token) || empty($email)) {
            echo "Invalid password reset link.";
            return;
        }
        
        // Optioneel: valideer het token en check de vervaldatum vanuit je password_resets-tabel.
        include __DIR__ . '/../views/login/reset_password.php';
    }

    // Verwerk het ingezonden nieuwe wachtwoord
    public function processReset() {
        $token = InputHelper::sanitizeString($_POST['token'] ?? '');
        $email = InputHelper::sanitizeEmail($_POST['email'] ?? '');
        $newPassword = $_POST['new_password'] ?? '';

        if (empty($newPassword)) {
            echo "Please provide a new password.";
            return;
        }

        // Optioneel: valideer hier het token en de e-mail met behulp van je password_resets-tabel.
        // Voor eenvoud, ga ervan uit dat het geldig is.
        
        // Haal de gebruiker op basis van e-mail
        $user = $this->userService->findByEmail($email);
        if (!$user) {
            echo "User not found.";
            return;
        }

        // Werk het wachtwoord van de gebruiker bij
        $passHash = password_hash($newPassword, PASSWORD_DEFAULT);
        $this->userService->updateUser(
            $user->getUserId(),
            $user->getName(),
            $user->getEmail(),
            $newPassword, // we pass new password here so service re-hashes it
            $user->getRole()->value,
            $user->getPhoneNumber()
        );

        // Verwijder eventueel het token uit de password_resets-tabel.

        echo "Your password has been reset successfully. <a href='/login'>Click here to login</a>.";
    }
}
