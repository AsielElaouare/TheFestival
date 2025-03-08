<?php

namespace App\Controllers;

use App\Repositories\UserRepository;
use PDO;

class RegisterController{

private $userRepo;
public function __construct(){
    $this->userRepo = new UserRepository();
}

public function index()
{
    require __DIR__ . '/../views/login/register.php';
}

// Process registration
public function processRegister() {
    $name        = $_POST['name'] ?? '';
    $email       = $_POST['email'] ?? '';
    $password    = $_POST['password'] ?? '';
    $phoneNumber = $_POST['phone_number'] ?? '';

    // Verify reCAPTCHA v2
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $captchaResponse = $_POST['g-recaptcha-response'];
        $secretKey = '6LcHI-0qAAAAAGCpAH437XasUtPBP92K3USiceUE'; // Replace with your actual secret key
        $userIP = $_SERVER['REMOTE_ADDR'];
        $request = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captchaResponse}&remoteip={$userIP}");
        $responseData = json_decode($request);
        if(!$responseData->success) {
            $error = "reCAPTCHA verification failed. Please try again.";
            require __DIR__ . "/../views/login/register.php";
            return;
        }
    } else {
        $error = "Please complete the reCAPTCHA.";
        require __DIR__ . "/../views/login/register.php";
        return;
    }

   
    // controleer of email al bestaat
    $existing = $this->userRepo->checkEmailOrPhoneNumberExists($email, $phoneNumber);

    if ($existing) {
        $error = "The combination of email and/or phone number are already in use.";
        require __DIR__ . "/../views/login/register.php";
        return;
    }
    // Hash the password
    $passHash = password_hash($password, PASSWORD_DEFAULT);

    // Create a new user with the role 'customer'
    $newUserId = $this->userRepo->createUser($name, $email, $passHash, 'customer', $phoneNumber);

    // Instead of logging in and redirecting, show a success page
    require __DIR__ . '/../views/login/register_success.php';
}
}

