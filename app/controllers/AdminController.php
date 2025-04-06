<?php
namespace App\Controllers;

use App\Service\UserService;
use App\Service\ShowService;
use App\Repositories\ShowRepository;
use App\Helper\InputHelper;

class AdminController {

    private $userService;
    private $showService;  

    public function __construct() {
        // Alleen voor admins
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("Location: /");
            exit();
        }
        $this->userService = new UserService();
        $this->showService = new ShowService(new ShowRepository());
    }
    
    // Dashboard toont alle gebruikers en shows (met zoek-, filter- en sorteermogelijkheden)
    public function dashboard() {
        $search = InputHelper::sanitizeString($_GET['search'] ?? '');
        $sortColumn = InputHelper::sanitizeString($_GET['sort'] ?? 'registration_date');
        $sortDirection = InputHelper::sanitizeString($_GET['direction'] ?? 'DESC');
        
        $users = $this->userService->getAllUsers($search, $sortColumn, $sortDirection);
        $shows = $this->showService->getAllShows();
        
        // laad locaties 
        $locationRepo = new \App\Repositories\LocationRepository();
        $locations = $locationRepo->getAllLocations();
        
        // laad artiesten
        $artistRepo = new \App\Repositories\ArtistRepository();
        $artists = $artistRepo->getAllArtists();
        
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
    
            // Basisvalidatie: naam, e-mail en wachtwoord zijn verplicht.
            if(empty($name) || empty($email) || empty($password)) {
                $error = "Name, email, and password are required.";
                include __DIR__ . '/../views/admin/users/create.php';
                return;
            }
            
            $result = $this->userService->createUser($name, $email, $password, $role, $phoneNumber);
            if (!$result) {
                header("Location: /admin/dashboard?error=Could+not+create+user");
                exit();
            }
            header("Location: /admin/dashboard?message=User+created");
            exit();
        } else {
            include __DIR__ . '/../views/admin/users/create.php';
        }
    }
    
    // Combineer Edit en Update: als GET tonen we het formulier, als POST verwerken we de update
    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = InputHelper::sanitizeString($_POST['user_id'] ?? '');
            if (empty($id)) {
                header("Location: /admin/dashboard?error=User+not+found");
                exit();
            }
            $name        = InputHelper::sanitizeString($_POST['name'] ?? '');
            $email       = InputHelper::sanitizeEmail($_POST['email'] ?? '');
            $role        = InputHelper::sanitizeString($_POST['role'] ?? 'visitor');
            $phoneNumber = InputHelper::sanitizeString($_POST['phone_number'] ?? '');
            $newPassword = $_POST['password'] ?? '';
    
            $result = $this->userService->updateUser($id, $name, $email, $newPassword, $role, $phoneNumber);
            if (!$result) {
                header("Location: /admin/dashboard?error=User+update+failed");
                exit();
            }
            header("Location: /admin/dashboard?message=User+updated");
            exit();
        } else {
            $id = InputHelper::sanitizeString($_GET['id'] ?? '');
            if (empty($id)) {
                header("Location: /admin/dashboard?error=User+not+found");
                exit();
            }
            $user = $this->userService->getUserById($id);
            if (!$user) {
                header("Location: /admin/dashboard?error=User+not+found");
                exit();
            }
            include __DIR__ . '/../views/admin/users/edit.php';
        }
    }
    
    // Combineer Delete bevestiging en verwijdering: als GET tonen we de bevestigingspagina, als POST verwerken we de verwijdering
    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = InputHelper::sanitizeString($_POST['user_id'] ?? '');
            if (empty($id)) {
                header("Location: /admin/dashboard?error=User+not+found");
                exit();
            }
            $result = $this->userService->deleteUser($id);
            if (!$result) {
                header("Location: /admin/dashboard?error=Could+not+delete+user");
                exit();
            }
            header("Location: /admin/dashboard?message=User+deleted");
            exit();
        } else {
            $id = InputHelper::sanitizeString($_GET['id'] ?? '');
            if (empty($id)) {
                header("Location: /admin/dashboard?error=User+not+found");
                exit();
            }
            $user = $this->userService->getUserById($id);
            if (!$user) {
                header("Location: /admin/dashboard?error=User+not+found");
                exit();
            }
            include __DIR__ . '/../views/admin/users/delete.php';
        }
    }

}
