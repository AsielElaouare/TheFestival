<?php
namespace App\Service;

use App\Repositories\UserRepository;

class UserService {
    private $userRepo;

    public function __construct() {
        $this->userRepo = new UserRepository();
    }

    public function getAllUsers($search, $sortColumn, $sortDirection) {
        return $this->userRepo->getAllUsers($search, $sortColumn, $sortDirection);
    }
    
    // Zoek gebruiker op basis van e-mail
    public function findByEmail($email) {
        return $this->userRepo->findByEmail($email);
    }

    // Maak een nieuwe gebruiker aan met de juiste wachtwoord-hash
    public function createUser($name, $email, $password, $role = 'visitor', $phoneNumber = null) {
        // Hash het wachtwoord
        $passHash = password_hash($password, PASSWORD_DEFAULT);
        return $this->userRepo->createUser($name, $email, $passHash, $role, $phoneNumber);
    }

    // Werk een bestaande gebruiker bij
    // Als $newPassword leeg is, behoud dan de huidige hash.
    public function updateUser($id, $name, $email, $newPassword, $role, $phoneNumber) {
        $user = $this->userRepo->getUserById($id);
        if (!$user) {
            return false;
        }
        if (!empty($newPassword)) {
            $passHash = password_hash($newPassword, PASSWORD_DEFAULT);
        } else {
            $passHash = $user->getPasswordHash();
        }
        return $this->userRepo->updateUser($id, $name, $email, $passHash, $role, $phoneNumber);
    }

    // Haal een gebruiker op via ID
    public function getUserById($id) {
        return $this->userRepo->getUserById($id);
    }

    // Verwijder een gebruiker
    public function deleteUser($id) {
        return $this->userRepo->deleteUser($id);
    }

    // Controleer of een e-mail of telefoonnummer al in gebruik is
    public function checkEmailOrPhoneNumberExists($email, $phoneNumber) {
        return $this->userRepo->checkEmailOrPhoneNumberExists($email, $phoneNumber);
    }


    // Controleer of e-mail is gewijzigd
public function hasEmailChanged(string $oldEmail, string $newEmail): bool {
    return strtolower(trim($oldEmail)) !== strtolower(trim($newEmail));
}

// Valideer wachtwoordwijziging
public function validatePasswordUpdate($user, string $newPassword, string $currentPassword) {
    if (empty($newPassword)) {
        return ''; // No new password — keep old hash
    }

    if (empty($currentPassword) || !password_verify($currentPassword, $user->getPasswordHash())) {
        return false; // Invalid attempt
    }

    return $newPassword; // Valid — return it for further processing
}

}
