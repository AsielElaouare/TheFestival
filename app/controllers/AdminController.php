<?php
namespace App\Controllers;

use App\Service\UserService;
use App\Service\ShowService;
use App\Repositories\ShowRepository;
use App\Helper\InputHelper;

class AdminController extends BaseController {

    private $userService;
    private $showService;  

    public function __construct() {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            $this->redirectWithError("Unauthorized access", "/");
        }

        $this->userService = new UserService();
        $this->showService = new ShowService(new ShowRepository());
    }

    // Dashboard toont alle gebruikers en shows (met zoek-, filter- en sorteermogelijkheden)
    public function dashboard() {
        $search        = InputHelper::sanitizeString($_GET['search'] ?? '');
        $sortColumn    = InputHelper::sanitizeString($_GET['sort'] ?? 'registration_date');
        $sortDirection = InputHelper::sanitizeString($_GET['direction'] ?? 'DESC');

        $users = $this->userService->getAllUsers($search, $sortColumn, $sortDirection);
        $shows = $this->showService->getAllShows();

        $locations = (new \App\Repositories\LocationRepository())->getAllLocations();
        $artists   = (new \App\Repositories\ArtistRepository())->getAllArtists();

        include __DIR__ . '/../views/admin/dashboard.php';
    }
    
    // Combineer Create en Store: als GET tonen we het formulier, als POST verwerken we de creatie
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name        = InputHelper::sanitizeString($_POST['name'] ?? '');
            $email       = InputHelper::sanitizeEmail($_POST['email'] ?? '');
            $password    = $_POST['password'] ?? '';
            $role        = InputHelper::sanitizeString($_POST['role'] ?? 'visitor');
            $phoneNumber = InputHelper::sanitizeString($_POST['phone_number'] ?? '');

            if (empty($name) || empty($email) || empty($password)) {
                $error = "Name, email, and password are required.";
                include __DIR__ . '/../views/admin/users/create.php';
                return;
            }

            if (!$this->userService->createUser($name, $email, $password, $role, $phoneNumber)) {
                $this->redirectWithError("Could not create user", "/admin/dashboard");
            }

            $this->redirectWithMessage("User created", "/admin/dashboard");
        }

        include __DIR__ . '/../views/admin/users/create.php';
    }
    
    // Combineer Edit en Update: als GET tonen we het formulier, als POST verwerken we de update
    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id          = InputHelper::sanitizeString($_POST['user_id'] ?? '');
            $name        = InputHelper::sanitizeString($_POST['name'] ?? '');
            $email       = InputHelper::sanitizeEmail($_POST['email'] ?? '');
            $role        = InputHelper::sanitizeString($_POST['role'] ?? 'visitor');
            $phoneNumber = InputHelper::sanitizeString($_POST['phone_number'] ?? '');
            $password    = $_POST['password'] ?? '';

            if (empty($id)) {
                $this->redirectWithError("User not found", "/admin/dashboard");
            }

            if (!$this->userService->updateUser($id, $name, $email, $password, $role, $phoneNumber)) {
                $this->redirectWithError("User update failed", "/admin/dashboard");
            }

            $this->redirectWithMessage("User updated", "/admin/dashboard");
        }

        $id = InputHelper::sanitizeString($_GET['id'] ?? '');
        if (empty($id)) {
            $this->redirectWithError("User not found", "/admin/dashboard");
        }

        $user = $this->userService->getUserById($id);
        if (!$user) {
            $this->redirectWithError("User not found", "/admin/dashboard");
        }

        include __DIR__ . '/../views/admin/users/edit.php';
    }
    
    // Combineer Delete bevestiging en verwijdering: als GET tonen we de bevestigingspagina, als POST verwerken we de verwijdering
    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = InputHelper::sanitizeString($_POST['user_id'] ?? '');

            if (empty($id)) {
                $this->redirectWithError("User not found", "/admin/dashboard");
            }

            if (!$this->userService->deleteUser($id)) {
                $this->redirectWithError("Could not delete user", "/admin/dashboard");
            }

            $this->redirectWithMessage("User deleted", "/admin/dashboard");
        }

        $id = InputHelper::sanitizeString($_GET['id'] ?? '');
        if (empty($id)) {
            $this->redirectWithError("User not found", "/admin/dashboard");
        }

        $user = $this->userService->getUserById($id);
        if (!$user) {
            $this->redirectWithError("User not found", "/admin/dashboard");
        }

        include __DIR__ . '/../views/admin/users/delete.php';
    }
}
