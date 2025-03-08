<?php
namespace App\Controllers;

use App\Repositories\UserRepository;

class AdminController {

    private $userRepo;
    
    public function __construct() {
        // sesion start
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // alleen voor admins access
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("Location: /");
            exit();
        }
        $this->userRepo = new UserRepository();
    }
    
    // dashboard laat alle user in een lijst zien met search,filter en sort.
    public function dashboard() {
        $search = $_GET['search'] ?? '';
        $sortColumn = $_GET['sort'] ?? 'registration_date';
        $sortDirection = $_GET['direction'] ?? 'DESC';
        
        $users = $this->userRepo->getAllUsers($search, $sortColumn, $sortDirection);
        
        include __DIR__ . '/../views/admin/dashboard.php';
    }
    
    public function create() {
        include __DIR__ . '/../views/admin/users/create.php';
    }
    
    public function store() {
        $name        = trim($_POST['name'] ?? '');
        $email       = trim($_POST['email'] ?? '');
        $password    = $_POST['password'] ?? '';
        $role        = $_POST['role'] ?? 'visitor';
        $phoneNumber = $_POST['phone_number'] ?? '';
    
        // Basic validation.
        if(empty($name) || empty($email) || empty($password)) {
            $error = "Name, email, and password are required.";
            include __DIR__ . '/../views/admin/users/create.php';
            return;
        }
        
        $passHash = password_hash($password, PASSWORD_DEFAULT);
        $this->userRepo->createUser($name, $email, $passHash, $role, $phoneNumber);
        
        header("Location: /admin/dashboard?message=User+created");
        exit();
    }
    
    
    public function edit() {
        $id = $_GET['id'] ?? null;
        $user = $this->userRepo->getUserById($id);
        include __DIR__ . '/../views/admin/users/edit.php';
    }
    
   // Process updating the user.
   public function update() {
    $id = $_POST['user_id'] ?? null;
    if (!$id) {
        header("Location: /admin/dashboard?error=User+not+found");
        exit();
    }
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $role = $_POST['role'] ?? 'visitor';
    $phoneNumber = $_POST['phone_number'] ?? '';
    $newPassword = $_POST['password'] ?? '';

    // Retrieve current user data.
    $user = $this->userRepo->getUserById($id);
    if (!$user) {
        header("Location: /admin/dashboard?error=User+not+found");
        exit();
    }
    
    // Use new password hash if provided; otherwise, keep existing hash.
    if (!empty($newPassword)) {
        $passHash = password_hash($newPassword, PASSWORD_DEFAULT);
    } else {
        $passHash = $user->getPasswordHash();
    }
    
    $this->userRepo->updateUser($id, $name, $email, $passHash, $role, $phoneNumber);
    header("Location: /admin/dashboard?message=User+updated");
    exit();
}
    
    // Show delete confirmation page.
    public function delete() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: /admin/dashboard?error=User+not+found");
            exit();
        }
        $user = $this->userRepo->getUserById($id);
        if (!$user) {
            header("Location: /admin/dashboard?error=User+not+found");
            exit();
        }
        include __DIR__ . '/../views/admin/users/delete.php';
    }
    
    public function destroy() {
        $id = $_POST['user_id'] ?? null;
        if (!$id) {
            header("Location: /admin/dashboard?error=User+not+found");
            exit();
        }
        $this->userRepo->deleteUser($id);
        header("Location: /admin/dashboard?message=User+deleted");
        exit();
    }
    
}
