<?php
namespace App\Controllers;

use App\Repositories\UserRepository;

class ResetPasswordController {
    private $userRepo;

    public function __construct() {
        $this->userRepo = new UserRepository();
    }

    // Display the password reset form
    public function index() {
        $token = $_GET['token'] ?? '';
        $email = $_GET['email'] ?? '';

        // Basic check: if token or email is missing, show an error
        if (empty($token) || empty($email)) {
            echo "Invalid password reset link.";
            return;
        }
        
        // Optionally: Validate the token and check expiration from your password_resets table.
        include __DIR__ . '/../views/login/reset_password.php';
    }

    // Process the submitted new password
    public function processReset() {
        $token = $_POST['token'] ?? '';
        $email = $_POST['email'] ?? '';
        $newPassword = $_POST['new_password'] ?? '';

        if (empty($newPassword)) {
            echo "Please provide a new password.";
            return;
        }

        // Optionally: Validate token and email here using your password_resets table.
        // For simplicity, assume it's valid.

        // Get the user by email
        $user = $this->userRepo->findByEmail($email);
        if (!$user) {
            echo "User not found.";
            return;
        }

        // Update the user's password
        $passHash = password_hash($newPassword, PASSWORD_DEFAULT);
        $this->userRepo->updateUser(
            $user->getUserId(),
            $user->getName(),
            $user->getEmail(),
            $passHash,
            $user->getRole()->value,
            $user->getPhoneNumber()
        );

        // Optionally: Delete the token from password_resets table here.

        echo "Your password has been reset successfully. <a href='/login'>Click here to login</a>.";
    }
}
