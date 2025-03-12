<?php
namespace App\Controllers;

use App\Repositories\UserRepository;

class ResetPasswordController {
    private $userRepo;

    public function __construct() {
        $this->userRepo = new UserRepository();
    }

    // Toon het formulier voor het opnieuw instellen van het wachtwoord
    public function index() {
        $token = $_GET['token'] ?? '';
        $email = $_GET['email'] ?? '';

        // Basiscontrole: als token of e-mail ontbreekt, toon een foutmelding
        if (empty($token) || empty($email)) {
            echo "Invalid password reset link.";
            return;
        }
        
        // Optionally: Validate the token and check expiration from your password_resets table.
        include __DIR__ . '/../views/login/reset_password.php';
    }

    // Verwerk het ingezonden nieuwe wachtwoord
    public function processReset() {
        $token = $_POST['token'] ?? '';
        $email = $_POST['email'] ?? '';
        $newPassword = $_POST['new_password'] ?? '';

        if (empty($newPassword)) {
            echo "Please provide a new password.";
            return;
        }

          // Optioneel: valideer hier het token en de e-mail met behulp van je password_resets-tabel.
        // Voor eenvoud, ga ervan uit dat het geldig is.
        
        // Haal de gebruiker op basis van e-mail
        $user = $this->userRepo->findByEmail($email);
        if (!$user) {
            echo "User not found.";
            return;
        }

        // Werk het wachtwoord van de gebruiker bij
        $passHash = password_hash($newPassword, PASSWORD_DEFAULT);
        $this->userRepo->updateUser(
            $user->getUserId(),
            $user->getName(),
            $user->getEmail(),
            $passHash,
            $user->getRole()->value,
            $user->getPhoneNumber()
        );

        // verwijder token uit password_reset tabel.

        echo "Your password has been reset successfully. <a href='/login'>Click here to login</a>.";
    }
}
