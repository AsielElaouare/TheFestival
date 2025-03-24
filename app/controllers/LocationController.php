<?php
namespace App\Controllers;

use App\Repositories\LocationRepository;
use App\Helper\InputHelper;

class LocationController
{
    private LocationRepository $locationRepo;

    public function __construct()
    {
        // Alleen toegankelijk voor admins
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("Location: /");
            exit();
        }

        $this->locationRepo = new LocationRepository();
    }

    // Toon alle locaties
    public function index()
    {
        $locations = $this->locationRepo->getAllLocations();
        include __DIR__ . '/../views/admin/locations/index.php';
    }

    // Toon formulier voor het aanmaken van een nieuwe locatie
    public function create()
    {
        include __DIR__ . '/../views/admin/locations/create.php';
    }

    // Verwerk het aanmaken van een nieuwe locatie
    public function store()
    {
        $venueName  = $_POST['venue_name']  ?? '';
        $postalCode = $_POST['postal_code'] ?? '';
        $streetName = $_POST['street_name'] ?? '';
        $city       = $_POST['city']        ?? '';

        // Basisvalidatie
        if (empty($venueName) || empty($postalCode) || empty($streetName) || empty($city)) {
            $error = "Alle velden zijn verplicht.";
            include __DIR__ . '/../views/admin/locations/create.php';
            return;
        }

        $this->locationRepo->createLocation($venueName, $postalCode, $streetName, $city);
        header("Location: /location/index?message=Location+created");
        exit();
    }

    // Toon formulier voor het bewerken van een bestaande locatie
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: /admin/locations?error=Location+not+found");
            exit();
        }
        $location = $this->locationRepo->getLocationById((int) $id);
        if (!$location) {
            header("Location: /admin/locations?error=Location+not+found");
            exit();
        }
        include __DIR__ . '/../views/admin/locations/edit.php';
    }

    // Verwerk het bijwerken van een bestaande locatie
    public function update()
    {
        $id = $_POST['location_id'] ?? null;
        if (!$id) {
            header("Location: /admin/locations?error=Location+not+found");
            exit();
        }

        $venueName  = $_POST['venue_name']  ?? '';
        $postalCode = $_POST['postal_code'] ?? '';
        $streetName = $_POST['street_name'] ?? '';
        $city       = $_POST['city']        ?? '';

        if (empty($venueName) || empty($postalCode) || empty($streetName) || empty($city)) {
            $error = "Alle velden zijn verplicht.";
            include __DIR__ . '/../views/admin/locations/edit.php';
            return;
        }

        $this->locationRepo->updateLocation((int) $id, $venueName, $postalCode, $streetName, $city);
        header("Location: /location/index?message=Location+updated");
        exit();
    }

    // Toon verwijder-bevestiging of direct verwijderen, afhankelijk van je voorkeur
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: /admin/locations?error=Location+not+found");
            exit();
        }
        $location = $this->locationRepo->getLocationById((int) $id);
        if (!$location) {
            header("Location: /admin/locations?error=Location+not+found");
            exit();
        }
        include __DIR__ . '/../views/admin/locations/delete.php';
    }

    // Verwerk het verwijderen van een locatie
    public function destroy()
    {
    $id = InputHelper::sanitizeString($_POST['location_id'] ?? '');
    if (empty($id)) {
        header("Location: /location/index?error=Location+not+found");
        exit();
    }
    
    // Check if there are dependent shows for this location.
    if ($this->locationRepo->hasDependentShows((int)$id)) {
        header("Location: /location/index?error=Cannot+delete+location+because+it+is+in+use");
        exit();
    }
    
    $result = $this->locationRepo->deleteLocation((int)$id);
    if (!$result) {
        header("Location: /location/index?error=An+error+occurred");
        exit();
    }
    
    header("Location: /location/index?message=Location+deleted");
    exit();
    }

}
