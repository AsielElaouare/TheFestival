<?php
namespace App\Controllers;

use App\Service\UserService;
use App\Helper\InputHelper;

class RegisterController {
    private $userService;
    public function __construct(){
        $this->userService = new UserService();
    }

    public function index() {
        require __DIR__ . '/../views/login/register.php';
    }

    // Verwerk registratie
    public function processRegister() {
        // Sanitize formulierinvoer
        $name        = InputHelper::sanitizeString($_POST['name'] ?? '');
        $email       = InputHelper::sanitizeEmail($_POST['email'] ?? '');
        $password    = $_POST['password'] ?? '';
        $phoneNumber = InputHelper::sanitizeString($_POST['phone_number'] ?? '');

        // Controleer reCAPTCHA v2
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
            $captchaResponse = $_POST['g-recaptcha-response'];
            $secretKey = '6LcHI-0qAAAAAGCpAH437XasUtPBP92K3USiceUE'; // Vervang met je eigen secret key
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

        // Controleer of e-mail al bestaat
        $existing = $this->userService->checkEmailOrPhoneNumberExists($email, $phoneNumber);
        if ($existing) {
            $error = "The combination of email and/or phone number are already in use.";
            require __DIR__ . "/../views/login/register.php";
            return;
        }
        
        // Maak een nieuwe gebruiker aan met de rol 'customer'
        $newUserId = $this->userService->createUser($name, $email, $password, 'customer', $phoneNumber);

        // Toon een succespagina
        require __DIR__ . '/../views/login/register_success.php';
    }
}
