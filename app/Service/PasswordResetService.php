<?php
namespace App\Service;

use App\Repositories\PasswordResetRepository;
use App\Service\UserService;

class PasswordResetService
{
    private PasswordResetRepository $repo;
    private UserService $userService;

    public function __construct()
    {
        $this->repo = new PasswordResetRepository();
        $this->userService = new UserService();
    }

    public function requestReset(string $email): ?string
    {
        // Email moet bestaan via UserService
        $user = $this->userService->findByEmail($email);
        if (!$user) {
            return null;
        }

        // Token genereren
        $token = bin2hex(random_bytes(16));
        $expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Opslaan in DB
        $success = $this->repo->createToken($email, $token, $expiresAt);
        return $success ? $token : null;
    }
}
